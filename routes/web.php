<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;


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
Route::post('login/store', [LoginController::class, 'store'])->name('store');
Route::get('employer/login', [LoginController::class, 'employerLogin'])->name('employerLogin');
Route::post('employer/login', [LoginController::class, 'employerLogin'])->name('employerLogin');
Route::get('candidate/login', [LoginController::class, 'candidateLogin'])->name('candidateLogin');
Route::post('candidate/login', [LoginController::class, 'candidateLogin'])->name('candidateLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Public Route
Route::get('/', [HomeController::class,'index'])->name('home');

// Candidate Routes - Protected by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('candidate/account', [CandidateController::class, 'account'])->name('candidate_account');
    Route::get('candidate/profile/edit', [CandidateController::class, 'profile_edit'])->name('candidate_profile_edit');
    Route::put('candidate/profile/update/{id}', [CandidateController::class, 'profile_update'])->name('candidate_profile_update');
    Route::get('/candidate/{id}/download', [CandidateController::class, 'downloadCV'])->name('candidate.download');
});

Route::get('hi',function(){
    return view('auth.registar');
});


Route::get('/jobs', [JobPostingController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostingController::class, 'show'])->name('jobs.show');
Route::get('/apply/{job}', [JobApplicationController::class, 'create'])->name('apply');
Route::post('/apply/{job}', [JobApplicationController::class, 'store']);
Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('jobs.apply');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

