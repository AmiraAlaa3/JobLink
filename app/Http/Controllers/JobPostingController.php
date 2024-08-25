<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostingController extends Controller
{
    // Display a listing of the jobs for the authenticated employer
    public function index()
    {
        $jobs = JobPosting::where('employer_id', Auth::id())->get();
        return view('jobs.index', compact('jobs'));
    }

    // Show the form for creating a new job
    public function create()
    {
        $locations = Location::all();
        $categories = Category::all();
        return view('jobs.create', compact('locations','categories'));
    }

    // Store a newly created job in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'skills_required' => 'required|string',
            'salary_range' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'work_type' => 'required|in:remote,on-site,hybrid',
            'application_deadline' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $job = new JobPosting($request->all());
        $job->employer_id = Auth::id();
        $job->save();

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    // Display the specified job
    public function show(JobPosting $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show the form for editing the specified job
    public function edit(JobPosting $job)
    {
        $this->authorize('update', $job);
        $locations = Location::all();
        $categories = Category::all();
        return view('jobs.edit', compact('job', 'locations','categories'));
    }

    // Update the specified job in storage
    public function update(Request $request, JobPosting $job)
    {
        $this->authorize('update', $job); // Ensure only the owner can update

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'skills_required' => 'required|string',
            'salary_range' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'work_type' => 'required|in:remote,on-site,hybrid',
            'application_deadline' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    // Remove the specified job from storage
    public function destroy(JobPosting $job)
    {
        $this->authorize('delete', $job); // Ensure only the owner can delete
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
}

