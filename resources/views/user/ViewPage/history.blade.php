@extends('user.Layout.template')
@section('title', 'Histori')
@section('content')
    <div class="container-fluid row mx-auto">
        <div class="col-12 mb-3">
            <div class="title fs-5 fw-bolder">Histori Permintaan</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Permintaan</th>
                        <th scope="col">Tanggal Permintaan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal_acara as $history)
                        <tr>
                            <th scope="row">$loop->iteration</th>
                            <td>$history->judul</td>
                            <td>$history->jadwal_transaction</td>
                            <td>$history->status</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data histori tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($jadwal_acara->total() > 0)
                <div class="mt-1 text-center">
                    <small class="text-muted">
                        Tampilkan {{ $jadwal_acara->firstItem() }} sampai {{ $jadwal_acara->lastItem() }} dari
                        {{ $jadwal_acara->total() }}
                        data permintaan
                    </small>
                </div>
                <nav class="mt-2">
                    <ul class="pagination justify-content-center mb-0" id="pagination">
                        <!-- Previous Button -->
                        @if ($jadwal_acara->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    < </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $jadwal_acara->previousPageUrl() }}">
                                    << /a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @for ($i = 1; $i <= $jadwal_acara->lastPage(); $i++)
                            <li class="page-item {{ $jadwal_acara->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $jadwal_acara->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Button -->
                        @if ($jadwal_acara->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $jadwal_acara->nextPageUrl() }}">></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">></a>
                            </li>
                        @endif
                    </ul>
                </nav>

            @endif
        </div>
    </div>
@endsection
