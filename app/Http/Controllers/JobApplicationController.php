<?php 
namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    // Show the application form
    public function create(JobPosting $job)
    {
        return view('jobs.apply', compact('job'));
    }

    // Handle the application submission
    public function store(Request $request, JobPosting $job)
    {
        // Validate and save the application

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully!');
    }
}?>