@extends('admin.layout.template')
@section('title', 'Pastor - Form')

@section('content')
    <div>

    </div>
    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Pastor</h2>
                            <form action="/admin/add-pastor" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_romo" class="form-label">Nama Pastor</label>
                                    <input type="text" class="form-control" id="nama_romo" name="nama_romo"
                                        placeholder="Masukkan nama pastor" required>
                                </div>

                                <!-- dob -->
                                <div class="mb-3">
                                    <label for="DOB_romo" class="form-label">Tanggal Lahir Pastor</label>
                                    <input type="date" class="form-control" id="DOB_romo" name="DOB_romo"
                                        placeholder="Masukkan tanggal lahir pastor" required>
                                </div>

                                <!-- pob -->
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir Pastor</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Masukkan tempat lahir pastor" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Tempat Lahir Pastor</label>
                                    <select class="form-control"  name="jabatan" id="jabatan">
                                        <option value="" selected disabled>Pilih Jabatan</option>
                                        <option value="Pastor Paroki">Pastor Paroki</option>
                                        <option value="Romo Tamu">Romo Tamu</option>
                                        <option value="Pastor Pembantu Paroki">Pastor Pembantu Paroki</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Tempat Lahir Pastor</label>
                                    <textarea class="form-control"  name="Pengalaman" id="Pengalaman" cols="30" rows="10"></textarea>
                                </div>

                                <!-- nomor -->
                                <div class="mb-3">
                                    <label for="nomor" class="form-label">Nomor Telepon Pastor</label>
                                    <input type="number" class="form-control" id="nomor" name="nomor"
                                        placeholder="Masukkan nomor telepon pastor" required>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/pastor"> cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
