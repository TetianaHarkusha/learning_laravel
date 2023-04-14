<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql2';

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(UserDouble::class, 'user_id');
    }
}
