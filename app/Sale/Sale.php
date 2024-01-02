<?php

namespace App\Sale;
use App\Sale\Strategies\BogoSaleStrategy;
use App\Sale\Strategies\FixedSaleStrategy;
use App\Sale\Strategies\PercentSaleStrategy;
use App\Sale\Strategies\SaleStrategy;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class Sale
{
    public static function calculateDiscountedPrice($product) {
        $regularPrice = $product->regular_price;
        $discountValue = $product->sales->first()->value;

        if ($product->sales->first()->type === 'fixed') {
            $strategy = new FixedSaleStrategy();
        } elseif ($product->sales->first()->type === 'percent') {
            $strategy = new PercentSaleStrategy();
        } elseif ($product->sales->first()->type === 'bogo') {
            $strategy = new BogoSaleStrategy();
        } else {
            // Handle unsupported sale type or use a default strategy
            $strategy = new DefaultSaleStrategy();
        }

        $calculator = new SaleCalculator($strategy);

        return number_format($calculator->calculateDiscountedPrice($regularPrice, $discountValue), 2);
    }

}
