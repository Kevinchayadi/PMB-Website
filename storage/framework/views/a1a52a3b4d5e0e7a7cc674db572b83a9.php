<?php $__env->startSection('title', 'Admin - List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Pending Request</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded shadow-sm">
            <div class="d-flex align-items-center">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Request..."
                    aria-label="Search Request">
                <button class="btn btn-outline-primary ms-2" type="button">
                    Search
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Request</th>
                        <th scope="col">Tipe Request</th>
                        <th scope="col">Tanggal Request</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $requestList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($key + 1); ?></th>
                            <td><?php echo e($data->nama_terlibat_satu); ?></td>
                            <td><?php echo e($data->nama_acara); ?></td>
                            <td><?php echo e($data->jadwal_acara); ?></td>
                            <td>
                                <!-- Accept Form -->
                                

                                <!-- Button to trigger the detail modal -->
                                <button 
                                    class="btn btn-sm btn-outline-info" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#detailModal<?php echo e($data->id); ?>">
                                    Detail
                                </button>

                                <!-- Button to trigger the reject modal -->
                                
                            </td>
                        </tr>

                        <!-- Modal for Details -->
                        <div class="modal fade" id="detailModal<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="detailModalLabel<?php echo e($data->id); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel<?php echo e($data->id); ?>">Request Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Terlibat Satu:</strong> <?php echo e($data->nama_terlibat_satu); ?></p>
                                        <p><strong>Nama Terlibat Dua:</strong> <?php echo e($data->nama_terlibat_dua); ?></p>
                                        <p><strong>Nama Romo:</strong> <?php echo e($data->nama_romo); ?></p>
                                        <p><strong>Jadwal:</strong> <?php echo e($data->jadwal_acara); ?></p>
                                        <p><strong>Deskripsi:</strong> <?php echo e($data->deskripsi_pengajuan); ?></p>
                                    </div>
                                    
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Reject -->
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">No data available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/acceptedRequest.blade.php ENDPATH**/ ?>