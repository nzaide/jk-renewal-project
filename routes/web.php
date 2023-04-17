<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

// Routes that are unauthenticated
Route::middleware('guest')->group(function () {
});
// Routes that are authenticated
Route::middleware(['auth:web'])->group(function () {
    Route::prefix('/members')
        ->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/profile/edit', [UserController::class, 'edit'])->name('members.edit');
                Route::match(['put', 'patch'], '/profile/update', [UserController::class, 'update'])->name('members.update');
                Route::get('/get_user_data', [UserController::class, 'getUserData'])->name('members.get-user-data');
            });
        });
    Route::group(['prefix' => '/members', 'as' => 'members.'], function () {
        Route::prefix('/new')->name('registration.')->group(function () {
            Route::get('/completion', [UserController::class, 'registrationCompletion'])->name('completion.view');
            Route::post('/completion/form_one', [UserController::class, 'updatePersonalInformation'])->name('completion.formOne');
            Route::post('/completion/form_two', [UserController::class, 'updateAcademicHistory'])->name('completion.formTwo');
            Route::post('/completion/form_three', [UserController::class, 'updateEmploymentHistory'])->name('completion.formThree');
            Route::post('/completion/form_four', [UserController::class, 'updateJobCondition'])->name('completion.formFour');
        });
        //Routes that uses JbOfferController
        Route::controller(JobOfferController::class)->group(function () {
            Route::prefix('/job-offer')->name('job.offer.')->group(function () {
                Route::get('/search', 'search')->name('search');
            });
        });
    });
    // Company
    Route::controller(CompanyController::class)->group(function () {
        Route::group(['prefix' => '/companies'], function () {
            Route::prefix('/companies')->name('companies.')->group(function () {
                Route::get('/{company}/job-offers/{jbOffer}', 'jbOffers')->name('jbOffers')->scopeBindings();
            });
        });
    });
});

// Pages
Route::get('/privacyPolicy', [PageController::class, 'show'])->name('pages.show');

Route::get('search', [JobPostController::class, 'search'])
    ->name('job-posts.search');

// Routes for PageController
Route::controller(PageController::class)->group(function() {
    // for employers pc page
    Route::get('/forClients', 'show')->name('pages.show.en');
    Route::get('/forClients_ja', 'show')->name('pages.show.ja');
    Route::get('/forClients_zh-CN', 'show')->name('pages.show.zh-cn');
    Route::get('/forClients_ko', 'show')->name('pages.show.ko');
});

// Top Page
Route::controller(TopController::class)->group(function() {
    Route::get('/', '__invoke')->name('top');
    Route::get('/forApplicants_ja', '__invoke');
    Route::get('/forApplicants_zh-CN', '__invoke');
    Route::get('/forApplicants_ko', '__invoke');
});

// Top Page
Route::controller(TopController::class)->group(function() {
    Route::get('/', '__invoke')->name('top.en');
    Route::get('/forApplicants_ja', '__invoke')->name('top.ja');
    Route::get('/forApplicants_zh-CN', '__invoke')->name('top.zh-cn');
    Route::get('/forApplicants_ko', '__invoke')->name('top.ko');
    Route::get('/set-language/{language}/{id?}', 'setLanguage')->name('language.select');

});

// Pages
Route::controller(PageController::class)->group(function() {
    //About us
    Route::get('/aboutUs_en', 'show')->name('about-us.en');
    Route::get('/aboutUs_ja', 'show')->name('about-us.ja');
    Route::get('/aboutUs_zh-CN', 'show')->name('about-us.zh-cn');
    Route::get('/aboutUs_ko', 'show')->name('about-us.ko');
});