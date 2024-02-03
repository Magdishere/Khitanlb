<?php

namespace App\Sale\Strategies;

use App\Models\admin\Product;
use App\Sale\Strategies\interfaces\ProductCategoryCheckStrategyInterface;

class ProductCategoryCheckStrategy implements ProductCategoryCheckStrategyInterface
{
    public function checkProductsInSameCategory($request)
    {
        /// Check if there are any products in the same category as the new sale
        $productsInSameCategory = Product::where('category_id', $request->input('category_id'))
            ->whereHas('sales', function ($query) use ($request) {
                $query->activeSales();
            })
            ->exists();

        // If there are products in the same category, prevent creation
        if ($productsInSameCategory) {
            throw new \Exception('Cannot create a new sale as there are products in the same category.');
        }

    }
}
