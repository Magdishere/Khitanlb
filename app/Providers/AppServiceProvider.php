<?php

namespace App\Providers;

use App\Sale\Services\SaleModelService;
use App\Sale\Services\SaleTableService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SaleModelService::class, function ($app) {
            return new SaleModelService();
        });

        $this->app->bind(SaleTableService::class, function ($app) {
            return new SaleTableService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
