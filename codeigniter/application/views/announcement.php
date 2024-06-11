<?php $this->load->view('/main/header'); ?>

</head>

<?php $this->load->view('/main/content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Duyuru Listesi</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
						<li class="breadcrumb-item active">Duyuru Listesi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<?php if ($_SESSION['is_admin'] == 1) { ?>
	<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="announcementModalLabel">Duyuru Ekle</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<fieldset class="form-group position-relative has-icon-left mb-3">
						<input type="text" class="form-control form-control-lg" id="announcement" placeholder="Duyuru" required="">
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
					<button type="button" class="btn btn-primary" onclick="add_announcement()">Kaydet</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title w-100">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h6>Duyuru Listesi</h6>
									</div>
									<?php if ($_SESSION['is_admin'] == 1) { ?>
									<div class="col-sm-6 text-right">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#announcementModal">
											Duyuru Ekle
										</button>
									</div>
									<?php } ?>
								</div>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body table-responsive">
						<table id="example2" class="table table-bordered table-hover " style="width:100%"> <!-- class="table table-bordered table-hover display text-center" -->
								<thead>
									<tr>
										<th>Sıra</th>
										<th>Duyuru</th>
										<?php if ($_SESSION['is_admin'] == 1) { ?>
											<th>İşlemler</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($announcements as  $index => $announcement) { ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= $announcement->announcement ?></td>
											<?php if ($_SESSION['is_admin'] == 1) { ?>
												<td>
												<i class="fa-solid fa-pen-to-square" data-toggle="modal" data-target="#updateModal<?= $index + 1 ?>"></i>
													<div class="modal fade" id="updateModal<?= $index + 1 ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="updateModalLabel">Duyuru Güncelle</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<fieldset class="form-group position-relative has-icon-left mb-3">
																		<input type="text" class="form-control form-control-lg" id="announcement<?= $index + 1 ?>" placeholder="" value="<?= $announcement->announcement ?>" required="">
																	</fieldset>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
																	<button type="button" class="btn btn-primary" onclick="upd_announcement(<?= $index + 1 ?>,<?= $announcement->id ?>);">Kaydet</button>
																</div>
															</div>
														</div>
													</div>
													&nbsp;&nbsp;&nbsp;
													<i class="fa-solid fa-trash" onclick="sil(<?= $announcement->id ?>)"></i>
												</td>
											<?php } ?>
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

<script>
	function add_announcement() {
		var url = "<?php echo base_url('index.php/announcement/add_announcement') ?>";
		var announcement =$('#announcement').val();

		window.location.href = `${url}/${announcement}`;
	}
</script>

<script>
	function upd_announcement(row, id) {
		var url = "<?php echo base_url('index.php/announcement/upd_announcement') ?>";
		var announcement = $('#announcement' + row).val();

		window.location.href = `${url}/${id}/${announcement}`;
	}
</script>

<script>
	function sil(id) {
		var url = "<?php echo base_url('announcement/del_announcement') ?>";

		window.location.href = `${url}/${id}`;
	}
</script>

<?php $this->load->view('/main/close'); ?>