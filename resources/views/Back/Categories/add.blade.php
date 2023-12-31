@extends('Back.Layouts.admin-layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Form elements </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add a Category</h4>
                            <form class="form-sample">
                                <div class="form-group">
                                    <label> صوره القسم </label>
                                    <input type="file" name="image" class="file-upload custom-file-input hidden" id="input_scr" onchange="previewFile()" hidden>
                                    <label class="border-0 mb-0 cursor" for="restaurant-logo">
                                        <img src="{{asset('provider-assets/images/camera-icon.png')}}" id="img_scr" alt="img" class="img-fluid" style="width: 130px; height: 130px">
                                        <span id="img_here"></span>
                                        <img src="{{asset('provider-assets/images/camera-icon.png')}}" id="img_scr" alt="img" class="provider-rest-img d-none" style="width: 130px; height: 130px">

                                        <span class="file-custom"></span>
                                    </label>
                                    @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-body">

                                    <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> اسم القسم
                                                </label>
                                                <input type="text" id="name"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('name')}}"
                                                       name="name">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> اسم بالرابط
                                                </label>
                                                <input type="text" id="name"
                                                       class="form-control"
                                                       placeholder="  "
                                                       value="{{old('slug')}}"
                                                       name="slug">
                                                @error("slug")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row hidden" id="cats_list" >
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1"> اختر القسم الرئيسي
                                                </label>
                                                <select name="parent_id" class="select2 form-control">
                                                    <optgroup label="من فضلك أختر القسم ">
                                                       {{-- @if($categories && $categories -> count() > 0)
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{$category -> id }}">{{$category -> name }}</option>
                                                            @endforeach
                                                        @endif--}}
                                                    </optgroup>
                                                </select>
                                                @error('parent_id')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <span>الحالة</span>
                                                <input type="checkbox" value="1" name="is_active" id="s6" checked="" hidden />
                                                <label class="slider-v3" for="s6" style="margin-bottom: 9px"></label>

                                                @error("is_active")
                                                <span class="text-danger">{{$message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-3">
                                            <div>
                                                <input type="radio" name="type" id="radio2" class="radio" value="1"/>
                                                <label for="radio2">قسم رئيسي</label>
                                            </div>
                                            @error("type")
                                            <span class="text-danger">{{$message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <div>
                                                <input type="radio" name="type" id="radio3" class="radio" value="2"/>
                                                <label for="radio3">قسم فرعي</label>
                                                @error("type")
                                                <span class="text-danger">{{$message }}</span>
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
@push('script')
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

@endpush
