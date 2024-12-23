<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/login.css')); ?>">
    <?php echo $__env->make('user.layout.bootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.layout.font', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div class="container-fluid row justify-content-center align-content-center">
        <div class="title fs-5 fw-bolder text-center">Let's Sign In You To PMB Admin</div>
        <div class="col-6">
            <div class="image h-100 p-4">
                <img class="img-fluid h-100 rounded-3 shadow-lg" src="<?php echo e(asset('picture/Gereja.jpg')); ?>" alt="">
            </div>
        </div>
        <div class="col-6">
            <div class="card border-0">
                
                
                <div class="card-body">
                    <form method="POST" action="/admin/login">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="text">username</label>
                            <input type="username" name="username" class="form-control" id="username" required
                                autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <div class="form-group mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\PMB-Website\resources\views/auth/adminLogin.blade.php ENDPATH**/ ?>