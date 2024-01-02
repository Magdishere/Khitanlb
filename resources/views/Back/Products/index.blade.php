@extends('layouts.master')
@section('css')
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
            <div class="pr-1 mb-3 mb-xl-0">
                <button class="btn" data-toggle="modal" style="background-color: black; color:pink;"><i class="fa fa-plus"></i> Add Product</button>
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
                        <h4 class="card-title mg-b-0">PRODUCTS TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">All Products</p>
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
                                    <th class="wd-25p border-bottom-0">Image</th>
                                    <th class="wd-25p border-bottom-0">Featured</th>
                                    <th class="wd-25p border-bottom-0">Short Description</th>
                                    <th class="wd-25p border-bottom-0">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nathan</td>
                                    <td>Mills</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>2014/10/8</td>
                                    <td>$765,980</td>
                                    <td>n.mills@datatables.net</td>
                                    <td>Mills</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>2014/10/8</td>
                                    <td>$765,980</td>
                                </tr>
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
