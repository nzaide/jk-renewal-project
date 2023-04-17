<?php

namespace App\Mail\Admin;

use App\Models\Admin;
use App\Models\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminMessaged extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    /**
     * Admin
     *
     * @var \App\Models\Admin
     */
    private $admin;

    /**
     * Mail
     *
     * @var \App\Models\Mail
     */
    private $mail;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Admin $admin
     * @param \App\Models\Mail $mail
     * @param null|\Illuminate\Http\UploadedFile $attachment
     * @return void
     */
    public function __construct(Admin $admin, Mail $mail, ?UploadedFile $attachment)
    {
        $this->admin = $admin;
        $this->mail = $mail;

        if ($attachment instanceof UploadedFile) {
            $attachmentPath = $attachment->store(
                $mail->getTable() . DIRECTORY_SEPARATOR . $mail->id
            );

            if ($attachmentPath) {
                $this->attachments = [[
                    'file' => storage_path('app/' . $attachmentPath),
                    'options' => [
                        'as' => $attachment->getClientOriginalName(),
                        'mime' => $attachment->getClientMimeType(),
                    ]
                ]];
            }
        }
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $group = $this->admin->group;

        return new Envelope(
            from: new Address(
                $group->mail_address,
                $group->sender_name
            ),
            subject: $this->mail->title,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.admin.admin-messaged',
            with: ['contents' => $this->mail->contents],
        );
    }
}
