<?php

namespace App\Http\Livewire;

use App\Models\admin\Product;
use App\Models\admin\Category;
use App\Services\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $min_value = 10;
    public $max_value = 1000;
    public $min_price;
    public $max_price;
    public $categoryInputs = [];

    public $pageSize = 12;

    public $orderBy = 'featured';
    protected $listeners = ['sortBy'];



    public function setPriceRange($min, $max)
    {
        $this->min_price = $min;
        $this->max_price = $max;
    }

    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\admin\Product');
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('shop');
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrder($order)
    {
        $this->orderBy = $order;
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


    public function render()
    {
        $productsQuery = Product::query();

        if (!empty($this->categoryInputs)) {
            $productsQuery->whereIn('category_id', $this->categoryInputs);
        }

        if (!empty($this->orderBy)) {
            ProductRepository::sortBy($productsQuery, $this->orderBy);
        }

        if (!empty($this->min_price) && !empty($this->max_price)) {
            $productsQuery->whereBetween('regular_price', [$this->min_price, $this->max_price]);
        }

        // Paginate the results
        $products = $productsQuery->paginate($this->pageSize);
        $categories = Category::where('parent_id', null)->orderByTranslation('name', 'ASC')->get();

        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    public function sortBy($field)
    {
        $this->orderBy = $field;
    }
}
