<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use App\Models\Category;
use App\Models\Location;

class JobController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all categories and locations for filters
        $categories = Category::all();
        $locations = Location::all();

        // Start query to fetch job postings
        $query = JobPosting::query();

        // Apply filters if selected
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }
        if ($request->filled('salary_min') && $request->filled('salary_max')) {
            $salary_min = $request->salary_min;
            $salary_max = $request->salary_max;

            $query->whereRaw("CAST(SUBSTRING_INDEX(salary_range, '-', 1) AS UNSIGNED) >= ?", [$salary_min])
                  ->whereRaw("CAST(SUBSTRING_INDEX(salary_range, '-', -1) AS UNSIGNED) <= ?", [$salary_max]);
        }
        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->experience_level);
        }


        // Fetch the filtered job postings
        $jobs = $query->with('category', 'location')->get();

        return view('jobs.index', compact('jobs', 'categories', 'locations'));
    }
}
?>