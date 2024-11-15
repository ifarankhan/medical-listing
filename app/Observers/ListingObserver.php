<?php

namespace App\Observers;

use App\Models\Listing;
use Carbon\Carbon;

class ListingObserver
{
    /**
     * Handle the Listing "created" event.
     *
     * @param Listing $listing
     *
     * @return void
     */
    public function created(Listing $listing): void
    {
        $user = $listing->user;
        // Only update if the trial_period_start and trial_period_end are not already set.
        if (is_null($user->trial_period_start) && is_null($user->trial_period_end)) {

            $listing->listing_status = Listing::STATUS_ACTIVE_TRIAL;
            $listing->save();
            // Set trial period to 90 days from the time the listing is created.
            $user->trial_period_start = Carbon::now(); // Current date and time.
            $user->trial_period_end = Carbon::now()->addDays(90); // 90 days later.
            // Save the user with the updated trial period timestamps.
            $user->save();

        } elseif ($user->trial_period_end && Carbon::now()->lt($user->trial_period_end)) {
            // Reactivate trial if within trial period.
            $listing->listing_status = Listing::STATUS_ACTIVE_TRIAL;
            $listing->save();
        }
    }

    /**
     * Handle the Listing "updated" event.
     *
     * @param Listing $listing
     *
     * @return void
     */
    public function updated(Listing $listing)
    {
        //
    }

    /**
     * Handle the Listing "deleted" event.
     *
     * @param Listing  $listing
     *
     * @return void
     */
    public function deleted(Listing $listing)
    {
        //
    }

    /**
     * Handle the Listing "restored" event.
     *
     * @param  Listing  $listing
     *
     * @return void
     */
    public function restored(Listing $listing)
    {
        //
    }

    /**
     * Handle the Listing "force deleted" event.
     *
     * @param  Listing  $listing
     *
     * @return void
     */
    public function forceDeleted(Listing $listing)
    {
        //
    }
}
