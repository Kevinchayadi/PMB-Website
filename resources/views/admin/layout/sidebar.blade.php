<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
<div class="container-fluid   sidebar p-3 m-0">

    <div class="d-flex flex-column align-items-center border-bottom pb-2">
        <img class="logo p-1 col-12" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        <div class="text-center fs-5 text-white">{{ Auth::user()->name?? 'username' }}</div>
    </div>

    <ul class="fs-5 list-unstyled ">
    <li class= pt-3 pb-1">
        <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Dashboard
        </a>
    </li>
    <li class= py-1">
        <a class="nav-link text-white" href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Admin
        </a>
    </li>

    <li class= py-1">
        <a class="nav-link text-white" href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-chevron-right me-2 chevron-icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1 0-.708"  hidden/>
            </svg>
            Jenis Pelayanan
        </a>
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
            <ul class="list-unstyled">
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 1</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 2</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 3</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 1</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 2</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 3</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 1</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 2</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 3</a></li>
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
            <ul class="list-unstyled">
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 1</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 2</a></li>
                <li class="py-1"><a class="nav-link text-white" href="">Submenu 3</a></li>
            </ul>
        </div>
    </li>
</ul>






</div>
