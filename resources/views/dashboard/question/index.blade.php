@extends('layouts.main')

@section('container')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Menu Questions</h4>
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
                        <a href="#">Questions</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Questions</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ url('/question/create') }}">
                                    <i class="fa fa-plus"></i>
                                    Add Questions
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="basic-datatables"
                                                    class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Question</th>
                                                            <th>Option</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $m)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $m->questions }}</td>
                                                                <td >
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <a href="{{ url('question/' . $m->id . '/edit') }}"
                                                                                class="btn btn-sm btn-primary btn-circle mr-2">
                                                                                Edit
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <form action="{{ url('question/' . $m->id) }}"
                                                                                method="POST">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <input type="hidden" name="id" value="{{$m->id}}">
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-danger btn-circle mr-2">Hapus</button>
                                                                            </form>
                                                                        </div>
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
