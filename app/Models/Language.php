<?php

namespace App\Models;

use App\Enums\LanguageFluencyEnum;
use App\Enums\LanguageId;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * JobPost relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\JobPost>
     */
    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_language_preferences', 'language_id', 'job_post_id');
    }

    /**
     * Fluencies
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fluencies(): Attribute
    {
        $languageId = LanguageId::tryFrom($this->id);
        $languageFluencyEnum = LanguageFluencyEnum::fromLanguageId($languageId)->value;

        return Attribute::make(
            get: fn () => $languageFluencyEnum::cases(),
        );
    }
}
