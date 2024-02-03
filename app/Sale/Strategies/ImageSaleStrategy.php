<?php

namespace App\Sale\Strategies;

use App\Sale\Strategies\interfaces\ImageSaleStrategyInterface;
use Illuminate\Validation\Rule;

class ImageSaleStrategy implements ImageSaleStrategyInterface
{
    public function applyImageSale($request, $activeSales)
    {
        /*
                 * Check a position of image  if the sale banner_type is image
                 */

        // Check if all active sales have positions 1, 2, 3, or 4
        $validPositions = [1, 2, 3, 4];
        $activePositions = $activeSales->pluck('position')->toArray();

        if (empty(array_diff($validPositions, $activePositions))) {
            // If all positions 1, 2, 3, 4 are taken, create a new sale with position 0
            $request->merge(['position' => 0]);
        }

        // Validate the request to ensure the position is unique
        $request->validate([
            'position' => [
                'required',
                'integer',
                Rule::notIn($activePositions),
            ],
        ]);
    }
}
