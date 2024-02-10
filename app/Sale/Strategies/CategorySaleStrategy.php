<?php

namespace App\Sale\Strategies;

use App\Models\Sale;
use App\Sale\Strategies\interfaces\CategorySaleStrategyInterface;

class CategorySaleStrategy implements CategorySaleStrategyInterface
{
    public function checkExistingCategorySale($request)
    {
        // Check if there is another sale in the same category
        $existingCategorySale = Sale::where('target_type', 'category')
            ->activeSales()
            ->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->input('category_id'));
            })
            ->first();

        if ($existingCategorySale) {
            // There is another sale in the same category, prevent creation
            throw new \Exception('There is already an active sale in the same category.');
        }
    }

}
