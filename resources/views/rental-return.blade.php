@extends('layouts.app')
@section('content')
    @if (session('warningMsg'))
        <div class="alert alert-warning"> {{session('warningMsg')}} </div>
    @endif

    @if($rentings == null)
        <div class="container">
            <p class="">No computer is renting</p>
        </div>
    @else
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($rentings as $renting)
                <div class="col">
                    <div class="card h-100">
                        <img src = "{{$renting->picture}}"
                             class="img-fluid img-detail" alt = "{{$renting->name}}">

                        <div class="card-body">
                            @if($renting->return_time == null)
                                <p class="fs-1 text-success">Rent Success</p>
                            @endif
                            @if($renting->return_time != null && $renting->staff_confirm == null)
                                    <p class="fs-1 text-success">Returned</p>
                            @endif

                            <p class="fs-2">{{$renting->name}}</p>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>
                                        Rental Start Time:
                                    </p>
                                    {{date('Y-m-d H:i:s', $renting->start_time)}}
                                </li>

                                <li class="list-group-item text-danger">
                                    <p class="fw-bolder">
                                        Should Return Before:
                                    </p>
                                    {{date('Y-m-d H:i:s', $renting->end_time)}}
                                </li>

                                @if($renting->return_time != null && $renting->staff_confirm == null)
                                    <li class="list-group-item text-info">
                                        <p class="fw-bolder">
                                            Return Time:
                                        </p>
                                        {{date('Y-m-d H:i:s', $renting->return_time)}}
                                    </li>
                                @endif

                                <li class="list-group-item">
                                    <p>Insurance paid:</p>
                                    ${{$renting->insurance}}
                                </li>

                                <li class="list-group-item">
                                    <p>Total Payment:</p>
                                    ${{$renting->fee}}
                                </li>
                            </ul>

                            @if($renting->return_time == null)
                                <form class="mt-3" action="{{route('return.customer')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="lease-id" value="{{$renting->lease_id}}">
                                    <a href="#" class="btn btn-primary" onclick="this.parentNode.submit(); return false;">
                                        Return
                                    </a>
                                </form>
                            @endif

                            @if($renting->return_time != null && $renting->staff_confirm == null)
                                <span class="mt-3 badge rounded-pill text-bg-info">Waiting Staff Confirmation</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
