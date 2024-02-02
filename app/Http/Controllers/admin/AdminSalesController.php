<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class AdminSalesController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $sales = Sale::with('products')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('is_active', 1)
            ->get();
        return view('Back.Sales.index', compact('products', 'sales'));
    }

    public function create()
    {
        // 1. Get category ids of category sales
        $categorySaleIds = Sale::where('target_type', 'category')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->with('categories:id')
            ->get()
            ->pluck('categories.*.id')
            ->flatten()
            ->toArray();

        // 2. Get products where category_id is in the obtained ids
        $categoryProducts = Product::whereIn('category_id', $categorySaleIds)->get();

        // 3. Get products that are not associated with any sale and not in the categoryProducts
        $productsWithoutSale = Product::doesntHave('sales')
            ->whereNotIn('id', $categoryProducts->pluck('id'))
            ->get();

        // Remove duplicate products based on their IDs
        $uniqueProducts = $productsWithoutSale->unique('id')->values();

        // Get all categories
        $categories = Category::get();

        return view('Back.Sales.add', compact('uniqueProducts', 'categories'));
    }


    public function store(Request $request)
    {
        try {

            $filePath = null;
            if ($request->has('banner')) {
                $filePath = uploadImage('sales', $request->banner);
            }

            DB::beginTransaction();

            // Deactivate other flash sales
            if ($request->is_flash_sale) {
                Sale::where('is_flash_sale', true)->update([
                    'is_active' => false,
                ]);
            } else {
                // Check if there are active sales for the current time
                $activeSales = Sale::where('start_date', '<=', now())
                    ->where('end_date', '>=', now())
                    ->where('is_active', true)
                    ->get();

                // Check if all active sales have positions 1, 2, 3, or 4
                $validPositions = [1, 2, 3, 4];
                $activePositions = $activeSales->pluck('position')->toArray();

                if (empty(array_diff($validPositions, $activePositions))) {
                    // If all positions 1, 2, 3, 4 are taken, create a new sale with position 0
                    $request->merge(['position' => 0]);
                }

                // Validate the request to ensure the position is unique
                $request->validate([
                    'position' => [
                        'required',
                        'integer',
                        Rule::notIn($activePositions),
                    ],
                ]);
            }

            $saleData = [
                'name' => $request->name,
                'type' => $request->type,
                'value' => $request->value,
                'position' => $request->is_flash_sale || $request->banner_type == 'countdown' ? 0 : $request->position,
                'banner' => $request->is_flash_sale ? null : $filePath,
                'banner_type' => $request->is_flash_sale ? 'none' : $request->banner_type,
                'target_type' => ($request->sale_type == 1) ? 'category' : (($request->sale_type == 2) ? 'product' : null),
                'start_date' => date('Y-m-d H:i:s', strtotime($request->starts_date)),
                'end_date' => date('Y-m-d H:i:s', strtotime($request->ends_date)),
                'is_active' => $request->has('is_active') ? true : false,
                'is_flash_sale' => $request->has('is_flash_sale') ? true : false,
            ];

            $sale = Sale::create($saleData);

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

            DB::commit();

            return redirect()->route('admin.sales')->with('success', 'Sales has been applied');
        } catch (\Exception $exception) {
            return $exception;
            DB::rollBack();
            return redirect()->route('admin.sales')->with(['error' => 'حدث خطأ برجاء المحاولة لاحقا']);
        }
    }
}
