<?php $__env->startSection('title', 'Dasbor'); ?>



<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/dashboard.css')); ?>">


    <div class=" my-2 mx-3 d-flex justify-content-between align-items-center">
        <h1 class="fw-bold text-black">Beranda</h1>
        <p class="text-center"><?php echo e(\Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY')); ?></p>
    </div>
    <div class="row d-flex justify-content-between m-1  ">
        <div class=" col-md-4 py-2 px-2">
            <div class=" text-center text-white card bg-primary p-3 h-100">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">Pengguna</h3>
                <p class="fs-5"><?php echo e($umat); ?> Terdaftar</p>
            </div>
        </div>

        <div class="  col-md-4   py-2 px-2">
            <div class=" text-center text-white  card bg-primary p-3 h-100">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">Permintaan</h3>
                <div class="row d-flex align-items-stretch">
                    <div class="col-4">
                        <a href="/admin/Request-Pending" class="text-decoration-none text-dark">
                            <div class="text-white">
                                <h5 class="fs-6">Permintaan Yang Tertunda</h5>
                                <p class="fs-5"><?php echo e($pending); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="/admin/Request-Processed" class="text-decoration-none text-dark">
                            <div class="text-white">
                                <h5 class="fs-6">Permintaan Yang Diproses</h5>
                                <p class="fs-5"><?php echo e($process); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="/admin/Request-Accepted" class="text-decoration-none text-dark">
                            <div class="text-white">
                                <h5 class="fs-6">Permintaan Yang Disetujui</h5>
                                <p class="fs-5"><?php echo e($accepted); ?></p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 py-2 px-2">
            <div class=" text-center text-white card bg-primary p-3 h-100">
                <div class="mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.405 10 8 10c-3.405 0-4.758 1.226-5.468 2.37A6.978 6.978 0 0 0 8 15a6.978 6.978 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <h3 class="fw-bold ">Acara</h3>
                <div class="row d-flex align-items-stretch">
                    <div class="col-6">
                        <a href="/admin/scheduledEvent" class="text-decoration-none text-dark">
                            <div class="text-white">
                                <h5 class="fs-6">Acara Terjadwal</h5>
                                <p class="fs-5"><?php echo e($countSheduledEvent); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/admin/passEvent" class="text-decoration-none text-dark">
                            <div class="text-white">
                                <h5 class="fs-6">Acara Yang Berlalu</h5>
                                <p class="fs-5"><?php echo e($CountPassEvent); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="divider mx-2"></div>

    <div class="event mx-3 my-2">
        <div class= "px-5 d-flex justify-content-between align-items-center">
            <h1 class="fw-bold fs-4">Acara Yang Akan Datang</h1>
            <a href="">Lihat Semua</a>
        </div>
        <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="px-4 py-2 my-3 mx-1 card-3d">
            <h2><?php echo e($data->transactionDetails->acara->nama_acara); ?></h2>
            <div class="d-flex justify-content-between">
                <p><?php echo e($data->transactionDetails->deskripsi_transaksi); ?></p>
                <div>
                    <a href="/admin/scheduledEvent">selengkapnya</a>
                </div>
            </div>
            <p><?php echo e($data->jadwal_transaction); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/dashboard.blade.php ENDPATH**/ ?>