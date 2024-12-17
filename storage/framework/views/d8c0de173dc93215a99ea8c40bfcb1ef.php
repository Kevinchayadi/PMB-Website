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
                    <tr>
                        <th scope="row">1</th>
                        <td>Pastor A</td>
                        <td>Lorem Ipsum sjslslasalks ....</td>

                        <td>
                            <button class="btn btn-sm btn-outline-primary"><a href="/admin/edit-pastor/1"
                                    class="nav-link">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="/admin/delete-pastor/1"
                                    class="nav-link">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/pastor/Pastor.blade.php ENDPATH**/ ?>