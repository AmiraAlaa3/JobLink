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
    $admin = Auth::user();
    // Fetch counts from each table
    $applicationsCount = DB::table('applications')->count();
    $candidatesCount = DB::table('candidates')->count();
    $jobsCount = DB::table('job_postings')->count();
    $categoriesCount = DB::table('categories')->count();
    $employersCount = DB::table('employers')->count();
    $locationsCount = DB::table('locations')->count();

    // Fetch recent job postings and applications
    $recentJobs = DB::table('job_postings')->orderBy('created_at', 'desc')->take(5)->get();


    // Job statistics
    $jobStats = DB::table('job_postings')
        ->select(DB::raw('COUNT(*) as total'), DB::raw("SUM(status = 'active') as active"))
        ->first();

    // Prepare data for charts
    $jobStatsChart = DB::table('job_postings')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $dates = $jobStatsChart->pluck('date');
    $counts = $jobStatsChart->pluck('count');

    // Pass data to the view
    return view('admin.dashboard', compact(
        'applicationsCount',
        'candidatesCount',
        'jobsCount',
        'categoriesCount',
        'employersCount',
        'locationsCount',
        'recentJobs',
        'jobStats',
        'admin',
        'dates',
        'counts'
    ));
}



    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();
        $admin = Auth::user();
        return view('admin.applicants', compact('job', 'applicants','admin'));
    }


    public function indexAdmins(){
        $admin = Auth::user();
        $admins = User::where('role', 'admin')->get();
        return view('admin.addAdmins', compact('admins','admin'));
    }

    public function create() {
        $admin = Auth::user();
        return view('admin.createNewAdmin',compact('admin'));
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

    public function destroy($id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return redirect()->route('admin.admins')->with('error', 'Admin not found.');
        }
        $admin->delete();
        return redirect()->route('admin.admins')->with('success', 'Admin deleted successfully.');
    }

    // mahmoud

    public function allJobs() {
        // Get all employers who have jobs with status 'await'
        $admin = Auth::user();
        $employers = Employer::whereHas('jobPostings', function($query) {
            $query->where('status', 'await');
        })->with(['jobPostings' => function($query) {
            $query->where('status', 'await');
        }])->get();

        return view('admin.allJob', compact('employers','admin'));
    }

    public function acceptJob(JobPosting $job){
        $job->status ='active';
        $job->save();
        return redirect()->route('admin.allJobs')->with('success', 'Job updated successfully!');


    }
    public function cancelJob(JobPosting $job){
        $job->status ='inactive';
        $job->save();
        return redirect()->route('admin.allJobs')->with('success', 'Job updated successfully!');

    }

}
