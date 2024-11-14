<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
<div class="container-fluid   sidebar p-3 m-0">

    <div class="d-flex flex-column align-items-center border-bottom pb-2">
        <img class="logo p-1 col-12" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        <div class="text-center fs-5 text-white">{{ Auth::user()->name?? 'username' }}</div>
    </div>

    <ul class="fs-5 list-unstyled ">
    <li class= pt-3 pb-1">
        <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="admin/dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Dashboard
        </a>
    </li>
    <li class= py-1">
        <a class="nav-link text-white" href="/admin/admin-list">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Admin
        </a>
    </li>

    <li class= py-1">
        <a class="nav-link text-white" href="/admin/layanan">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Layanan
        </a>
    </li>
    <li class= py-1">
        <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#collapseRequest" role="button"
            aria-expanded="false" aria-controls="collapseRequest">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
            </svg>
            Request
        </a>
        <div class="collapse" id="collapseRequest">
            <ul class="list-unstyled ps-5">
                <li class="py-1"><a class="nav-link text-white" href="">Pending</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">In Process</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Accepted</a></li>
            </ul>
        </div>
    </li>

    <!-- Pelayanan dengan Collapse -->
    <li class= py-1">
        <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#collapsePelayanan" role="button"
            aria-expanded="false" aria-controls="collapsePelayanan">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
            </svg>
            Event
        </a>
        <div class="collapse" id="collapsePelayanan">
            <ul class="list-unstyled ps-5">
                <li class="py-1"><a class="nav-link text-white" href="">sakramen baptis</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Sakramen Tobat</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Komuni Pertama</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Krisma</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Pernikahan</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">pengurapan</a></li>
            </ul>
        </div>
    </li>



    <!-- User Page dengan Collapse -->
    <li class=" py-1">
        <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#collapseUserPage" role="button"
            aria-expanded="false" aria-controls="collapseUserPage">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708" />
            </svg>
            User Page
        </a>
        <div class="collapse " id="collapseUserPage">
            <ul class="list-unstyled ps-5">
                <li class="py-1"><a class="nav-link text-white" href="">home</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Doa Paroki</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">pastor</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Kegiatan</a></li>
            </ul>
        </div>
    </li>
</ul>






</div>
