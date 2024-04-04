@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Orders</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Orders</span>
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
                        <h4 class="card-title mg-b-0">ORDERS TABLE</h4>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">All Orders</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap table-bordered">
                            <thead class="">
                                <tr>
                                    <th class="wd-5p border-bottom-0 text-center">#</th>
                                    <th class="wd-15p border-bottom-0 text-center">Client</th>
                                    <th class="wd-10p border-bottom-0 text-center">Subtotal</th>
                                    <th class="wd-10p border-bottom-0 text-center">Discount</th>
                                    <th class="wd-10p border-bottom-0 text-center">Total</th>
                                    <th class="wd-10p border-bottom-0 text-center">Status</th>
                                    <th class="wd-10p border-bottom-0 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">No orders available.</td>
                                    </tr>
                                @else
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td class="text-center">{{ $order->firstname }} {{ $order->lastname }}</td>
                                    <td class="text-center">${{ $order->subtotal }}</td>
                                    <td class="text-center">${{ $order->discount }}</td>
                                    <td class="text-center">${{ $order->total }}</td>
                                    <td class="text-center">
                                        @if ($order->status == 'delivered')
                                            <a href="{{ route('orders.status', ['status' => 'delivered']) }}" class="text-success"><strong>{{ strtoupper($order->status) }}</strong></a>
                                        @elseif($order->status == 'canceled')
                                            <a href="{{ route('orders.status', ['status' => 'canceled']) }}" class="text-danger"><strong>{{ strtoupper($order->status) }}</strong></a>
                                        @else
                                            <a href="{{ route('orders.status', ['status' => 'ordered']) }}" class="text-warning"><strong>{{ strtoupper($order->status) }}</strong></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale" data-toggle="modal" href="#edit{{$order->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete{{ $order->id }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('Back.Orders.edit')
                                @include('Back.Orders.delete')
                                @endforeach
                                @endif
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
