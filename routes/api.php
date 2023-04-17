<?php

use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\IndustryController;
use App\Http\Controllers\Api\Admin\JobController;
use App\Http\Controllers\Api\Admin\JobFieldController;
use App\Http\Controllers\Api\Admin\JobPostController;
use App\Http\Controllers\Api\Admin\JobSeekerController;
use App\Http\Controllers\Api\Admin\OtherTagController;
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

/*
 * ----------------------------------
 *  PUBLIC API
 * ----------------------------------
 */
Route::prefix('admin')->group(function (){
    Route::get('/admins',[AdminController::class,'index']);
    Route::get('/industries',[IndustryController::class,'index']);
    Route::get('/jobs',[JobController::class,'index']);
    Route::get('/job-fields',[JobFieldController::class,'index']);
    Route::get('/job-posts',[JobPostController::class,'index']);
    Route::get('/job-seekers',[JobSeekerController::class,'index']);
    Route::get('/other-tags',[OtherTagController::class,'index']);
});