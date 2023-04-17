<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'admin_id',
        'title',
        'contents',
    ];

    /**
     * Mail histories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mailHistories()
    {
        return $this->hasMany(MailHistory::class);
    }
}
