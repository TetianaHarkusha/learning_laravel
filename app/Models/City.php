<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get the country in which the city is located.
     */
    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    /**
     * Get the users associated with the city.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
