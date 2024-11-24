@extends('admin.layout.template')
@section('title', 'Dashboard')
{{-- @section('content')
<div ></div>
<div class="" style="min-height: 1000px">
    <h1>test</h1>
</div>
@endsection --}}


@section('content')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">




<div class="event mx-3 my-2">
    <div class= "px-5 d-flex justify-content-between align-items-center">
        <h1 class="fw-bold fs-4">UP COMMING EVENT</h1>
    </div>
    <div class="px-4 py-2 my-3 mx-1 card-3d">
        <h2>nama Event</h2>
        <div class="d-flex justify-content-between">
            <p>deskripsi event</p>
            <div>
                <a href="">detail</a>
                <a href="">cancle</a>
            </div>
        </div>
    </div>
    <div class="px-4 py-2 my-3 mx-1 card-3d">
        <h2>nama Event</h2>
        <div class="d-flex justify-content-between">
            <p>deskripsi event</p>
            <div>
                <a href="">Update</a>
                <a href="">cancle</a>
            </div>
        </div>
    </div>
</div>


@endsection
