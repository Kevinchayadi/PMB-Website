@extends('admin.layout.template')
@section('title', 'eventList')

@section('content')
    <style>
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <!-- Card Natal -->
            <div class="col-md-4 mb-3">
                <a href="/form-natal" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Natal</h5>
                            <p class="card-text">Perayaan kelahiran Yesus Kristus yang penuh sukacita.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Misa -->
            <div class="col-md-4 mb-3">
                <a href="/form-misa" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Misa</h5>
                            <p class="card-text">Perayaan ekaristi sebagai wujud syukur kepada Tuhan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Pengurapan -->
            <div class="col-md-4 mb-3">
                <a href="/form-pengurapan" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Pengurapan</h5>
                            <p class="card-text">Pemberian sakramen bagi orang sakit untuk memohon kekuatan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Baptis -->
            <div class="col-md-4 mb-3">
                <a href="/form-baptis" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Baptis</h5>
                            <p class="card-text">Sakramen pembaptisan sebagai tanda masuk ke dalam iman Kristen.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Sakramen Tobat -->
            <div class="col-md-4 mb-3">
                <a href="/form-sakramen-tobat" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Sakramen Tobat</h5>
                            <p class="card-text">Mendapatkan pengampunan dosa melalui pengakuan.</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Sakramen Komuni Pertama -->
            <div class="col-md-4 mb-3">
                <a href="/form-sakramen-komuni" style="text-decoration: none;">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Sakramen Komuni Pertama</h5>
                            <p class="card-text">Penerimaan Tubuh Kristus untuk pertama kalinya.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
