<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
