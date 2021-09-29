@extends('layouts.main')

@section('container')

<div class="content">
    <div class="page-inner  ">
        <div class="page-header">
            <h4 class="page-title">Menu Challenge</h4>
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
                    <a href="{{ url('/challenge') }}">Challenge</a>
                </li>

     
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Challenge</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-start">
                            <div class="col-md-8 px-auto">
                                <h4>Day : {{ $challenge['day'] }}</h4>
                                <h4>Level Diagnosa : {{ $challenge['level_diagnosa'] }}</h4>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-8">
                                <h4 class="card-title">Content</h4>
                                <div class="content">
                                    {!! $challenge['content'] !!}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-8">
                                <h4 class="card-title">Description</h4>
                                <div class="content">
                                    {!! $challenge['description'] !!}
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