<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryCreateNotification extends Notification
{
    use Queueable;

    public $Inquiry;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
        $this->Inquiry = $inquiry;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $id = $this->Inquiry->id;

        return (new MailMessage())
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject("「転ジョーク会議」お問い合わせ完了のお知らせ [問い合わせID: " . $id . "]")
            ->view('layouts.mails.inquiry', [
                'data' => $this->Inquiry
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
