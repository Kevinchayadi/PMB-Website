function show() {
    const hideElement = document.getElementById('hide');
    const showElement = document.getElementById('show');

    // Sembunyikan elemen 'show' dan tampilkan elemen 'hide'
    showElement.style.display = 'none';
    hideElement.style.display = 'block';

    // Tambahkan kembali animasi AOS
    hideElement.setAttribute('data-aos', 'flip-right');
    AOS.refresh(); // Refresh AOS agar animasi diterapkan
}

function hide() {
    const hideElement = document.getElementById('hide');
    const showElement = document.getElementById('show');

    // Sembunyikan elemen 'hide' dan tampilkan elemen 'show'
    hideElement.style.display = 'none';
    showElement.style.display = 'block';
}

// Inisialisasi tampilan awal
document.getElementById('hide').style.display = 'none';
