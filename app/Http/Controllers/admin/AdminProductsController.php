<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $products = Product::all();
        return view('Back.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('Back.Products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $filePath = "";
            if ($request->has('product_image')) {
                $filePath = uploadImage('products', $request->product_image);
            }


            $data = [
                'slug' => $request->input('slug'),
                'regular_price' => $request->input('regular_price'),
                'SKU' => $request->input('SKU'),
                'stock_status' => $request->input('stock_status'),
                'quantity' => $request->input('quantity'),
                'category_id' => $request->input('category_id'),
                'featured' => $request->input('featured', false),
                'image' => $filePath,


                'en' => [
                    'name' => $request->input('name_en'),
                    'short_description' => $request->input('short_description_en'),
                    'description' => $request->input('description_en'),
                ],
                'ar' => [
                    'name' => $request->input('name_ar'),
                    'short_description' => $request->input('short_description_ar'),
                    'description' => $request->input('description_ar'),
                ],
            ];

//            if (empty($data['en']['name']) || empty($data['ar']['name'])) {
//                throw new \Exception('Both English and Arabic names are required.');
//            }

            $Product = Product::create($data);

            if($request->hasFile('product_images')){
                foreach($request->file('product_images') as $image){
                    $filesPath = uploadImage('products', $image);
                    $Product->images()->create([
                        'image_path' => $filesPath,
                    ]);
                }
            }


            return redirect()->route('admin-products.index')->with(['success' => 'تم ألاضافة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin-products.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products)
    {
        //
    }
}
