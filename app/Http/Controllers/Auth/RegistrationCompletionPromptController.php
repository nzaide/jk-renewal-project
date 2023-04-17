<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegistrationCompletionPromptController extends Controller
{
    /**
     * Show registration complete form
     *
     * @return View
     */
    public function showRegistrationCompleteForm(Request $request): View
    {
        $previousUrl = $request->old('previousUrl');

        // Check if previous request comes from registration
        if (empty($previousUrl)) {
            return abort(404);
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.registration_notice');
    }
}
