<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EmployerAccountController extends Controller
{
    function account()
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->first();

        return view('Employers.account', ['employer' => $employer]);
    }

    public function profile_edit()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Find the candidate associated with the authenticated user
        $employer = Employer::where('user_id', $user->id)->firstOrFail();
        // Pass the Employer data to the view
        return view('employers.profile_edit', compact('employer'));
    }
    public function profile_update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'phone_number' => 'required|string|max:15',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $employer = Employer::where('user_id', $user->id)->firstOrFail();


        // Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();


        $employer->address = $request->input('address');
        $employer->company_name = $request->input('company_name');
        $employer->company_description = $request->input('company_description');
        $employer->phone_number = $request->input('phone_number');

        // Handle the company logo upload
        if ($request->hasFile('image')) {
            // Delete the old company logo if it exists
            if ($employer->company_logo) {
                $imagePath = public_path('uploads') . '/' . $employer->company_logo;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('uploads'), $fileName);
            $employer->company_logo = $fileName;
        }

        $employer->save();


        return redirect()->route('employer_account')->with('success', 'Profile updated successfully!');
    }
}
