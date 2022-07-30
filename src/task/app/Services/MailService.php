<?php

namespace App\Services;

use App\Mail\Api\RateMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendToAll(array $mails, string $content)
    {
        foreach ($mails as $mail) {
            Mail::to($mail)->send(new RateMail($content));
        }
    }
}
