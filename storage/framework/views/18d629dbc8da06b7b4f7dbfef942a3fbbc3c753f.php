

<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Laporan</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Hasilkan Laporan</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Hasilkan Laporan</a>
</div>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
	
<div class="row">
	<?php if(isset($sales)): ?>
	<div class="col-xl-3 col-sm-6 col-12">
		<div class="card">
			<div class="card-body">
				<div class="dash-widget-header">
					<span class="dash-widget-icon text-primary border-primary">
						<i class="fe fe-money"></i>
					</span>
					<div class="dash-count">
						<h3><?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e($total_cash); ?></h3>
					</div>
				</div>
				<div class="dash-widget-info">
					<h6 class="text-muted">Total Kas</h6>
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
						<i class="fe fe-activity"></i>
					</span>
					<div class="dash-count">
						<h3><?php echo e($total_sales); ?></h3>
					</div>
				</div>
				<div class="dash-widget-info">
					
					<h6 class="text-muted">Total Penjualan</h6>
					<div class="progress progress-sm">
						<div class="progress-bar bg-success w-50"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="col-md-12">
	
		<?php if(isset($sales)): ?>
			<!--  Sales -->
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Nama obat</th>
									<th>Kuantitas</th>
									<th>Total Harga</th>
									<th>Tanggal</th>
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
											
										</tr>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- / sales -->
		<?php endif; ?>

		<?php if(isset($products)): ?>
			<!-- Products -->
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Category</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Discount</th>
									<th>Expiry Date</th>
									<th class="action-btn">Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(!(empty($product->purchase))): ?>
										<tr>
											<td>
												<h2 class="table-avatar">
													<?php if(!empty($product->purchase->image)): ?>
													<span class="avatar avatar-sm mr-2">
														<img class="avatar-img" src="<?php echo e(asset('storage/purchases/'.$product->purchase->image)); ?>" alt="product image">
													</span>
													<?php endif; ?>
													<?php echo e($product->purchase->name); ?>

												</h2>
											</td>
											<td><?php echo e($product->purchase->category->name); ?></td>
											<td><?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e($product->price); ?>

											</td>
											<td><?php echo e($product->purchase->quantity); ?></td>
											<td><?php echo e($product->discount); ?>%</td>
											<td>
											<?php echo e(date_format(date_create($product->purchase->expiry_date),"d M, Y")); ?></span>										
											</td>
											<td>
												<div class="actions">
													<a class="btn btn-sm bg-success-light" href="<?php echo e(route('edit-product',$product)); ?>">
														<i class="fe fe-pencil"></i> Edit
													</a>
													<a data-id="<?php echo e($product->id); ?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
														<i class="fe fe-trash"></i> Delete
													</a>
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
			<!-- /Products -->
		<?php endif; ?>
		
		<?php if(isset($purchases)): ?>
			<!-- Purchases-->
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Medicine Name</th>
									<th>Medicine Category</th>
									<th>Purchase Price</th>
									<th>Quantity</th>
									<th>Supplier</th>
									<th>Expire Date</th>
									<th class="action-btn">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(!empty($purchase->supplier) && !empty($purchase->category)): ?>
									<tr>
										<td>
											<h2 class="table-avatar">
												<?php if(!empty($purchase->image)): ?>
												<span class="avatar avatar-sm mr-2">
													<img class="avatar-img" src="<?php echo e(asset('storage/purchases/'.$purchase->image)); ?>" alt="product image">
												</span>
												<?php endif; ?>
												<?php echo e($purchase->name); ?>

											</h2>
										</td>
										<td><?php echo e($purchase->category->name); ?></td>
										<td><?php echo e(AppSettings::get('app_currency', '$')); ?><?php echo e($purchase->price); ?></td>
										<td><?php echo e($purchase->quantity); ?></td>
										<td><?php echo e($purchase->supplier->name); ?></td>
										<td><?php echo e(date_format(date_create($purchase->expiry_date),"d M, Y")); ?></td>
										<td>
											<div class="actions">
												<a class="btn btn-sm bg-success-light" href="<?php echo e(route('edit-purchase',$purchase)); ?>">
													<i class="fe fe-pencil"></i> Edit
												</a>
												<a data-id="<?php echo e($purchase->id); ?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
													<i class="fe fe-trash"></i> Delete
												</a>
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
			<!-- /Purchases -->
		<?php endif; ?>
	</div>
</div>

<!-- Generate Modal -->
<div class="modal fade" id="generate_report" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Generate Report</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo e(route('reports')); ?>">
					<?php echo csrf_field(); ?>
					<div class="row form-row">
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>From</label>
										<input type="date" name="from_date" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>To</label>
										<input type="date" name="to_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Resource</label>
								<select class="form-control select" name="resource"> 
									<option value="products">Products</option>
									<option value="purchases">Purchases</option>
									<option value="sales">Sales</option>
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
<!-- /Generate Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('page-js'); ?>
	<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rshaf_jv5mv1h\OneDrive\Dokumen\Andes Test\Pharmacy-management-system-laravel\resources\views/reports.blade.php ENDPATH**/ ?>