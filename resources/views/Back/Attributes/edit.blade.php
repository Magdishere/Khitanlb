@extends('layouts.master')
@section('css')
    <style>
        .hidden {
            display: none !important;
        }
    </style>
@endsection
@section('page-header')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Edit Category </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / Categories</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit a Category</h4>
                            <form action="{{ route('Admin-Categories.update', $category->id) }}" method="POST" class="form-sample" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" name="category_image" class="form-control" accept="image/*" id="input_scr" onchange="previewFile()">
                                    @error('category_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-home"></i>Category Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name_en">Category Name (English)</label>
                                                <input class="form-control" type="text" name="name_en" id="name_en" value="{{ $enAttributes->name }}" required>
                                                @error("name_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name_ar">Category Name (Arabic)</label>
                                                <input class="form-control" type="text" name="name_ar" id="name_ar" value="{{ $arAttributes->name }}" required>
                                                @error("name_ar")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control" value="{{ $category->slug }}" name="slug">
                                                @error("slug")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <input type="radio" name="type" id="radio2" class="radio" value="1" @if($category->parent_id == null) checked @endif />
                                                <label for="radio2">Main Category</label>
                                            </div>
                                            @error("type")
                                            <span class="text-danger">{{$message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <input type="radio" name="type" id="radio3" class="radio" value="2" @if($category->parent_id !== null) checked @endif/>
                                                <label for="radio3">Sub-category</label>
                                                @error("type")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row @if($category->parent_id !== null) '' @else hidden @endif" id="cats_list">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="parent_id">Select Main Category</label>
                                                <select name="parent_id" class="select2 form-control">
                                                    <optgroup label="Please Select Main Category">
                                                        @if($categories && $categories->count() > 0)
                                                            @foreach($categories as $cat)
                                                                <option value="{{ $cat->id }}" @if($cat->id == $category->parent_id) selected @endif>{{ $cat->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                                @error('parent_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-submit">
                                    <button type="submit"  class="btn btn-success">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input:radio[name="type"]').change(function () {
                if (this.checked && this.value == '2') {
                    $('#cats_list').removeClass('hidden');
                } else {
                    $('#cats_list').addClass('hidden');
                }
            });
        });
    </script>

    <script>
        let input = document.getElementById("input_scr");
        input.onclick = function (){
            input.click();
        }
    </script>
@stop
