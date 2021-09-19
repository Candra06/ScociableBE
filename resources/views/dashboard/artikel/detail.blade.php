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
                            <h4 class="card-title">{{ $artikel->title }}</h4>


                        </div>
                    </div>
                    <div class="card-body">
                       
                            <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/{{ $artikel->url }}" allowfullscreen></iframe>
                        <div class="content">

                            {!! $artikel->description !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection