<?php

namespace App\Mail;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        private User $user,
        private Listing $listing,
        private string $interval
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscription-confirmation')
            ->subject('Subscription Confirmation')
            ->with([
                'userName'     => $this->user->name,
                'listingTitle' => $this->listing->business_name,
                'interval'     => ucfirst($this->interval), // Capitalize the interval (e.g., Monthly or Yearly)
            ]);
    }
}
