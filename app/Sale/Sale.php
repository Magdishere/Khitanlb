<?php

namespace App\Sale;
use App\Models\admin\Product;
use App\Sale\Strategies\BogoSaleStrategy;
use App\Sale\Strategies\DefaultSaleStrategy;
use App\Sale\Strategies\FixedSaleStrategy;
use App\Sale\Strategies\PercentSaleStrategy;
use App\Sale\Strategies\SaleCalculator;
use Illuminate\Support\Carbon;

class Sale
{
    public static function calculateDiscountedPrice($productId) {
        $product = Product::where('id', $productId)->first();

        if ($product) {
            $regularPrice = $product->regular_price;
            $sales = $product->sales;

            $currentDateTime = Carbon::now();

            if ($sales->isNotEmpty()) {
                $sale = $sales->where('start_date', '<=', $currentDateTime)
                    ->where('end_date', '>=', $currentDateTime)
                    ->first();

                if ($sale && $sale->value !== null) {
                    $discountValue = $sale->value;

                    // Choose the strategy based on the type of sale
                    if ($sale->type === 'fixed') {
                        $strategy = new FixedSaleStrategy();
                    } elseif ($sale->type === 'percent') {
                        $strategy = new PercentSaleStrategy();
                    } elseif ($sale->type === 'bogo') {
                        $strategy = new BogoSaleStrategy();
                    } else {
                        // Handle unsupported sale type or use a default strategy
                        $strategy = new DefaultSaleStrategy();
                    }

                    $calculator = new SaleCalculator($strategy);

                    return number_format($calculator->calculateDiscountedPrice($regularPrice, $discountValue), 2);
                }
            }
        }

        // If there is no valid product or sale information, return a default value or handle it as needed
        return '-';
    }
}
