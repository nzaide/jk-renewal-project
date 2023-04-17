<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobSeeker;

class JobSeekerBlacklistController extends Controller
{
    /**
     * Include jobseeker to blacklist
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobSeeker $jobSeeker): \Illuminate\Http\RedirectResponse
    {
        $jobSeeker->is_blacklist = 1;
        $jobSeeker->save();

        return redirect()->route('admin.job-seekers.search')
            ->with('success', __('Successfully added to blacklist'));
    }

    /**
     * Remove jobseeker from blacklist
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(JobSeeker $jobSeeker): \Illuminate\Http\RedirectResponse
    {
        $jobSeeker->is_blacklist = 0;
        $jobSeeker->save();

        return redirect()->route('admin.job-seekers.search')
            ->with('success', __('Successfully removed from blacklist'));
    }
}
