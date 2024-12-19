<?php $__env->startSection('title', 'Layanan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid row mx-auto">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
        <?php if($layanan->count() > 0): ?>
            <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-12 p-2">
                    <div class="bg-primary rounded p-2 hvr-shrink" data-bs-toggle="modal"
                        data-bs-target="#<?php echo e($layanans->slug); ?>">
                        
                        <img class="img-fluid rounded-3 mb-2" src="<?php echo e(asset('storage/' . $layanans->path)); ?>"
                            alt="<?php echo e($layanans->slug); ?>">
                        
                        <div class="fs-6">
                            <div class="w-50 mx-auto fw-bolder text-center text-white"><?php echo e($layanans->nama_acara); ?></div>
                        </div>
                    </div>
                    <div class="modal fade" id="<?php echo e($layanans->slug); ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="<?php echo e($layanans->slug); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-white" id="<?php echo e($layanans->slug); ?>">
                                        <?php echo e($layanans->nama_acara); ?></h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e($layanans->deskripsi_acara); ?>

                                </div>

                                <div class="modal-btn text-center mb-2">
                                    <a class="btn text-primary bg-white hvr-border-fade" data-bs-toggle="modal"
                                        data-bs-target="#daftar-<?php echo e($layanans->slug); ?>">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="daftar-<?php echo e($layanans->slug); ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="daftar-<?php echo e($layanans->slug); ?>"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-white" id="form-a">Daftar
                                        <?php echo e($layanans->nama_acara); ?></h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/request" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" class="form-control" id="nama_acara" name="nama_acara"
                                            placeholder="Contoh: John Smith" value="<?php echo e($layanans->nama_acara); ?>" hidden>
                                        <input type="text" class="form-control" id="id_umat"name="id_umat" value="1" hidden>
                                        <div class="mb-3">
                                            <label for="nama_terlibat_satu" class="form-label">Nama Terlibat 1</label>
                                            <input type="text" class="form-control" id="nama_terlibat_satu" name="nama_terlibat_satu"
                                                placeholder="Contoh: John Smith" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama_terlibat_dua" class="form-label">Nama Terlibat 2</label>
                                            <input type="text" class="form-control" id="nama_terlibat_dua" name="nama_terlibat_dua"
                                                placeholder="Contoh: John Smith">
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama_romo" class="form-label">Nama Romo</label>
                                            <input type="text" class="form-control" id="nama_romo" name="nama_romo"
                                                placeholder="Contoh: John Smith">
                                        </div>

                                        <div class="mb-3">
                                            <label for="jadwal_acara" class="form-label">Jadwal Acara</label>
                                            <input type="date" class="form-control" id="jadwal_acara" name="jadwal_acara">
                                        </div>

                                        <div class="mb-3">
                                            <label for="deskripsi_pengajuan" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="deskripsi_pengajuan" name="deskripsi_pengajuan" rows="3"
                                                placeholder="Contoh: Tolong segera diproses nya"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary hvr-shrink">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="fs-5 fw-bolder text-center">Layanan tidak ada</div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/layanan.blade.php ENDPATH**/ ?>