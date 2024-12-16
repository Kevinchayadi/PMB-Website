<?php $__env->startSection('title', 'Jadwal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid row mb-lg-0 mb-4 px-0 justify-content-center">
        <div class="mid col-lg-9 col-12">
            
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-5 fw-bolder">Jadwal Misa</div>
                </div>
                <hr>
            </div>

            <?php if($transactions->count() > 0): ?>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="ms-3 row me-0">

                        
                        
                        <div class="right-content pe-2 col-lg-10 col-8 row">
                            <div class="text align-self-center col-lg-9 col-12">
                                <div class="head fs-5">Hari Raya Penampakan Tuhan</div>
                                <div class="desc fs-6">Bacaan: Yes. 60:1-6; Mzm. 72:1-2,7-8,10-11,12-13; Ef. 3:2-3a,5-6;
                                    Mat.
                                    2:1-12</div>
                                <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                            </div>
                            <div class="button align-self-center text-end col-lg-3 col-12">
                                <div class="btn text-primary bg-white w-100 hvr-border-fade">
                                    <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="fs-5 fw-bolder text-center">Jadwal tidak ada</div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/jadwal.blade.php ENDPATH**/ ?>