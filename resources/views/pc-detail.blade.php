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
                <p class="fs-1">{{$pcDetail->name}}</p>
                <p class="fw-bolder pt-2">
                    ${{$pcDetail->rent}} / hour + $50 mandatory deposit fee + $10 optional insurance
                </p>
                <p class="fw-light pt-1">More than {{$pcDetail->stocks}} available</p>

                <form class="row row-cols-lg-auto g-3 align-items-center my-5"
                      method="POST" action="{{route('rent.rental')}}">
                    @csrf
                    <div class="col-12">
                        <input type="hidden" name="computer-id" value="{{$pcDetail->id}}">
                        <input type="hidden" name="rent" value="{{$pcDetail->rent}}">
                        <select class="form-select form-select-lg mb-3" id="period" name="period">
                            <option selected>Choose rent period</option>
                            <option value="1.5">1.5</option>
                            <option value="2.0">2.0</option>
                            <option value="2.5">2.5</option>
                            <option value="3.0">3.0</option>
                            <option value="3.5">3.5</option>
                            <option value="4.0">4.0</option>
                            <option value="4.5">4.5</option>
                            <option value="5.0">5.0</option>
                        </select>

                        <label class="form-check-label" for="insurance">insurance</label>
                        <input class="form-check-input" type="checkbox" id="insurance" name="insurance">

                        <button type="submit" class="btn btn-primary ms-3">Rent</button>
                    </div>
                </form>
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
