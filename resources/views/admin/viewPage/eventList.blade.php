@extends('admin.layout.template')
@section('title', 'Event - List')

@section('content')
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/admin/event.css') }}">

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Scheduled Event</h1>
    </div>

    <div class="btn btn-primary mx-5 mb-3" data-bs-toggle="modal" data-bs-target="#uploadexcelmodal">Upload File Excel</div>

    <div class="modal fade" id="uploadexcelmodal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog
        modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Upload Event</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Upload button --}}
                    <div class="btn btn-outline-primary upload-area w-100 p-5 mb-3" style="border: 2px dashed !important">
                        <label for="uploadfile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                                class="bi bi-upload" viewBox="0 0 16 16">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                            </svg>
                            <div class="fs-5">Upload file di sini</div>
                        </label>
                        <input type="file" id="uploadfile" accept=".xlsx, .xls" />
                    </div>

                    {{-- Template and Submit --}}
                    <div class="d-flex row">
                        <div class="col-6">
                            <div class="btn btn-outline-warning w-100" onclick="downloadTemplate()">Download Template</div>
                        </div>
                        <div class="col-6">
                            <div class="btn btn-outline-success w-100">Submit Excel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded overflow-hidden shadow-sm mx-5">
        {{-- @if ($event->count() > 0) --}}
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Event</th>
                    <th scope="col">Nama Acara</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($event as $index => $data)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $data->judul }}</td> <!-- Nama data -->
                        <td>{{ $data->transactionDetails->acara->nama_acara }}</td> <!-- Nama Acara -->
                        <td>{{ $data->jadwal_transaction }}</td> <!-- Jadwal -->
                        <td>{{ $data->transactionDetails->deskripsi_transaksi }}</td> <!-- Deskripsi -->
                        <td>
                            <!-- Update Button -->
                            <a href="/admin/updateEvent/{{ $data->id_transaction }}"
                                class="btn btn-sm btn-outline-primary">Update</a>
                            <a href="/admin/selesaiEvent/{{ $data->id_transaction }}"
                                onclick="return confirm('Apakah Anda yakin ingin menyelesaikan event ini?');"
                                class="btn btn-sm btn-outline-success">Selesai</a>

                            <!-- Delete Button with confirmation -->
                            <form action="{{ route('admin.delete.transaksi', $data->id_transaction) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                    Delete
                                </button>
                            </form>

                            <!-- Selesai Button -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No data available.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{-- @else
            <div class="text-center fw-bolder fs-5">Data Event Masih Kosong!</div>
        @endif --}}
    </div>

    <script>
        function downloadTemplate() {
            window.location.href = "/admin/exportEventTemplate";
        }
    
        function submitExcel() {
            let fileInput = document.getElementById('uploadfile');
            if (fileInput.files.length == 0) {
                alert("Silakan pilih file sebelum mengirim.");
                return;
            }
    
            let formData = new FormData();
            formData.append('file', fileInput.files[0]);
    
            fetch('/admin/ImportEvent', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert("File berhasil dikirim.");
            })
            .catch(error => {
                alert("Terjadi kesalahan saat mengirim file.");
                console.error('Error:', error);
            });
        }
    </script>
    {{-- <script>
        function downloadTemplate() {
            const link = document.createElement('a');
            link.href = 'template.xlsx'; // Replace with your template file URL
            link.download = 'template.xlsx';
            link.click();
        }
    </script> --}}
@endsection
