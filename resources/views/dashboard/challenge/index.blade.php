@extends('layouts.main')

@section('container')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Menu Challenge</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Challenge</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Challenge</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="/challenge/create">
                                <i class="fa fa-plus"></i>
                                Add Challenge
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Level Diagnosa</th>
                                                    <th>Content</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data as $clg)
                                                    <tr>
                                                        <td>{{$clg->day}}</td>
                                                        <td>{{$clg->level_diagnosa}}</td>
                                                        <td>{!!$clg->content!!}</td>
                                                        <td>{!!$clg->description!!}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="/challenge/show/{{$clg->id}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Show clg">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="/challenge/edit/{{$clg->id}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit clg">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <form action="{{ url('challenge/' . $clg->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$clg->id}}">
                                                                    <button type="submit"
                                                                        class="btn btn-link btn-danger"><i class="fa fa-times"></i></button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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