

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 css-->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Pemasok</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Pemasok</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="<?php echo e(route('add-supplier')); ?>" class="btn btn-primary float-right mt-2">Tambah Baru</a>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12">
	
		<!-- Suppliers -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Produk</th>
								<th>Nama</th>
								<th>Nomor Telepon</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Perusahaan</th>
								<th class="action-btn">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>										
									<?php echo e($supplier->product); ?>

								</td>
								<td><?php echo e($supplier->name); ?></td>
								<td><?php echo e($supplier->phone); ?></td>
								<td><?php echo e($supplier->email); ?></td>
								<td><?php echo e($supplier->address); ?></td>
								<td><?php echo e($supplier->company); ?></td>
								<td>
									<div class="actions">
										<a class="btn btn-sm bg-success-light" href="<?php echo e(route('edit-supplier',$supplier)); ?>">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<a data-id="<?php echo e($supplier->id); ?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
											<i class="fe fe-trash"></i> Delete
										</a>
									</div>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Suppliers-->
		
	</div>
</div>
<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'suppliers','title' => 'Supplier']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('suppliers'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Supplier')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<?php $__env->stopSection(); ?>	

<?php $__env->startPush('page-js'); ?>
	<!-- Select2 js-->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/suppliers.blade.php ENDPATH**/ ?>