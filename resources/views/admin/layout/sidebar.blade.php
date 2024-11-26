<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
<div class="container-fluid   sidebar p-3 m-0">

    <div class="d-flex flex-column align-items-center border-bottom pb-2">
        <img class="logo p-1 col-12" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        <div class="text-center fs-5 text-white">{{ Auth::user()->name ?? 'username' }}</div>
    </div>

    <ul class="fs-5 list-unstyled ">
        <li class="pt-3 pb-1">
            <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"
                        hidden />
                </svg>
                Dashboard
            </a>
        </li>
        <li class="py-1">
            <a class="nav-link text-white {{ (Request::is('admin/admin-list') or Request::is('admin/add-admin') or Request::is('admin/admin-detail') or Request::is('admin/update-admin')) ? 'active' : '' }}"
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
            <a class="nav-link text-white d-flex align-items-center {{ (Request::is('admin/Request-Pending') or Request::is('admin/Request-Processed') or Request::is('admin/Request-Accepted') or Request::is('admin/Request-detail')) ? 'active' : '' }}"
                data-bs-toggle="collapse" href="#collapseRequest" role="button" aria-expanded="false"
                aria-controls="collapseRequest">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                Request
            </a>
            <div class="collapse" id="collapseRequest">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/Request-Pending') ? 'active' : '' }}"
                            href="/admin/Request-Pending">Pending</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/Request-Processed') ? 'active' : '' }}"
                            href="/admin/Request-Processed">In Process</a>
                    </li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/Request-Accepted') ? 'active' : '' }}"
                            href="/admin/Request-Accepted">Accepted</a></li>
                </ul>
            </div>
        </li>

        <!-- Pelayanan dengan Collapse -->
        <li class="py-1">
            <a class="nav-link text-white d-flex align-items-center {{ (Request::is('admin/New-Event') or Request::is('admin/Passed-Event') or Request::is('admin/Scheduled-Event')) ? 'active' : '' }}"
                data-bs-toggle="collapse" href="#collapsePelayanan" role="button" aria-expanded="false"
                aria-controls="collapsePelayanan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                Event
            </a>
            <div class="collapse" id="collapsePelayanan">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/New-Event') ? 'active' : '' }}"
                            href="">Create New</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/Scheduled-Event') ? 'active' : '' }}"
                            href="">Scheduled</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/Passed-Event') ? 'active' : '' }}"
                            href="">Passed</a></li>
                </ul>
            </div>
        </li>

        <!-- User Page dengan Collapse -->
        <li class="py-1">
            <a class="nav-link text-white d-flex align-items-center {{ (Request::is('admin/New-Event') or Request::is('admin/Passed-Event') or Request::is('admin/Scheduled-Event')) ? 'active' : '' }}"
                data-bs-toggle="collapse" href="#collapseUserPage" role="button" aria-expanded="false"
                aria-controls="collapseUserPage">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
                </svg>
                User Page
            </a>
            <div class="collapse" id="collapseUserPage">
                <ul class="list-unstyled ps-5">
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/highlight') ? 'active' : '' }}"
                            href="/admin/highlight">Highlight</a></li>
                    <li class="py-1"><a class="nav-link text-white {{ Request::is('admin/doa') ? 'active' : '' }}"
                            href="/admin/layanan">Layanan</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/pastor') ? 'active' : '' }}"
                            href="/admin/doa">Doa Paroki</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/pastor') ? 'active' : '' }}"
                            href="/admin/pastor">Pastor</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/artikel') ? 'active' : '' }}"
                            href="/admin/artikel">Artikel</a></li>
                    <li class="py-1"><a
                            class="nav-link text-white {{ Request::is('admin/kegiatan') ? 'active' : '' }}"
                            href="/admin/kegiatan">Kegiatan</a></li>
                </ul>
            </div>
        </li>
    </ul>






</div>
