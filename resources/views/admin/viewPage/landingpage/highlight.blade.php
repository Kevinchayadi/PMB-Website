@extends('admin.layout.template')
@section('title', 'Admin - Article Page')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses update data!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/highlight" method="POST">
            @csrf
            <div class="section-1 mb-3">
                {{-- Carousel --}}
                <div class="title fs-4 fw-bolder">Carousel</div>
                <div class="row">
                    <div class="col-4">
                        <!-- Menampilkan gambar yang ada -->
                        @if ($highlight[0]->path)
                            <img src="{{ $highlight[0]->path }}" alt="Highlight_1" class="img-fluid rounded-3 mb-2"
                                id="current-image-1">
                        @else
                            <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar_Default"
                                class="img-fluid rounded-3 mb-2" id="current-image-1">
                        @endif

                        <!-- Input file untuk mengganti gambar -->
                        <input type="file" id="{{ $highlight[0]->nama }}" name="{{ $highlight[0]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100 @error('{{ $highlight[0]->nama }}') is-invalid @enderror"
                            placeholder="Edit gambar" onchange="previewImage(event, 1)">
                        </input>
                        @error('{{ $highlight[0]->nama }}')
                            <div class="invalid-feedback text-white">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        @if ($highlight[1]->path)
                            <img src="{{ $highlight[1]->path }}" alt="Highlight_2" class="img-fluid rounded-3 mb-2"
                                id="current-image-2">
                        @else
                            <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar_Default"
                                class="img-fluid rounded-3 mb-2" id="current-image-2">
                        @endif

                        <!-- Input file untuk mengganti gambar -->
                        <input type="file" id="{{ $highlight[1]->nama }}" name="{{ $highlight[1]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100 @error('{{ $highlight[1]->nama }}') is-invalid @enderror"
                            placeholder="Edit gambar" onchange="previewImage(event, 2)">
                        </input>
                        @error('{{ $highlight[1]->nama }}')
                            <div class="invalid-feedback text-white">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        @if ($highlight[2]->path)
                            <img src="{{ $highlight[2]->path }}" alt="Highlight_3" class="img-fluid rounded-3 mb-2"
                                id="current-image-3">
                        @else
                            <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar_Default"
                                class="img-fluid rounded-3 mb-2" id="current-image-3">
                        @endif

                        <!-- Input file untuk mengganti gambar -->
                        <input type="file" id="{{ $highlight[2]->nama }}" name="{{ $highlight[2]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100 @error('{{ $highlight[2]->nama }}') is-invalid @enderror"
                            placeholder="Edit gambar" onchange="previewImage(event, 3)">
                        </input>
                        @error('{{ $highlight[2]->nama }}')
                            <div class="invalid-feedback text-white">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="section-2 mb-3">
                <div class="title fs-4 fw-bolder">Banner Atas</div>
                {{-- Banner atas --}}
                <div class="card mx-auto mb-3 col-9 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if ($highlight[4]->path)
                                <img src="{{ $highlight[4]->path }}" alt="Promosi" class="img-fluid rounded-3 mb-2"
                                    id="current-image-4">
                            @else
                                <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar_Default"
                                    class="img-fluid rounded-3 mb-2" id="current-image-4">
                            @endif

                            <!-- Input file untuk mengganti gambar -->
                            <input type="file" id="{{ $highlight[4]->nama }}" name="{{ $highlight[4]->nama }}"
                                class="btn btn-primary rounded-3 d-flex justify-content-center w-100 @error('{{ $highlight[4]->nama }}') is-invalid @enderror"
                                placeholder="Edit gambar" onchange="previewImage(event, 4)">
                            </input>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                                    <input type="text" class="text-secondary form-control"
                                        placeholder="{{ $highlight[4]->nama }}">
                                    @error('{{ $highlight[4]->nama }}')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-3 mb-3">
                <div class="title fs-4 fw-bolder">Banner Bawah</div>
                {{-- Banner bawah --}}
                <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
                    @if ($highlight[3]->path)
                        <img src="{{ $highlight[3]->path }}" alt="Promosi" class="img-fluid rounded-3 mb-2"
                            id="current-image-5">
                    @else
                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar_Default"
                            class="img-fluid rounded-3 mb-2" id="current-image-5">
                    @endif

                    <!-- Input file untuk mengganti gambar -->
                    <input type="file" id="{{ $highlight[3]->nama }}" name="{{ $highlight[3]->nama }}"
                        class="btn btn-primary rounded-3 d-flex justify-content-center w-100 @error('{{ $highlight[3]->nama }}') is-invalid @enderror"
                        placeholder="Edit gambar" onchange="previewImage(event, 5)">
                    </input>
                    @error('{{ $highlight[3]->nama }}')
                        <div class="invalid-feedback text-white">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="save text-end mb-2 p-2">
                <div class="btn btn-primary fw-bolder hvr-shrink">Save Changes</div>
            </div>
        </form>
    </div>

    <!-- JavaScript untuk Preview Gambar -->
    <script src="{{ asset('js/previewforhighlight.js') }}"></script>
@endsection
