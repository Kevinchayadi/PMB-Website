@extends('admin.layout.template')
@section('title', 'Artikel - List')

@section('content')
    {{-- Sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold p-2 text-white bg-primary shadow rounded-end-2">Artikel List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/artikel" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2"
                    value="{{ request('search') }}" placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-artikel" class="btn btn-primary">Add New Artikel</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul Artikel</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($artikel as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->body, 50, '...') }}</td>
                            <td>
                                <a href="/admin/edit-artikel/{{ $item->id }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="/admin/delete-artikel/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{-- {{ $artikel->links() }} --}}
    </div>
@endsection
