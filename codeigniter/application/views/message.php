<?php $this->load->view('/main/header'); ?>

</head>

<?php // var_dump($_SESSION) 
?>

<?php $this->load->view('/main/content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Mesaj Listesi</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
						<li class="breadcrumb-item active">Mesaj Listesi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>


	<!-- Modal -->
	<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo base_url('message/add_message/6') ?>" method="post" id="form"> <!--http:localhost/codeigniter/message/add_message/6 -->
					<div class="modal-header">
						<h5 class="modal-title" id="messageModalLabel">Mesaj Gönder</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" value="0" name="is_read" id="is_read">
						<fieldset class="form-group position-relative has-icon-left mb-3">
							<input type="text" class="form-control form-control-lg" id="message" name="message" placeholder="Mesaj" required="">
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
						<button type="submit" class="btn btn-primary">Gönder</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="messageAdminModal" tabindex="-1" aria-labelledby="messageAdminModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo base_url('message/upd_message') ?>" method="post" id="form">
					<input type="hidden" id="msg_id" name="msg_id">
					<div class="modal-header">
						<h5 class="modal-title" id="messageAdminModal">Admin Mesaj</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<fieldset class="form-group position-relative has-icon-left mb-3">
							<input type="text" class="form-control form-control-lg" id="message" name="message" placeholder="Mesaj" required="">
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left mb-3">
							<div class="form-group">
								<select class="custom-select" name="sent_id" id="sent_id">
									<option disabled selected>Gönderilecek Kişi</option>
									<?php foreach ($users as $index => $user) { ?>
										<?php if ($user->full_name != $_SESSION['username']) { ?>
											<option value="<?= $user->ID ?>"><?= $user->full_name ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</fieldset>
						<fieldset class="form-group position-relative has-icon-left mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="is_read" id="is_read">
								<label class="form-check-label" for="is_read">Okundu</label>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
						<button type="submit" class="btn btn-primary">Gönder</button>
					</div>
				</form>
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
							<h3 class="card-title w-100">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h6>Mesaj Listesi</h6>
									</div>
									<div class="col-sm-6 text-right">
										<!-- Button trigger modal -->
										<?php if ($_SESSION['is_admin'] == 0) { ?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageModal">
												Mesaj Gönder
											</button>
										<?php } ?>
									</div>
								</div>
							</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Sıra</th>
											<th>Gönderen Ad/Soyad</th>
											<th>Mesaj</th>
											<th>Tarihi/Saati</th>
											<?php if ($_SESSION['is_admin'] == 0) { ?>
												<th>Admin Mesaj</th>
											<?php } ?>
											<?php if ($_SESSION['is_admin'] == 1) { ?>
												<th>İşlemler</th>
											<?php } ?>
											<?php if ($_SESSION['is_admin'] == 0) { ?>
												<th>Okundu mu ?</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($messages as  $index => $message) { ?>
											<tr>
												<td><?= $index + 1 ?></td>
												<td><?= $message->Sent_By_Name ?></td>
												<td><?= isset($message->message) ? $message->message : '' ?>
												<td> <?php $date = new DateTime($message->record_date);
														echo $date->format('d-m-Y H:i:s'); ?></td>
												<?php if ($_SESSION['is_admin'] == 0) { ?>
													<td><?= $message->admin_message ?></td>
												<?php } ?>
												<?php if ($_SESSION['is_admin'] == 1) { ?>
													<td>
														<?php if (!isset($message->admin_message)) { ?>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageAdminModal" onclick="$('#sent_id').val(<?= $message->sent_by ?>);$('#msg_id').val(<?= $message->ID ?>);">
																Mesaj At
															</button>
														<?php } else { ?>
															<p>Cevaplandı</p>
														<?php } ?>
													</td>
												<?php } ?>
												<?php if ($_SESSION['is_admin'] == 0) { ?>
													<td><?= $message->is_read == 1 ? '&#10004;' : '&#10006;' ?></td>
												<?php } ?>
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

<?php $this->load->view('/main/close'); ?>