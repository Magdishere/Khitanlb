@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    Order Details
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Orders</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Order Details</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class="main-content-body-invoice">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">
                        <h1 class="invoice-title">Order Invoice</h1>
                        <div class="billed-from">
                            <h6>Khitan Shop</h6>
                            <p>Beshmezzine, North-Lebanon<br>
                            Tel No: +96176326960<br>
                            Email: khitan@gmail.com</p>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <div class="col-md">
                            <label class="tx-gray-600">Billed To</label>
                            <div class="billed-to">
                                <h6>{{$orders->first_name}}{{$orders->last_name}}</h6>
                                <p>{{ $orders->country }} - {{ $orders->state }} - {{ $orders->city }} - {{ $orders->street_address }}<br>
                                Tel No: {{$orders->mobile}}<br>
                                Email: {{$orders->email}}</p>
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="tx-gray-600">Invoice Information</label>
                            <!-- Order Information -->
                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-20p">Product</th>
                                    <th class="wd-40p">Images</th>
                                    <th class="wd-40p">Specefications</th>
                                    <th class="tx-center">Quantity</th>
                                    <th class="tx-right">Price</th>
                                    <th class="tx-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Order Items -->
                                @foreach($orders->orderItems as $item)
                                    <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td><img src="{{ asset('../admin-assets/uploads/images/products/' . $item->product->image) }}" alt="Slide Image" style="max-width: 50px;"></td>
                                    <td class="tx-center">
                                        @foreach($item->attributeOptions as $options)
                                            @if($options->attribute->name == 'color')
                                                @foreach($options->translations as $translation)
                                                    @if($translation->locale == app()->getLocale())
                                                        <label class="{{ ($selectedColors[$product->id] === $translation->value || ($selectedColors[$product->id] === null && $options->pivot->is_default === 1)) ? 'active ' . $translation->value : $translation->value  }}" for="{{ 'pc-' . $product->id . '-' . $translation->value }}" style="background: {{ $translation->value }}">
                                                            <input type="radio" id="{{ 'pc-' . $product->id . '-' . $translation->value }}" wire:model="selectedColors.{{ $product->id }}" value="{{ $translation->value }}">
                                                        </label>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="tx-center">{{$item->quantity}}</td>
                                    <td class="tx-right">${{$item->price}}</td>
                                    <td class="tx-right">${{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                @endforeach
                                <td class="tx-right">Sub-Total</td>
													<td class="tx-right" colspan="2">${{$orders->subtotal}}</td>
												</tr>
												{{-- <tr>
													<td class="tx-right">Shipping (5$)</td>
													<td class="tx-right" colspan="2">$287.50</td>
												</tr> --}}
												<tr>
													<td class="tx-right">Discount</td>
													<td class="tx-right" colspan="2">${{$orders->discount}}</td>
												</tr>
												<tr>
													<td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
													<td class="tx-right" colspan="2">
														<h4 class="tx-dark tx-bold">${{$orders->total}}</h4>
													</td>
												</tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-dark" onclick="window.history.back()">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
@endsection

