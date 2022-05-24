@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-cols-2">
            <div class="col">
                <img src = "{{$pcDetail->picture}}"
                     class="img-fluid img-detail" alt = "{{$pcDetail->name}}">
            </div>
            <div class="col">
                <p class="fs-1">{{$pcDetail->name}}</p>
                <p class="fw-bolder pt-2">${{$pcDetail->rent}} / hour</p>
                <p class="fw-light pt-1">More than {{$pcDetail->stocks}} available</p>

                <form class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <label class="visually-hidden" for="rent-hour-select">Preference</label>
                        <select class="form-select form-select-lg mb-3" id="rent-hour-select">
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

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Rent</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <ul class="list-group">
            <li class="list-group-item">OS: {{$pcDetail->os}}</li>
            <li class="list-group-item">Display Size: {{$pcDetail->DISP_size}} inch</li>
            <li class="list-group-item">RAM: {{$pcDetail->RAM}} GB</li>
            <li class="list-group-item">USB Port Number: {{$pcDetail->USB_port_num}}</li>
            <li class="list-group-item">HDMI Port: {{$pcDetail->HDMI_port}}</li>
        </ul>

    </div>

@endsection
