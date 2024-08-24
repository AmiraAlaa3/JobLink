<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('hi',function(){
    return view('auth.registar');
});


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostingController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('jobs.apply');
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply.store');