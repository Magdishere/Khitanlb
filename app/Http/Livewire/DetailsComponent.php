<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Livewire;

class DetailsComponent extends Component
{
    public $selectedColors = [];
    public $selectedSizes = [];
    public $slug;
    public $calculatedPrice;
    public $wishlistContent = [];
    public $receivedColors = [];


    protected $listeners = ['refreshComponent' => '$refresh', 'colorSelected' => 'onColorSelected'];

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function onColorSelected($selectedColors)
    {
        $this->receivedColors = $selectedColors;
    }
    public function store($product_id, $product_name, $product_price){

        Cart::add($product_id, $product_name,1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop.cart');
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        dd($this->receivedColors);
        // Get the selected color and size from the corresponding arrays
        $selectedColor = $this->selectedColors[$this->slug] ?? null;
        $selectedSize = $this->selectedSizes[$this->slug] ?? null;

        // Initialize $totalPrice
        $totalPrice = 0;

        // If selectedColor or selectedSize is null, get the default options of the product
        if ($selectedColor === null || $selectedSize === null) {
            $defaultOptions = Product::find($product_id);
            $defaultOptionsColor = $defaultOptions->getDefaultOptionsColor($product_id);
            $defaultOptionsSize = $defaultOptions->getDefaultOptionsSize($product_id);
            $defaultOptionsSizePrice = $defaultOptions->getDefaultSizePrice($product_id);
            $selectedColor = $selectedColor ?? $defaultOptionsColor['color'] ?? null;
            $selectedSize = $selectedSize ?? $defaultOptionsSize['size'] ?? null;
            $totalPrice = $product_price + $defaultOptionsSizePrice;
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
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::Latest()->take(4)->get();
        return view('livewire.details-component', ['product' => $product ,'rproducts' => $rproducts , 'nproducts' => $nproducts]);
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\admin\Product");
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item) {
            if ($item->id == $product_id) {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');

            }
        }
    }

}
