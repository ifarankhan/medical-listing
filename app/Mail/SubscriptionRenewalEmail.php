<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionRenewalEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $listingTitle;
    protected $interval;
    protected $subscriptionType;
    protected $amount;
    protected $nextBillingDate;

    protected $paymentReference;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $listing, $invoice)
    {
        $this->user = $user;
        $this->listingTitle = $listing->business_name;

        // Extract details from the invoice
        $this->interval = $invoice['lines']['data'][0]['plan']['interval'];
        //$this->subscriptionType = ucfirst($invoice['lines']['data'][0]['plan']['interval']);
        $this->amount = number_format($invoice['amount_paid'] / 100, 2); // Assuming amount is in cents
        $this->nextBillingDate = date('F j, Y', $invoice['next_payment_attempt']);
        $this->paymentReference = $invoice['payment_intent']; // Use Stripe Payment Intent as the reference
    }

    public function build(): SubscriptionRenewalEmail
    {
        return $this->subject('Subscription Renewal Confirmation')
            ->view('emails.subscription-renewal')
            ->with([
                'userName' => $this->user->name,
                'listingTitle' => $this->listingTitle,
                'interval' => $this->interval,
                //'subscriptionType' => $this->subscriptionType,
                'amount' => $this->amount,
                'nextBillingDate' => $this->nextBillingDate,
                'paymentReference' => $this->paymentReference,
            ]);
    }
}
