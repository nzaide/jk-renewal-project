<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateJobPostStatusRequest;
use App\Models\JobPost;

class JobPostStatusController extends Controller
{
    /**
     * Update Admin role
     *
     * @param \App\Models\JobPost $jobPost
     * @param \App\Http\Requests\Admin\UpdateJobPostStatusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JobPost $jobPost, UpdateJobPostStatusRequest $request)
    {
        $jobPost->update($request->only('status'));

        return back()->with('success', __('Successfully updated'));
    }
}
