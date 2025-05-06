<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    protected string $lang;

    public function __construct($token, $lang)
    {
        $this->lang = $lang;
        $this->token = $token;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'https://mon-encadreur.com/auth/password/reset?token=' . $this->token . '?email=' . urlencode($notifiable->email);
        return (new MailMessage())
            ->subject(trans('messages.reset_password', [], $this->lang))
            ->markdown('emails.reset_password', ['data' => ['url' => $url, 'lang' => $this->lang]]);
    }
}
