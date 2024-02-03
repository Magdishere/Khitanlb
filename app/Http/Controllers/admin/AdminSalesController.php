<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\Sale;
use App\Sale\Commands\CreateSaleCommand;
use App\Sale\Strategies\interfaces\CategorySaleStrategyInterface;
use App\Sale\Strategies\interfaces\ImageSaleStrategyInterface;
use App\Sale\Strategies\interfaces\ProductCategoryCheckStrategyInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminSalesController extends Controller
{
    protected $commandInvoker;

    public function __construct(CreateSaleCommand $createSale)
    {
        $this->createSale = $createSale;
    }

    public function index()
    {
        $products = Product::get();
        $sales = Sale::with('products')
            ->activeSales()
            ->get();
        return view('Back.Sales.index', compact('products', 'sales'));
    }

    public function create()
    {
        // 1. Get category ids of category sales
        $categorySaleIds = Sale::where('target_type', 'category')
            ->activeSales()
            ->with('categories:id')
            ->get()
            ->pluck('categories.*.id')
            ->flatten()
            ->toArray();

        // 2. Get products where category_id is in the obtained ids
        $categoryProducts = Product::whereIn('category_id', $categorySaleIds)->get();

        // 3. Get products that are not associated with any sale and not in the categoryProducts
        $productsWithoutSale = Product::whereDoesntHave('sales', function ($query) {
            $query->where('is_active', 1);
        })
            ->whereNotIn('id', $categoryProducts->pluck('id'))
            ->get();



        // Remove duplicate products based on their IDs
        $uniqueProducts = $productsWithoutSale->unique('id')->values();

        // Get all categories
        $categories = Category::get();

        return view('Back.Sales.add', compact('uniqueProducts', 'categories'));
    }


    public function store(
        Request $request,
        ImageSaleStrategyInterface $imageSaleStrategy,
        CategorySaleStrategyInterface $categorySaleStrategy,
        ProductCategoryCheckStrategyInterface $productCategoryCheckStrategy
    )
    {
        try {

            DB::beginTransaction();

            //Upload the image if existed
            $filePath = $this->handleImageUpload($request);

            //If you create a new flash sale deactivate the old ones
            $this->deactivateFlashSales($request);

            //If the sale type is image then validate and adjusts image sale banner positions.
            $this->applyImageSaleStrategy($request, $imageSaleStrategy);

            //If the sale type is category
            //validate that category not in running sale
            $categorySaleStrategy->checkExistingCategorySale($request);

            //If the sale type is product
            //validate that product's category not in running sale
            $productCategoryCheckStrategy->checkProductsInSameCategory($request);

            //store the sale in db
            $saleData = $this->prepareSaleData($request, $filePath);

            $sale = Sale::create($saleData);

            $this->attachSaleRelationships($sale, $request);

            DB::commit();

            return redirect()->route('admin-sales.index')->with('success', 'Sales has been applied');
        } catch (\Exception $exception) {
            return $exception;
            DB::rollBack();
            return redirect()->route('admin-sales.index')->with(['error' => 'حدث خطأ برجاء المحاولة لاحقا']);
        }
    }

    private function handleImageUpload(Request $request)
    {
        if ($request->has('banner')) {
            return uploadImage('sales', $request->banner);
        }

        return null;
    }

    private function deactivateFlashSales(Request $request)
    {
        if ($request->is_flash_sale) {
            Sale::where('is_flash_sale', true)->update([
                'is_active' => false,
            ]);
        }
    }

    private function applyImageSaleStrategy(Request $request, ImageSaleStrategyInterface $imageSaleStrategy)
    {
        if ($request->banner_type === 'image') {
            $activeSales = Sale::activeSales()->get();
            $imageSaleStrategy->applyImageSale($request, $activeSales);
        }
    }

    private function prepareSaleData(Request $request, $filePath)
    {
         $saleData = [
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'position' => $this->calculatePosition($request),
            'banner' => $this->calculateBanner($request, $filePath),
            'banner_type' => $this->calculateBannerType($request),
            'target_type' => $this->calculateTargetType($request),
            'start_date' => $this->parseDate($request->starts_date),
            'end_date' => $this->parseDate($request->ends_date),
            'is_active' => $request->has('is_active'),
            'is_flash_sale' => $request->has('is_flash_sale'),
        ];

        return $saleData;
    }

    private function attachSaleRelationships($sale, $request)
    {
        if ($request->sale_type == 1) {
            // Sale for category
            $sale->categories()->attach($request->input('category_id'));
        } elseif ($request->sale_type == 2) {
            // Remove null values from the product_id array
            $productIds = array_filter($request->input('product_id'));

            // Sale for product only if there are valid product_ids
            if (!empty($productIds)) {
                $sale->products()->attach($productIds);
            }
        }

    }

    private function calculatePosition(Request $request)
    {
        // Your logic to calculate position based on conditions
        return $request->is_flash_sale || $request->banner_type == 'countdown' ? 0 : $request->position;
    }

    private function calculateBanner(Request $request, $filePath)
    {
        return $request->is_flash_sale ? null : $filePath;
    }

    private function calculateBannerType(Request $request)
    {
        return $request->is_flash_sale ? 'none' : $request->banner_type;
    }

    private function calculateTargetType(Request $request)
    {
        return ($request->sale_type == 1) ? 'category' : (($request->sale_type == 2) ? 'product' : null);
    }

    private function parseDate($dateString)
    {
        return date('Y-m-d H:i:s', strtotime($dateString));
    }

}
