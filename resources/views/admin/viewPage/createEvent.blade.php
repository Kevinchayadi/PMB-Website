{{-- @extends('admin.layout.template')
@section('title', 'eventList')

@section('content')
    <style>
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <!-- Card Natal -->
            <div class="col-md-4 mb-3">
                <a href="/form-natal" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Natal</h5>
                            <p class="card-text">Perayaan kelahiran Yesus Kristus yang penuh sukacita.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Misa -->
            <div class="col-md-4 mb-3">
                <a href="/form-misa" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Misa</h5>
                            <p class="card-text">Perayaan ekaristi sebagai wujud syukur kepada Tuhan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Pengurapan -->
            <div class="col-md-4 mb-3">
                <a href="/form-pengurapan" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Pengurapan</h5>
                            <p class="card-text">Pemberian sakramen bagi orang sakit untuk memohon kekuatan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Baptis -->
            <div class="col-md-4 mb-3">
                <a href="/form-baptis" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Baptis</h5>
                            <p class="card-text">Sakramen pembaptisan sebagai tanda masuk ke dalam iman Kristen.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Sakramen Tobat -->
            <div class="col-md-4 mb-3">
                <a href="/form-sakramen-tobat" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Sakramen Tobat</h5>
                            <p class="card-text">Mendapatkan pengampunan dosa melalui pengakuan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Sakramen Komuni Pertama -->
            <div class="col-md-4 mb-3">
                <a href="/form-sakramen-komuni" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Sakramen Komuni Pertama</h5>
                            <p class="card-text">Penerimaan Tubuh Kristus untuk pertama kalinya.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection --}}

@extends('admin.layout.template')
@section('title', 'Admin - Form')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<div class="container-fluid">
    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card bg-primary shadow-lg rounded-4">
                    <div class="card-body text-white">

                        <h2 class="card-title text-center mb-4 fw-bolder">Create New Admin</h2>
                        
                        <form action="/admin/add-admin" method="POST">
                            @csrf <!-- Laravel CSRF Token -->

                            <!-- Dropdown Romo -->
                            <div class="mb-3">
                                <label for="id_romo" class="form-label">Romo</label>
                                <select class="form-control" id="id_romo" name="id_romo" required>
                                    <option value="">Pilih Romo</option>
                                    <!-- Contoh data Romo, sesuaikan dengan data dari database -->
                                    @foreach($romos as $romo)
                                        <option value="{{ $romo->id }}">{{ $romo->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown Acara -->
                            <div class="mb-3">
                                <label for="id_acara" class="form-label">Acara</label>
                                <select class="form-control" id="id_acara" name="id_acara" required>
                                    <option value="">Pilih Acara</option>
                                    <!-- Contoh data Acara, sesuaikan dengan data dari database -->
                                    @foreach($acaras as $acara)
                                        <option value="{{ $acara->id }}">{{ $acara->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown Seiki (Multiple Select2) -->
                            <div class="mb-3">
                                <label for="id_seksi" class="form-label">Seksi</label>
                                <select class="form-control select2" id="id_seksi" name="id_seksi[]" multiple="multiple">
                                    <option value="">Pilih Seksi</option>
                                    <!-- Contoh data Seksi, sesuaikan dengan data dari database -->
                                    @foreach($seksis as $seksi)
                                        <option value="{{ $seksi->id }}">{{ $seksi->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown Doa -->
                            <div class="mb-3">
                                <label for="id_doa" class="form-label">Doa</label>
                                <select class="form-control" id="id_doa" name="id_doa" required>
                                    <option value="">Pilih Doa</option>
                                    <!-- Contoh data Doa, sesuaikan dengan data dari database -->
                                    @foreach($doas as $doa)
                                        <option value="{{ $doa->id }}">{{ $doa->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tanggal -->
                            <div class="mb-3">
                                <label for="jadwal_transaction" class="form-label">Jadwal Transaksi</label>
                                <input type="date" class="form-control" id="jadwal_transaction" name="jadwal_transaction" required>
                            </div>

                            <!-- Dropdown Umat (Nullable, Multiple Select2) -->
                            <div class="mb-3">
                                <label for="id_umat" class="form-label">Umat</label>
                                <select class="form-control select2" id="id_umat" name="id_umat[]" multiple="multiple">
                                    <option value="">Pilih Umat (Optional)</option>
                                    <!-- Contoh data Umat, sesuaikan dengan data dari database -->
                                    @foreach($umats as $umat)
                                        <option value="{{ $umat->id }}">{{ $umat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Deskripsi Acara -->
                            <div class="mb-3">
                                <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara</label>
                                <textarea class="form-control" id="deskripsi_transaksi" name="deskripsi_transaksi" rows="4" placeholder="Masukkan Deskripsi Acara (Optional)"></textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger rounded-none mt-2" href="/admin/admin-list">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Init Select2 -->
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true
        });
    });
</script>

@endsection

