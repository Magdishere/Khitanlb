@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Slides</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Slides</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a class="btn" style="background-color: black; color:pink;" href="{{route('admin-slides.create')}}"><i class="fa fa-plus"></i> Add Slide</a>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn" style="background-color: black; color:pink;">14 Aug 2019</button>
                    <button type="button" style="background-color: black; color:pink;" class="btn dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
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
                        <h4 class="card-title mg-b-0">SLIDES TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">All Slides</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Slide Image</th>
                                    <th class="wd-20p border-bottom-0">Slide Title</th>
                                    <th class="wd-15p border-bottom-0">Description</th>
                                    <th class="wd-10p border-bottom-0">Link</th>
                                    <th class="wd-10p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slides as $slide)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset('../admin-assets/uploads/images/slides/' . $slide->image) }}" alt="Slide Image" style="max-width: 50px;"></td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->description }}</td>
                                        <td>{{ $slide->link }}</td>
                                        <td class="text-center">
                                            <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale"  data-toggle="modal" href="{{route('admin-slides.edit', $slide->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$slide->id}}"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @include('Back.Slides.delete')
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
@endsection
