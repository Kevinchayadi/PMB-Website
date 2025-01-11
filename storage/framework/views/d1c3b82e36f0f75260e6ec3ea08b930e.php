<?php $__env->startSection('title', 'Tabel Acara'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/admin/event.css')); ?>">

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Acara Terjadwal</h1>
    </div>

    <div class="btn btn-primary mx-5 mb-3" data-bs-toggle="modal" data-bs-target="#uploadexcelmodal">Unggah File Excel</div>

    <div class="modal fade" id="uploadexcelmodal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Unggah Acara</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Upload -->
                    <form action="<?php echo e(route('admin.ImportEvent')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="btn btn-outline-primary upload-area w-100 p-5 mb-3"
                            style="border: 2px dashed !important">
                            <label for="uploadfile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                                    class="bi bi-upload" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                </svg>
                                <div class="fs-5">Unggah file di sini</div>
                            </label>
                            <input type="file" id="uploadfile" name="file" accept=".xlsx, .xls"
                                onchange="displayFileName()" />
                        </div>

                        <!-- Menampilkan Nama File yang Dipilih -->
                        <div id="fileNameDisplay" class="mt-3"></div>

                        <div class="d-flex row">
                            <div class="col-6">
                                <div class="btn btn-outline-warning w-100" onclick="downloadTemplate()">Unduh Template</div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-success w-100">Unggah Excel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded overflow-hidden shadow-sm mx-5">
        
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Judul Acara</th>
                    <th scope="col">Nama Acara</th>
                    <th scope="col">Jadwal Acara</th>
                    <th scope="col">Deskripsi Acara</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th scope="row"><?php echo e($index + 1); ?></th>
                        <td><?php echo e($data->judul); ?></td> <!-- Nama data -->
                        <td><?php echo e($data->transactionDetails->acara->nama_acara); ?></td> <!-- Nama Acara -->
                        <td><?php echo e($data->jadwal_transaction); ?></td> <!-- Jadwal -->
                        <td><?php echo e($data->transactionDetails->deskripsi_transaksi); ?></td> <!-- Deskripsi -->
                        <td>
                            <!-- Update Button -->
                            <a href="/admin/updateEvent/<?php echo e($data->id_transaction); ?>"
                                class="btn btn-sm btn-outline-primary">Perbarui</a>
                            <a href="/admin/selesaiEvent/<?php echo e($data->id_transaction); ?>"
                                onclick="return confirm('Apakah Anda yakin ingin menyelesaikan event ini?');"
                                class="btn btn-sm btn-outline-success">Selesai</a>

                            <!-- Delete Button with confirmation -->
                            <form action="<?php echo e(route('admin.delete.transaksi', $data->id_transaction)); ?>" method="POST"
                                class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                    Hapus
                                </button>
                            </form>

                            <!-- Selesai Button -->
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5">Data acara tidak ada</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
        <?php if($event->total() > 0): ?>
            <div class="mt-1 text-center">
                <small class="text-muted">
                    Tampilkan <?php echo e($event->firstItem()); ?> sampai <?php echo e($event->lastItem()); ?> dari <?php echo e($event->total()); ?> data
                    admin
                </small>
            </div>
            <nav class="mt-2">
                <ul class="pagination justify-content-center mb-0" id="pagination">
                    <!-- Previous Button -->
                    <?php if($event->onFirstPage()): ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                < </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($event->previousPageUrl()); ?>">
                                << /a>
                        </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php for($i = 1; $i <= $event->lastPage(); $i++): ?>
                        <li class="page-item <?php echo e($event->currentPage() == $i ? 'active' : ''); ?>">
                            <a class="page-link" href="<?php echo e($event->url($i)); ?>"><?php echo e($i); ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <?php if($event->hasMorePages()): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($event->nextPageUrl()); ?>">></a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

        <?php endif; ?>
        
    </div>

    <script>
        function downloadTemplate() {
            window.location.href = "/admin/exportEventTemplate";
        }
        function displayFileName() {
        var fileInput = document.getElementById("uploadfile");
        var fileName = fileInput.files[0] ? fileInput.files[0].name : "No file selected"; // Menangani kondisi jika tidak ada file yang dipilih
        var fileNameDisplay = document.getElementById("fileNameDisplay");

        fileNameDisplay.innerHTML = "<strong>File yang dipilih: </strong>" + fileName;
    }

        function submitExcel() {
            let fileInput = document.getElementById('uploadfile');
            if (fileInput.files.length == 0) {
                alert("Silakan pilih file sebelum mengirim.");
                return;
            }

            let formData = new FormData();
            formData.append('file', fileInput.files[0]);

            fetch('/admin/ImportEvent', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert("File berhasil dikirim.");
                })
                .catch(error => {
                    alert("Terjadi kesalahan saat mengirim file.");
                    console.error('Error:', error);
                });
        }
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/eventList.blade.php ENDPATH**/ ?>