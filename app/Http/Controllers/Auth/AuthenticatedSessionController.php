<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * User Login Form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * User Login function
     *
     * @param \App\Http\Requests\LoginRequest $request with validation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = [
            'mail_address' => $request->mail_address,
            'password' => $request->password
        ];

        if (
            Auth::guard('web')->attemptWhen($credentials, function ($user) {
                return $user->email_verified_at;
            })
        ) {
            $request->session()->regenerate();

            // Redirect to top page
            if ($request->session()->has('redirectUrl')) {
                session()->forget('redirectUrl');

                return redirect()->route('top.' . app()->getLocale());
            }

            return redirect()->route('home');
        }

        return back()
            ->withErrors([
                'password' => __('The Email address or Password must be wrong.'),
            ])->onlyInput('mail_address');
    }

    /**
     * User Logout function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('top.' . app()->getLocale());
    }
}
