<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Product;

class AdminSalesController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('Back.Sales.index', compact('products'));
    }

    public function create()
    {
        $products = Product::get();
        return view('Back.Sales.add', compact('products'));
    }
}
