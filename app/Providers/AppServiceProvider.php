<?php

namespace App\Providers;

use App\Sale\Services\SaleModelService;
use App\Sale\Services\SaleTableService;
use App\Sale\Strategies\CategorySaleStrategy;
use App\Sale\Strategies\ImageSaleStrategy;
use App\Sale\Strategies\interfaces\CategorySaleStrategyInterface;
use App\Sale\Strategies\interfaces\ImageSaleStrategyInterface;
use App\Sale\Strategies\interfaces\ProductCategoryCheckStrategyInterface;
use App\Sale\Strategies\ProductCategoryCheckStrategy;
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

        $this->app->bind(ImageSaleStrategyInterface::class, ImageSaleStrategy::class);
        $this->app->bind(CategorySaleStrategyInterface::class, CategorySaleStrategy::class);
        $this->app->bind(ProductCategoryCheckStrategyInterface::class, ProductCategoryCheckStrategy::class);

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
