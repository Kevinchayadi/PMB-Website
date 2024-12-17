<?php $__env->startSection('title', 'Layanan - List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-start align-items-center mb-3 text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Layanan List</h1>
    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="/admin/layanan" method="GET" class="d-flex">
                <input type="text" id="searchInput" name="search" class="form-control me-2" value="<?php echo e(request('search')); ?>"
                    placeholder="Search...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
            <a href="/admin/add-layanan" class="btn btn-primary ">Add New Layanan</a>
        </div>
        <div class="rounded overflow-hidden shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acaras): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($acaras->nama_acara); ?></td>
                            <td><?php echo e(Str::limit($acaras->deskripsi_acara, 20, '...')); ?></td>

                            <td>
                                <button class="btn btn-sm btn-outline-primary"><a
                                        href="/admin/edit-layanan/<?php echo e($acaras->slug); ?>"
                                        class="nav-link">Edit</a></button>
                                <form action="/admin/delete-layanan/<?php echo e($acaras->slug); ?>" method="POST"
                                    class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/acara/layanan.blade.php ENDPATH**/ ?>