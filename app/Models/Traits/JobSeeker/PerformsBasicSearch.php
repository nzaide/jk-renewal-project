<?php

namespace App\Models\Traits\JobSeeker;

use App\Enums\JobSeekerSearchKey;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

trait PerformsBasicSearch
{
    /**
     * Perform basic search
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfBasicSearchRequest(Builder $query, Request $request)
    {
        $qCreatedAtStart = $request->query(JobSeekerSearchKey::CreatedAtStart->value);
        if (
            $qCreatedAtStart
            && is_string($qCreatedAtStart)
            && Carbon::canBeCreatedFromFormat($qCreatedAtStart, 'd-m-Y')
        ) {
            $startDateTime = Carbon::createFromFormat('d-m-Y', $qCreatedAtStart);
            $startDateTime = $startDateTime->startOfDay();

            $query = $query->where('created_at', '>=', $startDateTime);
        }

        $qCreatedAtEnd = $request->query(JobSeekerSearchKey::CreatedAtEnd->value);
        if (
            $qCreatedAtEnd
            && is_string($qCreatedAtEnd)
            && Carbon::canBeCreatedFromFormat($qCreatedAtEnd, 'd-m-Y')
        ) {
            $endDateTime = Carbon::createFromFormat('d-m-Y', $qCreatedAtEnd);
            $endDateTime = $endDateTime->endOfDay();

            $query = $query->where('created_at', '<=', $endDateTime);
        }

        $qFullname = $request->query(JobSeekerSearchKey::Fullname->value);
        if ($qFullname && is_string($qFullname)) {
            $query = $query->where('fullname', 'like', '%' . $qFullname . '%');
        }

        $qNationalityId = $request->query(JobSeekerSearchKey::NationalityId->value);
        if ($qNationalityId && is_numeric($qNationalityId)) {
            $query = $query->where('nationality_id', $qNationalityId);
        }

        $qContactNumber = $request->query(JobSeekerSearchKey::ContactNumber->value);
        if ($qContactNumber && is_string($qContactNumber)) {
            $query = $query->where('contact_number', 'like', '%' . $qContactNumber . '%');
        }

        $qMailAddress = $request->query(JobSeekerSearchKey::MailAddress->value);
        if ($qMailAddress && is_string($qMailAddress)) {
            $query = $query->where('mail_address', 'like', '%' . $qMailAddress . '%');
        }

        $qPreferredEmployment = $request->query(JobSeekerSearchKey::PreferredEmployment->value);
        if ($qPreferredEmployment && is_numeric($qPreferredEmployment)) {
            $query = $query->where('preferred_employment', $qPreferredEmployment);
        }

        $qIndustryIds = $request->query(JobSeekerSearchKey::IndustryIds->value);
        if ($qIndustryIds && is_array($qIndustryIds)) {
            $query = $query->whereHas(
                'jobSeekerIndustryPreferences',
                function ($query) use ($qIndustryIds) {
                    return $query->whereIn('industry_id', $qIndustryIds);
                }
            );
        }

        $qJobFieldIds = $request->query(JobSeekerSearchKey::JobFieldIds->value);
        if ($qJobFieldIds && is_array($qJobFieldIds)) {
            $query = $query->whereHas(
                'jobSeekerJobFieldPreferences',
                function ($query) use ($qJobFieldIds) {
                    return $query->whereIn('job_field_id', $qJobFieldIds);
                }
            );
        }

        $qLanguageFluencies = $request->query(JobSeekerSearchKey::LanguageFluencies->value);
        if ($qLanguageFluencies && is_array($qLanguageFluencies)) {
            $languageFluencies = [];
            foreach (Language::all('id') as $language) {
                $languageFluencies[] = $language->id . '-0';
                foreach ($language->fluencies as $fluency) {
                    $languageFluencies[] = $language->id . '-' . $fluency->value;
                }
            }

            $qLanguageFluencies = array_filter(
                $qLanguageFluencies,
                fn ($qLanguageFluency) => in_array($qLanguageFluency, $qLanguageFluencies, true)
            );

            $query = $query->where(function ($query) use ($qLanguageFluencies) {
                foreach ($qLanguageFluencies as $qLanguageFluency) {
                    $query = $query->orWhere(function ($query) use ($qLanguageFluency) {
                        [$languageId, $languageFluency] = explode('-', $qLanguageFluency);
                        $query = $query->where('language_first_id', $languageId);
                        if ($languageFluency != '0') {
                            $query = $query->where('language_first_fluency', $languageFluency);
                        }

                        return $query;
                    });
                }

                return $query;
            });
        }

        return $query;
    }
}
