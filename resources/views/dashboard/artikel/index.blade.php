@extends('layouts.main')

@section('container')
<div class="content">
    <div class="page-inner  ">
        <div class="page-header">
            <h4 class="page-title">Menu Artikel</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ url('/') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/artikel') }}">artikel</a>
                </li>

     
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="swal-alert @if (session()->has('success')) ready @endif">

                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Artikel</h4>

                            <a class="btn btn-primary btn-round ml-auto" href="/artikel/tambah">
                                <i class="fa fa-plus"></i>
                                Add Artikel
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Publisher</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                  </tr>
                                            </thead>

                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection