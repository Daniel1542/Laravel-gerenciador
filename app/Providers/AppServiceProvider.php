<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\YahooFinanceService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(YahooFinanceService::class, function ($app) {
            return new YahooFinanceService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
