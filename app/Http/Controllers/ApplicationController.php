<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Application;
use App\Models\JobPosting;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //
    public function create(JobPosting $job)
    {
        return view('candidates.show', compact('job'));
    }
    public function store(Request $request, JobPosting $job)
    {
            dd($request->all());
            $request->validate([
                'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);


            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('cvs', $filename, 'public');
            }

            $candidate = Candidate::where('user_id', Auth::id())->first();
            if (!$candidate) {
                return redirect()->back()->with('error', 'You are not eligible to apply for this job.');
            }

            Application::create([
                'candidate_id' => $candidate->user_id,
                'job_posting_id' => $job->id,
                'cv' => $filePath,
            ]);

            return redirect()->route('jobs.show', ['id' => $job->id])
            ->with('success', 'Application submitted successfully!');
    }


}
