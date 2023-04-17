<?php

namespace App\Http\Controllers\Admin;

use App\Enums\JobSeekerEmploymentStatus;
use App\Enums\JobSeekerEnglishFluency;
use App\Enums\JobSeekerGender;
use App\Enums\JobSeekerHighestDegree;
use App\Enums\JobSeekerMaritalStatus;
use App\Enums\JobSeekerPreferredEmployment;
use App\Enums\JobSeekerSearchKey;
use App\Enums\JobSeekerStatus;
use App\Enums\JobSeekerUniversityMajor;
use App\Enums\JobSeekerVisaId;
use App\Enums\LocationType;
use App\Http\Requests\Admin\StoreJobSeekerRequest;
use App\Http\Requests\Admin\UpdateJobSeekerRequest;
use App\Models\Industry;
use App\Models\Job;
use App\Models\JobField;
use App\Models\JobSeeker;
use App\Models\Language;
use App\Models\License;
use App\Models\Location;
use App\Models\Nationality;
use App\Models\OtherTag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    /**
     * Search job seekers
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        /** Start of search option declarations */

        $jobSeekerEmploymentStatuses = JobSeekerEmploymentStatus::cases();
        $jobSeekerEnglishFluencies = JobSeekerEnglishFluency::cases();
        $jobSeekerGenders = JobSeekerGender::cases();
        $jobSeekerHighestDegrees = JobSeekerHighestDegree::cases();
        $jobSeekerMaritalStatuses = JobSeekerMaritalStatus::cases();
        $jobSeekerPreferredEmployments = JobSeekerPreferredEmployment::cases();
        $jobSeekerUniversityMajors = JobSeekerUniversityMajor::cases();
        $jobSeekerVisaIds = JobSeekerVisaId::cases();

        $industries = Industry::all(['id', 'name']);
        $jobFields = JobField::all(['id', 'name']);
        $jobs = Job::all(['id', 'name']);
        $languages = Language::all(['id', 'language']);
        $licenses = License::all(['id', 'name']);
        $locations = Location::all(['id', 'type', 'location']);
        $nationalities = Nationality::all(['id', 'nationality']);
        $otherTags = OtherTag::all(['id', 'name']);

        $languageReadingSkills = range(1, 10);
        $languageSpeakingSkills = range(1, 10);
        $languageWritingSkills = range(1, 10);

        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = Carbon::createFromFormat('!m', $i)->format('F');
        }

        $nonPhLocations = $locations->whereStrict('type', LocationType::Abroad->value);
        $phLocations = $locations->whereStrict('type', LocationType::Philippines->value);

        /** End of search option declarations */

        $jobSeekers = JobSeeker::orderByDesc('id')
            ->ofBasicSearchRequest($request)
            ->ofAdvancedSearchRequest($request)
            ->paginate(
                perPage: $request->query('per_page', 20),
                columns: [
                    'id',
                    'gender',
                    'birth_date',
                    'blind_resume',
                    'complete_blind_resume',
                    'fullname',
                    'is_blacklist',
                ]
            )
            ->withQueryString();

        $searchConditionCount = collect(JobSeekerSearchKey::cases())
            ->filter(fn ($case) => (bool) $request->query($case->value))
            ->count();

        return view('admin.job-seekers.search', compact(
            /** Search options: enums */
            'jobSeekerEmploymentStatuses',
            'jobSeekerEnglishFluencies',
            'jobSeekerGenders',
            'jobSeekerHighestDegrees',
            'jobSeekerMaritalStatuses',
            'jobSeekerPreferredEmployments',
            'jobSeekerUniversityMajors',
            'jobSeekerVisaIds',
            /** Search options: database records */
            'industries',
            'jobFields',
            'jobs',
            'languages',
            'licenses',
            'locations',
            'nationalities',
            'otherTags',
            /** Search options: derived options */
            'languageReadingSkills',
            'languageSpeakingSkills',
            'languageWritingSkills',
            'months',
            'nonPhLocations',
            'phLocations',
            /** Search result */
            'jobSeekers',
            'searchConditionCount',
        ));
    }

    /**
     * Job seeker create page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $industries = Industry::all();
        $jobs = Job::all();
        $jobFields = JobField::all();
        $languages = Language::all();
        $licenses = License::all();
        $otherTags = OtherTag::all();
        $phLocations = Location::where('type', LocationType::Philippines->value)->get();
        $abLocations = Location::where('type', LocationType::Abroad->value)->get();
        $nationalities = Nationality::all();

        return view('admin.job-seekers.create', compact([
            'industries',
            'jobs',
            'jobFields',
            'languages',
            'licenses',
            'otherTags',
            'phLocations',
            'abLocations',
            'nationalities',
        ]));
    }

    /**
     * Store job seeker
     *
     * @param \App\Http\Requests\Admin\StoreJobSeekerRequest $request
     * @return RedirectResponse
     */
    public function store(StoreJobSeekerRequest $request)
    {
        $data = $request->only([
            'fullname',
            'mail_address',
            'password',
            'english_name',
            'english_fluency',
            'language_first_id',
            'language_first_fluency',
            'language_second_id',
            'language_second_fluency',
            'language_second_speaking',
            'language_second_reading',
            'language_second_writing',
            'language_third_id',
            'language_third_fluency',
            'language_third_speaking',
            'language_third_reading',
            'language_third_writing',
            'gender',
            'contact_number',
            'birth_date',
            'nationality_id',
            'visa_id',
            'marital_status',
            'profile',
            'social_media',
            'other_contact',
            'highest_degree',
            'education_level',
            'university_major',
            'employment_status',
            'present_employer',
            'start_availability',
            'interview_availability',
            'current_salary',
            'expected_salary',
            'preferred_shift',
            'resignation_reason',
            'preferred_employment',
            'pending_application',
            'request',
            'job_posting',
            'interviewer',
            'reactivation_date',
            'interview_date',
        ]);
        $data['status'] = JobSeekerStatus::FullyRegistered->value;
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $jobSeeker = JobSeeker::create($data);
        $jobSeeker->industries()->attach($request->input('industry_ids'));
        $jobSeeker->jobs()->attach($request->input('job_ids'));
        $jobSeeker->jobFields()->attach($request->input('job_field_ids'));
        $jobSeeker->licenses()->attach($request->input('license_ids'));
        $locationIds = Arr::collapse($request->only(['location_philippines', 'location_abroad']));
        $jobSeeker->locations()->attach($locationIds);
        $jobSeeker->otherTags()->attach($request->input('other_tag_ids'));

        // Save files
        if (
            $request->input('complete_blind_resume')
            && $request->input('complete_blind_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('complete_blind_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'complete_blind_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('blind_resume')
            && $request->input('blind_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('blind_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'blind_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('original_resume')
            && $request->input('original_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('original_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'original_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('shokumu_keirekisho')
            && $request->input('shokumu_keirekisho') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('shokumu_keirekisho')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'shokumu_keirekisho' => $newPath,
                ]);
            }
        }
        if (
            $request->input('rirekisho')
            && $request->input('rirekisho') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('rirekisho')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'rirekisho' => $newPath,
                ]);
            }
        }

        return redirect()->route('admin.job-seekers.search')
            ->with([
                'success' =>  __('Successfully added'),
            ]);
    }

    /**
     * Job seeker edit page
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @return \Illuminate\View\View
     */
    public function edit(JobSeeker $jobSeeker)
    {
        $completeBlindResumeBase64 = $this->getAsBase64($jobSeeker->complete_blind_resume);
        $blindResumeBase64 = $this->getAsBase64($jobSeeker->blind_resume);
        $originalResumeBase64 = $this->getAsBase64($jobSeeker->original_resume);
        $shokumuKeirekishoBase64 = $this->getAsBase64($jobSeeker->shokumu_keirekisho);
        $rirekishoBase64 = $this->getAsBase64($jobSeeker->rirekisho);

        $industries = Industry::all();
        $jobs = Job::all();
        $jobFields = JobField::all();
        $languages = Language::all();
        $licenses = License::all();
        $otherTags = OtherTag::all();
        $phLocations = Location::where('type', LocationType::Philippines->value)->get();
        $abLocations = Location::where('type', LocationType::Abroad->value)->get();
        $nationalities = Nationality::all();

        return view('admin.job-seekers.edit', compact([
            'completeBlindResumeBase64',
            'blindResumeBase64',
            'originalResumeBase64',
            'shokumuKeirekishoBase64',
            'rirekishoBase64',
            'industries',
            'jobs',
            'jobFields',
            'jobSeeker',
            'languages',
            'licenses',
            'otherTags',
            'phLocations',
            'abLocations',
            'nationalities',
        ]));
    }

    /**
     * Update job seeker
     *
     * @param \App\Models\JobSeeker $jobSeeker
     * @param \App\Http\Requests\Admin\UpdateJobSeekerRequest $request
     * @return RedirectResponse
     */
    public function update(JobSeeker $jobSeeker, UpdateJobSeekerRequest $request)
    {
        $data = $request->only([
            'fullname',
            'mail_address',
            'password',
            'english_name',
            'english_fluency',
            'language_first_id',
            'language_first_fluency',
            'language_second_id',
            'language_second_fluency',
            'language_second_speaking',
            'language_second_reading',
            'language_second_writing',
            'language_third_id',
            'language_third_fluency',
            'language_third_speaking',
            'language_third_reading',
            'language_third_writing',
            'gender',
            'contact_number',
            'landline',
            'birth_date',
            'nationality_id',
            'visa_id',
            'marital_status',
            'profile',
            'social_media',
            'other_contact',
            'highest_degree',
            'education_level',
            'university_major',
            'employment_status',
            'present_employer',
            'start_availability',
            'interview_availability',
            'current_salary',
            'expected_salary',
            'preferred_shift',
            'resignation_reason',
            'preferred_employment',
            'pending_application',
            'request',
            'job_posting',
            'interviewer',
            'reactivation_date',
            'interview_date',
        ]);
        $data['status'] = JobSeekerStatus::FullyRegistered->value;
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $jobSeeker->update($data);
        $jobSeeker->industries()->sync($request->input('industry_ids'));
        $jobSeeker->jobs()->sync($request->input('job_ids'));
        $jobSeeker->jobFields()->sync($request->input('job_field_ids'));
        $jobSeeker->licenses()->sync($request->input('license_ids'));
        $locationIds = Arr::collapse($request->only(['location_philippines', 'location_abroad']));
        $jobSeeker->locations()->sync($locationIds);
        $jobSeeker->otherTags()->sync($request->input('other_tag_ids'));

        // Save files
        if (
            $request->input('complete_blind_resume_name')
            && $request->input('complete_blind_resume')
            && $request->input('complete_blind_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('complete_blind_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'complete_blind_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('blind_resume_name')
            && $request->input('blind_resume')
            && $request->input('blind_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('blind_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'blind_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('original_resume_name')
            && $request->input('original_resume')
            && $request->input('original_resume') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('original_resume')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'original_resume' => $newPath,
                ]);
            }
        }
        if (
            $request->input('shokumu_keirekisho_name')
            && $request->input('shokumu_keirekisho')
            && $request->input('shokumu_keirekisho') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('shokumu_keirekisho')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'shokumu_keirekisho' => $newPath,
                ]);
            }
        }
        if (
            $request->input('rirekisho_name')
            && $request->input('rirekisho')
            && $request->input('rirekisho') instanceof \Illuminate\Http\UploadedFile
        ) {
            $path = $request->input('rirekisho')->store('job-seekers/' . $jobSeeker->id);

            // Add timestamp
            if (is_string($path)) {
                $pathParts = explode('/', $path);
                $pathParts[2] = time() . $pathParts[2];
                $newPath = implode('/', $pathParts);
                Storage::move($path, $newPath);
                $jobSeeker->update([
                    'rirekisho' => $newPath,
                ]);
            }
        }

        return redirect()->route('admin.job-seekers.search')
            ->with([
                'success' =>  __('Successfully udpated'),
            ]);
    }

    /**
     * Get file contents then convert to base64
     *
     * @param string|null $path
     * @return string|null
     */
    private function getAsBase64(string|null $path)
    {
        $base64 = null;
        if ($path) {
            $data = Storage::get($path);
            if (is_string($data)) {
                $base64 = 'data:;base64,' . base64_encode($data);
            }
        }

        return $base64;
    }
}
