<?php

namespace App\Providers;

use App\Models\Subscription;
use App\Services\PaymentService;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Blade;
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

            $stripeSecret = config('stripe.secret');

            $httpClientOptions = [
                'verify' => !app()->environment('staging'),
            ];

            if (empty($stripeSecret)) {
                throw new \InvalidArgumentException('Stripe secret key is not configured.');
            }

            return new PaymentService(new StripeClient([
                'api_key' => config('stripe.secret'),
                'http_client' => new GuzzleClient($httpClientOptions),
            ]), new Subscription());
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
    }
}
