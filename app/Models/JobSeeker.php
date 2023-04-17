<?php

namespace App\Models;

use App\Enums\JobSeekerRequest as EnumsJobSeekerRequest;
use App\Enums\JobSeekerStatus;
use App\Models\Traits\JobSeeker\PerformsAdvancedSearch;
use App\Models\Traits\JobSeeker\PerformsBasicSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class JobSeeker extends User
{
    use HasFactory;
    use PerformsAdvancedSearch;
    use PerformsBasicSearch;
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $casts = [
        'birth_date' => 'date',
        'is_blacklist' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'is_blacklist',
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
        'applicant_resume',
        'complete_blind_resume',
        'blind_resume',
        'original_resume',
        'shokumu_keirekisho',
        'rirekisho',
        'request',
        'job_posting',
        'interviewer',
        'reactivation_date',
        'status',
        'interview_date',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Job seeker industry preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerIndustryPreferences()
    {
        return $this->hasMany(JobSeekerIndustryPreference::class);
    }

    /**
     * Job seeker job preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerJobPreferences()
    {
        return $this->hasMany(JobSeekerJobPreference::class);
    }

    /**
     * Job seeker job field preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerJobFieldPreferences()
    {
        return $this->hasMany(JobSeekerJobFieldPreference::class);
    }

    /**
     * Job seeker license preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerLicensePreferences()
    {
        return $this->hasMany(JobSeekerLicensePreference::class);
    }

    /**
     * Job seeker location preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerLocationPreferences()
    {
        return $this->hasMany(JobSeekerLocationPreference::class);
    }

    /**
     * Job seeker other tag preferences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSeekerOtherTagPreferences()
    {
        return $this->hasMany(JobSeekerOtherTagPreference::class);
    }

    /**
     * It will automatically hash the password before saving it to the database
     *
     * @param String $password
     */
    public function setPasswordAttribute($password)
    {
        if ($password) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    /**
     * Email getter
     *
     * @return string
     */
    public function getEmailAttribute()
    {
        return $this->attributes['mail_address'];
    }

    /**
     * Registration
     *
     * @param Array|Object $data
     *
     * @return JobSeeker
     */
    public function register($data): JobSeeker
    {
        $data = [
            ...$data,
            'status' => JobSeekerStatus::InitiallyRegistered->value,
        ];

        $jobSeeker = JobSeeker::updateOrCreate(['mail_address' => $data['mail_address']], $data);

        return $jobSeeker;
    }

    /**
     * Nationality Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Nationality, \App\Models\JobSeeker>
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    /**
     * First Language Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Language, \App\Models\JobSeeker>
     */
    public function languageFirst()
    {
        return $this->belongsTo(Language::class, 'language_first_id', 'id');
    }

    /**
     * Second Language Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Language, \App\Models\JobSeeker>
     */
    public function languageSecond()
    {
        return $this->belongsTo(Language::class, 'language_second_id', 'id');
    }

    /**
     * Third Language Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Language, \App\Models\JobSeeker>
     */
    public function languageThird()
    {
        return $this->belongsTo(Language::class, 'language_third_id', 'id');
    }

    /**
     * Check if Account Not Verified
     *
     * @param \Illuminate\Database\Eloquent\Builder<JobSeeker> $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeCheckIfNotVerified($query, $id, $token)
    {
        return $query
            ->where('job_seekers.id', $id)
            ->where('job_seekers.status', JobSeekerStatus::InitiallyRegistered->value)
            ->whereNull('job_seekers.email_verified_at')
            ->where('job_seeker_requests.request', EnumsJobSeekerRequest::RegisterDetails->value)
            ->where('job_seeker_requests.token', $token)
            ->leftJoin('job_seeker_requests', 'job_seeker_requests.job_seeker_id', '=', 'job_seekers.id');
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
     * JobSeekerRequest relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\JobSeekerRequest>
     */
    public function jobSeekerRequests()
    {
        return $this->hasMany(JobSeekerRequest::class);
    }

    /**
     * Industry relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Industry>
     */
    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'job_seeker_industry_preferences')
            ->withTimestamps();
    }

    /**
     * Job relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Job>
     */
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_seeker_job_preferences')
            ->withTimestamps();
    }

    /**
     * Job field relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\JobField>
     */
    public function jobFields()
    {
        return $this->belongsToMany(JobField::class, 'job_seeker_job_field_preferences')
            ->withTimestamps();
    }

    /**
     * License relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\License>
     */
    public function licenses()
    {
        return $this->belongsToMany(License::class, 'job_seeker_license_preferences')
            ->withTimestamps();
    }

    /**
     * Location relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Location>
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'job_seeker_location_preferences')
            ->withTimestamps();
    }

    /**
     * Other tage relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\OtherTag>
     */
    public function otherTags()
    {
        return $this->belongsToMany(OtherTag::class, 'job_seeker_other_tag_preferences')
            ->withTimestamps();
    }
}
