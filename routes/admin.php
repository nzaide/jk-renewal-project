<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\ApplicationStatusController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobFieldController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\JobPostStatusController;
use App\Http\Controllers\Admin\JobSeekerBlacklistController;
use App\Http\Controllers\Admin\JobSeekerBlindResumeController;
use App\Http\Controllers\Admin\JobSeekerCompleteBlindResumeController;
use App\Http\Controllers\Admin\JobSeekerController;
use App\Http\Controllers\Admin\JobSeekerEducationLevelController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OtherTagController;
use App\Http\Controllers\Admin\RequiredLanguageController;
use App\Http\Controllers\Admin\RequiredLanguageSortController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('admins.index');
        Route::get('/create', [AdminController::class, 'create'])
            ->name('admins.create');
        Route::get('/{admin}/edit', [AdminController::class, 'edit'])
            ->name('admins.edit');

        Route::post('/', [AdminController::class, 'store'])
            ->name('admins.store');
        Route::patch('/{admin}', [AdminController::class, 'update'])
            ->name('admins.update');
        Route::put('/role', [AdminRoleController::class, 'update'])
            ->name('admins.role.update');
        Route::delete('/', [AdminController::class, 'destroy'])
            ->name('admins.destroy');
    });

    Route::get(
        uri: 'job-seekers/education-levels',
        action: [JobSeekerEducationLevelController::class, 'index']
    )->name('job-seekers.education-levels.index');

    Route::get('job-seekers/search', [JobSeekerController::class, 'search'])
        ->name('job-seekers.search');
    Route::resource('job-seekers', JobSeekerController::class)
        ->only(['create', 'store', 'edit', 'update']);

    Route::post(
        uri: 'job-seekers/{job_seeker}/blacklist',
        action: [JobSeekerBlacklistController::class, 'store']
    )->name('job-seekers.blacklist.store');
    Route::delete(
        uri: 'job-seekers/{job_seeker}/blacklist',
        action: [JobSeekerBlacklistController::class, 'destroy']
    )->name('job-seekers.blacklist.destroy');

    Route::get(
        uri: 'job-seekers/{job_seeker}/blind-resume',
        action: [JobSeekerBlindResumeController::class, 'download']
    )->name('job-seekers.blind-resume.download');
    Route::get(
        uri: 'job-seekers/{job_seeker}/complete-blind-resume',
        action: [JobSeekerCompleteBlindResumeController::class, 'download']
    )->name('job-seekers.complete-blind-resume.download');

    Route::prefix('job-posts')->group(function () {
        Route::get('/', [JobPostController::class, 'index'])
            ->name('job-posts.index');
        Route::get('/create', [JobPostController::class, 'create'])
            ->name('job-posts.create');
        Route::post('/', [JobPostController::class, 'store'])
            ->name('job-posts.store');
        Route::get('/{job_post}/edit', [JobPostController::class, 'edit'])
            ->name('job-posts.edit');
        Route::put('/{job_post}', [JobPostController::class, 'update'])
            ->name('job-posts.update');
        Route::patch('/{job_post}/status', [JobPostStatusController::class, 'update'])
            ->name('job-posts.status.update');
        Route::get('/search', [JobPostController::class, 'search'])
            ->name('job-posts.search');
    });

    Route::resource('mails', MailController::class)
        ->only(['index', 'store']);

    Route::prefix('required-languages')->group(function () {
        Route::get('/', [RequiredLanguageController::class, 'index'])
            ->name('required-languages.index');
        Route::post('/store', [RequiredLanguageController::class, 'store'])
            ->name('required-languages.store');
        Route::delete('/{required_language}', [RequiredLanguageController::class, 'destroy'])
            ->name('required-languages.destroy');
    });

    Route::prefix('languages')->group(function () {
        Route::patch('/{language}/required-languages/sort', [RequiredLanguageSortController::class, 'update'])
            ->name('required-languages.sort.update');
    });

    Route::prefix('applications')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])
            ->name('applications.index');
        Route::get('/create', [ApplicationController::class, 'create'])
            ->name('applications.create');
        Route::get('/{application}/edit', [ApplicationController::class, 'edit'])
            ->name('applications.edit');
        Route::post('/', [ApplicationController::class, 'store'])
            ->name('applications.store');
        Route::put('/{application}', [ApplicationController::class, 'update'])
            ->name('applications.update');
        Route::patch('/{application}/status', [ApplicationStatusController::class, 'update'])
            ->name('applications.status.update');
    });

    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])
            ->name('groups.index');
        Route::post('/', [GroupController::class, 'store'])
            ->name('groups.store');
        Route::patch('/{group}', [GroupController::class, 'update'])
            ->name('groups.update');
        Route::delete('/{group}', [GroupController::class, 'destroy'])
            ->name('groups.destroy');
    });

    Route::prefix('options')->group(function () {
        Route::get('/', [OptionController::class, 'index'])
            ->name('options.index');
    });

    Route::prefix('industries')->group(function () {
        Route::post('/', [IndustryController::class, 'store'])
            ->name('industries.store');
        Route::put('/{industry}', [IndustryController::class, 'update'])
            ->name('industries.update');
        Route::delete('/{industry}', [IndustryController::class, 'destroy'])
            ->name('industries.destroy');
    });

    Route::prefix('job-fields')->group(function () {
        Route::post('/', [JobFieldController::class, 'store'])
            ->name('job-fields.store');
        Route::put('/{job_field}', [JobFieldController::class, 'update'])
            ->name('job-fields.update');
        Route::delete('/{job_field}', [JobFieldController::class, 'destroy'])
            ->name('job-fields.destroy');
    });

    Route::prefix('jobs')->group(function () {
        Route::post('/', [JobController::class, 'store'])
            ->name('jobs.store');
        Route::put('/{job}', [JobController::class, 'update'])
            ->name('jobs.update');
        Route::delete('/{job}', [JobController::class, 'destroy'])
            ->name('jobs.destroy');
    });

    Route::prefix('other-tags')->group(function () {
        Route::post('/', [OtherTagController::class, 'store'])
            ->name('other-tags.store');
        Route::put('/{other_tag}', [OtherTagController::class, 'update'])
            ->name('other-tags.update');
        Route::delete('/{other_tag}', [OtherTagController::class, 'destroy'])
            ->name('other-tags.destroy');
    });
});
