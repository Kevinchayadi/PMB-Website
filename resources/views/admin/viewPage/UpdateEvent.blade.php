@extends('admin.layout.template')
@section('title', 'Form Pembaruan Data Acara')

@section('content')
    <style>
        .select2-container .select2-selection {
            color: #000 !important;
            background-color: #fff !important;
        }

        .select2-container--default .select2-results__option--highlighted {
            background-color: #007bff !important;
            /* Warna biru Bootstrap */
            color: #fff !important;
        }

        .text-danger {
            color: red !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">
                            <h2 class="card-title text-center mb-4 fw-bolder">Perbarui Data Acara</h2>

                            <!-- Form Start -->
                            {{-- {{ dd($event->id_transaction)}} --}}
                            <form action="/admin/updateEvent/{{ $event->id_transaction }}" method="POST">
                                @csrf <!-- Laravel CSRF Token -->
                                @method('PUT') <!-- Laravel method spoofing for PUT request -->
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        id="judul" name="judul" value="{{ old('judul', $event->judul) }}"
                                        placeholder="Masukkan Judul Acara" required>
                                    @error('judul')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <input type="hidden" name="id_admin" value="{{ $event->transactionDetails->id_admin }}">

                                <!-- Dropdown Romo -->
                                <div class="mb-3">
                                    <label for="id_romo" class="form-label">Romo</label>
                                    <select class="form-control @error('id_romo') is-invalid @enderror" id="id_romo"
                                        name="id_romo" required>
                                        <option value="" disabled>Pilih Romo</option>
                                        @foreach ($romos as $romo)
                                            <option value="{{ $romo->id_romo }}"
                                                {{ old('id_romo', $event->id_romo) == $romo->id_romo ? 'selected' : '' }}>
                                                {{ $romo->nama_romo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_romo')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dropdown Acara -->
                                <div class="mb-3">
                                    <label for="id_acara" class="form-label">Acara <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control @error('id_acara') is-invalid @enderror" id="id_acara"
                                        name="id_acara" required>
                                        <option value="" disabled>Pilih Acara</option>
                                        @foreach ($acaras as $acara)
                                            <option value="{{ $acara->id_acara }}"
                                                {{ old('id_acara', $event->id_acara) == $acara->id_acara ? 'selected' : '' }}>
                                                {{ $acara->nama_acara }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_acara')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dropdown Seksi -->
                                <div class="mb-3">
                                    <label for="id_seksi" class="form-label">Seksi</label>
                                    <select class="form-control select2 @error('id_seksi') is-invalid @enderror"
                                        id="id_seksi" name="id_seksi[]" multiple="multiple">
                                        @foreach ($seksis as $seksi)
                                            <option value="{{ $seksi->id }}"
                                                {{ in_array($seksi->id, old('id_seksi', $event->seksis->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $seksi->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_seksi')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dropdown Doa -->
                                <div class="mb-3">
                                    <label for="id_doa" class="form-label">Doa <span class="text-danger">*</span></label>
                                    <select class="form-control @error('id_doa') is-invalid @enderror" id="id_doa"
                                        name="id_doa" required>
                                        <option value="" disabled>Pilih Doa</option>
                                        @foreach ($doas as $doa)
                                            <option value="{{ $doa->id_doa }}"
                                                {{ old('id_doa', $event->id_doa) == $doa->id_doa ? 'selected' : '' }}>
                                                {{ $doa->nama_doa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_doa')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="jadwal_transaction" class="form-label">Jadwal Transaksi <span
                                            class="text-danger">*</span></label>
                                    <input type="datetime-local"
                                        class="form-control @error('jadwal_transaction') is-invalid @enderror"
                                        id="jadwal_transaction" name="jadwal_transaction"
                                        value="{{ old('jadwal_transaction', $event->jadwal_transaction ? $event->jadwal_transaction->format('Y-m-d\TH:i') : now()->addDay()->format('Y-m-d\TH:i')) }}"
                                        required>
                                    @error('jadwal_transaction')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Dropdown Umat -->
                                <div class="mb-3">
                                    <label for="id_umat" class="form-label">Umat</label>
                                    <select class="form-control select2 @error('id_umat') is-invalid @enderror"
                                        id="id_umat" name="id_umat[]" multiple="multiple">
                                        @foreach ($umats as $umat)
                                            <option value="{{ $umat->id_umat }}"
                                                {{ in_array($umat->id_umat, old('id_umat', $event->transactionDetails->umats->pluck('id_umat')->toArray())) ? 'selected' : '' }}>
                                                {{ $umat->nama_umat }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_umat')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi Acara -->
                                <div class="mb-3">
                                    <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara </label>
                                    <textarea class="form-control @error('deskripsi_transaksi') is-invalid @enderror" id="deskripsi_transaksi"
                                        name="deskripsi_transaksi" rows="4">{{ old('deskripsi_transaksi', $event->transactionDetails->deskripsi_transaksi) }}</textarea>
                                    @error('deskripsi_transaksi')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Perbarui Data</button>
                                    <a class="btn btn-danger rounded-none mt-2" href="/admin/admin-list">Batal</a>
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
            $('.select2').each(function() {
                var selectedValues = $(this).val(); // Ambil nilai yang sudah dipilih
                $(this).find('option').each(function() {
                    if ($.inArray($(this).val(), selectedValues) !== -1) {
                        $(this).prop('disabled', true); // Nonaktifkan yang sudah dipilih
                    }
                });
            });

            // Menonaktifkan opsi yang sudah dipilih
            $('.select2').on('select2:select', function(e) {
                var selectedValue = e.params.data.id;
                $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
                $(this).trigger('change');
            });

            // Menonaktifkan opsi yang dibatalkan
            $('.select2').on('select2:unselect', function(e) {
                var unselectedValue = e.params.data.id;
                $(this).find('option[value="' + unselectedValue + '"]').prop('disabled', false);
                $(this).trigger('change');
            });

            // Pastikan semua opsi aktif saat form dikirim
            $('form').on('submit', function() {
                $('.select2 option').prop('disabled', false);
            });

            // Menghapus disable pada semua opsi ketika clear
            $('.select2').on('select2:clear', function() {
                $(this).find('option').prop('disabled', false);
                $(this).trigger('change');
            });
        });
    </script>
@endsection



{{-- <div class="mb-3">
    <label for="jadwal_transaction" class="form-label">Jadwal Transaksi <span
            class="text-danger">*</span></label>
    <input type="datetime-local"
        class="form-control @error('jadwal_transaction') is-invalid @enderror"
        id="jadwal_transaction" name="jadwal_transaction"
        value="{{ old('jadwal_transaction', $transaction->jadwal_transaction ? $transaction->jadwal_transaction->format('Y-m-d\TH:i') : now()->addDay()->format('Y-m-d\TH:i')) }}"
        required>
    @error('jadwal_transaction')
        <div class="invalid-feedback text-danger">{{ $message }}</div>
    @enderror
</div> --}}
