@extends('admin.layout.template')
@section('title', 'Detail Permintaan')

@section('content')
    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <!-- Card with white background and 3D effect -->
                    <div class="card bg-white shadow-lg rounded-4 border-0">
                        <div class="card-body text-dark">
                            <h2 class="card-title text-center mb-4 fw-bolder">Detail Admin</h2>

                            <!-- Detail Data with label and info in the same line -->
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <label class="form-label w-25">Nama Pengguna:</label>
                                <p class="form-control bg-light text-dark fw-bold w-75 mb-0">{{ $admin->name }}</p>
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <label class="form-label w-25">Kata Sandi:</label>
                                <p class="form-control bg-light text-dark fw-bold w-75 mb-0">******</p>
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <label class="form-label w-25">Peran:</label>
                                <p class="form-control bg-light text-dark fw-bold w-75 mb-0">{{ $admin->role }}</p>
                            </div>

                            <!-- Action Buttons: Reject and Accept -->
                            <div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-danger mt-2" href="/admin/reject-admin/{{ $admin->id }}">Tolak</a>
                                <a class="btn btn-success mt-2" href="/admin/accept-admin/{{ $admin->id }}">Terima</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
