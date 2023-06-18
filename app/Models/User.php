<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'password',
    ];

    protected $hidden = ['password'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //
    ];


    public function setPasswordAttribute($value)
    {
        return tap($this, fn() => $this->attributes['password'] = Hash::make($value));
    }

    public function setMobileNumberAttribute($value)
    {
        return tap($this, fn() => $this->attributes['mobile_number'] = to_valid_mobile_number($value));
    }
}
