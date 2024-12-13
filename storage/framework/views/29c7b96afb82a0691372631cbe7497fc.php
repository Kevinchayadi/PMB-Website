<?php $__env->startSection('title', 'Home'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">

<?php $__env->startSection('content'); ?>

    <div class="container">
        
        <div id="carouselExampleAutoplaying" class="carousel slide mb-3 w-75 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3 shadow-lg">
                <div class="carousel-item active">
                    <img src="<?php echo e(asset('picture/Carousel-1.png')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('picture/Carousel-2.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e(asset('picture/Carousel-3.png')); ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        
        <div class="card mx-auto mb-3 col-9 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e(asset('picture/Misa.jpg')); ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                            <div class="text-secondary fw-bolder">Ikuti misa pekan ini</div>
                            <div class="btn btn-secondary text-dark">
                                <a href="" class="nav-link fs-6 hvr-shrink">Info lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark d-lg-none d-block mb-3 bg-dark rounded-3 shadow-lg">
            <img src="<?php echo e(asset('picture/Misa.jpg')); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="content col-12 align-content-center fs-4">
                    <div class="text-secondary fw-bolder">Ikuti misa pekan ini</div>
                    <div class="btn btn-secondary text-dark">
                        <a href="" class="nav-link fs-6 hvr-shrink">Info lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="section-1 row ps-lg-3 mb-4 pe-lg-2 pe-0 ps-2 justify-content-center">

            
            <div class="col-md-3 my-md-0 col-12 my-2 mx-2 px-0 shadow-lg">
                <div class="pelayanan py-5 px-3 rounded-3">
                    <div class="h4 text-white">Pelayanan</div>
                    <p><a class="link-opacity-100 text-white" href="/layanan">Cek di sini</a></p>
                </div>
            </div>

            
            <div class="col-md-3 my-md-0 col-12 my-2 mx-2 px-0 shadow-lg">
                <div class="agenda-paroki py-5 px-3 rounded-3">
                    <div class="h4 text-white">Agenda Paroki</div>
                    <p><a class="link-opacity-100 text-white" href="/jadwal">Cek informasi terbaru di sini</a></p>
                </div>
            </div>

            
            <div class="col-md-3 my-md-0 col-12 my-2 mx-2 px-0 shadow-lg">
                <div class="mari-ikut-terlibat py-5 px-3 rounded-3">
                    <div class="h4 text-white">Mari ikut terlibat</div>
                    <p><a class="link-opacity-100 text-white" href="/profile/kegiatan">Cek di sini</a></p>
                </div>
            </div>
        </div>

        
        <div class="section-2 row">
            <div class="left col-lg-8 col-12 mb-lg-0 mb-4 pe-0">

                
                <div class="px-4">
                    <div class="head-section d-flex justify-content-between">
                        <div class="align-self-center fs-5 fw-bolder">Jadwal Misa</div>
                        <a class="nav-link align-self-center text-primary fs-6" href="/jadwal">Lihat semua jadwal</a>
                    </div>
                    <hr>
                </div>

                
                <div class="ms-3 row me-0">

                    
                    <div class="left-content text-gray px-2 align-self-center col-lg-2 col-3 flex-start">
                        <div class="d-flex justify-content-center">
                            <div class="align-self-center d-lg-block d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#7A7A7A"
                                    class="bi bi-calendar align-self-center fs-xl-3" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </div>
                            <div class="h4 mt-lg-2 ms-lg-2 align-self-center">02</div>
                        </div>
                        <div class="h5 text-center">Januari</div>
                    </div>
                    <div class="right-content pe-2 border-start border-gray col-lg-10 col-9 row">
                        <div class="text align-self-center col-lg-9 col-12">
                            <div class="head fs-5">Hari Raya Penampakan Tuhan</div>
                            <div class="desc fs-6">Bacaan: <br>Yes. 60:1-6; <br>Mzm. 72:1-2,7-8,10-11,12-13; <br>Ef.
                                3:2-3a,5-6; <br>Mat.2:1-12</div>
                            <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                        </div>
                        <div class="button align-self-center text-end col-lg-3 col-12">
                            <div class="btn btn-outline-primary text-primary bg-white w-100">
                                <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="right col-lg-4 col-12 mb-lg-0 mb-4 pe-0">

                
                <div class="px-4">
                    <div class="head-section d-flex justify-content-between">
                        <div class="align-self-center fs-5 fw-bolder">Artikel</div>
                        <a class="nav-link align-self-center text-primary fs-6" href="/artikel">Lihat semua artikel</a>
                    </div>
                    <hr>
                </div>

                
                <div class="right-content mx-4">
                    <div class="head fs-5 text-gray">Apa Makna Natal Bagi Saya di saat seperti ini?</div>
                    <div class="desc fs-6">Bulan Desember merupakan bulan yang paling ditunggu oleh banyak orang</div>
                    <a class="nav-link text-primary" href="#">Selengkapnya</a>
                </div>
            </div>
        </div>

        
        <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
            <a href= "https://youtube.com">
                <img class="object-fit-contain w-100 rounded-3" src="<?php echo e(asset('picture/Subscribe.png')); ?>"
                    alt="">
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/ViewPage/home.blade.php ENDPATH**/ ?>