<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Umat</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Registrasi Umat</h2>

        <!-- Pesan kesalahan validasi -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('umat.register.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Token CSRF untuk keamanan form -->

            <!-- Nama Umat -->
            <div class="mb-3">
                <label for="nama_umat" class="form-label">Nama Umat</label>
                <input type="text" class="form-control" id="nama_umat" name="nama_umat" placeholder="Masukkan nama umat" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <div class="form-text">Pastikan email mengandung @ dan domain yang valid (seperti .com).</div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
            </div>

            <!-- Wilayah -->
            <div class="mb-3">
                <label for="wilayah" class="form-label">Wilayah</label>
                <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Masukkan wilayah" required>
            </div>

            <!-- Lingkungan -->
            <div class="mb-3">
                <label for="lingkungan" class="form-label">Lingkungan</label>
                <input type="text" class="form-control" id="lingkungan" name="lingkungan" placeholder="Masukkan lingkungan" required>
            </div>

            <!-- Nomor HP -->
            <div class="mb-3">
                <label for="nomohp_umat" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomohp_umat" name="nomohp_umat" placeholder="Masukkan nomor HP" required pattern="\d+">
                <div class="form-text">Hanya angka yang diperbolehkan.</div>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="" selected disabled>Pilih status...</option>
                    <option value="menikah">Menikah</option>
                    <option value="belum_menikah">Belum Menikah</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Pekerjaan -->
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/auth/umatRegister.blade.php ENDPATH**/ ?>