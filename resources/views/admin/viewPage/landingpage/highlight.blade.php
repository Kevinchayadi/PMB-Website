@extends('admin.layout.template')
@section('title', 'Admin - Highlight')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <form class="form" action="/admin/highlight" method="POST" enctype="multipart/form-data">
            @csrf

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

            <div class="section-1 mb-3">
                {{-- Carousel --}}
                <div class="title fs-4 fw-bolder">Carousel</div>
                <div class="row">
                    <div class="col-4">
                        <img id="preview-highlight1" src="{{ asset($highlight[0]->path) }}"
                            class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 1">
                        <input type="file" id="highlight1" name="highlight1"
                            class="form-control btn btn-primary rounded-3 w-100 @error('highlight1') is-invalid @enderror"
                            onchange="previewImage(this, 'preview-highlight1')">
                        @error('highlight1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <img id="preview-highlight2" src="{{ asset($highlight[1]->path) }}"
                            class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 2">
                        <input type="file" id="highlight2" name="highlight2"
                            class="form-control btn btn-primary rounded-3 w-100 @error('highlight2') is-invalid @enderror"
                            onchange="previewImage(this, 'preview-highlight2')">
                        @error('highlight2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <img id="preview-highlight3" src="{{ asset($highlight[2]->path) }}"
                            class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 3">
                        <input type="file" id="highlight3" name="highlight3"
                            class="form-control btn btn-primary rounded-3 w-100 @error('highlight3') is-invalid @enderror"
                            onchange="previewImage(this, 'preview-highlight3')">
                        @error('highlight3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="section-2 mb-3">
                <div class="title fs-4 fw-bolder">Banner Atas</div>
                {{-- Banner Atas --}}
                <div class="card mx-auto mb-3 col-9 bg-dark rounded-3 shadow-lg d-lg-block d-none">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img id="preview-event" src="{{ asset($highlight[4]->path) }}"
                                class="img-fluid rounded-start mb-2" alt="Banner Atas">
                            <input type="file" id="event" name="event"
                                class="form-control btn btn-primary rounded-3 w-100 @error('event') is-invalid @enderror"
                                onchange="previewImage(this, 'preview-event')">
                            @error('event')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                                    <input type="text" class="text-secondary form-control"
                                        placeholder="{{ $highlight[4]->nama }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-3 mb-3">
                <div class="title fs-4 fw-bolder">Banner Bawah</div>
                {{-- Banner Bawah --}}
                <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
                    <img id="preview-promosi" class="object-fit-contain w-100 rounded-3"
                        src="{{ asset($highlight[3]->path) }}" alt="Banner Bawah">
                    <input type="file" id="promosi" name="promosi"
                        class="form-control btn btn-primary rounded-3 w-100 @error('promosi') is-invalid @enderror"
                        onchange="previewImage(this, 'preview-promosi')">
                    @error('promosi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="save text-end mb-2 p-2">
                <button type="submit" class="btn btn-primary fw-bolder">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
