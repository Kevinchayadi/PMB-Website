@extends('user.Layout.template')
@section('title', $artikel->title)
@section('content')
    <div class="container-fluid row">
        <div class="mid col-12">
            <div class="head fs-4 fw-bolder mb-2 text-center">{{ $artikel->title }}</div>

            <div class="image mb-4 article-img d-flex justify-content-center">
                <img class="img-fluid rounded-3 shadow-lg" src="{{ asset('storage/' . $artikel->path) }}" alt="">
            </div>

            <div class="content fs-5 mb-2 w-50 mx-auto">
                <div class="desc mb-2 text-justify">
                    {{ $artikel->body }}
                </div>
                <div class="ref d-flex">
                    <div class="title fw-bolder">Sumber: </div>
                    <a href="{{ empty($artikel->additional_link) ? '-' : $artikel->additional_link }}" class="nav-link"></a>
                </div>
            </div>

        </div>
        <div class="other mb-2 mx-2">
            <div class="title fs-5 fw-bolder">Lihat Berita Lainnya...</div>
            <div class="row">
                @forelse($moreArtikel as $more)
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $more->title }}</h5>
                                <p class="card-text">{{ $more->body }}
                                </p>
                                <a href="/artikel/{{ $more->slug }}"
                                    class="nav-link text-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="fs-5 fw-bolder text-center">Tidak ada artikel terkait</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection()
