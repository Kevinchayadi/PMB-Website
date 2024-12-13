<?php $__env->startSection('title', 'Admin - List'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end  align-items-center my-3  text-center">
    <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Admin List</h1>

</div>

<div class="px-4">
    <!-- Pagination and Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">
       <a href="/admin/add-admin" class="btn btn-primary ">Add New Admin</a>
        

        <input type="text" id="searchInput" class="form-control w-25" placeholder="Search...">

    </div>

    <!-- Table -->
    <div class="rounded overflow-hidden shadow-sm">
        <table class="table table-hover table-striped mb-0 text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Admin</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($index + 1); ?></th>
                        <td><?php echo e($admin->id); ?></td>
                        <td><?php echo e($admin->username); ?></td>
                        <td><?php echo e($admin->password); ?></td>
                        <td><?php echo e($admin->roles->role); ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if($admins->total() > 0): ?>
    <div class="mt-1 text-center">
        <small class="text-muted">
            Show <?php echo e($admins->firstItem()); ?> until <?php echo e($admins->lastItem()); ?> from <?php echo e($admins->total()); ?> data admin
        </small>
    </div>
    <nav class="mt-2">
        <ul class="pagination justify-content-center mb-0" id="pagination">
            <!-- Previous Button -->
            <?php if($admins->onFirstPage()): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#"><</a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($admins->previousPageUrl()); ?>"><</a>
                </li>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php for($i = 1; $i <= $admins->lastPage(); $i++): ?>
                <li class="page-item <?php echo e($admins->currentPage() == $i ? 'active' : ''); ?>">
                    <a class="page-link" href="<?php echo e($admins->url($i)); ?>"><?php echo e($i); ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <?php if($admins->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($admins->nextPageUrl()); ?>">></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/adminlist.blade.php ENDPATH**/ ?>