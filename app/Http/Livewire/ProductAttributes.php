<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use Livewire\Component;

class ProductAttributes extends Component
{
    public $product;
    public $selectedColors = [];
    public $selectedSize = null;
    public $calculatedPrice;

    public function mount($product)
    {
        $this->product = $product;
        $this->calculatePrice();

        $products = Product::where('id', $product->id)->get();
        foreach ($products as $product) {
            $this->selectedColors[$product->id] = null;
        }
    }

    public function updatedSelectedColor()
    {
        $this->calculatePrice();
        $this->emit('colorSelected', $this->selectedColors);
    }

    public function updatedSelectedSize()
    {
        $this->calculatePrice();
    }

    private function calculatePrice()
    {
        $basePrice = $this->product->regular_price;
        $colorPrice = $this->selectedColors ? $this->selectedColors : 0;
        $sizePrice = $this->selectedSize ? $this->selectedSize : 0;

        $totalPrice = $basePrice + $sizePrice;
        $this->calculatedPrice = $totalPrice;
    }

    public function render()
    {
        return view('livewire.product-attributes');
    }
}
