@extends('layouts.main')

@section('container')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Menu Membership</h4>
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
                    <a href="#">Membership</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Membership</h4>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>username</th>
                                                    <th>amount</th>
                                                    <th>proof payment</th>
                                                    <th>payment status</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($members as $member)                                                    
                                                    <tr>
                                                        <td>{{ $member->user->username }}</td>
                                                        <td>{{ $member->amount }}</td>
                                                        <td>
                                                            <a href="{{ url('bukti')."/".$member->proof_payment }}" target="_blank" class="btn btn-round btn-success btn-sm">
                                                            <i class="fas fa-eye my-auto"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @if($member->payment_status == 'Pending')
                                                                <span class="badge rounded-pill bg-warning text-white">{{ $member->payment_status }}</span>
                                                            @elseif($member->payment_status == 'Confirm')
                                                                <span class="badge rounded-pill bg-success text-white">{{ $member->payment_status }}</span>
                                                            @else
                                                                <span class="badge rounded-pill bg-danger text-white">{{ $member->payment_status }}</span>
                                                            @endif
                   
                                                        <td>
                                                            <div class="form-button-action">
                                                                <form action="{{ url('membership/update') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$member->id}}">
                                                                    <input type="hidden" name="type" value="Confirm">
                                                                    <button type="submit" class="btn btn-icon btn-round btn-success" data-id="${row.id}" data-type="Confirm" id="confirm"><i class="fa fa-check"></i></button>
                                                                </form>
                                                                <button class="btn btn-icon btn-round btn-danger ml-2" data-id="${row.id}" data-type="Decline" id="decline"><i class="fa fa-times"></i></button>
                                
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