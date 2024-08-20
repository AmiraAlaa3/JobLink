<?php

use App\Http\Controllers\CandidateController;

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

Route::get('/', function () {
    return view('welcome');
});
/* Candidate */
Route::get('candidate/acount', [CandidateController::class,'account'])->name('candidate_account');
Route::get('candidate/profile/{id}/edit',[CandidateController::class,'profile_edit'])->name('candidate_profile_edit');
Route::post('candidate/profile/{id}/update',[CandidateController::class,'profile_update'])->name('candidate_profile_update');
Route::get('/candidate/{id}/download', [CandidateController::class, 'downloadCV'])->name('candidate.download');
