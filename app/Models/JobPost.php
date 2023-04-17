<?php

namespace App\Models;

use App\Enums\JobPostBenefitsField;
use App\Enums\JobPostDetailsField;
use App\Enums\JobPostIndustryField;
use App\Enums\JobPostLocationField;
use App\Enums\JobPostNameField;
use App\Models\Traits\JobPost\PerformsSearch;
use App\Traits\ReadsLocale;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPost extends Model
{
    use HasFactory;
    use PerformsSearch;
    use ReadsLocale;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @inheritDoc
     */
    protected $casts = [
        'post_start_date' => 'datetime',
        'post_end_date' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($jobPost) {
            $jobPost->updated_at = date('Y-m-d H:i:s');
        });
    }

    /**
     * Job post language preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobPostLanguagePreferences()
    {
        return $this->hasMany(JobPostLanguagePreference::class);
    }

    /**
     * Pickup jobs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pickupJobs()
    {
        return $this->hasMany(PickupJob::class);
    }

    /**
     * Benefits
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function benefits(): Attribute
    {
        $locale = $this->locale();

        return Attribute::make(
            get: fn () => $this->getAttribute(JobPostBenefitsField::fromLocale($locale)->value)
                ?? $this->getAttribute(JobPostBenefitsField::English->value),
        );
    }

    /**
     * Industry
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function industry(): Attribute
    {
        $locale = $this->locale();

        return Attribute::make(
            get: fn () => $this->getAttribute(JobPostIndustryField::fromLocale($locale)->value)
                ?? $this->getAttribute(JobPostIndustryField::English->value),
        );
    }

    /**
     * Details
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function details(): Attribute
    {
        $locale = $this->locale();

        return Attribute::make(
            get: fn () => $this->getAttribute(JobPostDetailsField::fromLocale($locale)->value)
                ?? $this->getAttribute(JobPostDetailsField::English->value),
        );
    }

    /**
     * Is new
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isNew(): Attribute
    {
        return Attribute::make(
            get: fn () => now()->subDays(7)->lessThanOrEqualTo($this->updated_at),
        );
    }

    /**
     * Job name
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function jobName(): Attribute
    {
        $locale = $this->locale();

        return Attribute::make(
            get: fn () => $this->getAttribute(JobPostNameField::fromLocale($locale)->value)
                ?? $this->getAttribute(JobPostNameField::English->value),
        );
    }

    /**
     * Location
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function location(): Attribute
    {
        $locale = $this->locale();

        return Attribute::make(
            get: fn () => $this->getAttribute(JobPostLocationField::fromLocale($locale)->value)
                ?? $this->getAttribute(JobPostLocationField::English->value),
        );
    }

    /**
     * Admin relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Admin, \App\Models\JobPost>
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Language relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Language>
     */
    public function languagePreferences()
    {
        return $this->belongsToMany(Language::class, 'job_post_language_preferences', 'job_post_id', 'language_id')
            ->withTimestamps();
    }

    /**
     * Application relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Check if already applied
     *
     * @param \Illuminate\Database\Eloquent\Builder<JobPost> $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAlreadyApplied($query, $jobSeekerId, $jobPostId)
    {
        return $query
            ->where('applications.job_post_id', $jobPostId)
            ->where('applications.job_seeker_id', $jobSeekerId)
            ->leftJoin('applications', 'applications.job_post_id', '=', 'job_posts.id');
    }
}
