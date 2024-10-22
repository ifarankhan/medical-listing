<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GetInTouchMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public array $data) {}

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Get In Touch Mail',
        );
    }

    public function build(): GetInTouchMail
    {
        return $this->from($this->data['fromEmail'], env('APP_NAME', 'Diverrx'))
                    ->subject('New Get In Touch Email')
                    ->view('emails.getintouch')
                    ->with($this->data);
    }
}
