<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupJob extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'job_post_id',
        'language',
        'sort_order',
    ];

    /**
     * JobPost relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\JobPost, \App\Models\PickupJob>
     */
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
}
