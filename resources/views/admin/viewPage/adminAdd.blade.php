@extends('admin.layout.template')
@section('title', 'Admin - Form')

@section('content')
<div>

</div>
    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Admin</h2>
                            <form action="/admin/add-admin" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">username</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama Admin" required>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/admin-list"> cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
