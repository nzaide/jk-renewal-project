<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePasswordResetLinkRequest;
use App\Models\JobSeeker;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Show link request form
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('password.request');
    }

    /**
     * Send reset link for the given email
     *
     * @param \Illuminate\Http\Request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StorePasswordResetLinkRequest $request)
    {
        $token = Str::random(60);
        $existing = JobSeeker::where('mail_address', $request->email)->get();

        if ($existing->count() > 0) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);

            $mailable = new ResetPasswordMail(
                route('password.reset', $token)
            );

            Mail::to($request->email)->send($mailable);
        }

        return redirect()->route('password.request')
            ->with('success', __('Successfully sent email to reset password!'));
    }
}
