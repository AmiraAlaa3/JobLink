<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    // public function index()
    // {
    //     $employerId = Auth::id();

    //     $jobs = JobPosting::where('employer_id', $employerId)->with('applications')->get();

    //     return view('employer.dashboard', compact('jobs'));
    // }
    public function index()
    {
        // Count the number of jobs and applications for the authenticated employer
        $jobCount = JobPosting::where('employer_id', Auth::id())->count();
        $applicationCount = Application::whereHas('jobPosting', function ($query) {
            $query->where('employer_id', Auth::id());
        })->count();

        return view('employer.dashboard', compact('jobCount', 'applicationCount'));
    }
}

