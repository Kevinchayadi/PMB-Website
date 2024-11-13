// Menyimpan posisi scroll sebelum meninggalkan halaman
window.addEventListener('beforeunload', function () {
    localStorage.setItem('scrollPosition', window.scrollY);
});

// Mengambil posisi scroll setelah halaman dimuat
window.addEventListener('load', function () {
    let scrollPosition = localStorage.getItem('scrollPosition');
    if (scrollPosition) {
        window.scrollTo(0, scrollPosition);
        localStorage.removeItem('scrollPosition');
    }
});