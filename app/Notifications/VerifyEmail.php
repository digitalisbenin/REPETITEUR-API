<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    use Queueable;

    protected string $lang;

    public function __construct($lang)
    {
        $this->lang = $lang;
    }

    protected function buildMailMessage($url)
    {
        $emailData = [
            "url" => $url,
            "lang" => $this->lang
        ];
        return (new MailMessage())
            ->subject(Lang::get('messages.email_verify_title', [], $this->lang))
            ->markdown('emails.welcom', ['data' => $emailData]);
        // return (new MailMessage())
        //     ->subject(Lang::get('messages.email_verify_title', [], $this->lang))
        //     ->markdown('emails.verify', ['data' => $emailData]);
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param mixed $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        $url = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['user' => $notifiable->id],
        );

        $replacedUrl = str_replace(
            env('APP_URL', 'https://api.getourvoice.com/') . 'auth/email/verify/',
            env('DASHBOARD_URL', 'http://app.getourvoice.com/') . 'auth/verify?id=',
            $url
        );

        return $replacedUrl;
    }
}
