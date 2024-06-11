<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Üye Ol</title>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>

<body>

	<div class="col-12 d-flex align-items-center justify-content-center">
		<div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
			<div class="card border-grey border-lighten-3 m-0">
				<div class="card-header border-0">
					<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>BorMa Tekstil</span></h6>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form class="form-horizontal form-simple" action="<?php echo base_url('users/add_user') ?>" method="post" novalidate="">
							<fieldset class="form-group position-relative has-icon-left mb-3">
								<input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Ad" required="">
								<div class="form-control-position">
									<i class="feather icon-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-3">
								<input type="text" class="form-control form-control-lg" id="surname" name="surname" placeholder="Soyad" required="">
								<div class="form-control-position">
									<i class="feather icon-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-3">
								<input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="E-Posta" required="">
								<div class="form-control-position">
									<i class="feather icon-user"></i>
								</div>
							</fieldset>
							<fieldset class="form-group position-relative has-icon-left mb-3">
								<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Şifre" required="">
								<div class="form-control-position">
									<i class="fa fa-key"></i>
								</div>
							</fieldset>
							<div class="d-flex justify-content-center align-items-center">
								<button type="submit" class="btn btn-primary btn-lg btn-block mt-4"><i class="feather icon-unlock"></i> Kayıt Ol </button>
							</div>
						</form>
					</div>
				</div>
				<div class="card-footer">
					<div class="">
						<p class="float-sm-right text-center m-0">Hesabınız var mı?<a href="<?= base_url("/welcome"); ?>" class="card-link">&nbsp;Giriş Yap</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>