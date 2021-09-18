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
        @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            
          </div>
        @endif
        <div class="card">

            <div class="card-header">
                <div class="card-title">Login</div>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email2">Email Address</label>
                        <input type="email" class="form-control" id="email2" name="email" placeholder="Enter Email">
                        <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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