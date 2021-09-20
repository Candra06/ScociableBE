@extends('layouts.main')

@section('container')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">User Profile</h2>
                    <h5 class="text-white op-7 mb-2">Sociable Admin</h5>
                </div>

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-4">
                            <div class="avatar avatar-xxl">
                                <img src="{{asset('assets/image/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <h4 class="card-title mt-2">{{ auth()->user()->username }}</h4>
                            <h6 class="card-subtitle">{{ auth()->user()->role }}</h6>
                            <div class="row text-center justify-content-md-center">
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted pt-4 db">Username</small>
                        <h6>{{ auth()->user()->username }}</h6>
                        <small class="text-muted">Email</small>
                        <h6>{{ auth()->user()->email }}</h6>
                        <small class="text-muted pt-4 db">Phone</small>
                        <h6>{{ auth()->user()->phone }}</h6>
                    </div>
                </div>
            </div>
            
            
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="post" action="{{ url('/user/update') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">username</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Nama" value="{{ auth()->user()->username }}" name="username" class="form-control form-control-line" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email" value="{{ auth()->user()->email }}" class="form-control form-control-line" disabled="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-phone" class="col-md-12">Phone</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Phone" value="{{ auth()->user()->phone }}" class="form-control form-control-line" name="phone" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">New Password</label>
                                    <div class="col-md-12">
                                    <input type="password" name="new_password" value="" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection