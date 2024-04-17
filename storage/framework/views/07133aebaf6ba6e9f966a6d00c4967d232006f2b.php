<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="<?php echo e(Request::routeIs('dashboard') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('dashboard')); ?>"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-category')): ?>
				<li class="<?php echo e(Request::routeIs('categories') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('categories')); ?>"><i class="fe fe-layout"></i> <span>Kategori</span></a>
				</li>
				<?php endif; ?>
				
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-products')): ?>
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Produk</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-products')): ?><li><a class="<?php echo e(Request::routeIs(('products')) ? 'active' : ''); ?>" href="<?php echo e(route('products')); ?>">Products</a></li><?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-product')): ?><li><a class="<?php echo e(Request::routeIs('add-product') ? 'active' : ''); ?>" href="<?php echo e(route('add-product')); ?>">Add Product</a></li><?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-outstock-products')): ?><li><a class="<?php echo e(Request::routeIs('outstock') ? 'active' : ''); ?>" href="<?php echo e(route('outstock')); ?>">Out-Stock</a></li><?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-expired-products')): ?><li><a class="<?php echo e(Request::routeIs('expired') ? 'active' : ''); ?>" href="<?php echo e(route('expired')); ?>">Expired</a></li><?php endif; ?>
					</ul>
				</li>
				<?php endif; ?>
				
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-purchase')): ?>
				<li class="submenu">
					<a href="#"><i class="fe fe-star-o"></i> <span> Pembelian</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::routeIs('purchases') ? 'active' : ''); ?>" href="<?php echo e(route('purchases')); ?>">Pembelian</a></li>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-Pembelian')): ?>
						<li><a class="<?php echo e(Request::routeIs('add-purchase') ? 'active' : ''); ?>" href="<?php echo e(route('add-purchase')); ?>">Add Purchase</a></li>
						<?php endif; ?>
					</ul>
				</li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-sales')): ?>
				<li><a class="<?php echo e(Request::routeIs('sales') ? 'active' : ''); ?>" href="<?php echo e(route('sales')); ?>"><i class="fe fe-activity"></i> <span>Penjualan</span></a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-supplier')): ?>
				<li class="submenu">
					<a href="#"><i class="fe fe-user"></i> <span> Pemasok</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::routeIs('suppliers') ? 'active' : ''); ?>" href="<?php echo e(route('suppliers')); ?>">Supplier</a></li>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-supplier')): ?><li><a class="<?php echo e(Request::routeIs('add-supplier') ? 'active' : ''); ?>" href="<?php echo e(route('add-supplier')); ?>">Add Supplier</a></li><?php endif; ?>
					</ul>
				</li>
				<?php endif; ?>

				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-reports')): ?>
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Laporan</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php echo e(Request::routeIs('reports') ? 'active' : ''); ?>" href="<?php echo e(route('reports')); ?>">Reports</a></li>
					</ul>
				</li>
				<?php endif; ?>

				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-access-control')): ?>
				<li class="submenu">
					<a href="#"><i class="fe fe-lock"></i> <span> Kontrol Akses</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-permission')): ?>
						<li><a class="<?php echo e(Request::routeIs('permissions') ? 'active' : ''); ?>" href="<?php echo e(route('permissions')); ?>">Permissions</a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-role')): ?>
						<li><a class="<?php echo e(Request::routeIs('roles') ? 'active' : ''); ?>" href="<?php echo e(route('roles')); ?>">Roles</a></li>
						<?php endif; ?>
					</ul>
				</li>					
				<?php endif; ?>

				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-users')): ?>
				<li class="<?php echo e(Request::routeIs('users') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('users')); ?>"><i class="fe fe-users"></i> <span>Pengguna</span></a>
				</li>
				<?php endif; ?>
				
				<li class="<?php echo e(Request::routeIs('profile') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('profile')); ?>"><i class="fe fe-user-plus"></i> <span>Profil</span></a>
				</li>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-settings')): ?>
				<li class="<?php echo e(Request::routeIs('settings') ? 'active' : ''); ?>"> 
					<a href="<?php echo e(route('settings')); ?>">
						<i class="fa fa-gears"></i>
						 <span> Settings</span>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar --><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/includes/sidebar.blade.php ENDPATH**/ ?>