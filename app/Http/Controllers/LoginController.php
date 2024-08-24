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

        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on the user's role
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended(route('admin_dashboard'));
                case 'employer':
                    return redirect()->intended(route('employer_dashboard'));
                case 'candidate':
                    return redirect()->intended(route('candidate_account'));
                default:
                    Auth::logout();
                    return redirect()->back()->withErrors(['role' => 'Unauthorized role']);
            }
        }

        // If authentication fails, redirect back with an error
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:employer,candidate',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        // Additional fields for candidate or employer
        if ($request->role == 'candidate') {
            // Handle the date of birth
            $dateOfBirth = null;
            if ($request->filled('day') && $request->filled('month') && $request->filled('year')) {
                $dateOfBirth = $request->input('year') . '-' . str_pad($request->input('month'), 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->input('day'), 2, '0', STR_PAD_LEFT);
            }
            Candidate::create([
                'user_id' => $user->id,
                'phone_number' => $request->input('candidatePhone'),
                'date_of_birth' => $dateOfBirth,
                'resume' => $this->uploadFile($request, 'resume'),
                'image' => $this->uploadFile($request, 'image'),
            ]);
        }elseif ($request->role === 'employer') {
            Employer::create([
                'user_id' => $user->id,
                'company_name' => $request->input('company_name'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('employerPhone'),
                'company_logo' => $this->uploadFile($request, 'logo'),
            ]);
        } else {
            // Handle unexpected role values
            return redirect()->back()->withErrors(['role' => 'Invalid role selected.']);
        }

        return redirect()->route('login');
    }

    private function uploadFile(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            if ($fieldName == 'image' || $fieldName == 'logo') {
                $file->move(public_path('uploads'), $fileName);
            } elseif ($fieldName == 'resume') {
                $file->move(public_path('uploads/cvs'), $fileName);
            }

            return $fileName;
        }
        return null;
    }

    public function resetPass()
    {
        return view('auth.resetPassword');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
