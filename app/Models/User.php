<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'age', 'salary'];

    /**
     * Get the city in which the user is located.
     */
    public function city()
    {
        return $this->belongsTo(City::class)->withDefault();
    }

     /**
     * Get the position in which the user is worked.
     */
    public function position()
    {
        return $this->belongsTo(Position::class)->withDefault();
    }

    /**
     * Get the login associated with the user.
     */
    public function login()
    {
        return $this->hasOne(UserLogin::class);
    }

    /**
     * Get this user's posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
