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
                        <a class="btn btn-md btn-dark"  href="{{route('admin-archived_orders.index')}}"><i class="fas fa-exchange-alt"></i> Archive</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead class="">
                                <tr>
                                    <th class="wd-5p border-bottom-0 text-center">#</th>
                                    <th class="wd-15p border-bottom-0 text-center">Client</th>
                                    <th class="wd-10p border-bottom-0 text-center">Subtotal</th>
                                    <th class="wd-10p border-bottom-0 text-center">Discount</th>
                                    <th class="wd-10p border-bottom-0 text-center">Total</th>
                                    <th class="wd-10p border-bottom-0 text-center">Status</th>
                                    <th class="wd-10p border-bottom-0 text-center">Full Address</th>
                                    <th class="wd-10p border-bottom-0 text-center">Email</th>
                                    <th class="wd-10p border-bottom-0 text-center">Phone Number</th>
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
                                    <td class="text-center">{{ $order->country }} - {{ $order->state }} - {{ $order->city }} - {{ $order->street_address }}</td>
                                    <td class="text-center">{{ $order->email}}</td>
                                    <td class="text-center">{{ $order->zipcode}}-{{$order->mobile}}</td>
                                    <td class="text-center">
                                        <a class="modal-effect btn btn-sm btn-success"
                                            href="#" data-order_id="{{ $order->id }}"
                                            data-toggle="modal" data-target="#Transfer_order"><i
                                            class="fas fa-exchange-alt"></i></a>
                                        <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale" data-toggle="modal" href="#edit{{$order->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-order_id="{{ $order->id }}" data-toggle="modal" href="#delete_order"><i class="fa fa-trash"></i></a>
                                        <a href="{{ route('admin.order.details', ['id' => $order->id]) }}" class="modal-effect btn btn-sm btn-danger">Details</strong></a>
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

            <!-- Order Archive -->
    <div class="modal fade" id="Transfer_order" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin-orders.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    Are You Sure You Want To Archive This Order ?
                    <input type="hidden" name="order_id" id="order_id" value="" >
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
                </form>
            </div>
        </div>
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
