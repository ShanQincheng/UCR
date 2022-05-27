@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class="col-9" id="home-welcome-box">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/urc-homepage-welcome-pic-3.png" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/urc-homepage-welcome-pic-2.png" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/urc-homepage-welcome-pic-5.png" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-3">
                @guest
                    @include('layouts.login-form')
                @endguest

                @auth
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Welcome Back</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h6>
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    @include('layouts.computer')
@endsection

