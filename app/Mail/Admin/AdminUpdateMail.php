<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class AdminUpdateMail extends Mailable implements ShouldQueue
{
    use Queueable;

    /**
     * The Admin Id.
     *
     * @var int
     */
    public $adminId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminId)
    {
        $this->adminId = $adminId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject(__('Admin account updated'))
            ->view('components.mail.admin.admin_update_template')
            ->with('id', $this->adminId);
    }
}
