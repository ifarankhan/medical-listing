<?php

namespace App\Listeners;

use App\Events\ReviewCreatedEvent;
use App\Services\ReviewNotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ReviewNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        private ReviewNotificationService $reviewNotificationService
    )
    {}

    /**
     * Handle the event.
     *
     * @param ReviewCreatedEvent $event
     * @return void
     */
    public function handle(ReviewCreatedEvent $event)
    {
        // Call ReviewNotificationService to send emails.
        $this->reviewNotificationService->sendEmails($event->reviewId);
    }
}
