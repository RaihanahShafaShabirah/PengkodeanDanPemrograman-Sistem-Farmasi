

<?php $__env->startPush('page-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-12">
	<h3 class="page-title">Selamat Datang <?php echo e(auth()->user()->name); ?>!</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item active">Dashboard</li>
	</ul>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	
	<div class="row">
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-primary border-primary">
							<i class="fe fe-money"></i>
						</span>
						<div class="dash-count">
							<h3><?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e($today_sales); ?></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						<h6 class="text-muted">Penjualan Hari Ini</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-primary w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-success">
							<i class="fe fe-credit-card"></i>
						</span>
						<div class="dash-count">
							<h3><?php echo e($total_categories); ?></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Kategori Produk</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-danger border-danger">
							<i class="fe fe-folder"></i>
						</span>
						<div class="dash-count">
							<h3><?php echo e($total_expired_products); ?></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Produk Kadaluarsa</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-danger w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-warning border-warning">
							<i class="fe fe-users"></i>
						</span>
						<div class="dash-count">
							<h3><?php echo e(\DB::table('users')->count()); ?></h3>
						</div>
					</div>
					<div class="dash-widget-info">
						
						<h6 class="text-muted">Sistem Pengguna</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-warning w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-6">
		
			<div class="card card-table">
				<div class="card-header">
					<h4 class="card-title ">Penjualan Hari Ini</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Obat</th>
									<th>Kuantitas</th>
									<th>Harga Total</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $latest_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(!empty($sale->product->purchase)): ?>
										<tr>
											<td><?php echo e($sale->product->purchase->name); ?></td>
											<td><?php echo e($sale->quantity); ?></td>
											<td>
												<?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e(($sale->total_price)); ?>

											</td>
											<td><?php echo e(date_format(date_create($sale->created_at),"d M, Y")); ?></td>
											
										</tr>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-md-12 col-lg-6">
						
			<!-- Pie Chart -->
			<div class="card card-chart">
				<div class="card-header">
					<h4 class="card-title">Jumlah Sumber Daya</h4>
				</div>
				<div class="card-body">
					<div style="width:65%;">
						<?php echo $pieChart->render(); ?>

					</div>
				</div>
			</div>
			<!-- /Pie Chart -->
			
		</div>	
		
		
	</div>
	<div class="row">
		<div class="col-md-12">
		
			<!-- Latest Customers -->
			
			<!-- /Latest Customers -->
			
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>