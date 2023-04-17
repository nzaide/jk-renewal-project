<?php

namespace App\Models\Traits\JobSeeker;

use App\Enums\JobSeekerSearchKey;
use App\Enums\LocationType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

trait PerformsAdvancedSearch
{
    /**
     * Perform advanced search
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfAdvancedSearchRequest(Builder $query, Request $request)
    {
        $qGender = $request->query(JobSeekerSearchKey::Gender->value);
        if ($qGender && is_numeric($qGender)) {
            $query = $query->where('gender', $qGender);
        }

        $qBirthMonth = $request->query(JobSeekerSearchKey::BirthMonth->value);
        if ($qBirthMonth && is_numeric($qBirthMonth)) {
            $query = $query->whereMonth('birth_date', $qBirthMonth);
        }

        $qBirthDay = $request->query(JobSeekerSearchKey::BirthDay->value);
        if ($qBirthDay && is_numeric($qBirthDay)) {
            $query = $query->whereDay('birth_date', $qBirthDay);
        }

        $qAgeStart = $request->query(JobSeekerSearchKey::AgeStart->value);
        if ($qAgeStart && is_numeric($qAgeStart)) {
            $referenceDate = now()->subYears($qAgeStart);
            $referenceDate = $referenceDate->format('Y-m-d');

            $query = $query->whereDate('birth_date', '<=', $referenceDate);
        }

        $qAgeEnd = $request->query(JobSeekerSearchKey::AgeEnd->value);
        if ($qAgeEnd && is_numeric($qAgeEnd)) {
            $referenceDate = now()->subYears($qAgeEnd);
            $referenceDate = $referenceDate->format('Y-m-d');

            $query = $query->whereDate('birth_date', '>=', $referenceDate);
        }

        $qEmploymentStatus = $request->query(JobSeekerSearchKey::EmploymentStatus->value);
        if ($qEmploymentStatus && is_numeric($qEmploymentStatus)) {
            $query = $query->where('employment_status', $qEmploymentStatus);
        }

        $qMaritalStatus = $request->query(JobSeekerSearchKey::MaritalStatus->value);
        if ($qMaritalStatus && is_numeric($qMaritalStatus)) {
            $query = $query->where('marital_status', $qMaritalStatus);
        }

        $qVisaId = $request->query(JobSeekerSearchKey::VisaId->value);
        if ($qVisaId && is_numeric($qVisaId)) {
            $query = $query->where('visa_id', $qVisaId);
        }

        $qLocationPhilippines = $request->query(JobSeekerSearchKey::LocationPhilippines->value);
        if ($qLocationPhilippines && is_numeric($qLocationPhilippines)) {
            $query = $query->whereHas(
                'jobSeekerLocationPreferences.location',
                fn (Builder $query) => $query
                    ->where('id', $qLocationPhilippines)
                    ->where('type', LocationType::Philippines->value)
            );
        }

        $qLocationAbroad = $request->query(JobSeekerSearchKey::LocationAbroad->value);
        if ($qLocationAbroad && is_numeric($qLocationAbroad)) {
            $query = $query->whereHas(
                'jobSeekerLocationPreferences.location',
                fn (Builder $query) => $query
                    ->where('id', $qLocationAbroad)
                    ->where('type', LocationType::Abroad->value)
            );
        }

        $qJobIds = $request->query(JobSeekerSearchKey::JobIds->value);
        if ($qJobIds && is_array($qJobIds)) {
            $query = $query->whereHas(
                'jobSeekerJobPreferences',
                fn (Builder $query) => $query->whereIn('job_id', $qJobIds)
            );
        }

        $qPresentEmployer = $request->query(JobSeekerSearchKey::PresentEmployer->value);
        if ($qPresentEmployer && is_string($qPresentEmployer)) {
            $query = $query->where('present_employer', 'like', '%' . $qPresentEmployer . '%');
        }

        $qEnglishFluency = $request->query(JobSeekerSearchKey::EnglishFluency->value);
        if ($qEnglishFluency && is_numeric($qEnglishFluency)) {
            $query = $query->where('english_fluency', $qEnglishFluency);
        }

        $qHighestDegree = $request->query(JobSeekerSearchKey::HighestDegree->value);
        if ($qHighestDegree && is_numeric($qHighestDegree)) {
            $query = $query->where('highest_degree', $qHighestDegree);
        }

        $qEducationLevel = $request->query(JobSeekerSearchKey::EducationLevel->value);
        if ($qEducationLevel && is_numeric($qEducationLevel)) {
            $query = $query->where('education_level', $qEducationLevel);
        }

        $qUniversityMajor = $request->query(JobSeekerSearchKey::UniversityMajor->value);
        if ($qUniversityMajor && is_numeric($qUniversityMajor)) {
            $query = $query->where('university_major', $qUniversityMajor);
        }

        $qLicenceIds = $request->query(JobSeekerSearchKey::LicenseIds->value);
        if ($qLicenceIds && is_array($qLicenceIds)) {
            $query = $query->whereHas(
                'jobSeekerLicensePreferences',
                fn (Builder $query) => $query->whereIn('license_id', $qLicenceIds)
            );
        }

        $qLanguageSecondId = $request->query(JobSeekerSearchKey::LanguageSecondId->value);
        if ($qLanguageSecondId && is_numeric($qLanguageSecondId)) {
            $query = $query->where(
                fn (Builder $query) => $query
                    ->where('language_second_id', $qLanguageSecondId)
                    ->orWhere('language_third_id', $qLanguageSecondId)
            );
        }

        $qLanguageSecondSpeaking = $request->query(JobSeekerSearchKey::LanguageSecondSpeaking->value);
        if ($qLanguageSecondSpeaking && is_numeric($qLanguageSecondSpeaking)) {
            $query = $query->where(
                fn (Builder $query) => $query
                    ->where('language_second_speaking', $qLanguageSecondSpeaking)
                    ->orWhere('language_third_speaking', $qLanguageSecondSpeaking)
            );
        }

        $qLanguageSecondReading = $request->query(JobSeekerSearchKey::LanguageSecondReading->value);
        if ($qLanguageSecondReading && is_numeric($qLanguageSecondReading)) {
            $query = $query->where(
                fn (Builder $query) => $query
                    ->where('language_second_reading', $qLanguageSecondReading)
                    ->orWhere('language_third_reading', $qLanguageSecondReading)
            );
        }

        $qLanguageSecondWriting = $request->query(JobSeekerSearchKey::LanguageSecondWriting->value);
        if ($qLanguageSecondWriting && is_numeric($qLanguageSecondWriting)) {
            $query = $query->where(
                fn (Builder $query) => $query
                    ->where('language_second_writing', $qLanguageSecondWriting)
                    ->orWhere('language_third_writing', $qLanguageSecondWriting)
            );
        }

        $qJobPosting = $request->query(JobSeekerSearchKey::JobPosting->value);
        if ($qJobPosting && is_string($qJobPosting)) {
            $query = $query->where('job_posting', 'like', '%' . $qJobPosting . '%');
        }

        $qInterviewer = $request->query(JobSeekerSearchKey::Interviewer->value);
        if ($qInterviewer && is_string($qInterviewer)) {
            $query = $query->where('interviewer', 'like', '%' . $qInterviewer . '%');
        }

        $qRequest = $request->query(JobSeekerSearchKey::Request->value);
        if ($qRequest && is_string($qRequest)) {
            $query = $query->where('request', 'like', '%' . $qRequest . '%');
        }

        $qOtherTagIds = $request->query(JobSeekerSearchKey::OtherTagIds->value);
        if ($qOtherTagIds && is_array($qOtherTagIds)) {
            $query = $query->whereHas(
                'jobSeekerOtherTagPreferences',
                fn (Builder $query) => $query->whereIn('other_tag_id', $qOtherTagIds)
            );
        }

        $qReactivationDateStart = $request->query(JobSeekerSearchKey::ReactivationDateStart->value);
        if (
            $qReactivationDateStart
            && is_string($qReactivationDateStart)
            && Carbon::canBeCreatedFromFormat($qReactivationDateStart, 'd-m-Y')
        ) {
            $startDateTime = Carbon::createFromFormat('d-m-Y', $qReactivationDateStart);
            $startDateTime = $startDateTime->startOfDay();

            $query = $query->where('reactivation_date', '>=', $startDateTime);
        }

        $qReactivationDateEnd = $request->query(JobSeekerSearchKey::ReactivationDateEnd->value);
        if (
            $qReactivationDateEnd
            && is_string($qReactivationDateEnd)
            && Carbon::canBeCreatedFromFormat($qReactivationDateEnd, 'd-m-Y')
        ) {
            $endDateTime = Carbon::createFromFormat('d-m-Y', $qReactivationDateEnd);
            $endDateTime = $endDateTime->endOfDay();

            $query = $query->where('reactivation_date', '<=', $endDateTime);
        }

        $qExcludeBlacklisted = $request->boolean('exclude_blacklisted');
        if ($qExcludeBlacklisted) {
            $query = $query->where('is_blacklist', !$qExcludeBlacklisted);
        }

        return $query;
    }
}
