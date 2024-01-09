<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class AdminAttributeController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        return view('Back.Attributes.add', compact('categories'));
    }
}
