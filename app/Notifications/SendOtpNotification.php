<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification 
{
    use Queueable;

    protected $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // If a custom email is passed, send to that email
        $recipientEmail = $this->email ?? $notifiable->email;

        return (new MailMessage)
                    ->subject('Your OTP Code')
                    ->line('Your OTP code is: ' . $this->otp)
                    ->line('This OTP is valid for 10 minutes.')
                    ->line('If you did not request this, please ignore this email.');
    }
}
