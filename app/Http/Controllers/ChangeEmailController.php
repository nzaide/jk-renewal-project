<?php

namespace App\Http\Controllers;

use App\Enums\JobSeekerRequest as EnumsJobSeekerRequest;
use App\Models\JobSeekerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChangeEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\View|void
     */
    public function __invoke($token)
    {
        $jobSeekerRequest = JobSeekerRequest::where('token', $token)->first();

        if ($jobSeekerRequest) {
            $tokenExpirationDate = new Carbon($jobSeekerRequest->created_at);
            $tokenExpirationDate = $tokenExpirationDate->add(1, 'day');

            if (
                $jobSeekerRequest->request == EnumsJobSeekerRequest::UpdateEmail->value
                && $tokenExpirationDate >= now()
            ) {
                $jobSeekerRequest->jobSeeker->update([
                    'mail_address' => $jobSeekerRequest->email
                ]);

                return view('job-seekers.email.complete');
            }
        }

        abort(419);
    }
}
