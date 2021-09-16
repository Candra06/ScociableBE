@extends('layouts.main-auth')

@section('container-auth')
<div class="row mt-3">
    <div class="col-md-3 ml-auto mr-auto">
        <div class="text-center">
            <img class="align-center" src="assets/image/sociable@0.75x.png" alt="Sociable Logo">
            <h1 class="font-weight-bold" style="color: #00a2e9;">Sociable Admin</h1> 
        </div>
            
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Register</div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Name">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="col-md-6">
                        <label for="username">username</label>
                        <input type="text" class="form-control" id="username" placeholder="username">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                {{-- <div class="form-group">
                </div> --}}
                <div class="form-group">
                    <label for="email2">Email Address</label>
                    <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="birthdate">Tanggal Lahir</label>
                        <input type="text" class="form-control datepicker" id="birthdate" placeholder="27/09/2001">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="col-md-6">
                        <label for="hp">Nomer Handphone</label>
                        <input type="text" class="form-control" id="hp" placeholder="083853797950">
                        {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                <div class="form-check">
                    <label>Gender</label><br>
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Male</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Female</span>
                    </label>
                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection