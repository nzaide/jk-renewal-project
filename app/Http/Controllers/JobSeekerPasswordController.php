<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJobSeekerPasswordRequest;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobSeekerPasswordController extends Controller
{
    /**
     * Get User info for edit page
     *
     * @param \App\Models\JobSeeker $user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(JobSeeker $jobSeeker)
    {
        $this->authorize('update', $jobSeeker);

        return view('job-seekers.password.edit', compact('jobSeeker'));
    }

    /**
     * Update user password
     *
     * @param \App\Http\Requests\UpdateJobSeekerPasswordRequest $request
     * @param \App\Models\JobSeeker $jobSeeker
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobSeekerPasswordRequest $request, JobSeeker $jobSeeker)
    {
        $this->authorize('update', $jobSeeker);

        $jobSeeker->update([
            'password' => $request->password
        ]);

        Session::flash('isPasswordUpdated', true);

        return redirect()->route('job-seekers.password.update.notice', $jobSeeker);
    }
}
