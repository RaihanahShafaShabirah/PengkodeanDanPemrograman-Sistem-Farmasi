

<?php $__env->startPush('page-css'); ?>
<!-- Select2 css-->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Pengguna</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Pengguna</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_user" data-toggle="modal" class="btn btn-primary float-right mt-2">Tambah Pengguna</a>
</div>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class=" table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>Nama</th>
								<th>Email</th>
								<th>Posisi</th>
								<th>Data dibuat</th>
								<th class="text-center action-btn">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<h2 class="table-avatar">
										<?php if(!empty($user->avatar)): ?>
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="<?php echo e(asset('storage/users/'.$user->avatar)); ?>" alt="product image">
										</span>
										<?php endif; ?>
										<?php echo e($user->name); ?>

									</h2>
								</td>
								<td>
									<?php echo e($user->email); ?>

								</td>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
								<td>
									<?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo e($role); ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
								<?php endif; ?>
								<td><?php echo e(date_format(date_create($user->created_at),"d M,Y")); ?></td>

								<td class="text-center">
									<div class="actions">
										<a data-id="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>" data-email="<?php echo e($user->email); ?>" class="btn btn-sm bg-success-light editbtn" id="edit-user" data-toggle="modal" href="javascript:void(0)">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<a data-id="<?php echo e($user->id); ?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
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
<div class="modal fade" id="add_user" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo e(route('users')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="name" class="form-control" placeholder="John Doe">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Peran</label>
								<div class="form-group">
									<select class="select2 form-select form-control" name="role">
										<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Foto</label>
								<input type="file" name="avatar">
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Konfirmasi Password</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
								</div>
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
<div class="modal fade" id="edit_user" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="<?php echo e(route('users')); ?>">
					<?php echo csrf_field(); ?>
					<?php echo method_field("PUT"); ?>
					<div class="row form-row">
						<input type="hidden" name="id" id="edit_id">
						<div class="col-12">
							<div class="form-group">
								<label>Full Name</label>
								<input type="text" name="name" class="form-control edit_name" placeholder="John Doe">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control edit_email" id="email">
							</div>
						</div>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
						<div class="col-12">
							<div class="form-group">
								<label>Role</label>
								<div class="form-group">
									<select class="select2 form-select form-control edit_role" name="role">
										<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="col-12">
							<div class="form-group">
								<label for="avatar">User Picture</label>
								<input type="file" name="avatar" id="avatar">
							</div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'users','title' => 'User']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('users'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('User')]); ?>
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
			$('#datatable-export').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_user').modal('show');
				var id = $(this).data('id');
				var name = $(this).data('name');
				var email = $(this).data('email');
				var role = $(this).data('role');
				$('#edit_id').val(id);
				$('.edit_name').val(name);
				$('.edit_email').val(email);
				$('.edit_role').val(role);
			});
			//


		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/users.blade.php ENDPATH**/ ?>