<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = "candidates";
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'date_of_birth',
        'resume',
        'image',
        'user_id',
    ];
    // Define the relationship to user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // Define the relationship to Application
    public function applications()
    {

        return $this->hasMany(Application::class, 'candidate_id', 'id');
    }
}
