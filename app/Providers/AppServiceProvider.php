<?php

namespace App\Providers;

use App\Models\Drawing;
use App\Observers\DrawingObserver;
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

    public function boot(): void
    {
        Drawing::observe(DrawingObserver::class);
    }
}
