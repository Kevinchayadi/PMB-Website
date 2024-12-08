
@extends('admin.layout.template')
@section('title', 'Layanan - List')

@section('content')
<div class="d-flex justify-content-end  align-items-center my-3  text-center">
    <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Layanan List</h1>

</div>

<div class="px-4">
    <!-- Pagination and Search -->
    <div class="px-4 py-2 my-3 mx-1 card-3d">
        <h2>nama Event</h2>
        <div class="d-flex justify-content-between">
            <p>deskripsi event</p>
            <div>
                <a href="">Update</a>
                <a href="">cancle</a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="rounded overflow-hidden shadow-sm">
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">nama layanan</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>The Bird</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
