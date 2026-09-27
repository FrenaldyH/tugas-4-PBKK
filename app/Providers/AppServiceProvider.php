<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // Theme flag read from ?mode=dark, shared with every view so the
        // navbar toggle works on all pages, not just one.
        View::share('darkMode', request()->query('mode') === 'dark');
    }
}
