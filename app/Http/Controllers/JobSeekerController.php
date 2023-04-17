<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateJobSeekerRequest;
use App\Models\JobSeeker;
use App\Models\Language;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobSeekerController extends Controller
{
    private $Language;
    private $Nationality;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Language = app(Language::class);
        $this->Nationality = app(Nationality::class);
    }

    /**
     * Get User info for edit page
     *
     * @param \App\Models\JobSeeker $jobSeeker
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Jobseeker $jobSeeker)
    {
        $this->authorize('edit', Jobseeker::class);

        $nationalities = $this->Nationality->all();
        $languages = $this->Language->all();

        return view('job-seekers.edit', compact(['jobSeeker', 'nationalities', 'languages']));
    }

    /**
     * Update user
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @param \App\Http\Requests\UpdateJobSeekerRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobSeekerRequest $request, JobSeeker $jobSeeker)
    {
        $this->authorize('update', [Jobseeker::class, $jobSeeker]);

        $requestData = [
            'fullname' => $request->fullname,
            'nationality_id' => $request->nationality,
            'language_first_id' => $request->first_language,
            'language_second_id' => $request->second_language,
            'language_third_id' => $request->third_language,
            'contact_number' => $request->contact,
        ];

        if ((int) $request->language === 0) {
            $requestData['language_first_id'] = null;
            $requestData['language_second_id'] = null;
            $requestData['language_third_id'] = null;
        }

        if ($request->complete_blind_resume) {
            $cbResume = $request->file('complete_blind_resume');
            $cbrFilename = time() . Str::random(15) . '.' . $cbResume->getClientOriginalExtension();
            // Save file to directory
            $cbResume->move(storage_path('app/uploaded-resume'), $cbrFilename);
            $requestData['complete_blind_resume'] = $cbrFilename;
        }

        if ($request->blind_resume) {
            $bResume = $request->file('blind_resume');
            $brFilename = time() . Str::random(15) . '.' . $bResume->getClientOriginalExtension();
            // Save file to directory
            $bResume->move(storage_path('app/uploaded-resume'), $brFilename);
            $requestData['blind_resume'] = $cbrFilename;
        }

        $jobSeeker->update($requestData);

        if (!$jobSeeker) {
            return back()->with('error', __('An error has occurred'));
        }

        return redirect()->route('job-seekers.success', $jobSeeker->id)
            ->with([
                'success' =>  __('Successfully Updated'),
            ]);
    }

    /**
     * Update success page
     *
     * @return View
     */
    public function success()
    {
        if (session()->get('success')) {
            return view('job-seekers.edit-profile-success');
        }

        return redirect()->route('home');
    }
}
