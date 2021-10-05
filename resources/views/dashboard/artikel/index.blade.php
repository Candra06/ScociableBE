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
                
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Artikel</h4>

                            <a class="btn btn-primary btn-round ml-auto" href="/artikel/tambah">
                                <i class="fa fa-plus"></i>
                                Add Artikel
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="basic-datatabless"
                                                    class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Publisher</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                  </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($artikels as $artikel)
                                                    <tr>
                                                        <td>{{ $artikel->title }}</td>
                                                        <td>{{ $artikel->user->username }}</td>
                                                        <td>{{ $artikel->status }}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="/artikel/show/{{$artikel->id}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Show Artikel">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="/artikel/edit/{{$artikel->id}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Artikel">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <form action="{{ url('artikel/' . $artikel->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$artikel->id}}">
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
</div>



@endsection