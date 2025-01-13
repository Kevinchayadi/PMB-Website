@extends('user.Layout.template')
@section('title', 'Histori')
@section('content')
    <div class="container-fluid mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="title fs-4 fw-bolder text-primary">Histori Permintaan</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Permintaan</th>
                    <th scope="col">Tanggal Permintaan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal_acara as $history)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $history->nama_acara }}</td>
                        <td>{{ $history->jadwal_acara }}</td>
                        <td>{{ $history->status }}</td>
                        <td>
                            <!-- Button to trigger the detail modal -->
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $history->id }}">
                                Detail
                            </button>

                            @if ($history->status == 'process' or $history->status == 'pending')
                                <!-- Button to trigger edit modal -->
                                <button
                                    class="btn btn-sm btn-outline-success {{ in_array($history->status, ['accepted', 'cancelled']) ? 'd-none' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $history->id }}">
                                    Perbarui
                                </button>
                            @else()
                            @endif()

                            @if ($history->status == 'process' or $history->status == 'pending')
                                <!-- Button to trigger the reject modal -->
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#rejectModal{{ $history->id }}">
                                    Batalkan
                                </button>
                            @else()
                            @endif()
                        </td>

                        <!-- Modal for Details -->
                        <div class="modal fade" id="detailModal{{ $history->id }}" tabindex="-1"
                            aria-labelledby="detailModalLabel{{ $history->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="detailModalLabel{{ $history->id }}">
                                            Detail
                                            Permintaan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Terlibat Satu:</strong> {{ $history->nama_terlibat_satu }}</p>
                                        <p><strong>Nama Terlibat Dua:</strong> {{ $history->nama_terlibat_dua }}</p>
                                        <p><strong>Nama Romo:</strong> {{ $history->nama_romo }}</p>
                                        <p><strong>Jadwal:</strong> {{ $history->jadwal_acara }}</p>
                                        <p><strong>Deskripsi:</strong> {{ $history->deskripsi_pengajuan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal for Edit --}}
                        <div class="modal fade" id="editModal{{ $history->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="edit{{ $history->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5 text-white" id="edit{{ $history->id }}">Perbarui
                                            Permintaan</h1>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/editRequest/{{ $history->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="nama_acara" name="nama_acara"
                                                placeholder="Contoh: John Smith" value="{{ $history->nama_acara }}" hidden>

                                            <input type="text"
                                                class="form-control @error('nama_acara') is-invalid @enderror"
                                                id="id_umat"name="id_umat" value="{{ Auth::user()->id_umat }}" hidden>

                                            <div class="mb-3">
                                                <label for="nama_terlibat_satu" class="form-label">Nama Terlibat
                                                    1</label>
                                                <input type="text"
                                                    class="form-control @error('nama_terlibat_satu') is-invalid @enderror"
                                                    id="nama_terlibat_satu" name="nama_terlibat_satu"
                                                    value="{{ $history->nama_terlibat_satu }}" required>
                                                @error('nama_terlibat_satu')
                                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_terlibat_dua" class="form-label">Nama Terlibat
                                                    2</label>
                                                <input type="text"
                                                    class="form-control @error('nama_terlibat_dua') is-invalid @enderror"
                                                    id="nama_terlibat_dua" name="nama_terlibat_dua"
                                                    value="{{ $history->nama_terlibat_dua }}">
                                                @error('nama_terlibat_dua')
                                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_romo" class="form-label">Nama Romo</label>
                                                <input type="text"
                                                    class="form-control @error('nama_romo') is-invalid @enderror"
                                                    id="nama_romo" name="nama_romo" value="{{ $history->nama_romo }}">
                                                @error('nama_romo')
                                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="jadwal_acara" class="form-label">Jadwal Acara</label>
                                                <input type="date"
                                                    class="form-control @error('jadwal_acara') is-invalid @enderror"
                                                    id="jadwal_acara" name="jadwal_acara"
                                                    value="{{ $history->jadwal_acara }}">
                                                @error('jadwal_acara')
                                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi_pengajuan" class="form-label">Catatan</label>
                                                <textarea class="form-control @error('deskripsi_pengajuan') is-invalid @enderror" id="deskripsi_pengajuan"
                                                    name="deskripsi_pengajuan" rows="3">{{ $history->deskripsi_pengajuan }}</textarea>
                                                @error('deskripsi_pengajuan')
                                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary hvr-shrink">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Reject -->
                        <div class="modal fade" id="rejectModal{{ $history->id }}" tabindex="-1"
                            aria-labelledby="rejectModalLabel{{ $history->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="rejectModalLabel{{ $history->id }}">
                                            Tolak
                                            Permintaan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="/cancelRequest/{{ $history->id }}">
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data histori tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($jadwal_acara->total() > 0)
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan {{ $jadwal_acara->firstItem() }} sampai {{ $jadwal_acara->lastItem() }} dari
                    {{ $jadwal_acara->total() }}
                    data permintaan
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    @if ($jadwal_acara->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $jadwal_acara->previousPageUrl() }}">
                                << /a>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $jadwal_acara->lastPage(); $i++)
                        <li class="page-item {{ $jadwal_acara->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $jadwal_acara->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    @if ($jadwal_acara->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $jadwal_acara->nextPageUrl() }}">></a>
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
@endsection
