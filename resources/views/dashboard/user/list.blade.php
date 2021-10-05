@extends('layouts.main')

@section('container')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Menu Membership</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Membership</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List User</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="/user/tambah">
                                <i class="fa fa-plus"></i>
                                Add User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Role</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data as $usr)                                                    
                                                    <tr>
                                                        <td>{{ $usr->username }}</td>
                                                        <td>{{ $usr->email }}</td>
                                                        <td>{{ $usr->role }}</td>

                                                    </tr>
                                                @endforeach
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

@endsection