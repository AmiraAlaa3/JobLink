<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::all(); // or you can use pagination: JobPosting::paginate(10);

        return view('jobs.index', compact('jobs'));
    }
    public function show($id)
    {
        // Eager load employer and location relationships
        $job = JobPosting::with(['employer', 'location', 'applications','category'])->findOrFail($id);
        $applicationCount = $job->applications->count();

        return view('jobs.show', compact('job','applicationCount'));
    }
}
