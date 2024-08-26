<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $admin = Auth::user();

        $jobPostings = JobPosting::with(['employer', 'location'])
                        ->withCount('applications')
                        ->get();

        return view('admin.index', compact('jobPostings','admin'));
    }
    public function dashboard()
{
    // Fetch counts from each table
    $applicationsCount = DB::table('applications')->count();
    $candidatesCount = DB::table('candidates')->count();
    $jobsCount = DB::table('job_postings')->count();
    $categoriesCount = DB::table('categories')->count();
    $employersCount = DB::table('employers')->count();
    $locationsCount = DB::table('locations')->count();

    // Pass the counts to the view
    return view('admin.dashboard', compact('applicationsCount', 'candidatesCount', 'jobsCount', 'categoriesCount', 'employersCount', 'locationsCount'));
}


    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();
        $admin = Auth::user();
        return view('admin.applicants', compact('job', 'applicants','admin'));
    }


    public function indexAdmins(){
        $admins = User::where('role', 'admin')->get();
        return view('admin.addAdmins', compact('admins'));
    }

    public function create() {
        return view('admin.createNewAdmin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $admin = new User; 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role = 'admin';  // Set role as admin
        $admin->save();
    
        return redirect()->route('admin.admins')->with('success', 'Admin added successfully.');
    }
    
    
}
