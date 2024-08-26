<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\User;

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

    
    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();

        return view('admin.applicants', compact('job', 'applicants'));
    }
}
