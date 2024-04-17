

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Perizinan</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Perizinan</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_permission" data-toggle="modal" class="btn btn-primary float-right mt-2">Tambah Perizinan</a>
</div>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="perm-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>Nama</th>
								<th>Tanggal Pembuatan</th>
								<th class="text-center action-btn">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>								
								<td>
									<?php echo e($permission->name); ?>

								</td>
								
								<td><?php echo e(date_format(date_create($permission->created_at),"d M,Y")); ?></td>

								<td class="text-center">
									<div class="actions">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-permission')): ?>
										<a data-id="<?php echo e($permission->id); ?>" data-permission="<?php echo e($permission->name); ?>" class="btn btn-sm bg-success-light editbtn" data-toggle="modal" href="javascript:void(0)">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy-permission')): ?>
										<a data-id="<?php echo e($permission->id); ?>" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm bg-danger-light deletebtn">
											<i class="fe fe-trash"></i> Delete
										</a>
										<?php endif; ?>
									</div>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>			
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_permission" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Perizinan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo e(route('permissions')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Perizinan</label>
								<input type="text" name="permission" class="form-control">
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

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_permission" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Perizinan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo e(route('permissions')); ?>">
					<?php echo csrf_field(); ?>
					<?php echo method_field("PUT"); ?>
					<div class="row form-row">
						<div class="col-12">
							<input type="hidden" name="id" id="edit_id">
							<div class="form-group">
								<label>Perizinan</label>
								<input type="text" class="form-control edit_permission" name="permission">
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'permissions','title' => 'Permission']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('permissions'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Permission')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('page-js'); ?>
	<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<script>
		$(document).ready(function() {
			$('#perm-table').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_permission').modal('show');
				var id = $(this).data('id');
				var permission = $(this).data('permission');
				$('#edit_id').val(id);
				$('.edit_permission').val(permission);
			});
			//
		});
	</script>
	
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/permissions.blade.php ENDPATH**/ ?>