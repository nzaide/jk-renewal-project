<?php

namespace App\Models\Traits\JobPost;

use App\Enums\JobPostBenefitsField;
use App\Enums\JobPostDetailsField;
use App\Enums\JobPostLocationField;
use App\Enums\JobPostNameField;
use App\Enums\LanguageId;
use App\Enums\Locale;
use App\Enums\PickupJobLanguage;
use App\Models\JobSeeker;
use App\Traits\ReadsLocale;
use Illuminate\Database\Eloquent\Builder;

trait PerformsSearch
{
    use ReadsLocale;

    /**
     * Scope of job post language preference
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $jobSeeker
     * @param mixed $selectedLanguage
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfJobPostLanguagePreference(Builder $query, mixed $jobSeeker, mixed $selectedLanguage)
    {
        if ($selectedLanguage && is_numeric($selectedLanguage)) {
            $relationName = 'jobPostLanguagePreferences as jplp_selected_language_exists';

            $query = $query
                ->withExists([
                    $relationName => function (Builder $query) use ($selectedLanguage) {
                        return $query->where('language_id', $selectedLanguage);
                    }
                ])
                ->orderByDesc('jplp_selected_language_exists');
        }

        if ($jobSeeker instanceof JobSeeker && $jobSeeker->language_first_id) {
            $relationName = 'jobPostLanguagePreferences as jplp_user_preference_exists';

            $query = $query
                ->withExists([
                    $relationName => function (Builder $query) use ($jobSeeker) {
                        return $query->where('language_id', $jobSeeker->language_first_id);
                    }
                ])
                ->orderByDesc('jplp_user_preference_exists');
        }

        return $query;
    }

    /**
     * Scope of pickup job preference
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $jobSeeker
     * @param mixed $selectedLanguage
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPickupJobPreference(Builder $query, mixed $jobSeeker, mixed $selectedLanguage)
    {
        $languageId = null;

        if ($selectedLanguage && is_numeric($selectedLanguage)) {
            $languageId = LanguageId::from($selectedLanguage);
        }

        if ($jobSeeker instanceof JobSeeker && $jobSeeker->language_first_id) {
            $languageId = LanguageId::from($jobSeeker->language_first_id);
        }

        if ($languageId) {
            $pickupJobLanguage = PickupJobLanguage::tryFromLanguageId($languageId);

            if ($pickupJobLanguage) {
                $query = $query
                    ->withMin([
                        'pickUpJobs' => function (Builder $query) use ($pickupJobLanguage) {
                            return $query->where('language', $pickupJobLanguage->value);
                        }
                    ], 'sort_order')
                    ->orderByRaw('-pick_up_jobs_min_sort_order DESC');
            }
        }

        return $query;
    }

    /**
     * Scope of search keyword
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $searchKeyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSearchKeyword(Builder $query, mixed $searchKeyword)
    {
        $locale = $this->locale();

        if ($searchKeyword && is_string($searchKeyword)) {
            $query = $query->where(function ($query) use ($locale, $searchKeyword) {
                $searchKeyword = '%' . $searchKeyword . '%';

                $query = $query
                    ->where(JobPostBenefitsField::English->value, 'like', $searchKeyword)
                    ->orWhere(JobPostDetailsField::English->value, 'like', $searchKeyword)
                    ->orWhere(JobPostNameField::English->value, 'like', $searchKeyword);

                if ($locale !== Locale::English) {
                    $query = $query
                        ->orwhere(JobPostBenefitsField::fromLocale($locale)->value, 'like', $searchKeyword)
                        ->orWhere(JobPostDetailsField::fromLocale($locale)->value, 'like', $searchKeyword)
                        ->orWhere(JobPostNameField::fromLocale($locale)->value, 'like', $searchKeyword);
                }

                return $query;
            });
        }

        return $query;
    }

    /**
     * Scope of search location
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $searchLocation
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSearchLocation(Builder $query, mixed $searchLocation)
    {
        $locale = $this->locale();

        if ($searchLocation && is_string($searchLocation)) {
            $query = $query->where(function ($query) use ($locale, $searchLocation) {
                $searchLocation = '%' . $searchLocation . '%';

                $query = $query->where(JobPostLocationField::English->value, 'like', $searchLocation);
                if ($locale !== Locale::English) {
                    $query = $query
                        ->orWhere(JobPostLocationField::fromLocale($locale)->value, 'like', $searchLocation);
                }

                return $query;
            });
        }

        return $query;
    }

    /**
     * Scope of search targets
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $searchTargets
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSearchTargets(Builder $query, mixed $searchTargets)
    {
        if ($searchTargets && is_array($searchTargets)) {
            $query = $query->whereIn('target', $searchTargets);
        }

        return $query;
    }
}
