<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator; // <-- Add this import

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
    public function boot(UrlGenerator $url): void // <-- Inject UrlGenerator here
    {
        Paginator::useBootstrap();

        // Force HTTPS links for assets, CSS, and JS when running on Render
        if (config('app.env') === 'production') {
            $url->forceScheme('https');
        }
    }
}
