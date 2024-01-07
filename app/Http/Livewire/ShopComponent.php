<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use App\Models\admin\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize =12;
    public $orderBy = "Default Sorting";

    public $min_value = 10;
    public $max_value = 1000;
    public $categoryInputs = [];


    public function store($product_id, $product_name, $product_price){

        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size){

        $this->pageSize = $size;
    }

    public function changeOrder($order){

        $this->orderBy = $order;
    }

    public function addToWishlist($product_id, $product_name, $product_price){

        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id){

        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                return;
            }
        }

    }

    public function render()
    {
        $products = Product::query();

        if (!empty($this->categoryInputs)) {
            dd($this->categoryInputs);
            $products->whereIn('category_id', $this->categoryInputs);
        } else {
            $products->whereBetween('regular_price', [$this->min_value, $this->max_value]);

            if ($this->orderBy == 'Price: Low to High') {
                $products->orderBy('regular_price', 'ASC');
            } elseif ($this->orderBy == 'Price: High to Low') {
                $products->orderBy('regular_price', 'DESC');
            } elseif ($this->orderBy == 'Sort By Newest') {
                $products->orderBy('created_at', 'DESC');
            }

            $products = $products->paginate($this->pageSize);
        }

        $categories = Category::orderByTranslation('name', 'ASC')->get();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories]);
    }
}
