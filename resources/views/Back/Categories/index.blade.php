@extends('layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Categories</h4>
                          <button class="btn btn-secondary" data-toggle="modal"><i class="fa fa-plus"></i> Add Category</button>
                          </p>
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th class="text-center">Category Image</th>
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Slug</th>
                                  <th class="text-center">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="py-1 text-center">
                                    <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" style="width: 50px; height:50px;">
                                  </td>
                                  <td class="text-center"> Herman Beck </td>
                                  <td class="text-center">Anything</td>
                                  <td class="text-center">
                                    <a class="modal-effect btn btn-sm btn-warning" data-effect="effect-scale"  data-toggle="modal" href="#edit"><i class="fa fa-edit"></i>Edit</a>
                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete"><i class="fa fa-trash"></i>Delete</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
