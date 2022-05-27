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
                        <th scope="col">Operation</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blackUsers as $u)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$u->first_name.' '.$u->last_name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->mobile}}</td>
                            <td>
                                <form action="{{route('blackUser.remove.users.admin.manager')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$u->id}}" name="black-user-id">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <p class="fs-1 fw-bolder text-center">Staff / Customers</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Privilege</th>
                        <th scope="col">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$u->first_name.' '.$u->last_name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->mobile}}</td>
                            <td>{{$u->privilege_name}}</td>
                            <td>
                                @if($u->privilege_name == 'customer')
                                    <form action="{{route('staff.add.users.admin.manager')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$u->id}}" name="customer-id">
                                        <button type="submit" class="btn btn-danger">Add Staff</button>
                                    </form>
                                @endif

                                @if($u->privilege_name == 'staff')
                                    <form action="{{route('staff.remove.users.admin.manager')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$u->id}}" name="staff-id">
                                        <button type="submit" class="btn btn-warning">Remove Staff</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
