

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 css-->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Penjualan</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Penjualan</li>
	</ul>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales')): ?>
<div class="col-sm-5 col">
	<a href="#add_sales" data-toggle="modal" class="btn btn-primary float-right mt-2">Tambah Penjualan</a>
</div>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
	
		<!-- Recent Sales -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Nama Obat</th>
								<th>Kuantitas</th>
								<th>Total Harga</th>
								<th>Tanggal</th>
								<th class="action-btn">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(!(empty($sale->product->purchase))): ?>
									<tr>
										<td><?php echo e($sale->product->purchase->name); ?></td>
										<td><?php echo e($sale->quantity); ?></td>
										<td><?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e(($sale->total_price)); ?></td>
										<td><?php echo e(date_format(date_create($sale->created_at),"d M, Y")); ?></td>
										<td>
											<div class="actions">
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-sales')): ?>
												<a data-id="<?php echo e($sale->id); ?>" data-product="<?php echo e($sale->product_id); ?>" data-quantity="<?php echo e($sale->quantity); ?>" class="btn btn-sm bg-success-light editbtn" href="javascript:void(0);">
													<i class="fe fe-pencil"></i> Edit
												</a>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy-sales')): ?>
												<a data-id="<?php echo e($sale->id); ?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
													<i class="fe fe-trash"></i> Delete
												</a>
												<?php endif; ?>
											</div>
										</td>
									</tr>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Recent sales -->
		
	</div>
</div>
<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'sales','title' => 'Product Sale']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('sales'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Product Sale')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<!-- Add Modal -->
<div class="modal fade" id="add_sales" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sell Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo e(route('sales')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Product <span class="text-danger">*</span></label>
								<select class="select2 form-select form-control" name="product"> 
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(!empty($product->purchase)): ?>
											<?php if(!($product->purchase->quantity <= 0)): ?>
												<option value="<?php echo e($product->id); ?>"><?php echo e($product->purchase->name); ?></option>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<input type="hidden" name="">
						<div class="col-12">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" value="1" class="form-control" name="quantity">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="edit_sale" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Produk Terjual</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo e(route('sales')); ?>">
					<?php echo csrf_field(); ?>
					<?php echo method_field("PUT"); ?>
					<div class="row form-row">
						<div class="col-12">
							<input type="hidden" id="edit_id" name="id">
							<div class="form-group">
								<label>Product <span class="text-danger">*</span></label>
								<select class="select2 form-select form-control edit_product" name="product"> 
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(!empty($product->purchase)): ?>
											<?php if(!($product->purchase->quantity <= 0)): ?>
												<option value="<?php echo e($product->id); ?>"><?php echo e($product->purchase->name); ?></option>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<input type="hidden" name="">
						<div class="col-12">
							<div class="form-group">
								<label>Kuantitas</label>
								<input type="number" class="form-control edit_quantity" name="quantity">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('page-js'); ?>
	<!-- Select2 js-->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<script>
		$(document).ready(function(){
			$('#datatable-export').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_sale').modal('show');
				var id = $(this).data('id');
				var product = $(this).data('product');
				var quantity = $(this).data('quantity');
				$('#edit_id').val(id);
				$('.edit_product').val(product);
				$('.edit_quantity').val(quantity);
				
			});
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/sales.blade.php ENDPATH**/ ?>