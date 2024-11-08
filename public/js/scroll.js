// Fungsi untuk menyimpan posisi scroll
window.addEventListener('beforeunload', function () {
    const activeTab = document.querySelector('.tab-content[style="display: block;"]');
    if (activeTab) {
        // Menyimpan posisi scroll setiap kali tab berpindah
        sessionStorage.setItem('scrollPositionTab' + activeTab.id, window.scrollY);
    }
});

// Fungsi untuk berpindah tab
function changeTab(tabNumber) {
    // Menyembunyikan semua tab konten
    document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');

    // Menampilkan tab yang dipilih
    document.getElementById('content' + tabNumber).style.display = 'block';

    // Mengambil posisi scroll yang disimpan, jika ada
    const savedPosition = sessionStorage.getItem('scrollPositionTab' + 'content' + tabNumber);
    if (savedPosition !== null) {
        window.scrollTo(0, savedPosition);  // Mengembalikan posisi scroll yang disimpan
    }
}

// Ketika halaman pertama kali dimuat
window.addEventListener('load', function () {
    const currentTab = 1;  // Tentukan tab aktif pertama (misalnya tab pertama)
    const savedPosition = sessionStorage.getItem('scrollPositionTab' + 'content' + currentTab);
    if (savedPosition !== null) {
        window.scrollTo(0, savedPosition);  // Mengembalikan scroll ke posisi yang disimpan
    }
});