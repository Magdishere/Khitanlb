<?php

namespace App\Http\Livewire\HomePage;

use Livewire\Component;
use App\Models\Sale;

class FlashSaleComponent extends Component
{
    public function render()
    {

        $flashSale = Sale::with('products')
            ->with('categories')
            ->activeFlashSales()
            ->first();

        return view('livewire.home-page.flash-sale-component', ['flashSale' => $flashSale]);
    }
}
