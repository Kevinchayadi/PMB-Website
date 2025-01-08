@extends('user.Layout.template')
@section('title', 'Histori')
@section('content')
    <div class="container-fluid row mx-auto">
        <div class="col-12 mb-3">
            <div class="title fs-5 fw-bolder">History Jadwal</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Jadwal</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal_acara as $history)
                        <tr>
                            <th scope="row">$loop->iteration</th>
                            <td>$history->judul</td>
                            <td>$history->jadwal_transaction</td>
                            <td>$history->status</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data histori tidak ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link text-dark" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
