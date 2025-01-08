@extends('admin.layout.template')
@section('title', 'Tabel Pastor')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Tabel Pastor</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/pastor" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
            <a href="/admin/add-pastor" class="btn btn-primary ">Tambah Pastor Baru</a>
        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pastor</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pastor as $index => $romo)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $romo->nama_romo }}</td>
                            <td>{{ $romo->jabatan }}</td>
                            <td>
                                @if ($romo->deleted_at)
                                    inactive
                                @else
                                    active
                                @endif
                            </td>
                            <td>
                                <a href="/admin/edit-pastor/{{ $romo->id_romo }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.deletePastor', $romo->id_romo) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apa kamu yakin untuk menghapus pastor ini?')">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data pastor tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
