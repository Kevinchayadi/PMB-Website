@extends('admin.layout.template')
@section('title', 'Admin - Form')

@section('content')
    <style>
        .select2-container .select2-selection {
            color: #000 !important;
            background-color: #fff !important;
        }


.select2-container--default .select2-results__option--highlighted {
    background-color: #007bff !important; /* Warna biru Bootstrap */
    color: #fff !important;
}
.text-danger{
    color:red !important;
}
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Event</h2>

                            <!-- Form Start -->
                            <form action="/admin/add-admin" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Dropdown Romo -->
                                <div class="mb-3">
                                    <label for="id_romo" class="form-label">Romo </label>
                                    <select class="form-control" id="id_romo" name="id_romo" required>
                                        <option value="" class="form-control">Pilih Romo</option>
                                        @foreach($romos as $romo)
                                            <option value="{{ $romo->id }}">{{ $romo->nama_romo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Acara -->
                                <div class="mb-3">
                                    <label for="id_acara" class="form-label">Acara <span class="text-danger">*</span></label>
                                    <select class="form-control" id="id_acara" name="id_acara" required>
                                        <option value="">Pilih Acara</option>
                                        @foreach($acaras as $acara)
                                            <option value="{{ $acara->id }}">{{ $acara->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Seksi (Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_seksi" class="form-label">Seksi </label>
                                    <select class="form-control select2" id="id_seksi" name="id_seksi[]" multiple="multiple" required>
                                        <option value="">Pilih Seksi</option>
                                        @foreach($seksis as $seksi)
                                            <option value="{{ $seksi->id }}">{{ $seksi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Doa -->
                                <div class="mb-3">
                                    <label for="id_doa" class="form-label">Doa <span class="text-danger">*</span></label>
                                    <select class="form-control" id="id_doa" name="id_doa" required>
                                        <option value="">Pilih Doa</option>
                                        @foreach($doas as $doa)
                                            <option value="{{ $doa->id }}">{{ $doa->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="jadwal_transaction" class="form-label">Jadwal Acara <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" id="jadwal_transaction" name="jadwal_transaction" required>
                                    @error('jadwal_transaction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dropdown Umat (Nullable, Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_umat" class="form-label">Umat</label>
                                    <select class="form-control select2" id="id_umat" name="id_umat[]" multiple="multiple">
                                        {{-- <option value="" disabled>Pilih Umat (Optional)</option> --}}
                                        @foreach($umats as $umat)
                                            <option value="{{ $umat->id_umat }}">{{ $umat->nama_umat }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi Acara -->
                                <div class="mb-3">
                                    <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_transaksi" name="deskripsi_transaksi" rows="4" placeholder="Masukkan Deskripsi Acara (Optional)"></textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger rounded-none mt-2" href="/admin/admin-list">Cancel</a>
                                </div>
                            </form>
                            <!-- Form End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Init Select2 -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 untuk multiple select
            $('.select2').select2({
                placeholder: "Pilih Data(optional)",
                allowClear: true,
                tags: true,
                tokenSeparators: [',', ' ']
            });
        
            // Ketika opsi dipilih (select)
            $('.select2').on('select2:select', function (e) {
                var selectedValue = e.params.data.id; // Ambil ID dari opsi yang dipilih
        
                // Menonaktifkan opsi yang sudah dipilih
                $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
        
                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });
        
            // Ketika opsi dibatalkan (unselect)
            $('.select2').on('select2:unselect', function (e) {
                var unselectedValue = e.params.data.id; // Ambil ID dari opsi yang dibatalkan
        
                // Mengaktifkan kembali opsi yang di-unselect
                $(this).find('option[value="' + unselectedValue + '"]').prop('disabled', false);
        
                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });
             $('.select2').on('select2:clear', function() {
        // Mengaktifkan kembali semua opsi
        $(this).find('option').prop('disabled', false);

        // Refresh Select2 agar perubahan terlihat
        $(this).trigger('change');
    });
        });
        </script>
        

@endsection
