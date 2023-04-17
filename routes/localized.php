<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FriendReferralController;
use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetCompletionPromptController;
use App\Http\Controllers\JobSeekerPasswordController;
use App\Http\Controllers\JobSeekerPasswordUpdatedPromptController;
use App\Http\Controllers\Auth\RegistrationCompletionPromptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\JobSeekerEmailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisteredUserDetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Localized Routes
|--------------------------------------------------------------------------
*/

Route::get('/test', TestController::class);

// Routes that are unauthenticated
Route::middleware('guest:web')->group(function () {
    // Routes that uses RegisteredUserController
    Route::controller(RegisteredUserController::class)->group(function () {
        Route::group(['prefix' => '/register'], function () {
            Route::get('/', 'showRegistrationForm')->name('register');
            Route::post('/', 'store')->name('job_seeker.register');
        });
    });

    Route::get('/verify-email', [EmailVerificationPromptController::class, 'showVerificationForm'])
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])
        ->name('verification.verify');

    // Password Routes
    Route::name('password.')->group(function() {
        Route::prefix('forgot-password')->controller(PasswordResetLinkController::class)->group(function () {
            Route::get('/', 'create')->name('request');
        });
    });

    // Auth Routes
    Route::prefix('login')->controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('/', 'create')->name('login');
        Route::post('/', 'store');
    });
});

// Routes that are Authenticated
Route::middleware('auth:web')->group(function () {
    // Routes for User Detail Add Page
    Route::controller(RegisteredUserDetailController::class)->group(function () {
        Route::group(['prefix' => '/register-detail'], function () {
            Route::get('/', 'showRegistrationDetailForm')->name('register-detail');
            Route::post('/', 'store')->name('job_seeker.register-detail');
        });
    });

    Route::get('/registered', [RegistrationCompletionPromptController::class, 'showRegistrationCompleteForm'])
        ->name('registration.notice');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// Routes that are Authenticated and Fully Registered User
Route::middleware(['auth:web', 'isFullyRegistered'])->group(function () {
    // Home page
    Route::get('/mypage', HomeController::class)
        ->name('home');

    // JobSeeker
    Route::resource('/job-seekers', JobSeekerController::class)
        ->only('edit', 'update');

    Route::prefix('/job-seekers')->name('job-seekers.')->group(function () {
        Route::get('/{job_seeker}/success', [JobSeekerController::class, 'success'])->name('success');
        Route::get('/{job_seeker}/email/edit', [JobSeekerEmailController::class, 'edit'])
            ->name('email.edit');
        Route::post('/{job_seeker}/email', [JobSeekerEmailController::class, 'update'])
            ->name('email.update');
        Route::get('/{job_seeker}/password/edit', [JobSeekerPasswordController::class, 'edit'])
            ->name('password.edit');
        Route::post('/{job_seeker}/password', [JobSeekerPasswordController::class, 'update'])
            ->name('password.update');
        Route::get('/{job_seeker}/password/updated', JobSeekerPasswordUpdatedPromptController::class)
            ->name('password.update.notice');
    });
    Route::get('/change-email/{token}', ChangeEmailController::class)
        ->name('change-email');
});

// Routes PasswordResetLinkController
Route::controller(PasswordResetLinkController::class)->group(function () {
    Route::group(['prefix' => '/forgot-password'], function () {
        Route::get('/', 'create')->name('password.request');
        Route::post('/', 'store')->name('password.email');
    });
});

// Job Post
Route::resource('job-posts', JobPostController::class)
    ->only('show');

Route::prefix('/job-posts')->name('job-posts.')->group(function () {
    Route::post('/{job_post}/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/{job_post}/applications/complete', [ApplicationController::class, 'complete'])->name('applications.complete');
});

// Reset Password
Route::group(['prefix' => '/reset-password'], function () {
    // Route for PasswordResetCompletionPromptController
    Route::get('/updated', [PasswordResetCompletionPromptController::class, 'showPasswordResetCompletionForm'])->name('password.update.notice');

    // Routes NewPasswordController
    Route::controller(NewPasswordController::class)->group(function () {
        Route::get('/{token}', 'create')->name('password.reset');
        Route::post('/', 'store')->name('password.update');
    });
});

// Pages
Route::controller(PageController::class)->group(function() {
    //Privacy Policy
    Route::group(['prefix' => '/pages'], function () {
        Route::get('/privacy-policy', 'show')->name('privacy-policy');
    });
});

// Refer Friend
Route::resource('refer', FriendReferralController::class)
    ->only([
        'create',
        'store'
    ])->names([
        'create' => 'friend-referrals.create',
        'store' => 'friend-referrals.store'
    ]);
Route::get('/refer/complete', [FriendReferralController::class, 'complete'])
    ->name('friend-referrals.complete');

// Inquiry Route
Route::controller(InquiryController::class)->group(function () {
    Route::group(['prefix' => '/inquiries'], function () {
        Route::get('/', 'create')->name('inquiries.create');
        Route::post('/', 'store')->name('inquiries.store');
    });
});
