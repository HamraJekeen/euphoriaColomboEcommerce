<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\CheckAdminRole;
use Illuminate\Support\Facades\Route;

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
        Route::middleware('check.admin', CheckAdminRole::class);
    }
}
