<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.Categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('Back.Categories.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
{
    try {
        $filePath = "";
        if ($request->has('category_image')) {
            $filePath = uploadImage('categories', $request->file('category_image'));
        }

        $categoryData = [
            'slug' => $request->input('slug'),
            'image_path' => $filePath,
            'parent_id' => $request->type == 1 ? null : $request->parent_id,
        ];


        foreach (config('translatable.locales') as $locale) {
            $categoryData[$locale] = [
                'name' => $request->input('name.' . $locale),
            ];
        }

        dd($categoryData);

        $category = Category::create($categoryData);

        return redirect()->route('Admin-Categories.index')->with(['success' => 'تم ألاضافة بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('Admin-Categories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
