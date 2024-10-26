function showDetail() {
    const showElement = document.getElementById('show');
    const hideElement = document.getElementById('hide');

    // Sembunyikan elemen awal
    showElement.classList.add('d-none');
    
    // Tampilkan elemen detail dengan animasi flip
    hideElement.classList.remove('d-none');
    hideElement.setAttribute('data-aos', 'flip-right');
    
}

// Fungsi untuk menyembunyikan detail dan kembali ke tampilan awal
function hideDetail() {
    const showElement = document.getElementById('show');
    const hideElement = document.getElementById('hide');

    // Sembunyikan elemen detail
    hideElement.classList.add('d-none');
    
    // Tampilkan elemen awal
    showElement.classList.remove('d-none');
}

// Inisialisasi AOS
document.addEventListener('DOMContentLoaded', () => {
    AOS.init();
});