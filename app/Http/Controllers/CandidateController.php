<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\User;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Storage;
class CandidateController extends Controller
{
    function account(){
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->first();
        return view('candidates.account', ['candidate' => $candidate]);
    }
    function downloadCV($id){
        $candidate = Candidate::findOrFail($id);
        $filePath = public_path('uploads/cvs') . '/' . $candidate->resume;

        if (file_exists($filePath)) {
            // Download the file
            return response()->download($filePath, $candidate->resume);
        } else {
            return "not";
        }
    }
    public function profile_edit(){
        // Get the authenticated user
        $user = Auth::user();
        // Find the candidate associated with the authenticated user
        $candidate = Candidate::where('user_id', $user->id)->firstOrFail();
        // Pass the candidate data to the view
        return view('candidates.profile_edit', compact('candidate'));
    }
    public function profile_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'required|string|min:11',
            'gender' => 'nullable|in:male,female',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'resume' => 'nullable|mimes:pdf|max:2048',
            'day' => 'nullable|integer|between:1,31',
            'month' => 'nullable|integer|between:1,12',
            'year' => 'nullable|integer|between:1900,' . date('Y'),
        ]);

        $candidate = Candidate::where('user_id', Auth::id())->firstOrFail();
        $user = User::findOrFail($id);

        //data in table user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $candidate->address = $request->input('address');
        $candidate->phone_number = $request->input('phone_number');
        $candidate->gender = $request->input('gender');
        $candidate->bio = $request->input('bio');
        $candidate->website = $request->input('website');

         // Handle the date of birth
        if ($request->filled('day') && $request->filled('month') && $request->filled('year')) {
            $dateOfBirth = $request->input('year') . '-' . str_pad($request->input('month'), 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->input('day'), 2, '0', STR_PAD_LEFT);
            $candidate->date_of_birth = $dateOfBirth;
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($candidate->image) {
                $imagePath = public_path('uploads') . '/' . $candidate->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
            $candidate->image = basename($fileName);
        }

        if ($request->hasFile('resume')) {
            // Delete the old resume if exists
            if ($candidate->resume) {
                $resume = public_path('uploads/cvs') . '/' . $candidate->resume;
                if (file_exists($resume)) {
                    unlink($resume);
                }
            }

            // Store the new resume
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads/cvs'), $fileName);
            $candidate->resume = basename($fileName);
        }

        // Save the updated candidate data
        $candidate->save();

        // Redirect back with success message
        return redirect()->route('candidate_account')->with('success', 'Profile updated successfully!');
    }

    public function candidateApp()
    {
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->first();
        if (!$candidate) {
            return redirect()->back()->with('error', 'Candidate not found.');
        }
        $applications = $candidate->applications()->with('jobPosting')->get();
        return view('candidates.applications', compact('candidate', 'applications'));
    }

}
