<?php $__env->startSection('title', 'Admin - Article Page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <form class="form" action="/admin/highlight" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terjadi Kesalahan!</strong>
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="section-1 mb-3">
                
                <div class="title fs-4 fw-bolder">Carousel</div>
                <div class="row">
                    <div class="col-4">
                        <img id="preview-highlight1" src="<?php echo e(asset($highlight[0]->path)); ?>" class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 1">
                        <input type="file" id="highlight1" name="highlight1" 
                            class="form-control btn btn-primary rounded-3 w-100 <?php $__errorArgs = ['highlight1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            onchange="previewImage(this, 'preview-highlight1')">
                        <?php $__errorArgs = ['highlight1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-4">
                        <img id="preview-highlight2" src="<?php echo e(asset($highlight[1]->path)); ?>" class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 2">
                        <input type="file" id="highlight2" name="highlight2" 
                            class="form-control btn btn-primary rounded-3 w-100 <?php $__errorArgs = ['highlight2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            onchange="previewImage(this, 'preview-highlight2')">
                        <?php $__errorArgs = ['highlight2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-4">
                        <img id="preview-highlight3" src="<?php echo e(asset($highlight[2]->path)); ?>" class="img-fluid rounded-3 shadow-lg mb-2" alt="Carousel 3">
                        <input type="file" id="highlight3" name="highlight3" 
                            class="form-control btn btn-primary rounded-3 w-100 <?php $__errorArgs = ['highlight3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            onchange="previewImage(this, 'preview-highlight3')">
                        <?php $__errorArgs = ['highlight3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <div class="section-2 mb-3">
                <div class="title fs-4 fw-bolder">Banner Atas</div>
                
                <div class="card mx-auto mb-3 col-9 bg-dark rounded-3 shadow-lg d-lg-block d-none">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img id="preview-highlight4" src="<?php echo e(asset($highlight[4]->path)); ?>" class="img-fluid rounded-start mb-2" alt="Banner Atas">
                            <input type="file" id="highlight4" name="highlight4" 
                                class="form-control btn btn-primary rounded-3 w-100 <?php $__errorArgs = ['highlight4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                onchange="previewImage(this, 'preview-highlight4')">
                            <?php $__errorArgs = ['highlight4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                                    <input type="text" class="text-secondary form-control"
                                        placeholder="<?php echo e($highlight[4]->nama); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-3 mb-3">
                <div class="title fs-4 fw-bolder">Banner Bawah</div>
                
                <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
                    <img id="preview-highlight5" class="object-fit-contain w-100 rounded-3" src="<?php echo e(asset($highlight[3]->path)); ?>" alt="Banner Bawah">
                    <input type="file" id="highlight5" name="highlight5" 
                        class="form-control btn btn-primary rounded-3 w-100 <?php $__errorArgs = ['highlight5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        onchange="previewImage(this, 'preview-highlight5')">
                    <?php $__errorArgs = ['highlight5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="save text-end mb-2 p-2">
                <button type="submit" class="btn btn-primary fw-bolder">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/viewPage/landingpage/highlight.blade.php ENDPATH**/ ?>