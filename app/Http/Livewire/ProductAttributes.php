<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductAttributes extends BaseComponent
{
    public $product;
    public $selectedColors = [];
    public $selectedSize = [];
    public $calculatedPrice;

    public function mount($product)
    {
        $this->product = $product;
        $this->calculatePrice();
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
