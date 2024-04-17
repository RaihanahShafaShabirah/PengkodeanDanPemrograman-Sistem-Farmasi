

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
	
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-12">
	<h3 class="page-title">Tambah Pembelian</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Tambah Pembelian</li>
	</ul>
</div>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				
				<!-- Add Medicine -->
				<form method="post" enctype="multipart/form-data" autocomplete="off" action="<?php echo e(route('add-purchase')); ?>">
					<?php echo csrf_field(); ?>
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Nama Obat<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="name" >
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Kategori <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="category"> 
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Supplier <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="supplier"> 
										<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Cost Price<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="price">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Kuantitas<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="quantity">
								</div>
							</div>
						</div>
					</div>

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tanggal Kadaluarsa<span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="expiry_date">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Foto Obat</label>
									<input type="file" name="image" class="form-control">
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="submit-section">
						<button class="btn btn-primary submit-btn" type="submit" >Submit</button>
					</div>
				</form>
				<!-- /Add Medicine -->

			</div>
		</div>
	</div>			
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
	<!-- Datetimepicker JS -->
	<script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
	<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/add-purchase.blade.php ENDPATH**/ ?>