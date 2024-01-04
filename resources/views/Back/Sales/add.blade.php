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
                        <h4 class="content-title mb-0 my-auto">Add Slide</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / Slides</span>
                    </div>
                </div>
            </div>
            <!-- breadcrumb -->

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add a Slide</h4>
                            <form  id="form" action="{{route('admin-sales.store')}}" method="POST" class="form-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Slide Image</label>
                                    <input type="file" name="banner" id="banner" accept="image/*" >
                                    @error('banner')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-body">

                                    <h4 class="form-section"><i class="ft-home"></i>Slide Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Name
                                                </label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Type</label>
                                                <select name="type" class="form-control">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Value</label>
                                                <input type="number" name="value" id="value" class="form-control" required>
                                                @error("value")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Position</label>
                                                <select name="position" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>

                                                @error("position")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">Start Date</label>
                                                <input type="datetime-local" name="starts_date" id="starts_date" class="form-control" required>
                                                @error("starts_date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">End Date</label>
                                                <input type="datetime-local" name="ends_date" id="ends_date" class="form-control" required>
                                                @error("ends_date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="animals">Products</label>
                                        <div class="col-10">
                                            <select multiple name="product_id[]" id="animals" class="filter-multi-select">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        <img src="{{ asset('../admin-assets/uploads/images/products/' . $product->image) }}" alt="Slide Image" style="max-width: 50px;">

                                                        {{ $product->name }}
                                                     </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <ul class="pro-submit" style="list-style:none;">
                                        <li>
                                            <button type="submit"  class="btn" style="background-color: black; color:pink;">Save Slide</button>
                                        </li>
                                    </ul>
                                </div>
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
    <script>
        // Use the plugin once the DOM has been loaded.
        $(function () {
            // Apply the plugin
            var notifications = $('#notifications');
            $('#animals').on("optionselected", function(e) {
                createNotification("selected", e.detail.label);
            });
            $('#animals').on("optiondeselected", function(e) {
                createNotification("deselected", e.detail.label);
            });
            function createNotification(event,label) {
                var n = $(document.createElement('span'))
                    .text(event + ' ' + label + "  ")
                    .addClass('notification')
                    .appendTo(notifications)
                    .fadeOut(3000, function() {
                        n.remove();
                    });
            }
            var shapes = $('#shapes').filterMultiSelect({
                selectAllText: 'all...',
                placeholderText: 'click to select a shape',
                filterText: 'search',
                labelText: 'Shapes',
                caseSensitive: true,
            });
            var cars = $('#cars').filterMultiSelect();
            var pl1 = $('#programming_languages_1').filterMultiSelect();
            $('#b1').click((e) => {
                pl1.enableOption("1");
            });
            $('#b2').click((e) => {
                pl1.disableOption("1");
            });
            var pl2 = $('#programming_languages_2').filterMultiSelect();
            $('#b3').click((e) => {
                pl2.enable();
            });
            $('#b4').click((e) => {
                pl2.disable();
            });
            var pl3 = $('#programming_languages_3').filterMultiSelect({
                allowEnablingAndDisabling: false,
            });
            $('#b5').click((e) => {
                pl3.enableOption("1");
            });
            $('#b6').click((e) => {
                pl3.disableOption("1");
            });
            $('#b7').click((e) => {
                pl3.enable();
            });
            $('#b8').click((e) => {
                pl3.disable();
            });
            var cities = $('#cities').filterMultiSelect({
                items: [["San Francisco","a"],
                    ["Milan","b",false,true],
                    ["Singapore","c",true],
                    ["Berlin","d",true,true],
                ],
            });
            var colors = $('#colors').filterMultiSelect();
            var trees = $('#trees').filterMultiSelect({
                selectionLimit: 3,
            });
            $('#jsonbtn1').click((e) => {
                var b = true;
                $('#jsonresult1').text(JSON.stringify(getJson(b),null,"  "));
            });
            var getJson = function (b) {
                var result = $.fn.filterMultiSelect.applied
                    .map((e) => JSON.parse(e.getSelectedOptionsAsJson(b)))
                    .reduce((prev,curr) => {
                        prev = {
                            ...prev,
                            ...curr,
                        };
                        return prev;
                    });
                return result;
            }
            $('#jsonbtn2').click((e) => {
                var b = false;
                $('#jsonresult2').text(JSON.stringify(getJson(b),null,"  "));
            });
            $('#form').on('keypress keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>

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
