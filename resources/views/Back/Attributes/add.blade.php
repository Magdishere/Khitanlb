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
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Add Attributes </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / Attributes</span>
                    </div>
                </div>
            </div>
            <!-- breadcrumb -->

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add an Attribute</h4>
                            <form action="{{route('admin-attributes.store')}}" method="POST" class="form-sample" enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-home"></i>Attribute Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Attribute Name
                                                </label>
                                                <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name.en') }}" required>
                                                @error("name_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">اسم الصفة
                                                </label>
                                                <input class="form-control" type="text" name="name_ar" id="name_ar" value="{{ old('name.ar') }}" required>
                                                @error("name_ar")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="cats_list">
                                        <h4 class="form-section"><i class="ft-home"></i>Options Details</h4>
                                        <div id="optionTemplate"  class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="file" name="category_image" class="file-upload custom-file-input hidden" id="input_scr" onchange="previewFile()" hidden>
                                                        <label class="border-0 mb-0 cursor" for="restaurant-logo">
                                                            <img src="{{ asset('admin-assets/img/camera-icon.png') }}" id="img_scr" alt="img" class="img-fluid" style="width: 50px; height: 50px">
                                                            <span id="img_here"></span>
                                                            <img src="{{ asset('admin-assets/img/camera-icon.png') }}" id="img_scr" alt="img" class="provider-rest-img d-none" style="width: 50px; height: 50px">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                        @error('category_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="input-group">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Option Name
                                                                    </label>
                                                                    <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name.en') }}" required>
                                                                    @error("name_en")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">اسم الخيارات
                                                                    </label>
                                                                    <input class="form-control" type="text" name="name_ar" id="name_ar" value="{{ old('name.ar') }}" required>
                                                                    @error("name_ar")
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="input-group-append m-5">
                                                                <a href="#" class="header-icons">
                                                                    <i class="header-icons fe fe-x"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @error("name_en")
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" id="moreOptions">More Options +</a>

                                </div>

                                <ul class="pro-submit" style="list-style:none;">
                                    <li>
                                        <button type="submit"  class="btn" style="background-color: black; color:pink;">Save Attribute</button>
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
            let counter = 1;

            $('a#moreOptions').click(function (e) {
                e.preventDefault();
                counter++;
                addOptionFields(counter);
            });
        });

        function addOptionFields(counter) {
            let clone = $('#optionTemplate').clone();
            clone.attr('id', 'optionSet' + counter);
            clone.find('.file-upload').attr('id', 'input_scr' + counter);
            clone.find('.img-scr').attr('id', 'img_scr' + counter);
            clone.find('.name-en').attr('id', 'name_en' + counter);
            clone.find('.name-ar').attr('id', 'name_ar' + counter);

            clone.find('.img-here').attr('id', 'img_here' + counter);

            clone.find('.file-upload').attr('onchange', 'previewFile(' + counter + ')');
            clone.find('.img-scr').attr('onclick', 'triggerInput(' + counter + ')');

            clone.find('.input-group-append').attr('onclick', 'removeOption(' + counter + ')');
            clone.removeClass('d-none');

            $('#cats_list').append(clone);
        }

        function removeOption(counter) {
            $('#optionSet' + counter).remove();
        }

        function previewFile(counter) {
            var input = document.getElementById('input_scr' + counter);
            var img = document.getElementById('img_scr' + counter);
            var imgHere = document.getElementById('img_here' + counter);

            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                img.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
                imgHere.innerHTML = 'New Image Selected';
            }
        }

        function triggerInput(counter) {
            $('#input_scr' + counter).click();
        }
    </script>
@endsection
