@extends('layouts.app')
@section('content')
        @if($rentings == null)
            <div class="container">
                <p class="">No computer is renting</p>
            </div>
        @else
            <div class="container">
                <table class="table">
                    <thead>
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
                        <th scope="col">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
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
                                <td>{{$renting->insurance}}</td>
                                <td>{{$renting->fee}}</td>
                                <td>
                                    <input type="hidden" name="lease-id" value="{{$renting->lease_id}}">
                                    @if($renting->return_time != null)
                                        <button type="submit" class="btn btn-success"
                                                data-bs-toggle="modal" data-bs-target="#endingLeaseModal">
                                            Confirm Return
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-warning"
                                                data-bs-toggle="modal" data-bs-target="#endingLeaseModal">
                                            Confirm Return
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @include('manager.ending-lease-modal')
    @endif
@endsection
