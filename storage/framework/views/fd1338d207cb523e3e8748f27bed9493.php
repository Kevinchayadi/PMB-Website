<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('user.Layout.bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.Layout.font', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/card.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/hover.css')); ?>">
</head>

<body>
    <?php echo $__env->make('user.Layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="upper border-bottom sticky-top bg-white shadow-sm">
        <div class="w-100 box-shadow overflow-auto">
            <ul class="nav fs-6 w-auto d-relative flex-nowrap justify-content-lg-center justify-content-start">

                
                <li class="nav-item ms-3">
                    <a class="nav-link <?php echo e(Route::is('visiMisi') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/profile/visiMisi">Visi Misi & Sejarah Gereja</a>
                </li>

                

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('doa') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/profile/doa">Doa Paroki</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('fasilitas') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/profile/fasilitas">Fasilitas</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('pastor') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-float'); ?>"
                        href="/profile/pastor">Pastor
                        Paroki</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('kegiatan') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-float'); ?>"
                        href="/profile/kegiatan">Kegiatan</a>
                </li>
        </div>
    </div>
    <div class="container-fluid px-0 bottom row mx-auto">
        <div class="col-2 border-end d-lg-block d-none">
            <?php echo $__env->make('user.Layout.leftpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-lg-8 col-12 mt-2">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="col-2 border-start d-lg-block d-none">
            <?php echo $__env->make('user.Layout.rightpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo $__env->make('user.Layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('js/scroll.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/Layout/profileTemplate.blade.php ENDPATH**/ ?>