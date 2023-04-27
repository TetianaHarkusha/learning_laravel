<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Get the cities associated with the country.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
