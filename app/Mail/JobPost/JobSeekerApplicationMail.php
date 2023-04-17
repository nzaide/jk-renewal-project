<?php

namespace App\Mail\JobPost;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class JobSeekerApplicationMail extends Mailable implements ShouldQueue
{
    use Queueable;

    /**
     * JobPost instance
     *
     * @var \App\Models\JobPost $jobPost
     */
    public $jobPost;

    /**
     * JobSeeker instance
     *
     * @var \App\Models\JobSeeker $jobSeeker
     */
    public $jobSeeker;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobPost, $jobSeeker)
    {
        $this->jobPost = $jobPost;
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Thank you for your application'))
            ->view('components.mail.job-post.application_user_template')
            ->with([
                'jobPost' => $this->jobPost,
                'jobSeeker' => $this->jobSeeker,
            ]);
    }
}
