<link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">

<?php $__env->startSection('title', 'Doa'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mx-auto mb-2">
        <?php $__currentLoopData = $doa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-12 p-2">
                <div class="bg-primary rounded p-2 hvr-shrink" data-bs-toggle="modal"
                    data-bs-target="#<?php echo e(str_replace(' ', '-', $doas->nama_doa)); ?>">
                    <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="" class="img-fluid rounded">
                    
                    <div class="fs-6">
                        <div class="w-50 mx-auto fw-bolder text-center text-white"><?php echo e($doas->nama_doa); ?></div>
                    </div>
                </div>
                <div class="modal fade" id="<?php echo e(str_replace(' ', '-', $doas->nama_doa)); ?>" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="<?php echo e(str_replace(' ', '-', $doas->nama_doa)); ?>"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header d-block bg-primary fw-bolder">
                                <div class="d-flex w-100">
                                    <h1 class="modal-title fs-5 text-white"
                                        id="<?php echo e(str_replace(' ', '-', $doas->nama_doa)); ?>">
                                        <?php echo e($doas->nama_doa); ?>

                                    </h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="deskripsi fs-6 fw-light text-white">
                                    <?php echo e($doas->deskripsi_doa); ?>

                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="ayat fw-bolder mb-1 fs-6">
                                    <?php echo e($doas->ayat_renungan); ?>

                                </div>
                                <div class="isi mb-2 fs-6">
                                    <?php echo e($doas->isi_renungan); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/doa.blade.php ENDPATH**/ ?>