<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Zresetuj hasło')
            ->line('Otrzymujesz ten e-mail, ponieważ otrzymaliśmy prośbę o zresetowanie hasła dla Twojego konta.')
            ->action('Zresetuj hasło', url('password/reset', $this->token))
            ->line('Jeśli nie chcesz resetować hasła, zignoruj tę wiadomość.');
    }
}
