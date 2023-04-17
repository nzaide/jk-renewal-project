<?php

namespace App\Mail;

use App\Models\Language;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferFriendAdminMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * JobSeeker instance
     *
     * @var \App\Models\JobSeeker|null $jobSeeker
     */
    public $jobSeeker;

    /**
     * Array of request data
     *
     * @var array $data
     */
    public $data;

    /**
     * Resume data
     *
     * @var array|null $resume
     */
    public $resume;

    /**
     * Language instance
     *
     * @var \App\Models\Language|null $language
     */
    public $language;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobSeeker, $data, $resume)
    {
        $this->jobSeeker = $jobSeeker;
        $this->data = $data;
        $this->resume = $resume;
        $this->language = Language::find($data['language']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Refer a friend'))
            ->view('components.mail.refer_friend_to_admin')
            ->with([
                'jobSeeker' => $this->jobSeeker,
                'data' => $this->data,
                'language' => $this->language,
            ]);

        if ($this->resume != null) {
            $mail->attach($this->resume['path'], [
                'as' => $this->resume['orginalFileName'],
                'mime' => $this->resume['mimeType'],
            ]);
        }

        return $mail;
    }
}
