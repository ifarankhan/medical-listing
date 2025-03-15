<?php
namespace App\Services;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function send(string $email, Mailable $mailable): void
    {
        Mail::to($email)->send($mailable);
    }
}
