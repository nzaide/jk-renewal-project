<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobSeeker;
use Illuminate\Support\Facades\Storage;

class JobSeekerBlindResumeController extends Controller
{
    /**
     * Download the resource
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(JobSeeker $jobSeeker)
    {
        $path = $jobSeeker->blind_resume;

        if ($path && is_string($path) && Storage::exists($path)) {
            return Storage::download($path);
        }

        abort(404);
    }
}
