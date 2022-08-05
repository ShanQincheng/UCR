@extends('layouts.app')
@section('content')
    @if ($sentInfo != '' )
        <div class="alert alert-success"> {{$sentInfo}} </div>
    @endif

    <form class="row g-3" method="POST" action="{{route('email.send')}}">
    @csrf
        <div class="container-fluid">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Email subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Email content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </div>
    </form>
@endsection
