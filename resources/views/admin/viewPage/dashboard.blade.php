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


    <div class=" my-2 mx-3 d-flex justify-content-between align-items-center">
        <h1 class="fw-bold text-black">Dashboard</h1>
        <p class="text-center">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}</p>
    </div>
    <div class="row d-flex justify-content-between m-1">
        <div class=" col-md-4 py-2 px-2">
            <div class=" text-center text-white card bg-primary p-3">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">User</h3>
                <p class="fs-5">{{ $umat }} Registered</p>
            </div>
        </div>

        <div class="  col-md-4   py-2 px-2">
            <div class=" text-center text-white  card bg-primary p-3">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">Request</h3>
                <p class="fs-5">{{ $countEvent }} Request</p>
            </div>
        </div>
        <div class="col-md-4 py-2 px-2">
            <div class=" text-center text-white card bg-primary p-3">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">Registered event</h3>
                <p class="fs-5">{{ $pending }} event</p>
            </div>
        </div>
    </div>
    <div class="divider mx-2"></div>

    <div class="event mx-3 my-2">
        <div class= "px-5 d-flex justify-content-between align-items-center">
            <h1 class="fw-bold fs-4">UP COMMING EVENT</h1>
            <a href="">see all</a>
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
