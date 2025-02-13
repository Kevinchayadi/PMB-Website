<link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/image.css')); ?>">

<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">

        
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        
        <div id="carouselforhighlight" class="carousel slide w-100 mx-auto mb-3" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3 shadow-lg">
                <div class="carousel-item active">
                    <img src="<?php echo e($highlight[0]->path); ?>" class="d-block w-100" alt="Highlight-Image-1"
                        style="max-height: 500px; min-height: 500px;">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e($highlight[1]->path); ?>" class="d-block w-100" alt="Highlight-Image-2"
                        style="max-height: 500px; min-height: 500px;">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo e($highlight[2]->path); ?>" class="d-block w-100" alt="Highlight-Image-3"
                        style="max-height: 500px; min-height: 500px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselforhighlight"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselforhighlight"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        
        <div class="card mx-auto col-12 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none hvr-shrink">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo e($highlight[4]->path); ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                            <div class="text-secondary fw-bolder"><?php echo e($highlight[4]->keterangan); ?></div>
                            <div class="btn btn-secondary text-dark">
                                <a href="/layanan" class="nav-link fs-6">Info lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark d-lg-none d-block mb-4 bg-dark rounded-3 shadow-lg">
            <img src="<?php echo e(asset('picture/Misa.jpg')); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="content col-12 align-content-center fs-4">
                    <div class="text-secondary fw-bolder"><?php echo e($highlight[4]->keterangan); ?></div>
                    <div class="btn btn-secondary text-dark">
                        <a href="/layanan" class="nav-link fs-6 hvr-shrink">Info lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="section-2 mb-4 pe-0">

            
            <div class="head-section d-flex justify-content-between">
                <div class="align-self-center fs-4 fw-bolder text-primary">Jadwal Misa</div>
                <a class="nav-link align-self-center text-primary fs-6" href="/jadwal">Lihat semua jadwal</a>
            </div>
            <hr>

            
            <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="ms-3 row me-0">
                    <div class="pe-2 border-gray col-12 row">
                        <div class="text align-self-center col-lg-9 col-12">
                            <div class="head fs-4 fw-bolder"><?php echo e($jadwals->judul); ?></div>
                            <div class="desc fs-6"><?php echo e($jadwals->doa->ayat_renungan); ?></div>
                            <div class="h6 text-gray"><?php echo e($jadwals->jadwal_transaction); ?></div>
                        </div>
                        <div class="button align-self-center text-end col-lg-3 col-12">
                            <div class="btn text-primary bg-white w-100 hvr-border-fade">
                                <a href="/jadwal/<?php echo e($jadwals->id_transaction); ?>" class="nav-link">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="fs-5 text-center fw-bolder">Jadwal tidak ada</div>
            <?php endif; ?>

        </div>
        <div class="section-3 mb-lg-0 mb-4 pe-0">
            

            <div class="head-section d-flex justify-content-between">
                <div class="align-self-center fs-4 fw-bolder text-primary">Artikel</div>
                <a class="nav-link align-self-center text-primary fs-6" href="/artikel">Lihat semua artikel</a>
            </div>
            <hr>

            
            <div class="row px-2">
                <?php $__empty_1 = true; $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikels): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-6 px-2 mb-2 hvr-shrink">
                        <div class="card h-100">
                            <img src="<?php echo e(asset('storage/' . $artikels->path)); ?>" class="card-img-top px-0 custom-img-3"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($artikels->title); ?></h5>
                                <p class="card-text"><?php echo e($artikels->body); ?>

                                </p>
                                <a href="/artikel/<?php echo e($artikels->slug); ?>" class="nav-link text-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="fs-5 text-center fw-bolder">Artikel tidak tersedia</div>
                <?php endif; ?>
            </div>


            
            <div class="banner-bottom my-4 rounded-3 shadow-lg w-100 mx-auto">
                <a href= "https://www.youtube.com/@parokimanggabesarjakarta4023">
                    <img class="object-fit-contain w-100 rounded-3" src="<?php echo e($highlight[3]->path); ?>"
                        alt="Banner-Promosi">
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/home.blade.php ENDPATH**/ ?>