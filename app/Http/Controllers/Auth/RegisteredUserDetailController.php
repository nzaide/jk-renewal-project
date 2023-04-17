<?php

namespace App\Http\Controllers\Auth;

use App\Enums\JobSeekerStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterJobSeekerRequest;
use App\Mail\Admin\NewlyRegisteredUserMail;
use App\Mail\SignUpCompleteMail;
use App\Models\Admin;
use App\Models\JobSeeker;
use App\Models\Language;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserDetailController extends Controller
{
    private $Language;
    private $Nationality;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->Language = app(Language::class);
        $this->Nationality = app(Nationality::class);
    }

    /**
     * Show the form for creating a new account.
     *
     * @return View
     */
    public function showRegistrationDetailForm(): View
    {
        $this->authorize('view', JobSeeker::class);

        // Get Pre-registered account
        $preRegisteredUser = Auth::guard('web')->user();

        $nationalities = $this->Nationality->all();
        $languages = $this->Language->all();

        return view('auth.register_detail', compact(['preRegisteredUser', 'nationalities', 'languages']));
    }

    /**
     * Store a newly created applicant.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->authorize('update', JobSeeker::class);

        // Validate Request
        $this->validateRegistrationDetail($request);

        // Get user to update
        $jobSeeker = JobSeeker::where('id', $request->job_seeker_id)->first();

        if (is_null($jobSeeker)) {
            return back()->with('error', __('An error has occured'));
        }

        $newFilename = '';
        if ($request->upload_resume) {
            $uploadResume = $request->file('upload_resume');
            $newFilename = time() . Str::random(15) . '.' . $uploadResume->getClientOriginalExtension();
            // Save file to directory
            $uploadResume->move(storage_path('app/uploaded-resume'), $newFilename);
        }

        // Update jobseeker details
        $jobSeeker->fullname = $request->fullname;
        $jobSeeker->nationality_id = $request->nationality;
        if ((int) $request->language === 1) {
            $jobSeeker->language_first_id = $request->first_language;
            $jobSeeker->language_second_id = $request->second_language;
            $jobSeeker->language_third_id = $request->third_language;
        }
        $jobSeeker->contact_number = $request->contact;
        $jobSeeker->applicant_resume = $newFilename;
        $jobSeeker->status = JobSeekerStatus::FullyRegistered->value;

        if ($jobSeeker->save()) {
            Mail::to($jobSeeker->mail_address)->send(new SignUpCompleteMail($jobSeeker));

            $mailable = new NewlyRegisteredUserMail($jobSeeker);

            Admin::chunk(
                config('mail.max_recipients'),
                function ($admins) use ($mailable) {
                    Mail::to($admins)->send($mailable);
                }
            );
        } else {
            return back()->with('error', __('An error has occured'));
        }

        return redirect()
            ->route('registration.notice')
            ->withInput(['previousUrl' => URL::current()]);
    }

    /**
     * Validate request.
     *
     * @param Request $request
     * @return void
     *
     * @throws ValidationException
     */
    protected function validateRegistrationDetail(Request $request)
    {
        $request->validate((new RegisterJobSeekerRequest())->rules());
    }
}
