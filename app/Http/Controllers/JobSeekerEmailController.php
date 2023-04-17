<?php

namespace App\Http\Controllers;

use App\Enums\JobSeekerRequest as EnumsJobSeekerRequest;
use App\Http\Requests\UpdateJobSeekerEmailRequest;
use App\Mail\UpdateJobSeekerEmailMail;
use App\Models\JobSeeker;
use App\Models\JobSeekerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class JobSeekerEmailController extends Controller
{
    /**
     * Get User info for edit page
     *
     * @param JobSeeker $user
     *
     * @return void
     */
    public function edit(JobSeeker $jobSeeker)
    {
        $this->authorize('update', $jobSeeker);

        return view('job-seekers.email.edit', compact('jobSeeker'));
    }

    /**
     * Send email for user email update
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(JobSeeker $jobSeeker, UpdateJobSeekerEmailRequest $request)
    {
        $uniqueEmail = JobSeeker::where('mail_address', $request->mail_address)->first();

        if ($uniqueEmail == null) {
            $token = Str::random(64);

            $jobSeekerRequest = new JobSeekerRequest();
            $jobSeekerRequest->job_seeker_id = $jobSeeker->id;
            $jobSeekerRequest->request = EnumsJobSeekerRequest::UpdateEmail->value;
            $jobSeekerRequest->email = $request->mail_address;
            $jobSeekerRequest->token = $token;
            $jobSeekerRequest->created_at = now();

            if ($jobSeekerRequest->save()) {
                $urlLink = route('change-email', $token);

                Mail::to($jobSeeker->mail_address)
                    ->send(new UpdateJobSeekerEmailMail($urlLink, $jobSeekerRequest));
            }
        }

        Session::flash('alert-class', 'alert-success');
        Session::flash(
            'message',
            __('Email address update requested. Check your inbox to verify the new email address.')
        );

        return redirect()->route('job-seekers.email.edit', $jobSeeker);
    }
}
