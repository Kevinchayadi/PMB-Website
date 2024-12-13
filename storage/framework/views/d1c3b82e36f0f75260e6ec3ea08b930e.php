<?php $__env->startSection('title', 'Event - List'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/event.css')); ?>">
    <div class="d-flex justify-content-end  align-items-center my-3  text-center">
        <h1 class="mb-0 fw-bold  p-2 text-white bg-primary shadow rounded-start-2">Layanan List</h1>

    </div>

    <div class="px-4">
        <?php if($event->count() > 0): ?>
            <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="px-4 py-2 my-3 mx-1 card-3d">
                    <h2><?php echo e($data->transaction_details->acara->nama_acara); ?>t</h2>
                    <div class="d-flex justify-content-between">
                        <p><?php echo e($data->jadwal_transaction); ?> </p>
                        <p><?php echo e($data->transaction_details->deskripsi_transaksi); ?></p>
                        <div>
                            <a href="/admin/updateEvent/<?php echo e($data->id_transaction); ?>">Update</a>
                            <a href="admin/deleteEvent/<?php echo e($data->id_transaction); ?>">Cancel</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>Data layanan masih kosong!</p>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/eventList.blade.php ENDPATH**/ ?>