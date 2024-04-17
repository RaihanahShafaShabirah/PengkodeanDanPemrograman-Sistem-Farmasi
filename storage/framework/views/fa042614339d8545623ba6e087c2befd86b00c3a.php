<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(ucfirst(AppSettings::get('app_name', 'App'))); ?> - <?php echo e(ucfirst($title ?? '')); ?></title>
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('favicon'))); ?> <?php else: ?><?php echo e(asset('assets/img/favicon.png')); ?> <?php endif; ?>">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/fontawesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome/css/all.min.css')); ?>">

		<!-- Feathericon CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/css/feathericon.min.css')); ?>">

		<!-- Snackbar CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/snackbar/snackbar.min.css')); ?>">
		<!-- Toastr CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr/toastr.css')); ?>">
		<!-- Datatables css -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/DataTables/datatables.css')); ?>">

		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

		<!-- Custom css -->
		<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">


		<!-- page css -->
		<?php echo $__env->yieldPushContent('page-css'); ?>

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Header -->

			<!-- Sidebar -->
            <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">

                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<?php echo $__env->yieldPushContent('page-header'); ?>
						</div>
					</div>
					<!-- /Page Header -->
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
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->


    </body>
	<!-- jQuery -->
	<script src="<?php echo e(asset('assets/js/jquery-3.2.1.min.js')); ?>"></script>

	<!-- Bootstrap Core JS -->
	<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

	<!-- Slimscroll JS -->
	<script src="<?php echo e(asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

	<!-- Snackbar Js -->
	<script src="<?php echo e(asset('assets/plugins/snackbar/snackbar.min.js')); ?>"></script>

	<!-- Toastr Js -->
	<script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>"></script>

	<!-- Custom JS -->
	<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/datatables-customizer.js')); ?>"></script>

	<script>
		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option'
			});
		});
		<?php if(Session::has('message')): ?>
			var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
			switch(type){
				case 'info':
					Snackbar.show({
						text: "<?php echo e(Session::get('message')); ?>",
						actionTextColor: '#fff',
						backgroundColor: '#2196f3'
					});
					break;

				case 'warning':
					Snackbar.show({
						text: "<?php echo e(Session::get('message')); ?>",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#e2a03f'
					});
					break;

				case 'success':
					Snackbar.show({
						text: "<?php echo e(Session::get('message')); ?>",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#8dbf42'
					});
					break;

				case 'danger':
					Snackbar.show({
						text: "<?php echo e(Session::get('message')); ?>",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#e7515a'
					});
					break;
			}
		<?php endif; ?>
	</script>
	<!-- Datatables js -->
	<script src="<?php echo e(asset('assets/plugins/DataTables/datatables.min.js')); ?>"></script>
	<!-- page js -->
	<?php echo $__env->yieldPushContent('page-js'); ?>

</html>


<?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>