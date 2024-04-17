<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title><?php echo e(ucfirst(AppSettings::get('app_name', 'App'))); ?> - <?php echo e(ucfirst($title)); ?></title>
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('favicon'))); ?> <?php else: ?><?php echo e(asset('assets/img/favicon.png')); ?> <?php endif; ?>">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

		<?php echo $__env->yieldContent('page-css'); ?>

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('logo'))); ?> <?php else: ?><?php echo e(asset('assets/img/logo.png')); ?> <?php endif; ?>" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<?php if($errors->any()): ?>
									<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alerts.danger','data' => ['error' => $error]]); ?>
<?php $component->withName('alerts.danger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($error)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								<?php echo $__env->yieldContent('content'); ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

    </body>
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>

	<?php echo $__env->yieldContent('page-js'); ?>
</html>
<?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/layouts/auth.blade.php ENDPATH**/ ?>