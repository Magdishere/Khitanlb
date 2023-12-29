<?php
namespace App\Sale\Strategies;

use App\Models\Flash;

class FlashSaleStrategy implements SaleStrategy
{
    public function applyDiscount($price)
    {
        // Implement BOGO discount logic
    }

    public function getProductsInSale($saleId)
    {
        $sale = Flash::find($saleId);

        if ($sale) {
            $products = $sale->products;
            return $products;
        }

        return null; // Handle when the sale is not found
    }
}
