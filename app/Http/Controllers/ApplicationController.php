<?php

namespace App\Http\Controllers;

use App\Enums\ApplicationStatus;
use App\Mail\JobPost\AdminGroupApplicationMail;
use App\Mail\JobPost\JobSeekerApplicationMail;
use App\Models\Application;
use App\Models\Group;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    /**
     * Job Post Application
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobPost $jobPost
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, JobPost $jobPost)
    {
        $jobSeeker = Auth::user();
        if (is_null($jobSeeker)) {
            // Store for redirection after login
            session(['redirectUrl' => URL::previous()]);

            return redirect()->route('login');
        }

        if (empty($jobPost->group_id)) {
            return back()->with([
                'alert-class' => 'alert-danger',
                'message' => __('An error has occurred'),
            ]);
        }

        $isAlreadyApplied = JobPost::alreadyApplied($jobSeeker->id, $jobPost->id)
            ->first()
            ->job_post_id ?? null;

        if ($isAlreadyApplied) {
            return back()->with([
                'alert-class' => 'alert-danger',
                'message' => __('An error has occurred'),
            ]);
        }

        // Create Application
        $application = Application::create([
            'job_post_id' => $jobPost->id,
            'admin_id' => $jobPost->admin_id,
            'job_seeker_id' => $jobSeeker->id,
            'applied_date' => now(),
            'application_status' => ApplicationStatus::Open->value,
        ]);

        if ($application) {
            $group = Group::where('id', $jobPost->group_id)
                ->first();

            if (!empty($group)) {
                Mail::to($group->mail_address)->send(new AdminGroupApplicationMail($jobPost, $jobSeeker));
            }

            // Send mail to Job Seeker
            Mail::to($jobSeeker->mail_address)->send(new JobSeekerApplicationMail($jobPost, $jobSeeker));
        }

        return redirect()
            ->route('job-posts.applications.complete', $jobPost)
            ->with('success', true);
    }

    /**
     * Job Application Complete
     *
     * @return \Illuminate\View\View
     */
    public function complete()
    {
        if (!session()->get('success')) {
            return abort(404);
        }

        return view('job-posts.complete');
    }
}
