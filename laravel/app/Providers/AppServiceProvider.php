<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libs\Plateform;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \App::bind('plateform',function() { return new Plateform; });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
