<?php

namespace App\Console\Commands;

use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTrialStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:trial-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user status based on trial period end date.';

    /**
     * Execute the console command.
     *
     */
    public function handle(): void
    {
        $users = User::whereNotNull('trial_period_end')
             ->where('trial_period_end', '<=', Carbon::now())
             ->get();

        foreach ($users as $user) {
            // Expire related listings if trial period has ended.
            $user->listings()->update(['listing_status' => Listing::STATUS_EXPIRED_TRIAL]);

            $this->info('Expired listings for user: ' . $user->id);
        }

        $this->info('Trial listings expired successfully.');
    }
}
