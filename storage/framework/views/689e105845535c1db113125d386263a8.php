<link rel="stylesheet" href="<?php echo e(asset('csss/profile.css')); ?>">

<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('Layout.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="container-fluid">
        <div class="section-1 row mx-md-0 mx-auto mb-2">
            
            <div class="col-lg-5 col-12 ps-lg-0 px-0">
                <div class="content bg-primary p-2">
                    <img class="img-fluid" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="Gambar Gereja">
                </div>
            </div>

            <div class="col-lg-7 col-12 px-lg-3 px-0">
                <div class="description fs-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam qui enim odio ratione. Tempora commodi
                    provident sunt? Similique ad, nostrum blanditiis obcaecati ab sapiente praesentium repellat facere
                    quaerat
                    vitae adipisci.
                </div>
            </div>
        </div>

        
        <div class="section-2 mx-md-0 mx-auto">

            
            <div class="fs-4 fw-bolder mb-2">Visi dan Misi</div>

            
            <div class="visi row pe-lg-0 mb-3">
                <div class="col-lg-7 col-12 row pe-0">
                    
                    <div class="col-lg-1 px-4">
                        <div class="circle bg-secondary rounded-circle d-lg-block d-none text-secondary">
                            i
                        </div>
                    </div>

                    
                    <div class="col-lg-11 col-12 pe-lg-2 pe-0">
                        
                        <div class="fs-5">Visi</div>

                        
                        <div class="fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                            totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error porro
                            ea, eligendi quia et!
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 pe-lg-0">
                    <div class="bg-secondary p-2">
                        <img class="img-fluid" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">
                    </div>
                </div>
            </div>

            
            <div class="misi row pe-lg-0 mb-3">
                
                <div class="col-lg-5 pe-lg-0 d-lg-block d-none">
                    <div class="bg-tertiary p-2">
                        <img class="img-fluid" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-12 row pe-0">
                    
                    <div class="col-lg-1 px-4">
                        <div class="circle bg-secondary rounded-circle d-lg-block d-none text-secondary">
                            i
                        </div>
                    </div>

                    
                    <div class="col-lg-11 col-12 pe-lg-2 pe-0">
                        
                        <div class="fs-5">Misi</div>

                        
                        <div class="fs-6">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                            totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error porro
                            ea, eligendi quia et!
                        </div>
                    </div>
                </div>

                
                <div class="col-12 pe-lg-0 d-lg-none">
                    <div class="bg-tertiary p-2">
                        <img class="img-fluid" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/ViewPage/profile.blade.php ENDPATH**/ ?>