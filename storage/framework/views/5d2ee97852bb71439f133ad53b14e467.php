<?php $__env->startSection('title', 'Layanan'); ?>

<?php $__env->startSection('content'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/layanan.css')); ?>">
    <div class="container-fluid row mx-auto">
        <div class="col-lg-4 col-12 p-2">
            <div class="bg-primary rounded p-2" data-bs-toggle="modal" data-bs-target="#doaabcde">
                
                <img class="img-fluid rounded-3 mb-2" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">

                
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Layanan A</div>
                </div>
            </div>
            <div class="modal fade" id="doaabcde" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="doaabcde" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="doaabcde">Layanan A</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis
                            tempore
                            consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                            cupiditate quaerat totam repellendus officiis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                            quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                            necessitatibus
                            quidem.
                        </div>

                        <div class="modal-btn text-center mb-2">
                            <a class="btn btn-outline-primary text-primary bg-white" data-bs-toggle="modal"
                                data-bs-target="#form-a">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="form-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="form-a" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="form-a">Daftar Layanan A</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="InputName" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="InputName">
                                </div>

                                <div class="mb-3">
                                    <label for="InputEmail" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="InputEmail">
                                </div>

                                <div class="mb-3">
                                    <label for="InputNumber" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="InputNumber">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.Layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/user/ViewPage/layanan.blade.php ENDPATH**/ ?>