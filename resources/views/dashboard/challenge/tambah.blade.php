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
                            <h4 class="card-title">Artikel</h4>

                        </div>
                    </div>
                    <form action="/challenge/store" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group form-floating-label">
                                <select class="form-control input-border-bottom" name="day" id="selectFloatingLabel" required="">
                                    <option value="">&nbsp;</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="selectFloatingLabel" class="placeholder">Day</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-border-bottom" name="level_diagnosa" id="selectFloatingLabel" required="">
                                    <option value="">&nbsp;</option>
                                    @for ($i = 0; $i < count($level_diagnosa); $i++)
                                        
                                        <option value="{{ $level_diagnosa[$i] }}">{{ $level_diagnosa[$i] }}</option>
                                    @endfor
                                </select>
                                <label for="selectFloatingLabel" class="placeholder">Level Diagnosa</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" style="display: none;"></textarea>
                            </div>
                            <div class="form-group fill">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" style="display: none;"></textarea>
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