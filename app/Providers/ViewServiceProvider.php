<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Profile;

class ViewServiceProvider extends ServiceProvider
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
        // Share the $profile variable with both the public and admin layout components.
        View::composer(['components.public-layout', 'components.admin-layout'], function ($view) {
            $view->with('profile', Profile::firstOrNew([]));
        });
    }
}
