<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CategoryRequest;
use App\Http\Controllers\Controller;
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

            //validation

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $filePath = "";
            if ($request->has('images')) {
                $filePath = uploadImage('maincategories', $request->image);
            }

            if ($request -> type == 1)
            {

                $category = Category::create([
                    'images' => $filePath,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' =>$request->request->add(['parent_id' => null]),
                ]);
            } else {
                $category = Category::create([
                    'images' => $request->image,
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' =>$request->parent_id,
                ]);
            }

            $request->except('_token');


            return redirect()->route('provider.dashboard')->with(['success' => 'تم ألاضافة بنجاح']);

        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('provider.dashboard')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
