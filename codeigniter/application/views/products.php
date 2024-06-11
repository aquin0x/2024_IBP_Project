<?php $this->load->view('/main/header'); ?>
<style>
	tfoot input {
		width: 100%;
		padding: 3px;
		box-sizing: border-box;
	}
</style>
</head>

<?php $this->load->view('/main/content'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Ürün Listesi</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
						<li class="breadcrumb-item active">Ürün Listesi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Modal -->
	<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="productModalLabel">Ürün Ekle</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<fieldset class="form-group position-relative has-icon-left mb-3">
						<input type="text" class="form-control form-control-lg" id="product" placeholder="Ürün Adı" required="">
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
					<button type="button" class="btn btn-primary" onclick="add_product();">Kaydet</button>
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
							<h3 class="card-title w-100">
								<div class="row mb-2">
									<div class="col-sm-6">
										<h6>Ürün Listesi</h6>
									</div>
									<?php if ($_SESSION['is_admin'] == 1) { ?>
										<div class="col-sm-6 text-right">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
												Ürün Ekle
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
										<th>Ürün Adı</th>
										<?php if ($_SESSION['is_admin'] == 1) { ?>
											<th>İşlemler</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as  $index => $product) { ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= $product->product_name ?></td>
											<?php if ($_SESSION['is_admin'] == 1) { ?>
												<td>
													<i class="fa-solid fa-pen-to-square" data-toggle="modal" data-target="#updateModal<?= $index + 1 ?>"></i>
													<div class="modal fade" id="updateModal<?= $index + 1 ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="updateModalLabel">Ürün Güncelle</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<fieldset class="form-group position-relative has-icon-left mb-3">
																		<input type="text" class="form-control form-control-lg" id="product<?= $index + 1 ?>" placeholder="" value="<?= $product->product_name ?>" required="">
																	</fieldset>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
																	<button type="button" class="btn btn-primary" onclick="upd_product(<?= $index + 1 ?>,<?= $product->ID ?>);">Kaydet</button>
																</div>
															</div>
														</div>
													</div>
													&nbsp;&nbsp;&nbsp;
													<i class="fa-solid fa-trash" onclick="sil(<?= $product->ID ?>)"></i>
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
			/* initComplete: function() {
				this.api()
					.columns()
					.every(function() {
						let column = this;
						let title = column.header().textContent;

						// Create input element
						let input = document.createElement('input');
						input.placeholder = title;
						column.header().replaceChildren(input);

						// Event listener for user input
						input.addEventListener('keyup', () => {
							if (column.search() !== this.value) {
								column.search(input.value).draw();
							}
						});
					});
			} */
		});
	});
</script>

<script>
	function add_product() {
		var url = "<?php echo base_url('products/add_product') ?>";
		var product = $('#product').val();

		window.location.href = ` ${url}/${product}`;
	}
</script>


<script>
	function upd_product(row, id) {
		var url = "<?php echo base_url('products/upd_product') ?>"; // http:localhost/codeigniter/products/upd_product
		var product = $('#product' + row).val();

		window.location.href = ` ${url}/${id}/${product}`;
	}
</script>

<script>
	function sil(id) {
		var url = "<?php echo base_url('products/del_product') ?>";

		window.location.href = ` ${url}/${id}`;
	}
</script>

<?php $this->load->view('/main/close'); ?>