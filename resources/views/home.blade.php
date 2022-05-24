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

    <div class="mt-4 container-md" id="search-module">
        <div class="row">
            <form>
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Computer Band, like: Apple"
                           aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary">search</button>
                </div>
            </form>
        </div>
        <div class="row text-center">
            <div class="col gy-3">
                <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/iMac.jpeg"
                     class="img-fluid img-detail" alt = "New iMac">
                <h2>New iMac</h2>
                <p class="small-gap">Apple M1 chip, 256GB SSD, 8GB unified memory, 24-inch, Blue</p>
                <p class="small-gap">$5 / day</p>
            </div>
            <div class="col gy-3">
                <img src = "https://cdn.jsdelivr.net/gh/cat-imado/imado-s-live@main/UTAS/iMac-Older.jpeg"
                     class="img-fluid img-detail" alt = "iMac 2018">
                <h2>iMac 2018</h2>
                <p class="small-gap">Intel Core i5, 1T SSD, 32GB memory, 27-inch, Silver</p>
                <p class="small-gap">$5 / day</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous">
    </script>
@endpush
