<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // Add this import
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add this 'if' statement
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
