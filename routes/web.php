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

Route::get('hi',function(){
    return view('auth.registar');
});

