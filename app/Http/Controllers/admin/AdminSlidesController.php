<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Slides;
use Illuminate\Http\Request;

class AdminSlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::get();
        return view('Back.Slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Back.Slides.add');

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

            $imagePath = '';

            if ($request->hasFile('image')) {
                $imagePath = uploadImage('slides', $request->image); // Store the Slides image in the 'public' disk
            }

            $data = [
                'image' => $imagePath,
                'en' => [
                    'title' => $request->input('title_en'),
                    'description' => $request->input('description_en'),
                    'link' => $request->input('link_en'),
                ],

                'ar' => [
                    'title' => $request->input('title_ar'),
                    'description' => $request->input('description_ar'),
                    'link' => $request->input('link_ar'),
                ],
            ];

            $slides = Slides::create($data);

            return redirect()->route('admin-sldies.index')->with(['success' => 'تم ألاضافة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin-slides.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
