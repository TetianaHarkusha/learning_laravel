<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the logins associated with the role.
     */
    public function logins()
    {
        return $this->hasMany(UserLogin::class);
    }
}
