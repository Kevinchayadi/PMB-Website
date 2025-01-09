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

    <div class="modal fade" id="uploadexcelmodal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog
        modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Unggah Acara</h1>
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
                            <div class="fs-5">Unggah file di sini</div>
                        </label>
                        <input type="file" id="uploadfile" accept=".xlsx, .xls" />
                    </div>

                    {{-- Template and Submit --}}
                    <div class="d-flex row">
                        <div class="col-6">
                            <div class="btn btn-outline-warning w-100" onclick="downloadTemplate()">Unduh Template</div>
                        </div>
                        <div class="col-6">
                            <div class="btn btn-outline-success w-100">Unggah Excel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded shadow-sm">
            <div class="d-flex align-items-center">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Request..."
                    aria-label="Search Request">
                <button class="btn btn-outline-primary ms-2" type="button">
                    Cari
                </button>
            </div>
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
                                <!-- Accept Form -->
                                <form method="POST" action="{{ route('admin.request.proccess', $data->id) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-success">Terima</button>
                                </form>

                                <!-- Button to trigger the detail modal -->
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $data->id }}">
                                    Detail
                                </button>

                                <!-- Button to trigger the reject modal -->
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#rejectModal{{ $data->id }}">
                                    Tolak
                                </button>
                            </td>
                        </tr>

                        <!-- Modal for Details -->
                        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Detail Permintaan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
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
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel{{ $data->id }}">Tolak Permintaan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
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
                        admin
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
                            <li class="page-item {{ $event->currentPage() == $i ? 'active' : '' }}">
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
        function downloadTemplate() {
            window.location.href = "/admin/exportRequestTemplate";
        }

        function submitExcel() {
            let fileInput = document.getElementById('uploadfile');
            if (fileInput.files.length == 0) {
                alert("Silakan pilih file sebelum mengirim.");
                return;
            }

            let formData = new FormData();
            formData.append('file', fileInput.files[0]);

            fetch('/admin/ImportRequest', {
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
