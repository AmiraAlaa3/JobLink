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

        return view('candidates.apply', compact('job'));
    }
   
       
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'job_posting_id' => 'required|exists:job_postings,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        
        $candidate = $user->candidate; 
        $candidate->phone_number = $request->phone;
        $candidate->save();

        
        $cvPath = $request->file('cv')->store('cvs', 'public');

       
        Application::create([
            'candidate_id' => $request->candidate_id,
            'job_posting_id' => $request->job_posting_id,
            'status' => 'pending',
            'cv' => $cvPath,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Your application has been submitted successfully!');
    }


}
