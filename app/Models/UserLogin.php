<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;
use App\Enums\UserRoleEnum;

class UserLogin extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['login', 'password', 'role',];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'role' => UserRoleEnum::class,
    ];

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
    
    /**
     * Checks if the user has the "administrator" role
     */
    public function isAdmin()
    {
        return ($this->role === UserRoleEnum::ADMIN);
    }

    /**
     * Checks if the user has the "user" role
     */
    public function isUser()
    {
        return $this->role === UserRoleEnum::USER;
    }

    /**
     * Get the all admins
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getAdmins()
    {
        $admins = UserLogin::where('role', UserRoleEnum::ADMIN)->get();
        
        return $admins;
    }
}
