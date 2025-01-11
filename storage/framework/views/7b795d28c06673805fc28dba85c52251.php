<link rel="stylesheet" href="<?php echo e(asset('css/admin/sidebar.css')); ?>">
<div class="container-fluid   sidebar p-3 m-0">

    <div class="d-flex flex-column align-items-center border-bottom pb-2">
        <img class="logo p-1 col-12" src="<?php echo e(asset('picture/Logo Paroki baru 2.png')); ?>" alt="">
        <div class="text-center fs-5 text-white">
            <?php echo e(Auth::guard('admin')->user()->username ?? 'username'); ?>

            <?php if(Auth::guard('admin')->check()): ?>
                | <a href="/admin/logout" class="nav-link  text-white" style="display: inline;">Keluar</a>
            <?php endif; ?>
        </div>
    </div>

    <ul class="fs-5 list-unstyled ">
        <li class="pt-3 pb-1">
            <a class="nav-link text-white <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>" href="/admin/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"
                        hidden />
                </svg>
                Beranda
            </a>
        </li>
        <li class="py-1">
            <a class="nav-link text-white <?php echo e((Request::is('admin/admin-list') or Request::is('admin/add-admin') or Request::is('admin/admin-detail') or Request::is('admin/update-admin')) ? 'active' : ''); ?>"
                href="/admin/admin-list">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"
                        hidden />
                </svg>
                Admin
            </a>
        </li>

        <li class="py-1">
            <a class="nav-link text-white d-flex align-items-center <?php echo e((Request::is('admin/Request-Pending') or Request::is('admin/Request-Processed') or Request::is('admin/Request-Accepted') or Request::is('admin/Request-detail')) ? 'active' : ''); ?>"
                data-bs-toggle="collapse" href="#collapseRequest" role="button"
                aria-expanded="<?php echo e((Request::is('admin/Request-Pending') or Request::is('admin/Request-Processed') or Request::is('admin/Request-Accepted') or Request::is('admin/Request-detail')) ? 'true' : 'false'); ?>"
                aria-controls="collapseRequest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                Permintaan
            </a>
            <div class="collapse <?php echo e((Request::is('admin/Request-Pending') or Request::is('admin/Request-Processed') or Request::is('admin/Request-Accepted') or Request::is('admin/Request-detail')) ? 'show' : ''); ?>"
                id="collapseRequest">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/Request-Pending') ? 'active' : ''); ?>"
                            href="/admin/Request-Pending">Permintaan Yang Tertunda</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/Request-Processed') ? 'active' : ''); ?>"
                            href="/admin/Request-Processed">Permintaan Yang Diproses</a>
                    </li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/Request-Accepted') ? 'active' : ''); ?>"
                            href="/admin/Request-Accepted">Permintaan Yang Disetujui</a></li>
                </ul>
            </div>
        </li>

        <!-- Pelayanan dengan Collapse -->
        <li class="py-1">
            <a class="nav-link text-white d-flex align-items-center <?php echo e((Request::is('admin/createEvent') or Request::is('admin/passEvent') or Request::is('admin/scheduledEvent')) ? 'active' : ''); ?>"
                data-bs-toggle="collapse" href="#collapsePelayanan" role="button"
                aria-expanded="<?php echo e((Request::is('admin/createEvent') or Request::is('admin/passEvent') or Request::is('admin/scheduledEvent')) ? 'true' : 'false'); ?>"
                aria-controls="collapsePelayanan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                Acara
            </a>
            <div class="collapse <?php echo e((Request::is('admin/createEvent') or Request::is('admin/passEvent') or Request::is('admin/scheduledEvent')) ? 'show' : ''); ?>"
                id="collapsePelayanan">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/createEvent') ? 'active' : ''); ?>"
                            href="/admin/createEvent">Buat Acara Baru</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/scheduledEvent') ? 'active' : ''); ?>"
                            href="/admin/scheduledEvent">Acara Terjadwal</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/passEvent') ? 'active' : ''); ?>"
                            href="/admin/passEvent">Acara Yang Telah Berlalu</a></li>
                </ul>
            </div>
        </li>

        <!-- User Page dengan Collapse -->
        <li class="py-1">
            <a class="nav-link text-white d-flex align-items-center <?php echo e((Request::is('admin/highlight') or Request::is('admin/layanan') or Request::is('admin/doa') or Request::is('admin/pastor') or Request::is('admin/artikel') or Request::is('admin/kegiatan')) ? 'active' : ''); ?>"
                data-bs-toggle="collapse" href="#collapseUserPage" role="button"
                aria-expanded="<?php echo e((Request::is('admin/highlight') or Request::is('admin/layanan') or Request::is('admin/doa') or Request::is('admin/pastor') or Request::is('admin/artikel') or Request::is('admin/kegiatan')) ? 'true' : 'false'); ?>"
                aria-controls="collapseUserPage">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                Halaman Pengguna
            </a>
            <div class="collapse <?php echo e((Request::is('admin/highlight') or Request::is('admin/layanan') or Request::is('admin/doa') or Request::is('admin/pastor') or Request::is('admin/artikel') or Request::is('admin/kegiatan')) ? 'show' : ''); ?>"
                id="collapseUserPage">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/highlight') ? 'active' : ''); ?>"
                            href="/admin/highlight">Sorotan</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/layanan') ? 'active' : ''); ?>"
                            href="/admin/layanan">Layanan</a></li>
                    <li class="py-1"><a class="nav-link text-white <?php echo e(Request::is('admin/doa') ? 'active' : ''); ?>"
                            href="/admin/doa">Doa Paroki</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/pastor') ? 'active' : ''); ?>"
                            href="/admin/pastor">Pastor</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/artikel') ? 'active' : ''); ?>"
                            href="/admin/artikel">Artikel</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white <?php echo e(Request::is('admin/kegiatan') ? 'active' : ''); ?>"
                            href="/admin/kegiatan">Kegiatan</a></li>
                </ul>
            </div>
        </li>

    </ul>






</div>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>