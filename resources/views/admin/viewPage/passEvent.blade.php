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
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $data->id_transaction }}">
                            Detail
                        </button>
                        </td>
                    </tr>
                    //modal detail
                    <div class="modal fade" id="detailModal{{ $data->id_transaction }}" tabindex="-1"
                        aria-labelledby="detailModalLabel{{ $data->id_transaction }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $data->id_transaction }}">Detail Acara
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>judul:</strong> {{ $data->judul }}</p>
                                    <p><strong>Romo:</strong> {{ $data->romo->nama_romo }}</p>
                                    <p><strong>Acara:</strong> {{ $data->transactionDetails->acara->nama_acara }}</p>
                                    <p><strong>Doa</strong> {{ $data->doa->nama_doa }}</p>
                                    <p><strong>jadwal Transaksi</strong> {{ $data->jadwal_transaction }}</p>
                                    <p><strong>Deskripsi:</strong> {{ $data->transactionDetails->deskripsi_transaksi }}</p>
                                </div>
                                <div class="modal-footer">
                                    {{-- <form method="POST" action="{{ route('admin.request.proccess', $data->id_transaction) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-success">Terima</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5">Data acara tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($event->total() > 0)
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan {{ $event->firstItem() }} sampai {{ $event->lastItem() }} dari {{ $event->total() }} data
                    admin
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    @if ($event->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $event->previousPageUrl() }}">
                                << /a>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $event->lastPage(); $i++)
                        <li class="page-item {{ $event->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $event->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    @if ($event->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $event->nextPageUrl() }}">></a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="#">></a>
                        </li>
                    @endif
                </ul>
            </nav>

        @endif
        {{-- @else
            <div class="text-center fw-bolder fs-5">Data Event Masih Kosong!</div>
        @endif --}}

    </div>
@endsection
