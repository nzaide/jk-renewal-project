<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class UnregisteredIPLoginMail extends Mailable implements ShouldQueue
{
    use Queueable;

    public $ip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Unregistered IP address login'))
            ->view('components.mail.admin.unregistered_ip_login_template')
            ->with('ip', $this->ip);
    }
}
