<?php
	$title = "app Setting";
?>


<?php $__env->startPush('page-css'); ?>
	<!-- Select2 css-->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('page-header'); ?>
<div class="col-sm-12">
	<h3 class="page-title">[Pengaturan Umum]</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
		<li class="breadcrumb-item active">[Pengaturan Umum]</li>
	</ul>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">				
	<div class="col-12">
		<?php echo $__env->make('app_settings::_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
	<!-- Select2 js-->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/settings.blade.php ENDPATH**/ ?>