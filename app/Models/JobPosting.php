<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
     // Define the relationship to Employer
     public function employer()
     {
         return $this->belongsTo(Employer::class);
     }

     // Define the relationship to Location
     public function location()
     {
         return $this->belongsTo(Location::class);
     }

     // Define the relationship to Category
     public function category()
     {
         return $this->belongsTo(Category::class);
     }

     // Define the relationship to Application
     public function applications()
     {
         return $this->hasMany(Application::class);
     }
}
