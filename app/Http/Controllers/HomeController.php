<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employer;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    function index(){
        $companies = Employer::all();

        // Fetch only 6 jobs where the application_deadline is in the future
        $jobs = JobPosting::where('application_deadline', '>', Carbon::now())
        ->orderBy('application_deadline', 'asc')
        ->take(6)
        ->get();

        $categories = Category::all();

        return view('home',compact('companies','jobs','categories'));
    }
}
