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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous">
    </script>
@endpush
