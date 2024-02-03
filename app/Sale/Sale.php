<?php

namespace App\Sale;

use App\Models\admin\Product;
use App\Sale\Strategies\DefaultSaleStrategy;
use App\Sale\Strategies\SaleCalculator;

class Sale
{
    /**
     * Calculate the discounted price for a given product ID.
     *
     * @param  int  $productId
     * @return float|string  Calculated discounted price or '-' if no valid information is found
     */
    public static function calculateDiscountedPrice($productId)
    {
        // Retrieve the product information based on the provided ID
        $product = Product::where('id', $productId)->first();

        if ($product) {
            // Check if there is a direct sale on the product
            $productSale = $product->sales
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->where('is_active', 1)
                ->first();

            // Initialize variables to store discount type and value
            $discountType = $productSale ? $productSale->type : null;
            $discountValue = $productSale ? $productSale->value : null;

            // If there is no direct sale on the product, check if its category has a sale
            if (!$productSale) {
                $categorySale = $product->category->sales
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now())
                    ->where('is_active', 1)
                    ->first();

                // Update discount type and value based on category sale
                $discountType = $categorySale ? $categorySale->type : null;
                $discountValue = $categorySale ? $categorySale->value : null;
            }

            // If a valid discount type is found, calculate the discounted price
            if ($discountType !== null) {
                $regularPrice = $product->regular_price;
                $strategy = self::getSaleStrategy($discountType);

                // Create a SaleCalculator instance with the chosen strategy
                $calculator = new SaleCalculator($strategy);

                // Calculate and format the discounted price
                return number_format($calculator->calculateDiscountedPrice($regularPrice, $discountValue), 2);
            }
        }

        // If there is no valid product or sale information, return a default value
        return '-';
    }

    /**
     * Get the sale strategy based on the provided discount type.
     *
     * @param  string  $discountType
     * @return \App\Sale\Strategies\SaleStrategyInterface  Sale strategy instance
     */
    protected static function getSaleStrategy($discountType)
    {
        // Construct the fully qualified class name for the strategy
        $strategyClass = 'App\\Sale\\Strategies\\' . ucfirst($discountType) . 'SaleStrategy';

        // Check if the strategy class exists, if not, use the DefaultSaleStrategy
        return class_exists($strategyClass) ? new $strategyClass() : new DefaultSaleStrategy();
    }
}
