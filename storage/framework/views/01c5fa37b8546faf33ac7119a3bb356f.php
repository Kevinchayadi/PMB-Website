<link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">

<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="row mb-3 mx-auto">
        <div class="left col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-visi"
                aria-expanded="false" aria-controls="collapse">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-6 text-white text-center">Visi</div>
                <div class="collapse text-white" id="collapse-visi">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>

        <div class="right col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-secondary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-misi"
                aria-expanded="false" aria-controls="collapse">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-6 text-white text-center">Misi</div>
                <div class="collapse text-white" id="collapse-misi">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/visimisi.blade.php ENDPATH**/ ?>