@extends('user.Layout.template')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid row mx-auto">
        <div class="col-6 mb-3">
            <div class="title fs-4 fw-bolder mb-3 border-bottom">Upcoming Event</div>

            <div class="content h-75 overflow-y-auto">
                <div class="event rounded-3 shadow bg-primary mb-2">
                    <div class="event-inner ms-2 bg-white p-4 rounded-end">
                        <div class="event-title fs-5 fw-bolder text-primary">Misa Mingguan</div>
                        <div class="event-date text-primary fw-bolder fs-6">Minggu, 24 November 2024</div>
                        <div class="event-place text-primary fs-6">Gereja Santo Petrus Paulus</div>
                    </div>
                </div>
                <div class="event rounded-3 shadow bg-primary mb-2">
                    <div class="event-inner ms-2 bg-white p-4 rounded-end">
                        <div class="event-title fs-5 fw-bolder text-primary">Misa Mingguan</div>
                        <div class="event-date text-primary fw-bolder fs-6">Minggu, 24 November 2024</div>
                        <div class="event-place text-primary fs-6">Gereja Santo Petrus Paulus</div>
                    </div>
                </div>
                <div class="event rounded-3 shadow bg-primary mb-2">
                    <div class="event-inner ms-2 bg-white p-4 rounded-end">
                        <div class="event-title fs-5 fw-bolder text-primary">Misa Mingguan</div>
                        <div class="event-date text-primary fw-bolder fs-6">Minggu, 24 November 2024</div>
                        <div class="event-place text-primary fs-6">Gereja Santo Petrus Paulus</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-6 mb-3 p-2">
            <div class="content rounded-3 bg-soft-blue p-3 shadow">
                <div class="title fs-4 fw-bolder mb-3 border-bottom">Profile</div>
                <form>
                    <div class="mb-3">
                        <label for="Terlibat-1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="Terlibat-1" placeholder="Contoh: John Smith"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="Terlibat-2" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="Terlibat-2" placeholder="081237171">
                    </div>

                    <div class="mb-3">
                        <label for="Romo" class="form-label">Email</label>
                        <input type="text" class="form-control" disabled id="Romo" placeholder="email@lorem.co.id">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <div class="col-6 mb-3">
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
        <div class="col-6 mb-3">
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
        <div class="col-6 mb-3">
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
