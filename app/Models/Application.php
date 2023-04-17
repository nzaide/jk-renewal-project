<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'job_post_id',
        'admin_id',
        'job_seeker_id',
        'applied_date',
        'application_status',
        'final_remarks',
    ];

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
     * Admin relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Admin, \App\Models\Application>
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * JobPost relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\JobPost, \App\Models\Application>
     */
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    /**
     * JobSeeker relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\JobSeeker, \App\Models\Application>
     */
    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
