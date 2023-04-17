<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class AdminStoredMail extends Mailable implements ShouldQueue
{
    use Queueable;

    /**
     * Array of request data.
     *
     * @var array $data
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('New admin account created'))
            ->view('components.mail.admin.admin_stored_template')
            ->with('data', $this->data);
    }
}
