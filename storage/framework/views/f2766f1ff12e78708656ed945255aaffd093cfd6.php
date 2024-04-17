

<?php $__env->startPush('page-css'); ?>
<!-- Select2 css-->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Peran</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Peran</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_role" data-toggle="modal" class="btn btn-primary float-right mt-2">Add Role</a>
</div>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<tmale id="roles-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>Nama</th>
								<th>Izin</th>
								<th class="text-center action-btn">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>								
								<td>
									<?php echo e($role->name); ?>

								</td>
								<td>
									<?php $__currentLoopData = $role->getAllPermissions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span><?php echo e($permission->name); ?></span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>

								<td class="text-center">
									<div class="actions">
										<a data-id="<?php echo e($role->id); ?>" data-role="<?php echo e($role->name); ?>" data-permissions="<?php echo e($role->getAllPermissions()); ?>" class="btn btn-sm bg-success-light editbtn" data-toggle="modal" href="javascript:void(0)">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<a data-id="<?php echo e($role->id); ?>" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm bg-danger-light deletebtn">
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
	</div>			
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_role" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Peran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo e(route('roles')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Peran</label>
								<input type="text" name="role" class="form-control">
							</div>
							<div class="form-group">
								<lable>Select Permissions</lable>
								<select class="select2 form-select form-control" name="permission[]" multiple="multiple"> 
									<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_role" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Mengubah Peran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo e(route('roles')); ?>">
					<?php echo csrf_field(); ?>
					<?php echo method_field("PUT"); ?>
					<div class="row form-row">
						<div class="col-12">
							<input type="hidden" name="id" id="edit_id">
							<div class="form-group">
								<label>Peran</label>
								<input type="text" name="role" class="form-control edit_role">
							</div>
							<div class="form-group">
								<lable>Pilih Perizinan</lable>
								<select class="select2 form-select form-control edit_perms" name="permission[]" multiple="multiple"> 
									<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'roles','title' => 'Roles']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('roles'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Roles')]); ?>
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
	<script>
		$(document).ready(function() {
			$('#role').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_role').modal('show');
				var id = $(this).data('id');
				var role = $(this).data('role');
				var permissions = $(this).data('permissions');
				$('#edit_id').val(id);
				$('.edit_role').val(role);
				$('.edit_perms').val(permissions);
			});
			//
		});
	</script>
	
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/roles.blade.php ENDPATH**/ ?>