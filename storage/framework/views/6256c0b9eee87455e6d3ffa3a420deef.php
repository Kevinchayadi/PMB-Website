<?php $__env->startSection('title', 'Artikel - List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-end  align-items-center my-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Artikel List</h1>

    </div>

    <div class="px-4">
        <!-- Pagination and Search -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="/admin/add-artikel" class="btn btn-primary ">Add New Artikel</a>
            <nav>
                <ul class="pagination mb-0" id="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

            <input type="text" id="searchInput" class="form-control w-25" placeholder="Search...">

        </div>

        <div class="event rounded-3 shadow-lg bg-primary">
            <div class="event-inner ms-2 bg-white p-4 rounded-end row">
                <div class="col-10 event-title fs-5 fw-bolder text-primary">Artikel A</div>
                <div class="col-2 action d-flex justify-content-evenly">
                    <a href="/admin/edit-artikel/0" class="nav-link text-primary">Edit</a>
                    <a href="/admin/delete-artikel/0" class="nav-link text-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/artikel/artikel.blade.php ENDPATH**/ ?>