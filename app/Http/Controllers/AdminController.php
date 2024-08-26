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

    // public function dashboard()
    // {
    //     $admin = Auth::user();

    //     // Fetch counts from each table
    //     $applicationsCount = DB::table('applications')->count();
    //     $candidatesCount = DB::table('candidates')->count();
    //     $jobsCount = DB::table('job_postings')->count();
    //     $categoriesCount = DB::table('categories')->count();
    //     $employersCount = DB::table('employers')->count();
    //     $locationsCount = DB::table('locations')->count();

    //     // Fetch recent job postings and applications
    //     $recentJobs = DB::table('job_postings')
    //         ->orderBy('created_at', 'desc')
    //         ->take(5)
    //         ->get(['id', 'title', 'created_at']); // Fetch only necessary columns

    //         $recentApplications = DB::table('applications')
    //         ->join('candidates', 'applications.candidate_id', '=', 'candidates.id')
    //         ->join('users', 'candidates.user_id', '=', 'users.id') // Join the users table
    //         ->join('job_postings', 'applications.job_posting_id', '=', 'job_postings.id')
    //         ->orderBy('applications.created_at', 'desc')
    //         ->take(5)
    //         ->get([
    //             'applications.id',
    //             'users.name as candidate_name', // Access the user name here
    //             'job_postings.title as job_title',
    //             'applications.created_at'
    //         ]);

    //     // Calculate job posting statistics
    //     $jobStats = DB::table('job_postings')
    //         ->select(DB::raw('COUNT(*) as total'), DB::raw("SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active"))
    //         ->first();

    //     // Pass the data to the view
    //     return view('admin.dashboard', compact(
    //         'applicationsCount',
    //         'candidatesCount',
    //         'jobsCount',
    //         'categoriesCount',
    //         'employersCount',
    //         'locationsCount',
    //         'recentJobs',
    //         'recentApplications',
    //         'jobStats',
    //         'admin'
    //     ));
    // }



    public function showApplicants($jobId)
    {
        $job = JobPosting::findOrFail($jobId);
        $applicants = $job->applications()->with('candidate.user')->get();
        $admin = Auth::user();
        return view('admin.applicants', compact('job', 'applicants','admin'));
    }
}
