<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class SignUpCompleteMail extends Mailable implements ShouldQueue
{
    use Queueable;

    /**
     * Job seeker
     *
     * @var \App\Models\JobSeeker
     */
    public $jobSeeker;

    /**
     * Login URL
     *
     * @var string
     */
    public $loginUrl;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @return void
     */
    public function __construct($jobSeeker)
    {
        $this->jobSeeker = $jobSeeker;
        $this->loginUrl = route('login');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Thank you for your registration'))
            ->view('components.mail.job_seeker_sign_up_complete')
            ->with([
                'jobSeeker' => $this->jobSeeker,
                'loginUrl' => $this->loginUrl,
            ]);
    }
}
