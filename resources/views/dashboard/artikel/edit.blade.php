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
                    <a href="{{ url('/artikel') }}">Artikel</a>
                </li>

     
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Artikel</h4>

                        </div>
                    </div>
                    <form action="/artikel/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" name="title" value="{{ $artikel->title }}" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">Title</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" name="url" value="{{ $artikel->url }}" class="form-control input-border-bottom" required="">
                                <label for="inputFloatingLabel" class="placeholder">Url Youtube</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-border-bottom" name="status" id="selectFloatingLabel" required="">
                                    <option value="">&nbsp;</option>
                                    <option value="Premium" @if ( $artikel->status == 'Premium') selected @endif>Premium</option>
                                    <option value="Biasa" @if ( $artikel->status == 'Biasa') selected @endif>Biasa</option>
                                </select>
                                <label for="selectFloatingLabel" class="placeholder">Status</label>
                            </div>
                            <div class="form-group fill">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" name="description" id="edit" style="display: none;"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" name="thumbnail" required id="exampleFormControlFile1">
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