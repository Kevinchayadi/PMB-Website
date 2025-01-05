@extends('admin.layout.template')
@section('title', 'Doa - List')

@section('content')
    {{-- Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Doa List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/doa" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-doa" class="btn btn-primary ">Add New Doa</a>
        </div>
        @if ($doa->count() > 0)
            <div class="rounded overflow-hidden shadow-sm">
                <table class="table table-hover table-striped mb-0 text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul Doa</th>
                            <th scope="col">Deskripsi Doa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doa as $doas)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $doas->nama_doa }}</td>
                                <td>{{ Str::limit($doas->deskripsi_doa, 20) }}</td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><a
                                            href="/admin/edit-doa/{{ $doas->id_doa }}" class="nav-link">Edit</a></button>
                                    <button class="btn btn-sm btn-outline-danger"><a
                                            href="/admin/delete-doa/{{ $doas->id_doa }}"
                                            class="nav-link">Delete</a></button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif()
    </div>
@endsection