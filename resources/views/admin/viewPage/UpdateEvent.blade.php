@extends('admin.layout.template')
@section('title', 'Edit Transaksi')

@section('content')
    <style>
        .select2-container .select2-selection {
            background-color: #fff !important;
            color: #000 !important;
        }
 

        .select2-container--default .select2-results__option--highlighted {
            background-color: #007bff !important;
            /* Warna biru Bootstrap */
            color: #fff !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Transaksi</h2>

                            <!-- Form Start -->
                            <form action="{{ route('admin.updateTransaction', $transaction->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Metode PUT untuk update -->

                                <!-- Dropdown Romo -->
                                <div class="mb-3">
                                    <label for="id_romo" class="form-label">Romo</label>
                                    <select class="form-control" id="id_romo" name="id_romo" required>
                                        <option value="">Pilih Romo</option>
                                        @foreach ($romos as $romo)
                                            <option value="{{ $romo->id }}"
                                                {{ $transaction->id_romo == $romo->id ? 'selected' : '' }}>
                                                {{ $romo->nama_romo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Acara -->
                                <div class="mb-3">
                                    <label for="id_acara" class="form-label">Acara</label>
                                    <select class="form-control" id="id_acara" name="id_acara" required>
                                        <option value="">Pilih Acara</option>
                                        @foreach ($acaras as $acara)
                                            <option value="{{ $acara->id }}"
                                                {{ $transaction->id_acara == $acara->id ? 'selected' : '' }}>
                                                {{ $acara->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Seksi (Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_seksi" class="form-label">Seksi</label>
                                    <select class="form-control select2" id="id_seksi" name="id_seksi[]"
                                        multiple="multiple" required>
                                        @foreach ($seksis as $seksi)
                                            <option value="{{ $seksi->id }}"
                                                {{ in_array($seksi->id, $transaction->seksis->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $seksi->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dropdown Doa -->
                                <div class="mb-3">
                                    <label for="id_doa" class="form-label">Doa</label>
                                    <select class="form-control" id="id_doa" name="id_doa" required>
                                        <option value="">Pilih Doa</option>
                                        @foreach ($doas as $doa)
                                            <option value="{{ $doa->id }}"
                                                {{ $transaction->id_doa == $doa->id ? 'selected' : '' }}>
                                                {{ $doa->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="jadwal_transaction" class="form-label">Jadwal Transaksi</label>
                                    <input type="date" class="form-control" id="jadwal_transaction"
                                        name="jadwal_transaction" value="{{ $transaction->jadwal_transaction }}" required>
                                </div>

                                <!-- Dropdown Umat (Nullable, Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_umat" class="form-label">Umat</label>
                                    <select class="form-control select2" id="id_umat" name="id_umat[]"
                                        multiple="multiple">
                                        @foreach ($umats as $umat)
                                            <option value="{{ $umat->id_umat }}"
                                                {{ in_array($umat->id_umat, $transaction->umats->pluck('id_umat')->toArray()) ? 'selected' : '' }}>
                                                {{ $umat->nama_umat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi Acara -->
                                <div class="mb-3">
                                    <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara</label>
                                    <textarea class="form-control" id="deskripsi_transaksi" name="deskripsi_transaksi" rows="4" required>{{ $transaction->deskripsi_transaksi }}</textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
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
            $('.select2').each(function() {
                var selectedValues = $(this).val(); // Ambil nilai opsi yang dipilih (array)
                selectedValues.forEach(function(value) {
                    $(this).find('option[value="' + value + '"]').prop('disabled', true);
                }.bind(this));

                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });

            // Ketika opsi dipilih (select)
            $('.select2').on('select2:select', function(e) {
                var selectedValue = e.params.data.id; // Ambil ID dari opsi yang dipilih

                // Menonaktifkan opsi yang sudah dipilih
                $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);

                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });

            // Ketika opsi dibatalkan (unselect)
            $('.select2').on('select2:unselect', function(e) {
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
