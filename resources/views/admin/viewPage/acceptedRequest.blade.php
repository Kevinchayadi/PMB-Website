
@extends('admin.layout.template')
@section('title', 'Admin - List')

@section('content')
<div class="d-flex justify-content-end  align-items-center my-3  text-center">
    <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Accepted Request</h1>


</div>

<div class="px-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded shadow-sm">

        
        <div class="d-flex align-items-center">
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Admin..." aria-label="Search Admin">
            <button class="btn btn-outline-primary ms-2" type="button">
                search
            </button>
        </div>
    </div>


    <div class="rounded overflow-hidden shadow-sm">
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Admin</th>
                    <th scope="col">Type Request</th>
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
