@extends('admin.layout.template')
@section('title', 'Tabel Artikel')

@section('content')
    {{-- Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold p-2 text-white bg-primary shadow rounded-end-2">Tabel Artikel</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/artikel" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
            <a href="/admin/add-artikel" class="btn btn-primary">Tambah Artikel Baru</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul Artikel</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($artikel as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->body, 50, '...') }}</td>
                            <td>
                                <a href="/admin/edit-artikel/{{ $item->id }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="/admin/delete-artikel/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apa kamu yakin untuk menghapus artikel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data artikel tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($artikel->total() > 0)
                <div class="mt-1 text-center">
                    <small class="text-muted">
                        Tampilkan {{ $artikel->firstItem() }} sampai {{ $artikel->lastItem() }} dari {{ $artikel->total() }}
                        data
                        artikel
                    </small>
                </div>
                <nav class="mt-2">
                    <ul class="pagination justify-content-center mb-0" id="pagination">
                        <!-- Previous Button -->
                        @if ($artikel->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    < </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $artikel->previousPageUrl() }}">
                                    << /a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @for ($i = 1; $i <= $artikel->lastPage(); $i++)
                            <li class="page-item {{ $artikel->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $artikel->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Button -->
                        @if ($artikel->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $artikel->nextPageUrl() }}">></a>
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
    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{-- {{ $artikel->links() }} --}}
    </div>
@endsection
