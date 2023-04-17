<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewPasswordRequest;
use App\Models\JobSeeker;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Session;

class NewPasswordController extends Controller
{
    /**
     * Show link request form
     *
     * @param string $token
     * @return \Illuminate\Contracts\View\View
     */
    public function create($token)
    {
        $isValidated = PasswordReset::where('token', [request()->token])
            ->firstOrFail();

        abort_if(!($isValidated), 404);
        return view('password.reset', ['token' => $token, 'user' => $isValidated]);
    }

    /**
     * Send reset link for the given email
     *
     * @param \App\Http\Requests\StoreNewPasswordRequest $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewPasswordRequest $request)
    {
        $password_reset = PasswordReset::where('token', [$request->token])
            ->where('email', $request->mail_address)
            ->firstOrFail();
        $isPasswordChanged = false;

        $user = JobSeeker::where('mail_address', $password_reset->email)->firstOrFail();

        $status = $user->forceFill([
            'password' => $request->password,
         ])->save();

        if ($status) {
            $isPasswordChanged = true;
            $password_reset->where('email', $request->mail_address)->delete();
        } else {
            Session::flash('warning', __('FAILED TO RESET PASSWORD'));
        }

        return $status
            ? redirect()->route('password.update.notice')->with('isPasswordChanged', $isPasswordChanged)
            : back();
    }
}
