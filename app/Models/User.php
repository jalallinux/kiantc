<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'mobile',
        'password',
    ];

    protected $withCount = [
        'products',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function setPasswordAttribute($value)
    {
        return tap($this, fn () => $this->attributes['password'] = Hash::make($value));
    }

    public function setMobileNumberAttribute($value)
    {
        return tap($this, fn () => $this->attributes['mobile'] = to_valid_mobile_number($value));
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
