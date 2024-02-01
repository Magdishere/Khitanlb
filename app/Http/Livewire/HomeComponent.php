<?php

namespace App\Http\Livewire;

use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\Slides;
use App\Models\HomeSlider;

use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class HomeComponent extends Component
{
    public $selectedColors;

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\admin\Product");
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        // Get the selected color and size from the corresponding arrays
        $selectedColor = $this->selectedColors[$product_id] ?? null;
        $selectedSize = $this->selectedSizes[$product_id] ?? null;

        // If selectedColor or selectedSize is null, get the default options of the product
        if ($selectedColor === null || $selectedSize === null) {
            $defaultOptions = Product::find($product_id);
            $defaultOptionsColor = $defaultOptions->getDefaultOptionsColor($product_id);
            $defaultOptionsSize = $defaultOptions->getDefaultOptionsSize($product_id);
            $defaultOptionsSizePrice = $defaultOptions->getDefaultSizePrice($product_id);
            $selectedColor = $selectedColor ?? $defaultOptionsColor['color'] ?? null;
            $selectedSize = $selectedSize ?? $defaultOptionsSize['size'] ?? null;
        }

        // Check if the product with the same ID and attributes already exists in the cart
        $existingItem = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($product_id, $selectedColor, $selectedSize) {
            return $cartItem->id == $product_id && $cartItem->options->color == $selectedColor && $cartItem->options->size == $selectedSize;
        });

        // Update quantity if the same product with attributes already exists
        $existingItem->isNotEmpty() ? Cart::instance('cart')->update($existingItem->first()->rowId, 1) :
            // Add as a new item if not already in the cart
            $totalPrice = $product_price + $defaultOptionsSizePrice;
            Cart::instance('cart')->add($product_id, $product_name, 1, $totalPrice, ['color' => $selectedColor, 'size' => $selectedSize])->associate('\App\Models\admin\Product');

        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop');
    }
    public function mount()
    {
        // Initialize selectedColors for each product
        $products = Product::all();
        foreach ($products as $product) {
            $this->selectedColors[$product->id] = null;
        }
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

    public function store($product_id, $product_name, $product_price){

        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {

        $slides = Slides::get();
        $sproducts = Product::with('sales')->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $fproducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $categories = Category::get();
        // $pcategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);
        $flashSale = Sale::with('products')->where('is_active', 1)->where('is_flash_sale', 1)->first();
        return view('livewire.home-component', [
            'flashSale' => $flashSale,
            'slides' => $slides,
            'categories' => $categories,
            'lproducts' => $lproducts,
            'fproducts' => $fproducts,
            // 'pcategories' => $pcategories,
            'sproducts' => $sproducts
        ]);
    }
}
