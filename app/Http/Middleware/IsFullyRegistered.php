<?php

namespace App\Http\Middleware;

use App\Enums\JobSeekerStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsFullyRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('web')->user();

        if ($user != null) {
            if (
                $user->status == JobSeekerStatus::InitiallyRegistered->value
                && $user->email_verified_at != null
            ) {
                return redirect()->route('register-detail');
            }
        }
        return $next($request);
    }
}
