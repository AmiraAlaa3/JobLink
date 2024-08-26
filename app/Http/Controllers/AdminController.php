<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $admin = Auth::user();

        $jobPostings = JobPosting::with(['employer', 'location'])
                        ->withCount('applications')
                        ->get();

        return view('admin.index', compact('jobPostings','admin'));
    }


    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();
        $admin = Auth::user();
        return view('admin.applicants', compact('job', 'applicants','admin'));
    }
}
