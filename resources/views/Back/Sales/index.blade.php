@extends('layouts.master')
@section('title')
    {{trans('admin-assets/main-sidebar_trans.Cars Models')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('admin-assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    {{-- <style>
        .btn-section{
            background-color: #F77D0A !important;
            color: #2B2E4A !important;
        }
    </style> --}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('admin-assets/main-sidebar_trans.Cars Models')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('admin-assets/main-sidebar_trans.All Brands')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
                            {{trans('admin-assets/carsmodels_trans.Add Model')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">

                                <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0 text-center">#</th>
                                <th class="wd-15p border-bottom-0 text-center">Type</th>
                                <th class="wd-15p border-bottom-0 text-center">Name</th>
                                <th class="wd-20p border-bottom-0 text-center">Start Date</th>
                                <th class="wd-20p border-bottom-0 text-center">End Date</th>
                                <th class="wd-20p border-bottom-0 text-center">Banner</th>
                                <th class="wd-20p border-bottom-0 text-center">Position</th>
                                <th class="wd-20p border-bottom-0 text-center">Flash sale</th>
                                <th class="wd-20p border-bottom-0 text-center">Active</th>
                                <th class="wd-20p border-bottom-0 text-center">Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">
                            @foreach($sales as $sale)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center" >{{ $sale->target_type }}</td>
                                    <td class="text-center" >{{$sale->name}}</td>
                                    <td class="text-center" >{{$sale->start_date}}</td>
                                    <td class="text-center" >{{$sale->end_date}}</td>
                                    <td class="text-center" ><image src="{{$sale->banner}}"></image></td>
                                    <td class="text-center" >{{$sale->position }}</td>
                                    <td class="text-center" >{{$sale->isFlashSaleActive() }}</td>
                                    <td class="text-center" >{{$sale->isActive() }}</td>
                                    <td></td>
                                    <td class="text-center">
                                        <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale" data-toggle="modal" href="#edit"><i class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                                @include('Back.Sales.delete')
                            @endforeach

                            <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale" data-toggle="modal" href="#edit"><i class="las la-pen"></i></a>
                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete"><i class="las la-trash"></i></a>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

        <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

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

@endsection
