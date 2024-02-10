<?php

namespace App\Http\Livewire;

use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\Slides;
use App\Models\HomeSlider;

use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeComponent extends BaseComponent
{
    public function render()
    {
        $slides = Slides::get();
        $sproducts = Product::with('sales')->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $fproducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $categories = Category::get();
        // $pcategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);
        $flashSale = Sale::with('products')
            ->with('categories')
            ->activeFlashSales()
            ->first();

        $bannerSale = Sale::with('products')
            ->activeSales()
            ->where('is_flash_sale', 0)
            ->where('banner_type', 'image')
            ->where('position', '!=', 0)
            ->orderBy('position')
            ->get();

        $countdownSale = Sale::with('products')
            ->activeSales()
            ->where('banner_type', 'countdown')
            ->first();

        $topProductIds = DB::table('order_items')
            ->select('product_id', DB::raw('COUNT(*) as total_orders'))
            ->groupBy('product_id')
            ->orderByRaw('COUNT(*) DESC')
            ->take(6)
            ->pluck('product_id');

        // Then, retrieve the corresponding products using the retrieved product IDs
        $mostOrderedProducts = Product::whereIn('id', $topProductIds)->get();



        return view('livewire.home-component', [
            'bannerSale' => $bannerSale,
            'countdownSale' => $countdownSale,
            'flashSale' => $flashSale,
            'slides' => $slides,
            'categories' => $categories,
            'lproducts' => $lproducts,
            'fproducts' => $fproducts,
            // 'pcategories' => $pcategories,
            'sproducts' => $sproducts,
            'mostOrderedProducts' => $mostOrderedProducts
        ]);
    }
}
