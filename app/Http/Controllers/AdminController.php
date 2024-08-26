<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        
        $jobPostings = JobPosting::with(['employer', 'location'])
                        ->withCount('applications') 
                        ->get();

        return view('admin.index', compact('jobPostings'));
    }
    public function dashboard()
{
    // Fetch counts from each table
    $applicationsCount = DB::table('applications')->count();
    $candidatesCount = DB::table('candidates')->count();
    $jobsCount = DB::table('job_postings')->count();
    $categoriesCount = DB::table('categories')->count();
    $employersCount = DB::table('employers')->count();
    $locationsCount = DB::table('locations')->count();

    // Pass the counts to the view
    return view('admin.dashboard', compact('applicationsCount', 'candidatesCount', 'jobsCount', 'categoriesCount', 'employersCount', 'locationsCount'));
}

    
    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();

        return view('admin.applicants', compact('job', 'applicants'));
    }
}
