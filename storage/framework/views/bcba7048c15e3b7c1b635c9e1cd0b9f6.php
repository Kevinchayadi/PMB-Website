<link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">

<?php $__env->startSection('title', 'Sejarah'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mx-auto mb-3">
        <div class="col-lg-3 col-6 px-2 mb-2">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-1">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-1">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-2">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-2">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-3">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-3">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-4">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-4">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/ViewPage/sejarah.blade.php ENDPATH**/ ?>