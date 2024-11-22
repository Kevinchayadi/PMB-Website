@extends('user.Layout.template')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid row mx-auto">
        <div class="col-12 mb-3">
            <div class="title fs-4 fw-bolder mb-3 border-bottom">Upcoming Event</div>

            <div class="event rounded-3 shadow-lg bg-primary w-50">
                <div class="event-inner ms-2 bg-white p-4 rounded-end">
                    <div class="event-title fs-5 fw-bolder text-primary">Misa Mingguan</div>
                    <div class="event-date text-primary fw-bolder fs-6">Minggu, 24 November 2024</div>
                    <div class="event-place text-primary fs-6">Gereja Santo Petrus Paulus</div>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <div class="title fs-5 fw-bolder">Requested Event</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pernikahan</td>
                        <td>27 November 2024</td>
                        <td>Menunggu Konfirmasi</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Sakramen Baptis</td>
                        <td>23 November 2024</td>
                        <td>Diterima</td>
                    </tr>
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

        <div class="col-lg-6 col-12 mb-3">
            <div class="title fs-5 fw-bolder">Joined Event</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Tempat Event</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pernikahan</td>
                        <td>27 November 2024</td>
                        <td>Gereja Santo Petrus Paulus</td>
                    </tr>
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

        <div class="col-lg-6 col-12 mb-3">
            <div class="title fs-5 fw-bolder">History</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Tempat Event</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Pernikahan</td>
                        <td>27 November 2024</td>
                        <td>Gereja Santo Petrus Paulus</td>
                    </tr>
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
