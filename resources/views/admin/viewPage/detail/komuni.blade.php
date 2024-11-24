@extends('admin.layout.template')
@section('title', 'Admin - Detail')

@section('content')
<div class="container-fluid">
    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card bg-primary shadow-lg rounded-4">
                    <div class="card-body text-white">
                        <h2 class="card-title text-center mb-4 fw-bolder">Detail Admin</h2>
                        
                        <!-- Detail Data -->
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <p class="form-control bg-light text-dark">{{ $admin->name }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <p class="form-control bg-light text-dark">******</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role:</label>
                            <p class="form-control bg-light text-dark">{{ $admin->role }}</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-grid">
                            <a class="btn btn-success mt-2" href="/admin/edit-admin/{{ $admin->id }}">Edit</a>
                            <a class="btn btn-danger mt-2" href="/admin/admin-list">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
