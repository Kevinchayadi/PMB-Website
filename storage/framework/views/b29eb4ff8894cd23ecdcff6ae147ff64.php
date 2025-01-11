<link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
<div
    class="header navbar navbar-expand-md px-3 pe-0 fixed-top <?php echo e((Route::is('visiMisi') or Route::is('sejarah') or Route::is('doa') or Route::is('fasilitas') or Route::is('pastor') or Route::is('kegiatan')) ? '' : 'shadow-sm border-bottom'); ?>">

    <div class="left row col-lg-3 col-12">
        
        <button class="navbar-toggler col-2 h-50 my-auto mx-1" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="logo col-3 my-auto">
            <img class="w-100 h-auto" src="<?php echo e(asset('picture/Logo Paroki baru 2.png')); ?>" alt="">
        </div>
        <div class="title align-self-center col-lg-9 col-7 row pe-0">

            
            <div class="col-12 px-0">
                <div class="name">
                    <div class="fs-6 fw-bold">Gereja St. Petrus & Paulus</div>
                </div>
                <div class="address">
                    <div class="fs-6">Paroki Mangga Besar</div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="middle col-6">
        <div class="<?php echo e(Route::is('umat.login') or (Route::is('umat.register') ? 'd-none' : '')); ?> align-self-center justify-content-center collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav fs-6">

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('home') ? 'text-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/home">Beranda</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e((Route::is('visiMisi') or Route::is('doa') or Route::is('fasilitas') or Route::is('pastor') or Route::is('kegiatan')) ? 'text-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/profil/sejarahVisiMisi">Profil</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('jadwal') ? 'text-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/jadwal">Jadwal</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('layanan') ? 'text-secondary' : 'text-primary hvr-float'); ?> me-2"
                        href="/layanan">Layanan</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Route::is('hubungi') ? 'text-secondary' : 'text-primary hvr-float'); ?>"
                        href="/hubungi">Hubungi Kami</a>
                </li>

                <?php if(Auth::check()): ?>
                    
                    <li class="nav-item py-2 fw-bolder d-lg-none d-block">
                        Halo, <span class="text-primary"><?php echo e(Auth::guard('web')->user()->nama_umat); ?></span>
                    </li>

                    
                    <li class="nav-item hvr-float">
                        <a class="nav-link <?php echo e(Route::is('histori') ? 'text-secondary' : 'text-primary'); ?> me-2"
                            href="/histori">Histori</a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::check()): ?>
                    
                    <li class="nav-item d-lg-none d-block">
                        <a class="nav-link text-primary" href="/#">Keluar</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item d-lg-none d-block">
                        <a class="nav-link text-primary" href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    
    <?php if(Auth::check()): ?>
        <div class="right col-3">
            <div class="collapse navbar-collapse row justify-content-center">
                <div class="row col-8" data-bs-toggle="modal" data-bs-target="#Modal">
                    <?php if(empty(Auth::user()->nama_baptis) ||
                            empty(Auth::user()->ttl_umat) ||
                            empty(Auth::user()->Wilayah) ||
                            empty(Auth::user()->lingkungan) ||
                            empty(Auth::user()->nomorhp_umat) ||
                            empty(Auth::user()->alamat) ||
                            empty(Auth::user()->status) ||
                            empty(Auth::user()->Pekerjaan)): ?>
                        <div class="col-3 ps-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-exclamation-circle-fill text-secondary" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                        </div>
                        <div class="username col-9 px-0 fw-bolder">
                            Halo,<span class="ms-1 text-primary"><?php echo e(Auth::guard('web')->user()->nama_umat); ?> </span>
                        </div>
                    <?php else: ?>
                        <div class="username col-12 px-0 fw-bolder">
                            Halo,<span class="ms-1 text-primary"><?php echo e(Auth::guard('web')->user()->nama_umat); ?> </span>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="logoutIcon col-2 px-0">
                    <a class="icon-link icon-link-hover text-dark text-decoration-none" href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        Keluar
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="col-3 d-lg-block d-none text-end">
            <li class="hvr-float">
                <a class="nav-link text-primary" href="/login">Login</a>
            </li>
        </div>
    <?php endif; ?>
</div>
<!-- Modal -->
<?php if(Auth::check()): ?>
<div class="modal fade" id="Modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white" id="ModalLabel">Perbarui Data Diri Anda</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <!-- Form -->
                <form action="/updateProfile/<?php echo e(Auth::user()->slug); ?>" method="POST">
                    <?php echo csrf_field(); ?> <!-- Token CSRF untuk keamanan form -->
                    <?php echo method_field('PUT'); ?>

                    <!-- Nama Umat -->
                    <div class="mb-3">
                        <label for="nama_umat" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['nama_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="nama_umat" name="nama_umat" value="<?php echo e(Auth::user()->nama_umat); ?>">
                        <?php $__errorArgs = ['nama_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Nama Baptis -->
                    <div class="mb-3">
                        <label for="nama_baptis" class="form-label">Nama Baptis</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['nama_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="nama_baptis" name="nama_baptis" value="<?php echo e(Auth::user()->nama_baptis); ?>">
                        <?php $__errorArgs = ['nama_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    

                    
                    <div class="mb-3">
                        <label for="ttl_umat" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control  <?php $__errorArgs = ['ttl_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="ttl_umat" name="ttl_umat" value="<?php echo e(Auth::user()->ttl_umat); ?>">
                        <?php $__errorArgs = ['ttl_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Wilayah -->
                    <div class="mb-3">
                        <label for="wilayah" class="form-label">Wilayah</label>
                        <input type="text" class="form-control  <?php $__errorArgs = ['wilayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="wilayah" name="wilayah" value="<?php echo e(Auth::user()->Wilayah); ?>">
                        <?php $__errorArgs = ['wilayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Lingkungan -->
                    <div class="mb-3">
                        <label for="lingkungan" class="form-label">Lingkungan</label>
                        <input type="text" class="form-control  <?php $__errorArgs = ['lingkungan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="lingkungan" name="lingkungan" value="<?php echo e(Auth::user()->lingkungan); ?>">
                        <?php $__errorArgs = ['lingkungan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Nomor HP -->
                    <div class="mb-3">
                        <label for="nomorhp_umat" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control  <?php $__errorArgs = ['nomorhp_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="nomorhp_umat" name="nomorhp_umat" value="<?php echo e(Auth::user()->nomorhp_umat); ?>"
                            pattern="\d+">
                        <div class="form-text">Hanya angka yang diperbolehkan.</div>
                        <?php $__errorArgs = ['nomorhp_umat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control  <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="alamat" name="alamat" rows="3"><?php echo e(Auth::user()->alamat); ?></textarea>
                        <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select  <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status"
                            name="status">
                            <option value="" disabled <?php echo e(Auth::user()->status ? '' : 'selected'); ?>>Pilih
                                status...
                            </option>
                            <option value="menikah" <?php echo e(Auth::user()->status == 'menikah' ? 'selected' : ''); ?>>Menikah
                            </option>
                            <option value="belum_menikah"
                                <?php echo e(Auth::user()->status == 'belum_menikah' ? 'selected' : ''); ?>>Belum Menikah</option>
                            <option value="lainnya" <?php echo e(Auth::user()->status == 'lainnya' ? 'selected' : ''); ?>>Lainnya
                            </option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="mb-3">
                        <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control  <?php $__errorArgs = ['Pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="Pekerjaan" name="Pekerjaan" value="<?php echo e(Auth::user()->Pekerjaan); ?>">
                        <?php $__errorArgs = ['Pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-white"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/Layout/header.blade.php ENDPATH**/ ?>