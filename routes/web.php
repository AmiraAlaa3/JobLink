<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerController;

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
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/apply/{job}', [ApplicationController::class, 'create'])->name('job.apply');
});
// Employer Routes - Protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer_dashboard');
    Route::get('employer/account', [EmployerController::class, 'account'])->name('employer_account');
    Route::get('employer/profile/edit', [EmployerController::class, 'profile_edit'])->name('employer_profile_edit');
    Route::put('employer/profile/update/{id}', [EmployerController::class, 'profile_update'])->name('employer_profile_update');
    Route::get('employer/job/create', [JobPostingController::class, 'create'])->name('employer_job_create');
    Route::post('employer/job/store', [JobPostingController::class, 'store'])->name('employer_job_store');
    Route::get('employer/job/{id}/edit', [JobPostingController::class, 'edit'])->name('employer_job_edit');
    Route::put('employer/job/{id}', [JobPostingController::class, 'update'])->name('employer_job_update');
    Route::delete('employer/job/{id}', [JobPostingController::class, 'destroy'])->name('employer_job_delete');
    Route::get('employer/applications', [JobApplicationController::class, 'index'])->name('employer_applications');
});

Route::get('hi',function(){
    return view('auth.registar');
});

/*
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostingController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('jobs.apply');
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply.store');
*/