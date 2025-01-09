@extends('admin.layout.template')
@section('title', 'Tabel Acara Yang Telah Berlalu')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/event.css') }}">
    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Acara Yang Telah Berlalu</h1>

    </div>

    <div class="rounded overflow-hidden shadow-sm mx-5">
        {{-- @if ($event->count() > 0) --}}
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul Acara</th>
                    <th scope="col">Nama Acara</th>
                    <th scope="col">Jadwal Acara</th>
                    <th scope="col">Deskripsi Acara</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($event as $index => $data)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $data->judul }}</td> <!-- Nama data -->
                        <td>{{ $data->transactionDetails->acara->nama_acara }}</td> <!-- Nama Acara -->
                        <td>{{ $data->jadwal_transaction }}</td> <!-- Jadwal -->
                        <td>{{ $data->transactionDetails->deskripsi_transaksi }}</td> <!-- Deskripsi -->
                        <td>
                            <!-- Update Button -->
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Data acara tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- @else
            <div class="text-center fw-bolder fs-5">Data Event Masih Kosong!</div>
        @endif --}}

    </div>
@endsection
