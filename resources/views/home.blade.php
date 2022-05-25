@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class="col-9" id="home-welcome-box">
                <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/UCR-Rental-Main-Page-Welcome-Picture.png"
                     class="img-fluid" id="home-welcome-pic" alt = "UCR Rental Welcome Picture">
            </div>
            <div class="col-3">
                @include('layouts.login-form')
            </div>
        </div>
    </div>

    @include('layouts.computer')
@endsection

