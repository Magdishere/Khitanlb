<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductAttributes extends Component
{
    public $product;
    public $selectedColor = null;
    public $selectedSize = null;
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
        $colorPrice = $this->selectedColor ? $this->selectedColor : 0;
        $sizePrice = $this->selectedSize ? $this->selectedSize : 0;

        $totalPrice = $basePrice + $colorPrice + $sizePrice;
        $this->calculatedPrice = $totalPrice;
    }

    public function render()
    {
        return view('livewire.product-attributes');
    }
}
