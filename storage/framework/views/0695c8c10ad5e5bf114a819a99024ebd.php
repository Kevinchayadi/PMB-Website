<?php $__env->startSection('title', 'Admin - Form'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .select2-container .select2-selection {
    background-color: #fff !important;
    color: #000 !important;
}

.select2-container--default .select2-results__option {
    background-color: #fff !important;
    color: #000 !important;
}

.select2-container--default .select2-results__option--highlighted {
    background-color: #007bff !important; /* Warna biru Bootstrap */
    color: #fff !important;
}
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Admin</h2>

                            <!-- Form Start -->
                            <form action="/admin/add-admin" method="POST">
                                <?php echo csrf_field(); ?> <!-- Laravel CSRF Token -->

                                <!-- Dropdown Romo -->
                                <div class="mb-3">
                                    <label for="id_romo" class="form-label">Romo</label>
                                    <select class="form-control" id="id_romo" name="id_romo" required>
                                        <option value="" class="form-control">Pilih Romo</option>
                                        <?php $__currentLoopData = $romos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $romo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($romo->id); ?>"><?php echo e($romo->nama_romo); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Dropdown Acara -->
                                <div class="mb-3">
                                    <label for="id_acara" class="form-label">Acara</label>
                                    <select class="form-control" id="id_acara" name="id_acara" required>
                                        <option value="">Pilih Acara</option>
                                        <?php $__currentLoopData = $acaras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($acara->id); ?>"><?php echo e($acara->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Dropdown Seksi (Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_seksi" class="form-label">Seksi</label>
                                    <select class="form-control select2" id="id_seksi" name="id_seksi[]" multiple="multiple" required>
                                        <option value="">Pilih Seksi</option>
                                        <?php $__currentLoopData = $seksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($seksi->id); ?>"><?php echo e($seksi->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Dropdown Doa -->
                                <div class="mb-3">
                                    <label for="id_doa" class="form-label">Doa</label>
                                    <select class="form-control" id="id_doa" name="id_doa" required>
                                        <option value="">Pilih Doa</option>
                                        <?php $__currentLoopData = $doas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($doa->id); ?>"><?php echo e($doa->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="jadwal_transaction" class="form-label">Jadwal Transaksi</label>
                                    <input type="date" class="form-control" id="jadwal_transaction" name="jadwal_transaction" required>
                                </div>

                                <!-- Dropdown Umat (Nullable, Multiple Select2) -->
                                <div class="mb-3">
                                    <label for="id_umat" class="form-label">Umat</label>
                                    <select class="form-control select2" id="id_umat" name="id_umat[]" multiple="multiple">
                                        <option value="">Pilih Umat (Optional)</option>
                                        <?php $__currentLoopData = $umats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $umat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($umat->id_umat); ?>"><?php echo e($umat->nama_umat); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- Deskripsi Acara -->
                                <div class="mb-3">
                                    <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara</label>
                                    <textarea class="form-control" id="deskripsi_transaksi" name="deskripsi_transaksi" rows="4" placeholder="Masukkan Deskripsi Acara (Optional)"></textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger rounded-none mt-2" href="/admin/admin-list">Cancel</a>
                                </div>
                            </form>
                            <!-- Form End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Init Select2 -->
    <script>
        $(document).ready(function() {
            // Initialize Select2 for the multiple select dropdowns
            $('.select2').select2({
                placeholder: "Pilih opsi",
                allowClear: true
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/createEvent.blade.php ENDPATH**/ ?>