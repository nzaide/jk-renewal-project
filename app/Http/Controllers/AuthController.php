<?php

namespace App\Http\Controllers;

use App\Http\Enum\RegistrationStatus;
use App\Http\Requests\LoginRequest;
use App\Models\JobSeeker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\View\View;

class AuthController extends Controller
{
    private $User;
    protected $limiter;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->User = app(JobSeeker::class);
    }

    /**
     * Display Login Page.
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Login User.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function mailLogin(LoginRequest $request): RedirectResponse
    {
        $safe = $request->safe()->only(['email', 'password']);

        if ($this->User->login($safe)) {
            RateLimiter::clear($request->ip());

            if (RegistrationStatus::PRE_REGISTERED == Auth::user()->registration_status) {
                return redirect()->route('members.registration.completion.view');
            }

            return redirect()->route('members.job.offer.search');
        } else {
            return back()->with('warning', __('auth.failed'))->onlyInput('email');
        }
    }
}
