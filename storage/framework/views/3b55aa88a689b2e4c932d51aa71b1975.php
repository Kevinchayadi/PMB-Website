<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->make('admin.layout.bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.Layout.font', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/hover.css')); ?>">

</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0 " style="max-width: 100%; max-height=100vh;">
            <div class=" col-3 col-md-3 col-lg-2  p-0">
                <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="main col-9 col-md-9 col-lg-10 p-0 m-0 ">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/admin/layout/template.blade.php ENDPATH**/ ?>