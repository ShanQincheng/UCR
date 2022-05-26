@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-2">
            <div class="col-6">
                <p class="fs-1 fw-bolder text-center">Black Users</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blackUsers as $u)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->mobile}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <p class="fs-1 fw-bolder text-center">Customers</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $c)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->mobile}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
