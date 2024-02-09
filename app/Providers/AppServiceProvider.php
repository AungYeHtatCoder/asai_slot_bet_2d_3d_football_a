<?php

namespace App\Providers;

use App\Services\ApiService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ApiService::class, function ($app) {
            return new ApiService('http://gsmd.336699bet.com'); // Replace with your API base URL
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}