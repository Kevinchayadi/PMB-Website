@extends('admin.layout.template')
@section('title', 'Layanan - List')

@section('content')
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Layanan List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/layanan" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="{{ request('search') }}"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-layanan" class="btn btn-primary ">Add New Layanan</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acara as $acaras)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $acaras->nama_acara }}</td>
                            <td>{{ Str::limit($acaras->deskripsi_acara, 20, '...') }}</td>

                            <td>
                                <button class="btn btn-sm btn-outline-primary"><a
                                        href="/admin/edit-layanan/{{ $acaras->slug }}"
                                        class="nav-link">Edit</a></button>
                                <form action="/admin/delete-layanan/{{ $acaras->slug }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
