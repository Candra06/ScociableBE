@extends('layouts.main')

@section('container')
<div class="content">
    <div class="page-inner  ">
        <div class="page-header">
            <h4 class="page-title">Menu Question</h4>
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
                    <a href="{{ url('/question') }}">Question</a>
                </li>


            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Question </h4>

                        </div>
                    </div>
                    <form action="{{url('question')}}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="form-group form-floating-label">
                                <label for="content">Question</label>
                                <input type="text" name="questions" required class="form-control">

                            </div>

                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
