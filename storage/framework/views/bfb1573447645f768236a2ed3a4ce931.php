<link rel="stylesheet" href="<?php echo e(asset('csss/profile.css')); ?>">

<?php $__env->startSection('title', 'Fasilitas'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mb-2 mx-auto">
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2" data-bs-toggle="modal" data-bs-target="#fasilitas-a">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="" class="img-fluid rounded">
                <div class="modal fade" id="fasilitas-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="fasilitas-a" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="fasilitas-a">Fasilitas A</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="image mb-2">
                                    <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt=""
                                        class="img-fluid rounded-3 shadow-lg">
                                </div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium
                                    officiis
                                    tempore
                                    consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum!
                                    Deleniti
                                    cupiditate quaerat totam repellendus officiis.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio
                                    quaerat
                                    quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                                    necessitatibus
                                    quidem.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2" data-bs-toggle="modal" data-bs-target="#fasilitas-b">
                <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="" class="img-fluid rounded">
                <div class="modal fade" id="fasilitas-b" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="fasilitas-b" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="fasilitas-b">Fasilitas B</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="image mb-2">
                                    <img src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt=""
                                        class="img-fluid rounded-3 shadow-lg">
                                </div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium
                                    officiis
                                    tempore
                                    consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum!
                                    Deleniti
                                    cupiditate quaerat totam repellendus officiis.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio
                                    quaerat
                                    quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                                    necessitatibus
                                    quidem.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.profileTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/ViewPage/fasilitas.blade.php ENDPATH**/ ?>