<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSalesController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $sales = Sale::get();
        return view('Back.Sales.index', compact('products', 'sales'));
    }

    public function create()
    {
        $products = Product::doesntHave('sales')->get();
        $categories = Category::get();
        return view('Back.Sales.add', compact('products', 'categories'));
    }
    public function store(Request $request)
    {
        try {
            // Check if a new image is being uploaded
            if ($request->hasFile('sales')) {
                // Delete the old image if it exists
                if ($request->banner) {
                    Storage::disk('sales')->delete($request->banner);
                }

                // Upload the new banner
                $request->banner = uploadImage('sales', $request->banner);
            }

            $sale = Sale::create([
                'name' => $request->name,
                'type' => $request->type,
                'value' => $request->value,
                'position' => $request->position,
                'target_type' => ($request->sale_type == 1) ? 'category' : (($request->sale_type == 2) ? 'product' : null),
                'start_date' => date('Y-m-d H:i:s', strtotime($request->starts_date)),
                'end_date' =>  date('Y-m-d H:i:s', strtotime($request->ends_date)),
            ]);

            if ($request->sale_type == 1) {
                // Sale for category
                $sale->categories()->attach($request->input('category_id'));
            } elseif ($request->sale_type == 2) {
                // Sale for product
                $sale->products()->attach($request->input('product_id'));
            }


            return redirect()->route('admin.sales')->with('success', 'Sales has been applied');
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('admin.sales')->with(['error' => 'حدث خطأ برجاء المحاولة لاحقا']);
        }
    }

}
