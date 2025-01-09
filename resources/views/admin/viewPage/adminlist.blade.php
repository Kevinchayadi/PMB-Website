@extends('admin.layout.template')
@section('title', 'TabeLl Admin')

@section('content')
    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Tabel Admin</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">


            <form action="{{ route('admin.admin-list') }}" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="{{ request('search') }}"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>

            <a href="/admin/add-admin" class="btn btn-primary ">Tambah Admin Baru</a>

        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        {{-- <th scope="col">ID Admin</th> --}}
                        <th scope="col">Nama Pengguna</th>
                        {{-- <th scope="col">Password</th> --}}
                        <th scope="col">Peran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $index => $admin)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            {{-- <td>{{ $admin->id }}</td> --}}
                            <td>{{ $admin->username }}</td>
                            {{-- <td>{{ $admin->password }}</td> --}}
                            <td>{{ $admin->roles->role }}</td>
                            <td>
                                <a href="/admin/admin-detail/{{ $admin->username }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.remove', $admin->username) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Data admin tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <!-- Pagination -->
        @if ($admins->total() > 0)
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan {{ $admins->firstItem() }} sampai {{ $admins->lastItem() }} dari {{ $admins->total() }} data
                    admin
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    @if ($admins->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $admins->previousPageUrl() }}">
                                << /a>
                        </li>
                    @endif

                    <!-- Page Numbers -->
                    @for ($i = 1; $i <= $admins->lastPage(); $i++)
                        <li class="page-item {{ $admins->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $admins->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Next Button -->
                    @if ($admins->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $admins->nextPageUrl() }}">></a>
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
