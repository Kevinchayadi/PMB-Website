function showDetail() {
    const showElement = document.getElementById('show');
    const hideElement = document.getElementById('hide');

    // Sembunyikan elemen awal
    showElement.classList.add('d-none');
    
    // Hapus data-aos untuk mempersiapkan animasi ulang
    hideElement.removeAttribute('data-aos');

    // Tampilkan elemen detail dengan animasi flip
    hideElement.classList.remove('d-none');

    // Tambahkan kembali data-aos dengan delay untuk memastikan animasi ulang
    setTimeout(() => {
        hideElement.setAttribute('data-aos', 'flip-right');
        AOS.refreshHard(); // Refresh penuh pada AOS untuk mendeteksi elemen baru
    }, 100); // Beri sedikit delay agar perubahan terdeteksi
}

function hideDetail() {
    const showElement = document.getElementById('show');
    const hideElement = document.getElementById('hide');

    // Hapus data-aos untuk mempersiapkan animasi berikutnya
    hideElement.removeAttribute('data-aos');
    
    // Sembunyikan elemen detail
    hideElement.classList.add('d-none');

    // Tampilkan elemen awal
    showElement.classList.remove('d-none');

    // Refresh penuh setelah perubahan
    setTimeout(() => {
        AOS.refreshHard(); // Memastikan elemen dapat dianimasikan ulang
    }, 100); // Beri sedikit delay agar perubahan terdeteksi
}

// Inisialisasi AOS
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        once: false, // Animasi diputar ulang setiap kali elemen muncul
    });
});
