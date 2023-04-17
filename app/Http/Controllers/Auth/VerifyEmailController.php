<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use App\Models\JobSeekerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    private $JobSeeker;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->JobSeeker = app(JobSeeker::class);
    }

    /**
     * Show verification form for pre registered user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyEmail(Request $request)
    {
        // Get request
        $jobSeekerId = $request->id;
        $token = $request->hash;

        // Check if no request passed
        if (empty($jobSeekerId) && empty($token)) {
            return abort(404);
        }

        // Check if user not yet verified
        $jobSeeker = $this->JobSeeker::checkIfNotVerified($jobSeekerId, $token)
            ->select('job_seekers.*')
            ->first();

        if (empty($jobSeeker)) {
            return abort(404);
        }

        // Check if expired
        $expirationDate = Carbon::parse($jobSeeker->updated_at)->addDays(1);
        if ($expirationDate <= Carbon::now()) {
            return abort(404);
        }

        // Update job seeker
        $jobSeeker->update([
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect()->route('login');
    }
}
