<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class JobSeekerRequest extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'request',
        'email',
        'token',
        'created_at',
    ];

    /**
     * Save Request
     *
     * @param Array|Object $data
     *
     * @return JobSeekerRequest
     */
    public function request($data)
    {
        // Generate token
        $token = Str::random(20);
        $data = [
            'job_seeker_id' => $data->id,
            'email' => $data->mail_address,
            'request' => $data->request,
            'token' => $token,
            'created_at' => now(),
        ];

        $jobSeekerRequest = JobSeekerRequest::create($data);

        return $jobSeekerRequest;
    }

    /**
     * Job Seeker relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\JobSeeker, \App\Models\JobSeekerRequest>
     */
    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
