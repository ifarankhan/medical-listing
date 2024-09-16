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

class SubscriptionCanceledMail extends Mailable
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
    ) {}

    public function build(): SubscriptionCanceledMail
    {
        return $this->view('emails.subscription-canceled')
            ->subject('Subscription Canceled')
            ->with([
                'userName'     => $this->user->name,
                'listingTitle' => $this->listing->business_name,
                'interval'     => ucfirst($this->interval), // Capitalize the interval (e.g., Monthly or Yearly)
            ]);
    }
}
