<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    // Define the relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to Application
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
