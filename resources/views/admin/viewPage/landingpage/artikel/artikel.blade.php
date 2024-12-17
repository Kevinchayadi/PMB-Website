@extends('admin.layout.template')
@section('title', 'Artikel - List')

@section('content')
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Artikel List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/artikel" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="{{ request('search') }}"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-artikel" class="btn btn-primary ">Add New Artikel</a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Artikel A</td>
                        <td>Lorem Ipsum sjslslasalks ....</td>

                        <td>
                            <button class="btn btn-sm btn-outline-primary"><a href="/admin/edit-artikel/1"
                                    class="nav-link">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="/admin/delete-artikel/1"
                                    class="nav-link">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
