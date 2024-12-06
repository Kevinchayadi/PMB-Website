@extends('user.Layout.template')
@section('title', 'Judul Artikel')
@section('content')
    <div class="container-fluid row">
        <div class="left col-3 d-lg-block d-none px-4 border-end">
            <div class="title fs-5 fw-bolder border-bottom">Did You Know?</div>
            <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, ipsa eum. Placeat
                voluptatibus consequatur itaque, laboriosam illum non quas ea reprehenderit suscipit culpa corporis
                similique, reiciendis excepturi ut consequuntur ullam.</div>
        </div>
        <div class="mid col-lg-9 col-12">
            <div class="head fs-4 fw-bolder mb-2">LOREM LOREM</div>

            <div class="image mb-4">
                <img class="img-fluid rounded-3 shadow-lg" src="{{ asset('picture/Gereja.jpg') }}" alt="">
            </div>

            <div class="content fs-5 mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis provident,
                blanditiis eligendi culpa praesentium pariatur, dolorem ea vitae fugiat, explicabo dolores porro mollitia
                veniam
                neque optio sint nam animi adipisci?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed voluptatem beatae ipsum. Architecto, doloribus
                dolores. Sunt libero excepturi neque ipsum amet perferendis a illo odio, quo cupiditate at numquam eveniet.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis provident quisquam nulla modi laboriosam,
                autem
                cumque voluptatibus dolore incidunt iusto, quae aut dignissimos eligendi ipsam molestiae earum culpa ab
                saepe?
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime cupiditate sit, iste possimus ab quae
                voluptate, numquam nam minus repudiandae iure! Velit molestias quam aut aspernatur sunt nulla laudantium
                explicabo.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit magni sequi molestiae voluptatibus dolor
                nisi
                deleniti amet velit, numquam, dicta placeat, iure similique. Iure deleniti, repellat voluptatibus numquam
                magni
                voluptatum.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, consequatur. Laudantium soluta
                necessitatibus, eveniet reprehenderit maiores veniam! Distinctio eaque illum assumenda quae, dolorum
                reiciendis
                eveniet quod quisquam veniam a tempora?
            </div>

            <div class="other mb-2">
                <div class="title fs-5 fw-bolder">Lihat Berita Lainnya...</div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="nav-link text-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="nav-link text-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

    </div>
@endsection()
