

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-12">
	<h3 class="page-title">Mengubah Produk</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Mengubah Produk</li>
	</ul>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				

			<!-- Edit Medicine -->
				<form method="post" enctype="multipart/form-data" id="update_service" action="<?php echo e(route('edit-product',$product)); ?>">
					<?php echo csrf_field(); ?>
					<div class="service-fields mb-3">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="form-group">
									<label>Produk <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="product"> 
										<?php $__currentLoopData = $purchased_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchased_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option <?php if($purchased_product->id==$product->purchase->id): ?>selected <?php endif; ?> value="<?php echo e($purchased_product->id); ?>"><?php echo e($purchased_product->name); ?></option>
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
									<label>Harga Jual<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="price" value="<?php echo e($product->price); ?>">
								</div>
							</div>
	
							<div class="col-lg-6">
								<div class="form-group">
									<label>Diskon (%)<span class="text-danger">*</span></label>
									<input class="form-control" value="<?php echo e($product->discount); ?>" type="text" name="discount" value="<?php echo e(old('discount')); ?>">
								</div>
							</div>
							
						</div>
					</div>
	
									
					
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Deskripsi <span class="text-danger">*</span></label>
									<textarea class="form-control service-desc" value="<?php echo e($product->description); ?>" name="description"><?php echo e($product->description); ?></textarea>
								</div>
							</div>
							
						</div>
					</div>					
					
					<div class="submit-section">
						<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
					</div>
				</form>
			<!-- /Edit Medicine -->


			</div>
		</div>
	</div>			
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('page-js'); ?>
	<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/edit-product.blade.php ENDPATH**/ ?>