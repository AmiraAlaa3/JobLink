<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        // Count the number of jobs and applications for the authenticated employer
        $employerId = Auth::user()->employer->id;
        $jobCount = JobPosting::where('employer_id',  Auth::user()->employer->id)->count();

        $applicationCount = Application::whereHas('jobPosting', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })->count();

        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->firstOrFail();

        $jobPostings = $employer->jobPostings()->get();

        return view('employers.dashboard', compact('jobCount', 'applicationCount','employer','jobPostings'));
    }
}

