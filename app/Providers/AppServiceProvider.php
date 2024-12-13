<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app
        ->when(\App\Http\Controllers\ConfirmationController::class)
        ->needs(\App\Services\EmailConfirmationMethod::class)
        ->give(\App\Interfaces\ConfirmationMethodInterface::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
    }
}
