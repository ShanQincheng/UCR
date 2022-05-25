@extends('layouts.app')
@section('content')
    @if (session('warningMsg'))
        <div class="alert alert-warning"> {{session('warningMsg')}} </div>
    @endif

    <div class="container">
        <div class="row row-cols-2">
            <div class="col">
                <img src = "{{$pcDetail->picture}}"
                     class="img-fluid img-detail" alt = "{{$pcDetail->name}}">
            </div>
            <div class="col">
                <p class="fs-1 text-success">Rent Success</p>
                <p class="fs-2">{{$pcDetail->name}}</p>

                <ul class="list-group">
                    <li class="list-group-item"><p>Rental Start Time:</p> {{date('Y-m-d H:i:s', $lease->start_time)}}</li>
                    <li class="list-group-item text-danger"><p class="fw-bolder">Should Return Before:</p> {{date('Y-m-d H:i:s', $lease->end_time)}}</li>
                    <li class="list-group-item"><p>Insurance paid:</p> ${{$lease->insurance}}</li>
                    <li class="list-group-item"><p>Total Payment:</p> ${{$lease->fee}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <ul class="list-group">
            <li class="list-group-item"><p class="fw-bolder">OS:</p> {{$pcDetail->os}}</li>
            <li class="list-group-item"><p class="fw-bolder">Display Size:</p> {{$pcDetail->DISP_size}} inch</li>
            <li class="list-group-item"><p class="fw-bolder">RAM:</p> {{$pcDetail->RAM}} GB</li>
            <li class="list-group-item"><p class="fw-bolder">USB Port Number:</p> {{$pcDetail->USB_port_num}}</li>
            <li class="list-group-item"><p class="fw-bolder">HDMI Port:</p> {{$pcDetail->HDMI_port}}</li>
        </ul>
    </div>

@endsection
