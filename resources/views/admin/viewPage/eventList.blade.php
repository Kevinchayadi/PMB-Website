@extends('admin.layout.template')
@section('title', 'Event - List')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/event.css') }}">

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Scheduled Event</h1>

    </div>

    <div class="rounded overflow-hidden shadow-sm mx-5">
        {{-- @if($event->count() > 0) --}}
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Nama Acara</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($event as $index => $data)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $data->judul }}</td> <!-- Nama data -->
                            <td>{{ $data->transactionDetails->acara->nama_acara }}</td> <!-- Nama Acara -->
                            <td>{{ $data->jadwal_transaction }}</td> <!-- Jadwal -->
                            <td>{{ $data->transactionDetails->deskripsi_transaksi }}</td> <!-- Deskripsi -->
                            <td>
                                <!-- Update Button -->
                                <a href="/admin/updateEvent/{{$data->id_transaction}}" class="btn btn-sm btn-outline-primary">Update</a>
                                <a href="/admin/selesaiEvent/{{$data->id_transaction}}" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan event ini?');" class="btn btn-sm btn-outline-success">Selesai</a>
    
                                <!-- Delete Button with confirmation -->
                                <form action="{{ route('admin.delete.transaksi', $data->id_transaction) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                        Delete
                                    </button>
                                </form>
    
                                <!-- Selesai Button -->
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No data available.</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
        {{-- @else
            <div class="text-center fw-bolder fs-5">Data Event Masih Kosong!</div>
        @endif --}}

    </div>
@endsection
