@extends('layouts.app')
@section('content')
    @if (session('warningMsg'))
        <div class="alert alert-warning"> {{session('warningMsg')}} </div>
    @endif

    <div class="container">
        <p class="fs-1 fw-bolder text-center">Computer Management</p>

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-pc-modal">
            Add a new computer</button>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Picture</th>
                <th scope="col">Rent</th>
                <th scope="col">Stocks</th>
                <th scope="col">OS</th>
                <th scope="col">Display Size</th>
                <th scope="col">RAM</th>
                <th scope="col">USB Port Number</th>
                <th scope="col">HDMI Port Number</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($computers as $pc)
                <input type="hidden" id="id-pc-{{$loop->index}}" value="{{$pc->id}}">
                <tr>
                    <th scope="row">
                        {{$loop->index + 1}}
                    </th>
                    <td id="name-pc-{{$loop->index}}">
                        {{$pc->name}}
                    </td>
                    <td id="type-pc-{{$loop->index}}">
                        {{$pc->type}}
                    </td>
                    <td id="brand-pc-{{$loop->index}}">
                        {{$pc->brand}}
                    </td>
                    <td>
                        <img id="pic-pc-{{$loop->index}}"
                            src="{{$pc->picture}}" class="img-fluid rounded" alt = "{{$pc->name}}">
                    </td>
                    <td id="rent-pc-{{$loop->index}}">
                        {{$pc->rent}}
                    </td>
                    <td id="stocks-pc-{{$loop->index}}">
                        {{$pc->stocks}}
                    </td>
                    <td id="os-pc-{{$loop->index}}">
                        {{$pc->os}}
                    </td>
                    <td id="disp-size-pc-{{$loop->index}}">
                        {{$pc->DISP_size}}
                    </td>
                    <td id="ram-pc-{{$loop->index}}">
                        {{$pc->RAM}}
                    </td>
                    <td id="usb-port-num-pc-{{$loop->index}}">
                        {{$pc->USB_port_num}}
                    </td>
                    <td id="hdmi-port-num-pc-{{$loop->index}}">
                        {{$pc->HDMI_port}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#edit-pc-modal"
                                value="{{$loop->index}}" onclick="editPC(this.value)">Edit</button>
                        <button type="button" class="btn btn-danger m-2"
                                value="{{$pc->id}}" onclick="deletePC(this.value)">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('manager.add-computer-modal')
    @include('manager.edit-computer-modal')
@endsection

@push('scripts')
    <script src="{{ asset('js/manage-computers.js?version=6') }}"></script>
@endpush
