@extends('admin.layout.template')
@section('title', 'Event - List')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/event.css') }}">
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Scheduled Event</h1>
    </div>

    <div class="px-4">
        @if ($event->count() > 0)
            @foreach ($event as $data)
                <div class="px-4 py-2 my-3 mx-1 card-3d">
                    <h2>{{ $data->transaction_details->acara->nama_acara }}t</h2>
                    <div class="d-flex justify-content-between">
                        <p>{{ $data->jadwal_transaction }} </p>
                        <p>{{ $data->transaction_details->deskripsi_transaksi }}</p>
                        <div>
                            <a href="/admin/updateEvent/{{ $data->id_transaction }}">Update</a>
                            <a href="admin/deleteEvent/{{ $data->id_transaction }}">Cancel</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center fw-bolder fs-5">Data Event Masih Kosong!</div>
        @endif

    </div>
@endsection
