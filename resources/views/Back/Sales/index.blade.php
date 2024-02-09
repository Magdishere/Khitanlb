@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Sales</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Sales</span>
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
                        <h4 class="card-title mg-b-0">SALES TABLE</h4>
                        <a class="btn add-btn"  href="{{route('admin-sales.create')}}"><i class="fa fa-plus"></i> Add Sale</a>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">All Sales</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0 text-center">#</th>
                                    <th class="wd-15p border-bottom-0 text-center">Type</th>
                                    <th class="wd-20p border-bottom-0 text-center">Name</th>
                                    <th class="wd-15p border-bottom-0 text-center">Start Date</th>
                                    <th class="wd-15p border-bottom-0 text-center">End Date</th>
                                    <th class="wd-10p border-bottom-0 text-center">Banner</th>
                                    <th class="wd-10p border-bottom-0 text-center">Position</th>
                                    <th class="wd-10p border-bottom-0 text-center">Flash Sale</th>
                                    <th class="wd-10p border-bottom-0 text-center">Is Active</th>
                                    <th class="wd-10p border-bottom-0 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $sale->target_type }}</td>
                                        <td class="text-center">{{$sale->name}}</td>
                                        <td class="text-center">{{$sale->start_date}}</td>
                                        <td class="text-center">{{$sale->end_date}}</td>
                                        <td class="text-center"><image src="{{$sale->banner}}"></image></td>
                                        <td class="text-center">{{$sale->position }}</td>
                                        <td class="text-center">{{$sale->isFlashSaleActive() }}</td>
                                        <td class="text-center">{{$sale->isActive() }}</td>
                                        <td class="text-center" class="text-center">
                                            <a class="modal-effect btn btn-sm btn-warning" href=""><i class="fa fa-edit"></i>Edit</a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @include('Back.Sales.delete')
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
@endsection
