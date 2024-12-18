function previewImage(event, index) {
    const file = event.target.files[0];  // Ambil file pertama yang dipilih
    const reader = new FileReader();

    reader.onload = function () {
        // Ambil elemen gambar preview dan update src-nya
        const preview = document.getElementById(`current-image-${index}`);
        preview.src = reader.result;  // Set gambar dengan file yang dipilih
    };

    if (file) {
        reader.readAsDataURL(file);  // Membaca file dan mengonversinya menjadi URL yang dapat digunakan sebagai src gambar
    }
}