@extends('admin.layout.template')
@section('title', 'Pastor - List')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Pastor List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/pastor" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-pastor" class="btn btn-primary ">Add New Pastor</a>
        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pastor</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pastor as $index => $romo)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $romo->nama_romo }}</td>
                            <td>{{ $romo->jabatan }}</td>
                            <td>
                                <a href="/admin/edit-pastor/{{ $romo->id_romo }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="/admin/delete-pastor/{{ $romo->id_romo }}" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this pastor?');">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
