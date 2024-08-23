<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the credentials
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate using the default web guard
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended(route('candidate_account'));
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function store(Request $request, $id) {
        $candidate = Candidate::where('user_id', Auth::id())->firstOrFail();
        $employer = Employer::where('user_id', Auth::id())->firstOrFail();
        $user = User::findOrFail($id);
    
        // Store data in the user table
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();
    
        if ($user->role == 'candidate') {
            // Data for candidate
            $candidate->phone_number = $request->input('candidatePhone');
            if ($request->filled('day') && $request->filled('month') && $request->filled('year')) {
                $dateOfBirth = $request->input('year') . '-' . str_pad($request->input('month'), 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->input('day'), 2, '0', STR_PAD_LEFT);
                $candidate->date_of_birth = $dateOfBirth;
            }
            $candidate->image = $this->uploadFile($request, 'image', 'uploads');
            $candidate->resume = $this->uploadFile($request, 'resume', 'uploads/cvs');
            $candidate->save();
            return view('candidates.account');
    
        } elseif ($user->role == 'employer') {
            // Data for employer
            $employer->company_name = $request->input('company_name');
            $employer->address = $request->input('address');
            $employer->phone_number = $request->input('employerPhone');
            $employer->logo = $this->uploadFile($request, 'logo', 'uploads/logo');
            $employer->save();
            return redirect()->view('employers.account');
        }
    }
    
    private function uploadFile(Request $request, $fieldName, $destinationPath) {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path($destinationPath), $fileName);
            return basename($fileName);
        }
        return null;
    }
    

    public function employerLogin(Request $request){
        $name = $request->query('name');
        return view('auth.employerLogin', compact('name'));
    }

    public function candidateLogin(Request $request){
        $name = $request->query('name');
        return view('auth.candidateLogin', compact('name'));
    }

    public function resetPass(){
        return view('auth.resetPassword');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
