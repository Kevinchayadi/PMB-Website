@extends('admin.layout.template')
@section('title', 'Tabel Layanan')

@section('content')
    {{-- Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Tabel Layanan</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/layanan" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
            <a href="/admin/add-layanan" class="btn btn-primary ">Tambah Layanan Baru</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($acara as $acaras)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $acaras->nama_acara }}</td>
                            <td>{{ Str::limit($acaras->deskripsi_acara, 20, '...') }}</td>

                            <td>
                                <button class="btn btn-sm btn-outline-primary"><a
                                        href="/admin/edit-layanan/{{ $acaras->slug }}" class="nav-link">Edit</a></button>
                                <form action="/admin/delete-layanan/{{ $acaras->slug }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Data layanan tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($acara->total() > 0)
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan {{ $acara->firstItem() }} sampai {{ $acara->lastItem() }} dari {{ $acara->total() }} data
                    admin
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    @if ($acara->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $acara->previousPageUrl() }}">
                                << /a>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $acara->lastPage(); $i++)
                        <li class="page-item {{ $acara->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $acara->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    @if ($acara->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $acara->nextPageUrl() }}">></a>
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
