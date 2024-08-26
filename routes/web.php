<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Category;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\Application;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerController;

use App\Http\Controllers\EmployerAccountController;


use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('resetPassword', [LoginController::class, 'resetPass'])->name('resetPass');
Route::post('login', [LoginController::class, 'login']);
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('register', [LoginController::class,'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class,'register']);


Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Public Route
Route::get('/', [HomeController::class,'index'])->name('home');

// Candidate Routes - Protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    // candidate acount
    Route::get('candidate/account', [CandidateController::class, 'account'])->name('candidate_account');
    Route::get('candidate/profile/edit', [CandidateController::class, 'profile_edit'])->name('candidate_profile_edit');
    Route::put('candidate/profile/update/{id}', [CandidateController::class, 'profile_update'])->name('candidate_profile_update');
    Route::get('/candidate/{id}/download', [CandidateController::class, 'downloadCV'])->name('candidate.download');
    // jobs and apply job
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/apply/{job}', [JobApplicationController::class, 'create'])->name('job.apply');
});
// Employer Routes - Protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer_dashboard');
    Route::get('employer/account', [EmployerAccountController::class, 'account'])->name('employer_account');
    Route::get('employer/profile/edit', [EmployerAccountController::class, 'profile_edit'])->name('Employer_profile_edit');
    Route::put('employer/profile/update/{id}', [EmployerAccountController::class, 'profile_update'])->name('employer_profile_update');
});


Route::get('hi',function(){
    return view('auth.registar');
});

//Job Posting Routes - protected by auth
Route::middleware('auth')->group(function () {
    Route::get('/job_posting', [JobPostingController::class,'index'])->name('job_posting.index');
    Route::get('/job_posting/create', [JobPostingController::class,'create'])->name('job_posting.create');
    Route::post('/job_posting', [JobPostingController::class, 'store'])->name('job_posting.store');
    Route::get('/job_posting/{job}', [JobPostingController::class, 'show'])->name('job_posting.show');

    Route::get('/job_posting/{job}/edit', [JobPostingController::class, 'edit'])->name('job_posting.edit');
    Route::put('/job_posting/{job}', [JobPostingController::class, 'update'])->name('job_posting.update');
    Route::delete('/job_posting/{job}', [JobPostingController::class, 'destroy'])->name('job_posting.destroy');
    Route::get('/employer/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

});

//admin Routes - protected by auth
Route::middleware('auth')->group(function () {
    Route::get('/admin/jobs', [AdminController::class, 'index'])->name('admin.jobs');
    Route::get('/admin/jobs/{job}/applicants', [AdminController::class, 'showApplicants'])->name('admin.applicants');

//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/admin/candidates', [AdminController::class, 'indexCandidates'])->name('admin.candidates');
//     Route::get('/admin/candidates/{candidate}', [AdminController::class, 'editCandidate'])->name('admin.edit_candidate');
//     Route::put('/admin/candidates/{candidate}', [AdminController::class, 'updateCandidate'])->name('admin.update_candidate');
//     Route::delete('/admin/candidates/{candidate}', [AdminController::class, 'destroyCandidate'])->name('admin.destroy_candidate');
//
 });




