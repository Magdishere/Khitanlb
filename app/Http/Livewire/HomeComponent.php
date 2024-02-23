<?php

namespace App\Http\Livewire;

use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\admin\Slides;
use App\Models\HomeSlider;

use App\Models\Sale;
use App\Services\TimeService;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeComponent extends BaseComponent
{
    public $days;
    public $hours;
    public $minutes;
    public $seconds;
    public $email;

    public function mount()
    {
        // Initialize selectedColors for each product
        $products = Product::all();
        foreach ($products as $product) {
            $this->selectedColors[$product->id] = null;
        }

    }


    public function updateTimeValues($diff)
    {
        $timeValues = TimeService::updateTimeValues($diff);
        extract($timeValues);

        $this->days = $days;
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

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

        $ends_at = null;

        if (isset($countdownSale ->end_date)) {
            $ends_at = Carbon::parse($countdownSale->end_date);
        }

        $now = Carbon::now();
        $diff = $ends_at !== null ? $ends_at->diffInSeconds($now) : null;

        $this->updateTimeValues($diff);

        $end_date = $ends_at;

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
            'end_date' => $end_date,
            'mostOrderedProducts' => $mostOrderedProducts
        ]);
    }
}
