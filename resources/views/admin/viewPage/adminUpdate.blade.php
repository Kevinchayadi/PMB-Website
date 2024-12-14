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

                            <h2 class="card-title text-center mb-4 fw-bolder">Admin Detail</h2>
                            <form action="" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">username</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama Anda" value="{{$admin->username}}" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">changes password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan password" >
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role">
                                    @foreach( $roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role', $admin->role_id) == $role->id ? 'selected' : '' }}>
                                            {{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
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
