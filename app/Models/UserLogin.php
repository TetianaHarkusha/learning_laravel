<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserLogin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['login', 'password'];

    /**
     * Get the user associated with the login.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the email corresponding to the given login
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function getEmailAttribute()
    {
        return $this->user->email;
    }
}
