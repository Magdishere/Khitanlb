<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductAttributes extends Component
{
    public $product;
    public $selectedColors = [];
    public $selectedSize = [];
    public $calculatedPrice;

    public function mount($product)
    {
        $this->product = $product;
        $this->calculatePrice();

        $this->emit('colorSelected', $this->selectedColors);
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        // Get the selected color and size from the corresponding arrays
        $selectedColor = $this->selectedColors[$product_id] ?? null;
        $selectedSize = $this->selectedSize[$product_id] ?? null;

        // Initialize $totalPrice
        $totalPrice = 0;

        // If selectedColor or selectedSize is null, get the default options of the product
        if ($selectedColor === null || $selectedSize === null) {
            $defaultOptions = Product::find($product_id);
            $defaultOptionsColor = $defaultOptions->getDefaultOptionsColor($product_id);
            $defaultOptionsSize = $defaultOptions->getDefaultOptionsSize($product_id);
            $defaultOptionsSizePrice = $defaultOptions->getDefaultSizePrice($product_id) ?? 0;
            $selectedColor = $selectedColor ?? $defaultOptionsColor['color'] ?? null;
            $selectedSize = $selectedSize ?? $defaultOptionsSize['size'] ?? null;
            $totalPrice = $product_price;
        }

        // Check if the product with the same ID and attributes already exists in the cart
        $existingItem = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($product_id, $selectedColor, $selectedSize) {
            return $cartItem->id == $product_id && $cartItem->options->color == $selectedColor && $cartItem->options->size == $selectedSize;
        });

        // Update quantity if the same product with attributes already exists
        if ($existingItem->isNotEmpty()) {
            Cart::instance('cart')->update($existingItem->first()->rowId, 1);
        } else {
            // Add as a new item if not already in the cart
            Cart::instance('cart')->add($product_id, $product_name, 1, $totalPrice, ['color' => $selectedColor, 'size' => $selectedSize])->associate('\App\Models\admin\Product');
        }

        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop');
    }


    public function updatedSelectedColor()
    {
        $this->calculatePrice();
    }

    public function updatedSelectedSize()
    {
        $this->calculatePrice();
    }

    private function calculatePrice()
    {
        $basePrice = $this->product->regular_price;
        $colorPrice = $this->selectedColors ? $this->selectedColors : 0;
        if (!empty($this->selectedSize)) {
            $sizePrice = \App\Models\admin\AttributeOption::query()
                ->join('attribute_option_translations', 'attribute_options.id', '=', 'attribute_option_translations.attribute_option_id')
                ->where('attribute_option_translations.locale', 'en')
                ->where('attribute_option_translations.value', current($this->selectedSize))
                ->value('attribute_options.id');
        } else {
            $defaultOptions = Product::find($this->product->id);
            $sizePrice = $defaultOptions->getDefaultSizePrice($this->product->id) ?? 0;
        }


        $totalPrice = $basePrice + $sizePrice;
        $this->calculatedPrice = $totalPrice;
    }

    public function render()
    {
        return view('livewire.product-attributes');
    }
}
