<?php $__env->startSection('title', 'Admin - Form'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .select2-container .select2-selection {
            color: #000 !important;
            background-color: #fff !important;
        }


        .select2-container--default .select2-results__option--highlighted {
            background-color: #007bff !important;
            /* Warna biru Bootstrap */
            color: #fff !important;
        }

        .text-danger {
            color: red !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan!</strong>
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">
                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Event</h2>

                            <!-- Global Error Notification -->
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Terjadi Kesalahan!</strong>
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <!-- Form Start -->
                            <form action="/admin/createEvent" method="POST">
                                <?php echo csrf_field(); ?> <!-- Laravel CSRF Token -->
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="judul" name="judul" value="<?php echo e(old('judul')); ?>"
                                        placeholder="Masukkan Judul Acara" required>
                                    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Admin (Hidden) Field -->
                                
                                <input type="hidden" name="id_admin" value="1">

                                <!-- Dropdown Romo -->
                                <div class="mb-3">
                                    <label for="id_romo" class="form-label">Romo</label>
                                    <select class="form-control <?php $__errorArgs = ['id_romo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_romo"
                                        name="id_romo" required>
                                        <option value="" disabled selected>Pilih Romo</option>
                                        <?php $__currentLoopData = $romos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $romo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($romo->id_romo); ?>" <?php echo e(old('id_romo') ? 'selected' : ''); ?>>
                                                <?php echo e($romo->nama_romo); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_romo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Dropdown Acara -->
                                <div class="mb-3">
                                    <label for="id_acara" class="form-label">Acara <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control <?php $__errorArgs = ['id_acara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_acara"
                                        name="id_acara" required>
                                        <option value="" disabled selected>Pilih Acara</option>
                                        <?php $__currentLoopData = $acaras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($acara->id_acara); ?>" <?php echo e(old('id_acara') ? 'selected' : ''); ?>>
                                                <?php echo e($acara->nama_acara); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_acara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Dropdown Seksi -->
                                <div class="mb-3">
                                    <label for="id_seksi" class="form-label">Seksi</label>
                                    <select class="form-control select2 <?php $__errorArgs = ['id_seksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="id_seksi" name="id_seksi[]" multiple="multiple">
                                        <?php $__currentLoopData = $seksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($seksi->id); ?>"
                                                <?php echo e(collect(old('id_seksi'))->contains($seksi->id) ? 'selected' : ''); ?>>
                                                <?php echo e($seksi->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_seksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Dropdown Doa -->
                                <div class="mb-3">
                                    <label for="id_doa" class="form-label">Doa <span class="text-danger">*</span></label>
                                    <select class="form-control <?php $__errorArgs = ['id_doa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_doa"
                                        name="id_doa" required>
                                        <option value="" disabled selected>Pilih Doa</option>
                                        <?php $__currentLoopData = $doas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($doa->id_doa); ?>" <?php echo e(old('id_doa') ? 'selected' : ''); ?>>
                                                <?php echo e($doa->nama_doa); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_doa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="jadwal_transaction" class="form-label">Jadwal Acara <span
                                            class="text-danger">*</span></label>
                                    <input type="datetime-local"
                                        class="form-control <?php $__errorArgs = ['jadwal_transaction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="jadwal_transaction" name="jadwal_transaction"
                                        value="<?php echo e(old('jadwal_transaction', now()->addDay()->format('Y-m-d\TH:i'))); ?>"
                                        min="<?php echo e(now()->addDay()->format('Y-m-d\TH:i')); ?>" required>
                                    <?php $__errorArgs = ['jadwal_transaction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                                <!-- Dropdown Umat -->
                                <div class="mb-3">
                                    <label for="id_umat" class="form-label">Umat</label>
                                    <select class="form-control select2 <?php $__errorArgs = ['id_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="id_umat" name="id_umat[]" multiple="multiple">
                                        <?php $__currentLoopData = $umats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $umat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($umat->id_umat); ?>"
                                                <?php echo e(collect(old('id_umat'))->contains($umat->id_umat) ? 'selected' : ''); ?>>
                                                <?php echo e($umat->nama_umat); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Deskripsi Acara -->
                                <div class="mb-3">
                                    <label for="deskripsi_transaksi" class="form-label">Deskripsi Acara </label>
                                    <textarea class="form-control <?php $__errorArgs = ['deskripsi_transaksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="deskripsi_transaksi"
                                        name="deskripsi_transaksi" rows="4"><?php echo e(old('deskripsi_transaksi')); ?></textarea>
                                    <?php $__errorArgs = ['deskripsi_transaksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            // Inisialisasi Select2 untuk multiple select
            $('.select2').select2({
                placeholder: "Pilih Data(optional)",
                allowClear: true,
                tags: true,
                tokenSeparators: [',', ' ']
            });

            // Ketika opsi dipilih (select)
            $('.select2').on('select2:select', function(e) {
                var selectedValue = e.params.data.id; // Ambil ID dari opsi yang dipilih

                // Menonaktifkan opsi yang sudah dipilih
                $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);

                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });

            // Ketika opsi dibatalkan (unselect)
            $('.select2').on('select2:unselect', function(e) {
                var unselectedValue = e.params.data.id; // Ambil ID dari opsi yang dibatalkan

                // Mengaktifkan kembali opsi yang di-unselect
                $(this).find('option[value="' + unselectedValue + '"]').prop('disabled', false);

                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });

            $('form').on('submit', function() {
                $('.select2 option').prop('disabled', false);
            });


            $('.select2').on('select2:clear', function() {
                // Mengaktifkan kembali semua opsi
                $(this).find('option').prop('disabled', false);

                // Refresh Select2 agar perubahan terlihat
                $(this).trigger('change');
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/createEvent.blade.php ENDPATH**/ ?>