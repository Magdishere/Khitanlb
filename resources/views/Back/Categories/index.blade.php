@extends('layouts.master')
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Categories</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">CATEGORIES TABLE</h4>
                        <a class="btn btn-dark"  data-effect="effect-scale" data-toggle="modal" href="#add"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-bordered">
                            <thead class="">
                                <tr>
                                    <th class="wd-15p border-bottom-0 text-center">#</th>
                                    <th class="wd-15p border-bottom-0 text-center">Category Image</th>
                                    <th class="wd-20p border-bottom-0 text-center">Name</th>
                                    <th class="wd-15p border-bottom-0 text-center">Slug</th>
                                    <th class="wd-15p border-bottom-0 text-center">Type</th>
                                    <th class="wd-15p border-bottom-0 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center"><img src="{{ asset('../admin-assets/uploads/images/categories/' . $category->image_path) }}" alt="Category Image" style="max-width: 50px;"></td>
                                        <td class="text-center">{{$category->name}}</td>
                                        <td class="text-center">{{$category->slug}}</td>
                                        <td class="text-center">
                                            @if($category->parent_id == null)
                                                Main Category
                                            @else
                                                Sub-category
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale" data-toggle="modal" href="#edit{{$category->id}}"><i class="fa fa-edit"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$category->id}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('Back.Categories.add')
                                    @include('Back.Categories.edit')
                                    @include('Back.Categories.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>

<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        // Select the radio inputs by name attribute
        $('input:radio[name="type"]').change(function () {
            // Check if the radio with value '2' is checked
            if (this.checked && this.value == '2') {
                // Remove the 'hidden' class if the condition is true
                $('#cats_list').removeClass('hidden');
            } else {
                // Add the 'hidden' class if the condition is false
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
@endsection
