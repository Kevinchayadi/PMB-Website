@extends('admin.layout.template')
@section('title', 'Tabel Kegiatan')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Tabel Kegiatan</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/layanan" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
            <a href="/admin/add-kegiatan" class="btn btn-primary ">Tambah Kegiatan Baru</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal Kegiatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatan as $kegiatans)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kegiatans->title }}</td>
                            <td>{{ $kegiatans->description }}</td>
                            <td>{{ $kegiatans->date }}</td>

                            <td>
                                <button class="btn btn-sm btn-outline-primary"><a
                                        href="/admin/edit-kegiatan/{{ $kegiatans->id }}" class="nav-link">Edit</a></button>
                                <form action="/admin/delete-kegiatan/{{ $kegiatans->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apa kamu yakin untuk menghapus kegiatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Data kegiatan tidak ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($kegiatan->total() > 0)
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan {{ $kegiatan->firstItem() }} sampai {{ $kegiatan->lastItem() }} dari {{ $kegiatan->total() }} data
                    admin
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    @if ($kegiatan->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $kegiatan->previousPageUrl() }}">
                                << /a>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $kegiatan->lastPage(); $i++)
                        <li class="page-item {{ $kegiatan->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $kegiatan->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    @if ($kegiatan->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $kegiatan->nextPageUrl() }}">></a>
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
