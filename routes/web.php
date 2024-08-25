<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Category;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\Application;

use Illuminate\Support\Facades\Route;

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
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Candidate Routes - Protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('candidate/account', [CandidateController::class, 'account'])->name('candidate_account');
    Route::get('candidate/profile/edit', [CandidateController::class, 'profile_edit'])->name('candidate_profile_edit');
    Route::put('candidate/profile/update/{id}', [CandidateController::class, 'profile_update'])->name('candidate_profile_update');
    Route::get('/candidate/{id}/download', [CandidateController::class, 'downloadCV'])->name('candidate.download');
});

//Job Posting Routes - protected by auth


Route::middleware('auth')->group(function () {
    // Route::get('/employer/account', [JobPostingController::class, 'account'])->name('employer_account');
    Route::get('/jobs', [JobPostingController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobPostingController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobPostingController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}', [JobPostingController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/edit', [JobPostingController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobPostingController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobPostingController::class, 'destroy'])->name('jobs.destroy');
});

// Route of dashboard
Route::middleware('auth')->group(function () {
    Route::get('/employer/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

});




