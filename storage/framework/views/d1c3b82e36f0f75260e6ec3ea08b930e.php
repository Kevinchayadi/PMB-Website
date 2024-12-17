<?php $__env->startSection('title', 'Event - List'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/event.css')); ?>">

    <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

    <div class="d-flex justify-content-start  align-items-center mb-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-end-2">Scheduled Event</h1>

    </div>

    <div class="rounded overflow-hidden shadow-sm mx-5">
        <?php if($event->count() > 0): ?>
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Nama Acara</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($index + 1); ?></th>
                            <td><?php echo e($data->judul); ?></td> <!-- Nama data -->
                            <td><?php echo e($data->transactionDetails->acara->nama_acara); ?></td> <!-- Nama Acara -->
                            <td><?php echo e($data->jadwal_transaction); ?></td> <!-- Jadwal -->
                            <td><?php echo e($data->transactionDetails->deskripsi_transaksi); ?></td> <!-- Deskripsi -->
                            <td>
                                <!-- Update Button -->
                                <a href="/admin/updateEvent/<?php echo e($data->id_transaction); ?>" class="btn btn-sm btn-outline-primary">Update</a>
                                <a href="/admin/selesaiEvent/<?php echo e($data->id_transaction); ?>" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan event ini?');" class="btn btn-sm btn-outline-success">Selesai</a>
    
                                <!-- Delete Button with confirmation -->
                                <form action="<?php echo e(route('admin.delete.transaksi', $data->id_transaction)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                        Delete
                                    </button>
                                </form>
    
                                <!-- Selesai Button -->
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Data layanan masih kosong!</p>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/eventList.blade.php ENDPATH**/ ?>