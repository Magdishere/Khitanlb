<?php

namespace App\Http\Livewire;

use App\Models\admin\AttributeOption;
use App\Models\admin\Product;
use App\Models\admin\Category;
use App\Services\CartService;
use App\Services\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends BaseComponent
{
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
        $attributeOptions = AttributeOption::with('attribute')->get();
        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => $categories,
            'attributeOptions' => $attributeOptions,
        ]);
    }
    public function sortBy($field)
    {
        $this->orderBy = $field;
    }
}
