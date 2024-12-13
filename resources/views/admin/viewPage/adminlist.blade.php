
@extends('admin.layout.template')
@section('title', 'Admin - List')

@section('content')
<div class="d-flex justify-content-end  align-items-center my-3  text-center">
    <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Admin List</h1>

</div>

<div class="px-4">
    <!-- Pagination and Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">
       <a href="/admin/add-admin" class="btn btn-primary ">Add New Admin</a>
        

        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search...">

    </div>

    <!-- Table -->
    <div class="rounded overflow-hidden shadow-sm">
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    {{-- <th scope="col">ID Admin</th> --}}
                    <th scope="col">Username</th>
                    {{-- <th scope="col">Password</th> --}}
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $index => $admin)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        {{-- <td>{{ $admin->id }}</td> --}}
                        <td>{{ $admin->username }}</td>
                        {{-- <td>{{ $admin->password }}</td> --}}
                        <td>{{ $admin->roles->role }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if ($admins->total() > 0)
    <div class="mt-1 text-center">
        <small class="text-muted">
            Show {{ $admins->firstItem() }} until {{ $admins->lastItem() }} from {{ $admins->total() }} data admin
        </small>
    </div>
    <nav class="mt-2">
        <ul class="pagination justify-content-center mb-0" id="pagination">
            <!-- Previous Button -->
            @if ($admins->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#"><</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $admins->previousPageUrl() }}"><</a>
                </li>
            @endif

            <!-- Page Numbers -->
            @for ($i = 1; $i <= $admins->lastPage(); $i++)
                <li class="page-item {{ $admins->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $admins->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            <!-- Next Button -->
            @if ($admins->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $admins->nextPageUrl() }}">></a>
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
@endsection
