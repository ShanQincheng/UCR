@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class="col-8">
                <p class="fs-1 fw-bolder text-center">Rental History</p>
                <div class="table-responsive">
                    <table class="table border-warning align-middle">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Leaseholder</th>
                            <th scope="col">Leaseholder Email</th>
                            <th scope="col">Leaseholder Mobile</th>
                            <th scope="col">Rental Start Time</th>
                            <th scope="col">Should Return Before</th>
                            <th scope="col">Rental Return Time</th>
                            <th scope="col">Insurance Payment</th>
                            <th scope="col">Total Payment</th>
                            <th scope="col">Penalty</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @foreach($rentings as $renting)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$renting->name}}</td>
                                <td>
                                    <img src = "{{$renting->picture}}" class="img-fluid rounded" alt = "{{$renting->name}}">
                                </td>
                                <td>{{$renting->lease_holder}}</td>
                                <td>{{$renting->lease_holder_email}}</td>
                                <td>{{$renting->lease_holder_mobile}}</td>
                                <td>{{date('Y-m-d H:i:s', $renting->start_time)}}</td>
                                <td>{{date('Y-m-d H:i:s', $renting->end_time)}}</td>
                                <td>
                                    @if($renting->return_time != null)
                                        {{date('Y-m-d H:i:s', $renting->return_time)}}
                                    @else
                                        <p class="text-warning">LeaseHolder Not Claim Return Yet</p>
                                    @endif
                                </td>
                                <td>$ {{$renting->insurance}}</td>
                                <td>$ {{$renting->fee}}</td>
                                <td>$ {{$renting->penalty}}</td>
                                <td>
                                    @if($renting->return_time == null)
                                        <span class="mt-3 badge rounded-pill text-bg-danger">Renting</span>
                                    @endif
                                    @if($renting->return_time != null && $renting->staff_confirm == null)
                                        <span class="mt-3 badge rounded-pill text-bg-info">Waiting Staff Confirmation</span>
                                    @endif
                                    @if($renting->return_time != null && $renting->staff_confirm != null)
                                        <span class="mt-3 badge rounded-pill text-bg-success">Lease Terminate</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-4">
                <div class="card border-warning mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted">Deposit: </small></p>
                                <p class="fs-2 font-monospace">
                                    ${{$userInfo->balance}}
                                </p>

                                <a class="btn btn-primary btn-sm" href="#" role="button"
                                   data-bs-toggle="modal" data-bs-target="#recharge-user-account-modal">
                                    Top Up
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Personal Information</h5>

                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">First Name</div>
                                            {{$userInfo->first_name}}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Last Name</div>
                                            {{$userInfo->last_name}}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Email</div>
                                            {{$userInfo->email}}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Mobile</div>
                                            {{$userInfo->mobile}}
                                        </div>
                                    </li>
                                </ol>

                                <div class="card-footer bg-transparent border-0">
                                    <button type="button" class="btn btn-secondary card-link" data-bs-toggle="modal" data-bs-target="#edit-user-account-modal">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.edit-account')
    @include('user.recharge-account')
@endsection
