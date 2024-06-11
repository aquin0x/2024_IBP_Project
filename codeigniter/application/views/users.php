<?php $this->load->view('/main/header'); ?>

</head>



<?php $this->load->view('/main/content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Kullanıcı Listesi</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
						<li class="breadcrumb-item active">Kullanıcı Listesi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Kullanıcı Listesi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Sıra</th>
										<th>Ad Soyad</th>
										<th>E-Posta(s)</th>
										<th>Şifre</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as  $index => $user) { ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= $user->full_name ?></td>
											<td><?= $user->email ?></td>
											<td><?= $user->password ?></td>
											<td>
												<i class="fa-solid fa-pen-to-square" data-toggle="modal" data-target="#updateModal<?= $index + 1 ?>" ></i>
												<div class="modal fade" id="updateModal<?= $index + 1 ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="updateModalLabel">Kullanıcı Güncelle</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form action="<?php echo base_url('users/change_user') ?>/<?= $user->ID ?>/<?= $index + 1 ?>" method="post" id="form">
																<div class="modal-body">
																	<fieldset class="form-group position-relative has-icon-left mb-3">
																		<input type="text" class="form-control form-control-lg" name="fullname<?= $index + 1 ?>" id="fullname<?= $index + 1 ?>" placeholder="" value="<?= $user->full_name ?>" required="">
																	</fieldset>
																</div>
																<div class="modal-body">
																	<fieldset class="form-group position-relative has-icon-left mb-3">
																		<input type="text" class="form-control form-control-lg" name="email<?= $index + 1 ?>" id="email<?= $index + 1 ?>" placeholder="" value="<?= $user->email ?>" required="">
																	</fieldset>
																</div>
																<div class="modal-body">
																	<fieldset class="form-group position-relative has-icon-left mb-3">
																		<input type="text" class="form-control form-control-lg" name="password<?= $index + 1 ?>" id="password<?= $index + 1 ?>" placeholder="Yeni Şifrenizi Giriniz." required="">
																	</fieldset>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
																	<button type="submit" class="btn btn-primary">Kaydet</button>
																</div>
															</form>
														</div>
													</div>
												</div>
												<?php if ($_SESSION['is_admin'] == 1) { ?>
													&nbsp;&nbsp;&nbsp;
													<i class="fa-solid fa-trash" onclick="sil(<?= $user->ID ?>)"></i>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>

								</tbody>
							</table>
							</div>
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
	function sil(id) {
		var url = "<?php echo base_url('users/del_users') ?>";

		window.location.href = `${url}/${id}`;
	}
</script>

<?php $this->load->view('/main/close'); ?>