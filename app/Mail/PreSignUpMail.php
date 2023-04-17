<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class PreSignUpMail extends Mailable implements ShouldQueue
{
    use Queueable;

    /**
     * Verification URL
     *
     * @var string
     */
    public $verificationUrl;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\JobSeekerRequest $jobSeekerRequest
     * @return void
     */
    public function __construct($jobSeekerRequest)
    {
        $this->verificationUrl = route('verification.verify', [
            $jobSeekerRequest->job_seeker_id,
            $jobSeekerRequest->token,
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Please proceed to register jknetwork-jobs.com'))
            ->view('components.mail.job_seeker_verify_email')
            ->with(['verificationUrl' => $this->verificationUrl]);
    }
}
