<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";
    protected $fillable = ['candidate_id', 'job_posting_id', 'status', 'cv'];
    use HasFactory;
    // Define the relationship to candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'user_id', 'user_id');
    }

    // Define the relationship to JobPosting
    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }
}
