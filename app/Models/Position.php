<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    /**
     * Get the users associated with the position.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
