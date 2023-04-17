<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ipaddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @inheritDoc
     */
    protected $table = 'ipaddress';
}
