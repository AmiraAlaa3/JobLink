<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
   function dashboard(){
    $user = Auth::user();
    $employer = Employer::where('user_id', $user->id)->first();
    return view('employers.dashboard',compact('employer'));
   }
}
