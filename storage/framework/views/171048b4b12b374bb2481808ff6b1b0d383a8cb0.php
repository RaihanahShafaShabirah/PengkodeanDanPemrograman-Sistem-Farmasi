<!-- Header -->
<div class="header">
			
	<!-- Logo -->
	<div class="header-left">
		<a href="<?php echo e(route('dashboard')); ?>" class="logo">
			<img src="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('logo'))); ?> <?php else: ?><?php echo e(asset('assets/img/logo.png')); ?> <?php endif; ?>" alt="Logo">
		</a>
		<a href="<?php echo e(route('dashboard')); ?>" class="logo logo-small">
			<img src="<?php echo e(asset('assets/img/logo-small.png')); ?>" alt="Logo" width="30" height="30">
		</a>
	</div>
	<!-- /Logo -->
	
	<a href="javascript:void(0);" id="toggle_btn">
		<i class="fe fe-text-align-left"></i>
	</a>
	
	
	
	<!-- Mobile Menu Toggle -->
	<a class="mobile_btn" id="mobile_btn">
		<i class="fa fa-bars"></i>
	</a>
	<!-- /Mobile Menu Toggle -->
	
	<!-- Header Right Menu -->
	<ul class="nav user-menu">

		<!-- Notifications -->
		<li class="nav-item dropdown noti-dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fe fe-bell"></i> <span class="badge badge-pill"><?php echo e(auth()->user()->unReadNotifications->count()); ?></span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Notifications</span>
					<a href="<?php echo e(route('mark-as-read')); ?>" class="clear-noti">Mark All As Read </a>
				</div>
				<div class="noti-content">
					<ul class="notification-list">
						<?php $__currentLoopData = auth()->user()->unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="notification-message">
								<a href="<?php echo e(route('read')); ?>">
									<div class="media">
										<span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="Product image" src="<?php echo e(asset('storage/purchases/'.$notification['image'])); ?>">
										</span>
										<div class="media-body">
											<h6 class="text-danger">Stock Alert</h6>
											<p class="noti-details">
												<span class="noti-title"><?php echo e($notification->data['product_name']); ?> is only <?php echo e($notification->data['quantity']); ?> left.</span>
												<span>Please update the purchase quantity </span>
											</p>
											
											<p class="noti-time"><span class="notification-time"><?php echo e($notification->created_at->diffForHumans()); ?></span></p>
										</div>
									</div>
								</a>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="#">View all Notifications</a>
				</div>
			</div>
		</li>
		<!-- /Notifications -->
		
		<!-- User Menu -->
		<li class="nav-item dropdown has-arrow">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img class="rounded-circle" src="<?php if(!empty(auth()->user()->avatar)): ?><?php echo e(asset('storage/users/'.auth()->user()->avatar)); ?><?php endif; ?>" width="31" alt="avatar"></span>
			</a>
			<div class="dropdown-menu">
				<div class="user-header">
					<div class="avatar avatar-sm">
						<img src="<?php if(!empty(auth()->user()->avatar)): ?><?php echo e(asset('storage/users/'.auth()->user()->avatar)); ?><?php endif; ?>" alt="User Image" class="avatar-img rounded-circle">
					</div>
					<div class="user-text">
						<h6><?php echo e(auth()->user()->name); ?></h6>
					</div>
				</div>
				
				<a class="dropdown-item" href="<?php echo e(route('profile')); ?>">My Profile</a>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-settings')): ?><a class="dropdown-item" href="<?php echo e(route('settings')); ?>">Settings</a><?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup-app')): ?>
				<a class="dropdown-item" href="<?php echo e(route('backup-app')); ?>">Backup App</a>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup-db')): ?>
				<a class="dropdown-item" href="<?php echo e(route('backup-db')); ?>">Backup Database</a>
				<?php endif; ?>
				<a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
			</div>
		</li>
		<!-- /User Menu -->
		
	</ul>
	<!-- /Header Right Menu -->
	
</div>
<!-- /Header --><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/includes/header.blade.php ENDPATH**/ ?>