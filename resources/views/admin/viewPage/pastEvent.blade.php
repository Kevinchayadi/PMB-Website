
@extends('admin.layout.template')
@section('title', 'Layanan - List')

@section('content')
<div class="d-flex justify-content-end  align-items-center my-3  text-center">
    <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Event List</h1>

</div>

<div class="px-4">
    <!-- Pagination and Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">
       <a href="/admin/add-layanan" class="btn btn-primary ">Add New Layanan</a>
        <nav>
            <ul class="pagination mb-0" id="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search...">

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
                        <button class="btn btn-sm btn-outline-primary">detail</button>

                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">detail</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>The Bird</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
