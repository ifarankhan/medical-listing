<?php

namespace App\Providers;

use App\Models\Listing;
use App\Models\Subscription;
use App\Observers\ListingObserver;
use App\Rules\FacebookUrl;
use App\Rules\InstagramUrl;
use App\Rules\LinkedinUrl;
use App\Rules\TwitterUrl;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(PaymentService::class, function ($app) {

            $stripeSecret = config('services.stripe.secret');
            if (empty($stripeSecret)) {
                throw new \InvalidArgumentException('Stripe secret key is not configured.');
            }

            return new PaymentService(new StripeClient($stripeSecret), new Subscription());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Create custom Blade directives for role checking.
        Blade::if('userRole', function ($role) {

            return auth()->check() && auth()->user()->hasRole($role);
        });
        // Custom directive for using false check.
        Blade::if('notUserRole', function ($role) {

            return !(auth()->check() && auth()->user()->hasRole($role));
        });

        Listing::observe(ListingObserver::class);

        Validator::extend('facebook_url', function ($attribute, $value, $parameters, $validator) {
            $rule = new FacebookUrl;
            // Get the custom message from the FacebookUrl rule
            $validator->setCustomMessages([
                $attribute . '.facebook_url' => $rule->message()
            ]);

            return $rule->passes($attribute, $value);
        });

        Validator::extend('twitter_url', function ($attribute, $value, $parameters, $validator) {
            $rule = new TwitterUrl;
            // Get the custom message from the FacebookUrl rule
            $validator->setCustomMessages([
                $attribute . '.twitter_url' => $rule->message()
            ]);

            return $rule->passes($attribute, $value);
        });

        Validator::extend('linkedin_url', function ($attribute, $value, $parameters, $validator) {
            $rule = new LinkedinUrl;
            // Get the custom message from the FacebookUrl rule
            $validator->setCustomMessages([
                $attribute . '.linkedin_url' => $rule->message()
            ]);

            return $rule->passes($attribute, $value);
        });

        Validator::extend('instagram_url', function ($attribute, $value, $parameters, $validator) {
            $rule = new InstagramUrl;
            // Get the custom message from the FacebookUrl rule
            $validator->setCustomMessages([
                $attribute . '.instagram_url' => $rule->message()
            ]);

            return $rule->passes($attribute, $value);
        });
    }
}
