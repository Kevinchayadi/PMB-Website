@extends('admin.layout.template')
@section('title', 'Tabel Permintaan Yang Tertunda')

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

    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Permintaan Yang Tertunda</h1>
    </div>

    <div class="btn btn-primary mx-5 mb-3" data-bs-toggle="modal" data-bs-target="#uploadexcelmodal">Unggah File Excel</div>

    <!-- Modal Upload File -->
    <div class="modal fade" id="uploadexcelmodal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Unggah Acara</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Upload -->
                    <form action="{{ secure_url('/admin/ImportRequest') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="btn btn-outline-primary upload-area w-100 p-5 mb-3"
                            style="border: 2px dashed !important">
                            <label for="uploadfile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                                    class="bi bi-upload" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                </svg>
                                <div class="fs-5">Unggah file di sini</div>
                            </label>
                            <input type="file" id="uploadfile" name="file" accept=".xlsx, .xls"
                                onchange="displayFileName()" />
                        </div>

                        <!-- Menampilkan Nama File yang Dipilih -->
                        <div id="fileNameDisplay" class="mt-3"></div>

                        <div class="d-flex row">
                            <div class="col-6">
                                <div class="btn btn-outline-warning w-100" onclick="downloadTemplate()">Unduh Template</div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-success w-100">Unggah Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
   
    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ secure_url('/admin/Request-Pending') }}" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="{{ request('search') }}"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
        </div>
        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Permintaan</th>
                        <th scope="col">Tipe Permintaan</th>
                        <th scope="col">Tanggal Permintaan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requestList as $key => $data)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $data->nama_terlibat_satu }}</td>
                            <td>{{ $data->nama_acara }}</td>
                            <td>{{ $data->jadwal_acara }}</td>
                            <td>
                                @if ($data->status == 'process' or $data->status == 'pending')
                                    <!-- Accept Form -->
                                    <form method="POST" action="{{ route('admin.request.proccess', $data->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-success">Terima</button>
                                    </form>
                                @else()
                                @endif()

                                <!-- Button to trigger the detail modal -->
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $data->id }}">
                                    Detail
                                </button>

                                @if ($data->status == 'process' or $data->status == 'pending')
                                    <!-- Button to trigger the reject modal -->
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#rejectModal{{ $data->id }}">
                                        Tolak
                                    </button>
                                @else()
                                @endif()
                            </td>
                        </tr>

                        <!-- Modal for Details -->
                        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="detailModalLabel{{ $data->id }}">Detail
                                            Permintaan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Terlibat Satu:</strong> {{ $data->nama_terlibat_satu }}</p>
                                        <p><strong>Nama Terlibat Dua:</strong> {{ $data->nama_terlibat_dua }}</p>
                                        <p><strong>Nama Romo:</strong> {{ $data->nama_romo }}</p>
                                        <p><strong>Jadwal:</strong> {{ $data->jadwal_acara }}</p>
                                        <p><strong>Deskripsi:</strong> {{ $data->deskripsi_pengajuan }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ route('admin.request.proccess', $data->id) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline-success">Terima</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Reject -->
                        <div class="modal fade" id="rejectModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="rejectModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primaryr bg-primary">
                                        <h5 class="modal-title text-white" id="rejectModalLabel{{ $data->id }}">Tolak
                                            Permintaan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.request.reject', $data->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="reason" class="form-label">Alasan Penolakan:</label>
                                                <textarea name="reason" id="reason" class="form-control" rows="4"
                                                    placeholder="Enter reason for rejection" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5">Data permintaan tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($requestList->total() > 0)
                <div class="mt-1 text-center">
                    <small class="text-muted">
                        Tampilkan {{ $requestList->firstItem() }} sampai {{ $requestList->lastItem() }} dari
                        {{ $requestList->total() }} data
                        permintaan
                    </small>
                </div>
                <nav class="mt-2">
                    <ul class="pagination justify-content-center mb-0" id="pagination">
                        <!-- Previous Button -->
                        @if ($requestList->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    < </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $requestList->previousPageUrl() }}">
                                    << /a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @for ($i = 1; $i <= $requestList->lastPage(); $i++)
                            <li class="page-item {{ $requestList->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $requestList->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Button -->
                        @if ($requestList->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $requestList->nextPageUrl() }}">></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">></a>
                            </li>
                        @endif
                    </ul>
                </nav>

            @endif
        </div>
    </div>
    <script>
        // Function to update file name display when a file is selected
        function displayFileName() {
            var fileInput = document.getElementById("uploadfile");
            var fileName = fileInput.files[0] ? fileInput.files[0].name :
                "No file selected"; // Menangani kondisi jika tidak ada file yang dipilih
            var fileNameDisplay = document.getElementById("fileNameDisplay");

            fileNameDisplay.innerHTML = "<strong>File yang dipilih: </strong>" + fileName;
        }

        // Function to download the template
        function downloadTemplate() {
            window.location.href = "/admin/exportRequestTemplate"; // Sesuaikan dengan path template
        }

        // Menggunakan event submit pada form untuk menampilkan indikator pemuatan
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form secara default

            // Show loading indicator
            document.getElementById('upload-loading').style.display = 'block';
            document.getElementById('uploadButton').disabled =
                true; // Disable button untuk mencegah multiple submit
            document.getElementById('upload-message').style.display = 'none'; // Hide any previous messages

            // Submit form secara manual menggunakan Fetch API
            const formData = new FormData(this);

            fetch(this.action, {
                    method: this.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('upload-loading').style.display = 'none'; // Hide loading spinner
                    document.getElementById('uploadButton').disabled = false; // Enable the upload button
                    showMessage('File berhasil dikirim!', 'success'); // Show success message
                })
                .catch(error => {
                    document.getElementById('upload-loading').style.display = 'none'; // Hide loading spinner
                    document.getElementById('uploadButton').disabled = false; // Enable the upload button
                    showMessage('Terjadi kesalahan saat mengirim file. Silakan coba lagi.',
                        'danger'); // Show error message
                    console.error('Error:', error);
                });
        });

        // Function to show success or error message
        function showMessage(message, type) {
            const messageText = document.getElementById('message-text');
            messageText.textContent = message;
            messageText.className = `alert alert-${type}`;
            document.getElementById('upload-message').style.display = 'block';
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
