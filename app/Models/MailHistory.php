<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'recepient_id',
    ];
}
