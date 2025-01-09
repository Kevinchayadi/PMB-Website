@extends('admin.layout.template')
@section('title', 'Admin - List')

@section('content')
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Process Request</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded shadow-sm">
            <div class="d-flex align-items-center">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Request..."
                    aria-label="Search Request">
                <button class="btn btn-outline-primary ms-2" type="button">
                    Search
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Request</th>
                        <th scope="col">Tipe Request</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Action</th>
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
                                    <button type="submit" class="btn btn-sm btn-outline-success">Accept</button>
                                </form>

                                <!-- Button to trigger the detail modal -->
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $data->id }}">
                                    Detail
                                </button>

                                <!-- Button to trigger the reject modal -->
                                {{-- <button 
                                    class="btn btn-sm btn-outline-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#rejectModal{{ $data->id }}">
                                    Reject
                                </button> --}}
                            </td>
                        </tr>

                        <!-- Modal for Details -->
                        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1"
                            aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Request Details
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
                                            <button type="submit" class="btn btn-sm btn-outline-success">Accept</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Reject -->
                        {{-- <div class="modal fade" id="rejectModal{{ $data->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel{{ $data->id }}">Reject Request</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.request.reject', $data->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="reason" class="form-label">Reason for Rejection:</label>
                                                <textarea name="reason" id="reason" class="form-control" rows="4" placeholder="Enter reason for rejection" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Reject</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    @empty
                        <tr>
                            <td colspan="5">No data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
