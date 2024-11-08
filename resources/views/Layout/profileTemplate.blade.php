<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('Layout.boostrap')
    @include('Layout.font')
</head>

<body>
    @include('Layout.header')
    <div class="container-fluid mt-0 row mx-auto">
        <div class="col-2 border-end d-lg-block d-none">
            @include('Layout.leftpage')
        </div>
        <div class="col-lg-8 col-12">
            @include('Layout.card')
            @yield('content')
        </div>
        <div class="col-2 border-start d-lg-block d-none">
            @include('Layout.rightpage')
        </div>
    </div>
    @include('Layout.footer')

    @push('scripts')
        <script>
            // Fungsi untuk menyimpan posisi scroll
            window.addEventListener('beforeunload', function() {
                const activeTab = document.querySelector('.tab-content[style="display: block;"]');
                if (activeTab) {
                    // Menyimpan posisi scroll setiap kali tab berpindah
                    sessionStorage.setItem('scrollPositionTab' + activeTab.id, window.scrollY);
                }
            }), {
                passive: true
            };

            // Fungsi untuk berpindah tab
            function changeTab(tabNumber) {
                // Menyembunyikan semua tab konten
                document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');

                // Menampilkan tab yang dipilih
                document.getElementById('content' + tabNumber).style.display = 'block';

                // Mengambil posisi scroll yang disimpan, jika ada
                const savedPosition = sessionStorage.getItem('scrollPositionTab' + 'content' + tabNumber);
                if (savedPosition !== null) {
                    window.scrollTo(0, savedPosition); // Mengembalikan posisi scroll yang disimpan
                }
            }

            // Ketika halaman pertama kali dimuat
            window.addEventListener('load', function() {
                const currentTab = 1; // Tentukan tab aktif pertama (misalnya tab pertama)
                const savedPosition = sessionStorage.getItem('scrollPositionTab' + 'content' + currentTab);
                if (savedPosition !== null) {
                    window.scrollTo(0, savedPosition); // Mengembalikan scroll ke posisi yang disimpan
                }
            }), {
                passive: true
            };
        </script>
    @endpush
    {{-- <script src="{{ asset('js/scroll.js') }}"></script> --}}
</body>

</html>
