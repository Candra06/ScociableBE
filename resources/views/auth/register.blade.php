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
            <form action="/register" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" value="{{old('fullname')}}">
                            @error('fullname')
                                <small id="fullname" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="username">username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="{{old('username')}}">
                            @error('username')
                                <small id="username" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
                        @error('email')
                            <small id="email" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                            @error('password')
                                <small id="password" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password" name="passwordconfirm" placeholder="Password" value="{{old('passwordconfirm')}}">
                            @error('passwordconfirm')
                                <small id="passwordconfirm" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="birthdate">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" id="birthdate" name="tgllahir" placeholder="27/09/2001" value="{{old('tgllahir')}}">
                            @error('tgllahir')
                                <small id="tgllahir" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="hp">Nomer Handphone</label>
                            <input type="text" class="form-control" id="hp" name="nomor" placeholder="083853797950" value="{{old('nomor')}}">
                            @error('nomor')
                                <small id="nomor" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
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
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection