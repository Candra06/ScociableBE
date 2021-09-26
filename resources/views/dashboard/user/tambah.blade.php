@extends('layouts.main')

@section('container')
<div class="content">
    <div class="page-inner  ">
        <div class="page-header">
            <h4 class="page-title">Menu User</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ url('/') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>


     
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah User</h4>

                        </div>
                    </div>
                    <form action="/user/store" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" name="username" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">Username</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" name="email" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">Email</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="password" name="password"  class="form-control form-control-line" disabled="" required="">
                                <label for="inputFloatingLabel" class="placeholder">password default : 12345678</label>
                            </div>
                            <div class="form-check">
                                <label>Gender</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="gender" value="Laki-laki" checked="">
                                    <span class="form-radio-sign">Male</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="gender" value="Perempuan">
                                    <span class="form-radio-sign">Female</span>
                                </label>
                            </div>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-border-bottom" name="role" id="selectFloatingLabel" required="">
                                    <option value="">&nbsp;</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Psikolog">Psikolog</option>
                                </select>
                                <label for="selectFloatingLabel" class="placeholder">Role</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" name="phone" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">phone</label>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary" type="submit">Add user</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection