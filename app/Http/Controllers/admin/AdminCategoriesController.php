<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\admin\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('Back.Categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('Back.Categories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $filePath = "";
            if ($request->has('category_image')) {
                $filePath = uploadImage('categories', $request->category_image);
            }

            $data = [
                'slug' => $request->input('slug'),
                'image_path' => $filePath,
                'parent_id' => $request->type == 1 ? null : $request->parent_id,
                'en' => ['name' => $request->input('name_en')],
                'ar' => ['name' => $request->input('name_ar')],
            ];

            $category = Category::create($data);

            toastr()->addSuccess('Category added successfully.');
            return redirect()->route('Admin-Categories.index');
        } catch (\Exception $ex) {
            return redirect()->route('Admin-Categories.index')->with(['error' => 'An error occurred. Please try again later.']);
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            $enAttributes = $category->translate('en');
            $arAttributes = $category->translate('ar');
            $categories = Category::get();

            return view('Back.Categories.edit', compact('category', 'categories', 'enAttributes', 'arAttributes'));
        } catch (\Exception $ex) {
            toastr()->error('Category not found.');
            return redirect()->route('Admin-Categories.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($request->hasFile('category_image')) {
                if ($category->image_path) {
                    Storage::delete($category->image_path);
                }
                $category->image_path = uploadImage('categories', $request->file('category_image'));
            }

            $category->translate('en')->name = $request->input('name_en');
            $category->translate('ar')->name = $request->input('name_ar');
            $category->slug = $request->input('slug');
            $category->parent_id = $request->type == 1 ? null : $request->parent_id;
            $category->save();

            toastr()->addSuccess('Category updated successfully.');
            return redirect()->route('Admin-Categories.index');
        } catch (\Exception $ex) {
            toastr()->error('An error occurred. Please try again later.');
            return redirect()->route('Admin-Categories.index');
        }
    }

    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);

        if ($category->image_path) {
            Storage::delete($category->image_path);
        }

        $category->delete();
        toastr()->addSuccess('Category deleted successfully.');
        return redirect()->route('Admin-Categories.index');
    }
}
