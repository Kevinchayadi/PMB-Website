<?php $__env->startSection('title', 'Nama jadwal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        
        <div class="head fs-4 fw-bolder mb-2">LOREM LOREM</div>

        
        <div id="carouselExampleAutoplaying" class="carousel slide mb-10" data-bs-ride="carousel">
            <div class="carousel-inner">
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

        
        <div class="description fs-4 fw-bolder mb-2">Deskripsi</div>
        <div class="content fs-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure autem incidunt ad culpa ea
            architecto consequatur quaerat dolor velit perspiciatis ab vero minima fuga eligendi, nesciunt optio suscipit
            laborum debitis.
        </div>

        
        <div class="description fs-4 fw-bolder mb-2">Waktu dan Tempat</div>
        <div class="waktu fs-5">Minggu, 24 Nov 2099</div>
        <div class="tempat fs-5">Di Gereja Santo Petrus dan Paulus</div>

        
        <div class="mt-3 btn btn-primary">
            <a href="#" class="nav-link">Ikut Kegiatan Ini</a>
        </div>
        <div class="total fs-6 text-secondary">Sudah 60 orang yang mendaftar</div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/viewPage/jadwalDetail.blade.php ENDPATH**/ ?>