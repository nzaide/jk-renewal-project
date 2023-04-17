<?php

namespace App\Http\Controllers\Auth;

use App\Enums\JobSeekerRequest as EnumsJobSeekerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\PreSignUpMail;
use App\Models\JobSeeker;
use App\Models\JobSeekerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private $JobSeeker;
    private $JobSeekerRequest;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->JobSeeker = app(JobSeeker::class);
        $this->JobSeekerRequest = app(JobSeekerRequest::class);
    }

    /**
     * Show the form for creating a new account.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * Store a newly created applicant.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // Validate Request
        $this->validateRegistration($request);

        $requestData = $request->except([
            'password_confirmation',
            'terms_and_privacy'
        ]);

        $inquiry = $this->JobSeeker->register($requestData);

        $email = '';
        if ($inquiry) {
            $email = $inquiry->mail_address;
            $inquiry->request = EnumsJobSeekerRequest::RegisterDetails->value;

            // Save request for authentication
            $jobSeekerRequest = $this->JobSeekerRequest->request($inquiry);

            // Send mail notification
            Mail::to($email)->send(new PreSignUpMail($jobSeekerRequest));
        }

        return redirect()
            ->route('verification.notice')
            ->withInput([
                'email' => $email,
                'previousUrl' =>  URL::current(),
            ]);
    }

    /**
     * Validate request.
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateRegistration(Request $request)
    {
        $request->validate((new RegisterUserRequest())->rules());
    }
}
