<?php

namespace App\Models;

use App\Http\Enum\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class Admin extends User
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'group_id',
        'fullname',
        'mail_address',
        'password',
        'role',
    ];

    /**
     * Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
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
     * Password setter
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Check if admin has admin role
     *
     * @return bool
     */
    public function isAdministrator()
    {
        return $this->role == Role::Administrator->value;
    }
}
