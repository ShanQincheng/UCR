@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Student</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number</h6>
                        <p class="card-text">{{$studentNum}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Staff</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number</h6>
                        <p class="card-text">{{$staffNum}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Web Manager</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number</h6>
                        <p class="card-text">{{$adminNum}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Black User</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number</h6>
                        <p class="card-text">{{$blackUserNum}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Computers</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number</h6>
                        <p class="card-text">{{$computersNum}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Renting</h5>
                        <h6 class="card-subtitle mb-2 text-muted">number of computers have not returned yet</h6>
                        <p class="card-text">{{$rentingComputersNum}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection
