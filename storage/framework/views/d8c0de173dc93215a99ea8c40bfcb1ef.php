<?php $__env->startSection('title', 'Pastor - List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Pastor List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/pastor" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="<?php echo e(request('search')); ?>"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-pastor" class="btn btn-primary ">Add New Pastor</a>
        </div>

        <!-- Table -->
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Pastor</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pastor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $romo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($index + 1); ?></th>
                            <td><?php echo e($romo->nama_romo); ?></td>
                            <td><?php echo e($romo->jabatan); ?></td>
                            <td>
                                <a href="/admin/edit-pastor/<?php echo e($romo->id_romo); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="/admin/delete-pastor/<?php echo e($romo->id_romo); ?>" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this pastor?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center">No data available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/pastor/Pastor.blade.php ENDPATH**/ ?>