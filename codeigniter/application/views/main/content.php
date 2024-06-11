<style>
	[class*=sidebar-dark-] {
    background-color: #5A0D27 !important;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<!-- <li class="nav-item d-none d-sm-inline-block">
					<a href="index3.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li> -->
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('users/logout_user') ?>">
						<i class="far fa-user"></i> Cikis Yap
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="assets/dist/img/asdd.png" alt=""  style="opacity: .8;width:50px;border-radius:20px;">
				<span class="brand-text font-weight-light">BorMa Tekstil</span>
			</a>

			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<a href="#" class="d-block"><?= $_SESSION['username'] ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item menu-open">
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('mainpage') ?>" class="nav-link <?= str_contains(uri_string(),'mainpage' ) ? 'active': ''?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Anasayfa</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('announcement') ?>" class="nav-link <?= str_contains(uri_string(),'announcement' ) ? 'active': ''?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Duyurular</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('products') ?>" class="nav-link <?= str_contains(uri_string(),'products' ) ? 'active': ''?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Ürünler</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('message') ?>" class="nav-link <?= str_contains(uri_string(),'message' ) ? 'active': ''?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Mesaj Kutusu</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('users') ?>" class="nav-link <?= str_contains(uri_string(),'users' ) ? 'active': ''?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Profil</p>
									</a>
								</li>
							</ul>
						</li>


					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>