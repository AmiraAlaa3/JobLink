<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
