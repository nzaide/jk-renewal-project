<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class PasswordResetCompletionPromptController extends Controller
{
    /**
     * Show password reset completion form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showPasswordResetCompletionForm()
    {
        abort_if((session('isPasswordChanged') == false || session('isPasswordChanged') == null), 404);
        return view('password.update.notice');
    }
}
