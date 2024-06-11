<?php if($_SESSION['is_admin'] == 1) {?>
	<!-- <script>
        window.location.href = '<?php echo base_url('products');?>';
    </script> -->
<?php } ?>

<?php $this->load->view('/main/header'); ?>


</head>
<style>
	.bg-info {
    background-color: #74b5e3 !important;
}
</style>

<?php $this->load->view('/main/content'); ?>

<?php if($_SESSION['is_admin'] == 1) {?>
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	
	<div class="d-flex justify-content-center mt-5 px-2 " >
		<div class="col-lg-12 col-12 ">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>Hoşgeldin <?= $_SESSION['username'] ?></h3>
					<p><?= date('d/m/Y') ?></p>
				</div>
				<div class="icon">
					<i class="fa-solid fa-user"  ></i>
				</div>
			</div>
		</div>
		
	</div>





	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Duyurular</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Sıra</th>
										<th>Duyuru</th>
										<th>Geldiği Tarih Ve Saat</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($announcements as  $index => $announcement) { ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= $announcement->announcement ?></td>
											<td><?php $date = new DateTime($announcement->record_date);echo $date->format('d-m-Y H:i:s');?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
					
				<!-- /.col -->
			</div>
			
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	
	<!-- /.content -->
</div>
	
<?php } ?>


<?php if($_SESSION['is_admin'] == 0) {?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	
	<div class="d-flex justify-content-center mt-5 px-2">
		<div class="col-lg-6 col-6 ">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>Hoşgeldin <?= $_SESSION['username'] ?></h3>
					<p><?= date('d/m/Y') ?></p>
				</div>
				<div class="icon">
					<i class="fa-solid fa-user"  ></i>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-6 ">
			<a href="<?= base_url("message"); ?>" class="card-link">
				<div class="small-box bg-info" >
					<div class="inner">
						<h3>Mesaj Yolla</h3>
						<p>+</p>
					</div>
					<div class="icon">
						<i class="fa-solid fa-message" ></i>
					</div>
				</div>
			</a>
		</div>
	</div>




	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Duyurular</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Sıra</th>
										<th>Duyuru</th>
										<th>Geldiği Tarih Ve Saat</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($announcements as  $index => $announcement) { ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= $announcement->announcement ?></td>
											<td><?php $date = new DateTime($announcement->record_date);echo $date->format('d-m-Y H:i:s');?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
					
				<!-- /.col -->
			</div>
			
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	
	<!-- /.content -->
</div>
<?php } ?>


<?php $this->load->view('/main/footer'); ?>

<script>
	$(function() {
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

<?php $this->load->view('/main/close'); ?>