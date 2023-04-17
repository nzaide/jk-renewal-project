<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show verification form for pre registered user.
     *
     * @return View
     */
    public function showVerificationForm(Request $request): View
    {
        // Get request
        $email = $request->old('email');
        $previousUrl = $request->old('previousUrl');

        // Check if no request passed
        if (empty($email) && empty($previousUrl)) {
            return abort(404);
        }

        // Get Pre-registered account
        $preRegisteredUser = JobSeeker::where('mail_address', $email)
            ->first();

        // Return 404 if no pre-registered user found
        if (is_null($preRegisteredUser)) {
            return abort(404);
        }

        // Check if expired
        $expirationDate = Carbon::parse($preRegisteredUser->updated_at)->addDays(1);
        if ($expirationDate <= Carbon::now()) {
            return abort(404);
        }

        return view('auth.verification_notice', compact('email'));
    }
}
