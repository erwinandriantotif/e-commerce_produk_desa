<!DOCTYPE html>
<html>
<head>
	<?php $set = $this->func->globalset("semua"); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?=$set->nama?> Dashboard Management</title>
	<link rel="shortcut icon" type="image/png" href="<?=base_url("assets/img/".$this->func->globalset("favicon"))?>"/>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datetimepicker-build.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/all.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/ready.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/minmin.css?v=<?=time()?>">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/util.css">
	
	<!-- IMPORTANT JS -->
	<script src="<?=base_url()?>assets/js/core/jquery-3.2.1.min.js"></script>
	<?php if(isset($tiny) AND $tiny == true){ ?>
	<script src="<?=base_url()?>assets/plugandin/tinymce/tinymce.js"></script>
	<!--<script src="https://cdn.tiny.cloud/1/pa3llg12ezvnxollin25u4ddg7d95nj77s2o7hvjhh1tkgir/tinymce/5/tinymce.min.js"></script>-->
	<?php } ?>

	<!-- GENERATED CUSTOM COLOR -->
	<style rel="stylesheet">
		.sidebar .nav .nav-item:hover a, .sidebar .nav .nav-item.active a{
			background: #1572e8;
		}
		.badge-color2{
			background: orange;
			color: #fff;
		}
		.tabs .tabs-item.active, .tabs .tabs-item:hover{
			border-bottom: 3px solid <?=$set->color1?>;
			color: <?=$set->color1?>;
		}
		.sidebar .nav .nav-title{
			color: <?=$set->color1?>;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header bg-primary">
				<a href="<?=site_url()?>" class="logo">
					<?=strtoupper(strtolower($this->func->globalset("nama")))?>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg bg-primary">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<img src="<?=base_url()?>assets/img/user.png" alt="user-img" width="36" class="img-circle">
								<span><?=$this->func->getUser($_SESSION["usrid"],"nama")?></span></span>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<a class="dropdown-item" href="javascript:$('#modalgantipass').modal();"><i class="la la-unlock"></i> Ganti Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i class="la la-power-off"></i> Logout</a>
							</ul>
							<!-- /.dropdown-user -->
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="sidebar">
			<div class="scrollbar-inner sidebar-wrapper">
				<ul class="nav">
					<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
					<li class="nav-item <?php echo (isset($menu) AND $menu == 1) ? "active" : "" ?>">
						<a href="<?=site_url("Admin")?>">
							<i class="la la-home"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-title">DATA PESANAN</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 2) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/pesanan")?>">
							<i class="fas fa-cart-arrow-down"></i>
							<p>Pesanan</p>
							<?php
								$order = $this->func->getJmlPesanan();
								if($order > 0){
							?>
							<b class="badge badge-color2"><?=$order?></b>
							<?php } ?>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 13) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/preorder")?>">
							<i class="fas fa-calendar"></i>
							<p>Pre Order</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 4) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/pesan")?>">
							<i class="fas fa-comments"></i>
							<p>Pesan Masuk</p>
							<?php
								$order = $this->func->getJmlPesan();
								if($order > 0){
							?>
							<b class="badge badge-danger"><?=$order?></b>
							<?php } ?>
						</a>
					</li>
					<li class="nav-title">LAPORAN</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 14) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/laporantransaksi")?>">
							<i class="fas fa-chart-bar"></i>
							<p>Laporan Penjualan</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 15) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/laporanuser")?>">
						<i class="fas fa-address-card"></i>
							<p>Laporan Transaksi User</p>
						</a>
					</li>
					<li class="nav-title">DATA PRODUK</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 6) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/produk")?>">
							<i class="fas fa-archive"></i>
							<p>Daftar Produk</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 7) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/kategori")?>">
							<i class="fas fa-clipboard-list"></i>
							<p>Kategori Produk</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 8) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/variasi")?>">
							<i class="fas fa-tags"></i>
							<p>Variasi Produk</p>
						</a>
					</li>
					<!-- <li class="nav-title">PROMO & RESELLER</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 3) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/voucher")?>">
							<i class="fas fa-ticket-alt"></i>
							<p>Promo / Voucher</p>
						</a>
					</li> -->
					<!--
					<li class="nav-item <?php echo (isset($menu) AND $menu == 18) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/saldo")?>">
							<i class="fas fa-wallet"></i>
							<p>Saldo User</p>
						</a>
					</li>
					-->
					<!-- <li class="nav-item <?php echo (isset($menu) AND $menu == 9) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/agen")?>">
							<i class="fas fa-store-alt"></i>
							<p>Agen & Reseller</p>
						</a>
					</li> -->
					<li class="nav-title">PENGATURAN</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 10) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/usermanager")?>">
							<i class="fas fa-users"></i>
							<p>User Customer</p>
						</a>
					</li>
					<!-- <li class="nav-item <?php echo (isset($menu) AND $menu == 5) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/slider")?>">
							<i class="fas fa-images"></i>
							<p>Slider</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 16) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/booster")?>">
							<i class="fas fa-bullhorn"></i>
							<p>Notif Booster</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 17) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/blog")?>">
							<i class="fas fa-blog"></i>
							<p>Blog Post</p>
						</a>
					</li>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 11) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/halaman")?>">
							<i class="fas fa-globe-asia"></i>
							<p>Halaman Statis</p>
						</a>
					</li> -->
					<?php if(isset($_SESSION["level"]) AND $_SESSION['level'] == 2){ ?>
					<li class="nav-item <?php echo (isset($menu) AND $menu == 12) ? "active" : "" ?>">
						<a href="<?=site_url("Admin/pengaturan")?>">
							<i class="fas fa-cogs"></i>
							<p>Pengaturan</p>
						</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a href="javascript:void(0)" onclick="logout()">
							<i class="fas fa-power-off"></i>
							<p>Logout</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">