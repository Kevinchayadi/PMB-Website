<link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">

<?php $__env->startSection('title', 'Kegiatan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mx-auto mb-2">
        
        <?php if($kegiatan->count() > 0): ?>
            <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 col-12 hvr-shrink">
                    
                    <div class="content bg-primary rounded p-2 mb-2" data-bs-toggle="collapse"
                        data-bs-target="#<?php echo e(str_replace(' ', '-', $kegiatans->nama_acara)); ?>">
                        <img class="img-fluid rounded-3 mb-1" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">
                        <div class="fs-6 text-center text-white fw-bolder">Kegiatan A</div>
                        <div class="collapse text-white" id="kegiatan-a">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                            totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                            porro
                            ea, eligendi quia et!
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="fs-5 text-center fw-bolder">Belum ada kegiatan</div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/kegiatan.blade.php ENDPATH**/ ?>