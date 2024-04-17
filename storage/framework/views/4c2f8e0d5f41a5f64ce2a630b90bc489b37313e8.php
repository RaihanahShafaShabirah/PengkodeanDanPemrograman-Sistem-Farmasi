

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-12">
	<h3 class="page-title">Tambah Pemasok</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Tambah Pemasok</li>
	</ul>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				
		
			<!-- Add Medicine -->
			<form method="post" enctype="multipart/form-data" action="<?php echo e(route('add-supplier')); ?>">
				<?php echo csrf_field(); ?>
				
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="name">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Email<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="email" id="email">
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nomor Telepon<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="phone">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Perusahaan<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="company">
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Alamat <span class="text-danger">*</span></label>
								<input type="text" name="address" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Produk</label>
							<input type="text" name="product" class="form-control">
						</div>
					</div>
				</div>			
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-12">
							<label>Komentar</label>
							<textarea name="description" class="form-control" cols="30" rows="10"></textarea>
						</div>
					</div>
				</div>
				
				<div class="submit-section">
					<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
				</div>
			</form>
			<!-- /Add Medicine -->


			</div>
		</div>
	</div>			
</div>
<?php $__env->stopSection(); ?>	

<?php $__env->startPush('page-js'); ?>
	<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<!-- Datetimepicker JS -->
	<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>	
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/add-supplier.blade.php ENDPATH**/ ?>