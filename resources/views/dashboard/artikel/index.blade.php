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
                            <h4 class="card-title">Artikel</h4>

                            <a class="btn btn-primary btn-round ml-auto" href="/artikel/tambah">
                                <i class="fa fa-plus"></i>
                                Add Artikel
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->

                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 357.638px;">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 240.625px;">Publisher</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 202.637px;">Status</th>
                                        <th style="width: 126.3px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Title</th>
                       
                                        <th rowspan="1" colspan="1">Publisher</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Action</th></tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($artikels as $artikel)
                                    <tr role="row" class="odd" >
                                        <td>{{ $artikel->title }}</td>
                                        <td>{{ $artikel->user->username }}</td>
                                        <td>{{ $artikel->status }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/artikel/show/{{ $artikel->id }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success btn-lg" data-original-title="Show Artikel">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="/artikel/edit/{{ $artikel->id }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Artikel">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="/artikel/{{ $artikel->id }}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger hapus" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
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



@endsection