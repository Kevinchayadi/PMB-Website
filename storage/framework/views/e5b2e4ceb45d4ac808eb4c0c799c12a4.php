<link rel="stylesheet" href="<?php echo e(asset('csss/profile.css')); ?>">

<?php $__env->startSection('title', 'Doa'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mx-auto mb-2">
        <div class="col-lg-6 col-12 p-2">
            <div class="bg-primary rounded p-2" data-bs-toggle="modal" data-bs-target="#doaabcde">
                
                <img class="img-fluid rounded-3 mb-2" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">

                
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Doa ABCEDF</div>
                </div>
            </div>
            <div class="modal fade" id="doaabcde" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="doaabcde" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="doaabcde">Doa ABCEDF</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis
                            tempore
                            consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                            cupiditate quaerat totam repellendus officiis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                            quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                            necessitatibus
                            quidem.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12 p-2">
            <div class="bg-secondary rounded p-2" data-bs-toggle="modal" data-bs-target="#doaabcdef">
                
                <img class="img-fluid rounded-3 mb-2" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">

                
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Doa ABCEDF</div>
                </div>
            </div>
            <div class="modal fade" id="doaabcdef" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="doaabcdef" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="doaabcdef">Doa ABCEDF</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis
                            tempore
                            consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                            cupiditate quaerat totam repellendus officiis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                            quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                            necessitatibus
                            quidem.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/ViewPage/doa.blade.php ENDPATH**/ ?>