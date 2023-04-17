<?php

namespace App\Listeners;

use App\Notifications\ResetPasswordComplete;
use Illuminate\Auth\Events\PasswordReset;

class SendPasswordResetCompleteEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PasswordReset $event
     * @return void
     */
    public function handle(PasswordReset $event): void
    {
        $user = $event->user;
        $user->notify(new ResetPasswordComplete());
    }
}
