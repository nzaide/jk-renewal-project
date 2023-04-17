<?php

namespace App\Mail\Inquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class InquiryUserMail extends Mailable implements ShouldQueue
{
    use Queueable;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Inquiry has been received'))
            ->view('components.mail.inquiry.corporate_user_mail')
            ->with('inquiry', $this->mailData);
    }
}
