<?php

use App\Http\Controllers\ApplicationApiController;
use App\Http\Controllers\CandidateApiController;
use App\Http\Controllers\CompanyApiController;
use App\Http\Controllers\OpportunityApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('companies', CompanyApiController::class);
Route::apiResource('candidates', CandidateApiController::class);
Route::apiResource('opportunities', OpportunityApiController::class);
Route::apiResource('applications', ApplicationApiController::class);