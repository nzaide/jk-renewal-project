<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateJobSeekerEmailMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * Change Email Url
     *
     * @var string $urlLink
     */
    public $urlLink;

    /**
     * JobSeekerRequest isntakce
     *
     * @var \App\Models\JobSeekerRequest
     */
    public $jobSeekerRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($urlLink, $jobSeekerRequest)
    {
        $this->urlLink = $urlLink;
        $this->jobSeekerRequest = $jobSeekerRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Change email address'))
            ->view('components.mail.jobseeker_email_update_request')
            ->with([
                'urlLink' => $this->urlLink,
                'created_at' => $this->jobSeekerRequest->created_at,
            ]);
    }
}
