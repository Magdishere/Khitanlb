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
            <div class="page-header">
                <h3 class="page-title"> Products</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Add Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add a Product</h4>
                            <form action="{{route('admin-products.store')}}" method="POST" class="form-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Main Image</label>
                                    <input type="file" name="product_image" class="file-upload custom-file-input hidden" id="input_scr" onchange="previewFile()" hidden>
                                    <label class="border-0 mb-0 cursor" for="restaurant-logo">
                                        <img src="{{asset('admin-assets/img/camera-icon.png')}}" id="img_scr" alt="img" class="img-fluid" style="width: 130px; height: 130px">
                                        <span id="img_here"></span>
                                        <img src="{{asset('admin-assets/img/camera-icon.png')}}" id="img_scr" alt="img" class="provider-rest-img d-none" style="width: 130px; height: 130px">

                                        <span class="file-custom"></span>
                                    </label>
                                    @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Images</label>
                                    <input type="file" name="product_images[]" id="product_images" class="" accept="image/*" multiple>
                                    @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Product name in English
                                                </label>
                                                <input type="text" id="name_en"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('name_en')}}"
                                                       name="name_en">
                                                @error("name_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Product name in Arabic
                                                </label>
                                                <input type="text" id="name_ar"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('name_ar')}}"
                                                       name="name_ar">
                                                @error("name_ar")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Slug
                                                </label>
                                                <input type="text" id="slug"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('slug')}}"
                                                       name="slug">
                                                @error("slug")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Price
                                                </label>
                                                <input type="text" id="regular_price"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('regular_price')}}"
                                                       name="regular_price">
                                                @error("regular_price")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> SKU
                                                </label>
                                                <input type="text" id="SKU"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('SKU')}}"
                                                       name="SKU">
                                                @error("SKU")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> quantity
                                                </label>
                                                <input type="number" id="quantity"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('quantity')}}"
                                                       name="quantity">
                                                @error("quantity")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> short description in English</label>
                                                <textarea type="text" id="short_description_en"
                                                       class="form-control"
                                                       placeholder="  "
                                                          name="short_description_en"></textarea>
                                                @error("short_description_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> short description in Arabic
                                                </label>
                                                <textarea type="text" id="short_description_ar"
                                                          class="form-control"
                                                          placeholder="  "
                                                          name="short_description_ar"></textarea>
                                                @error("short_description_ar")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Description in English </label>
                                                <textarea type="text" id="description_en"
                                                       class="form-control"
                                                       placeholder="  "
                                                          name="description_en"></textarea>
                                                @error("description_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> Description in Arabic </label>
                                                <textarea type="text" id="description_ar"
                                                       class="form-control"
                                                       placeholder="  "
                                                          name="description_ar"></textarea>
                                                @error("description_ar")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> stock status
                                                </label>
                                                <select name="stock_status" class="select2 form-control">
                                                    <optgroup label="stock status">
                                                                 <option value="Available">Available</option>
                                                                 <option value="Not Available">Not Available</option>
                                                    </optgroup>
                                                </select>
                                                @error('stock_status')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> category
                                                </label>
                                                <select name="category_id" class="select2 form-control">
                                                    <optgroup label="stock status">
                                                         @if($categories && $categories -> count() > 0)
                                                             @foreach($categories as $category)
                                                                 <option
                                                                     value="{{$category -> id }}">{{$category -> name }}</option>
                                                             @endforeach
                                                         @endif
                                                    </optgroup>
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <ul class="pro-submit">
                                    <li>
                                        <button type="submit"  class="btn btn-style1" style="margin: 20px;">Update profile</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- content-wrapper ends -->
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
    let img = document.getElementById("img_scr");
    img.onclick = function (){
        input.click();
    }
</script>

@stop
