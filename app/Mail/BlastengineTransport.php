<?php

namespace App\Mail;

use Illuminate\Support\Facades\Http;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\MessageConverter;

class BlastengineTransport extends AbstractTransport
{
    /**
     * The Blastengine API URL.
     *
     * @var string
     */
    protected $url;

    /**
     * The Bearertoken.
     *
     * @var string
     */
    protected $token;

    /**
     * Create a new Blastengine transport instance.
     *
     * @param  string  $url
     * @param  string  $token
     * @return void
     */
    public function __construct(string $url, string $token)
    {
        parent::__construct();
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * {@inheritDoc}
     */
    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        $tos = collect($email->getTo())->map(function ($to) {
            return ['email' => $to->getAddress()];
        })->all();

        // 50 emails is the max for each request
        $tos = array_chunk($tos, 50);

        foreach ($tos as $toChunk) {
            // Begin the bulk sending
            $response = Http::withToken($this->token)
                ->post($this->url . '/deliveries/bulk/begin', [
                    'from' =>  [
                        'email' =>  $email->getFrom()[0]->getAddress(),
                        'name' =>  $email->getFrom()[0]->getName(),
                    ],
                    'subject' =>  $email->getSubject(),
                    'text_part' =>  $email->getTextBody() ?: $email->getHtmlBody(),
                    'html_part' =>  $email->getHtmlBody(),
                ]);

            // Set the receiving addresses and send
            $deliveryId = $response->json('delivery_id');
            Http::withToken($this->token)
                ->put($this->url . '/deliveries/bulk/update/' . $deliveryId, [
                    'to' =>  $toChunk,
                ]);
            Http::withToken($this->token)
                ->patch($this->url . '/deliveries/bulk/commit/' . $deliveryId . '/immediate');
        }
    }

    /**
     * Get the string representation of the transport.
     *
     * @return string
     */
    public function __toString(): string
    {
        return 'blastengine';
    }
}
