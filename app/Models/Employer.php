<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // Define the relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to JobPosting
    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }
}
