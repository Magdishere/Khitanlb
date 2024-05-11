<?php

namespace App\Services;

use App\Models\admin\Attribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\admin\Product;

class CartService implements CartServiceInterface
{
    public function addToCart($product_id, $product_name, $product_price, $selectedColor, $selectedSize)
    {
        // Ensure selected color and size are not null
        $selectedColor = $selectedColor ?? null;
        $selectedSize = $selectedSize ?? null;

        // If selectedColor or selectedSize is null, set default options
        if ($selectedColor === null || $selectedSize === null) {
            $selectedAttributes = [
                'color' => $selectedColor,
                'size' => $selectedSize,
            ];

            // Call setDefaultOptions with the selected attributes
            $selectedOptions = $this->setDefaultOptions($product_id, $selectedAttributes);
            foreach ($selectedOptions as $attribute => $value) {
                ${'selected' . ucfirst($attribute)} = $value;
            }
        }

        // Check if the product with the same ID and attributes already exists in the cart
        $existingItem = $this->findCartItem($product_id, $selectedOptions);

        // If the item already exists, update its quantity; otherwise, add a new item to the cart
        if ($existingItem->isNotEmpty()) {
            $this->updateCartItemQuantity($existingItem->first()->rowId);
        } else {
            $this-> addNewCartItem($product_id, $product_name, $product_price, $selectedOptions);
        }

    }

    private function setDefaultOptions($product_id, $selectedAttributes)
    {
        // Retrieve default options for the product
        $defaultOptions = Product::find($product_id);
        $attributes = Attribute::all();
        $selectedOptions = [];

        foreach ($attributes as $attribute) {
            $defaultOptionsAttribute = $defaultOptions->getDefaultOptions($attribute->name);
            $selectedOptions[strtolower($attribute->name)] = $selectedOptions[strtolower($attribute->name)] ?? $defaultOptionsAttribute[$attribute->name] ?? null;
        }

        // Update selected color and size if they are null
        foreach ($attributes as $attribute) {
            $defaultOptionsAttribute = $defaultOptions->getDefaultOptions($attribute->name);
            $selectedOptions[strtolower($attribute->name)] = $selectedAttributes[strtolower($attribute->name)] ?? $defaultOptionsAttribute[$attribute->name] ?? null;
        }

        return $selectedOptions;
    }

    private function findCartItem($product_id, $selectedOptions)
    {
        // Search for the item in the cart
        return Cart::instance('cart')->search(function ($cartItem, $rowId) use ($product_id, $selectedOptions) {
            $found = true;
            foreach ($selectedOptions as $attribute => $value) {
                // Check if the option matches the cart item's option
                if ($cartItem->options->{$attribute} != $value) {
                    $found = false;
                    break;
                }
            }
            // Return true only if all options match
            return $cartItem->id == $product_id && $found;
        });
    }


    private function updateCartItemQuantity($rowId)
    {
        // Update quantity of the existing item in the cart
        Cart::instance('cart')->update($rowId, 1);
    }

    private function addNewCartItem($product_id, $product_name, $product_price, $selectedOptions)
    {
        // Add a new item to the cart
        $defaultOptions = Product::find($product_id);
        $defaultOptionsSizePrice = $defaultOptions->getDefaultSizePrice($product_id);
        $totalPrice = $product_price + $defaultOptionsSizePrice;

        // Ensure selectedOptions is an array
        $options = is_array($selectedOptions) ? $selectedOptions : [];

        Cart::instance('cart')->add($product_id, $product_name, 1, $totalPrice, $options)->associate('\App\Models\admin\Product');
    }

}
