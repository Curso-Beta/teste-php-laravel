<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OpportunityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('candidate/{candidate}/available', [ApplicationController::class, 'availableOpportunities']);

Route::resource('application', ApplicationController::class);
Route::resource('company', CompanyController::class);
Route::resource('candidate', CandidateController::class);
Route::resource('opportunity', OpportunityController::class);


require __DIR__.'/auth.php';
