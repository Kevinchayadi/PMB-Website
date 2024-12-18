<?php $__env->startSection('title', 'Doa - List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Doa List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/doa" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="<?php echo e(request('search')); ?>"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-doa" class="btn btn-primary ">Add New Doa</a>
        </div>
        <?php if($doa->count() > 0): ?>
            <div class="rounded overflow-hidden shadow-sm">
                <table class="table table-hover table-striped mb-0 text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul Doa</th>
                            <th scope="col">Deskripsi Doa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $doa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($doas->nama_doa); ?></td>
                                <td><?php echo e(Str::limit($doas->deskripsi_doa, 20)); ?></td>

                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><a href="/admin/edit-doa/1"
                                            class="nav-link">Edit</a></button>
                                    <button class="btn btn-sm btn-outline-danger"><a href="/admin/delete-doa/1"
                                            class="nav-link">Delete</a></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="fs-5 fw-bolder text-center">Doa tidak ada</div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/doa/doa.blade.php ENDPATH**/ ?>