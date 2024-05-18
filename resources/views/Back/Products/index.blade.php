@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('admin-assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

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
                        <h4 class="card-title mg-b-0">PRODUCTS TABLE</h4>

                        <div class="mb-3 mb-xl-0">
                                <a class="btn btn-dark" href="{{route('admin-products.create')}}"><i class="fa fa-plus"></i> Add Product</a>

                            <div class="btn-group dropdown">
                                <button type="button" class="btn btn-dark">14 Aug 2019</button>
                                <button type="button"  class="btn btn-dark dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Product Name</th>
                                    <th class="wd-20p border-bottom-0">Slug</th>
                                    <th class="wd-15p border-bottom-0">Price</th>
                                    <th class="wd-10p border-bottom-0">SKU</th>
                                    <th class="wd-25p border-bottom-0">Quantity</th>
                                    <th class="wd-25p border-bottom-0">Category</th>
                                    <th class="wd-25p border-bottom-0">Image</th>
                                    <th class="wd-25p border-bottom-0">Featured</th>
                                    <th class="wd-25p border-bottom-0">Short Description</th>
                                    <th class="wd-25p border-bottom-0">Description</th>
                                    <th class="wd-25p border-bottom-0">All Images</th>
                                    <th class="wd-25p border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>${{$product->regular_price}}
                                        {{ App\Sale\Sale::calculateDiscountedPrice($product->id)}}
                                    </td>
                                    <td>{{$product->SKU}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>Category</td>
                                    <td><img src="{{ asset('../admin-assets/uploads/images/products/' . $product->image) }}" alt="Slide Image" style="max-width: 50px;"></td>
                                    <td>{{$product->featured}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->name}}</td>
                                    <td class="text-center">
                                        <a class="modal-effect btn btn-sm btn-warning" href="{{route('admin-products.edit', $product->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$product->id}}"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
                            </tr>
                            @include('Back.Products.delete')
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

    <!-- Internal Data tables -->
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('admin-assets/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('admin-assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('admin-assets/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        $('#delete_order').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var order_id = button.data('order_id')
            var modal = $(this)
            modal.find('.modal-body #order_id').val(order_id);
        })
    </script>

    <script>
        $('#Transfer_order').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var order_id = button.data('order_id')
            var modal = $(this)
            modal.find('.modal-body #order_id').val(order_id);
        })
    </script>

@endsection

