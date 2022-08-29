<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
$nama = (isset($titel)) ? $set->nama." &#8211; ".$titel: $set->nama." &#8211; ".$set->slogan;
$headerclass = (isset($titel)) ? "header-v4" : "";
$keranjang = (isset($_SESSION["usrid"]) AND $_SESSION["usrid"] > 0) ? $this->func->getKeranjang() : 0;
$keyw = $this->db->get("kategori");
$keywords = "";
foreach($keyw->result() as $key){ $keywords .= ",".$key->nama; }
?><!DOCTYPE html>
<html lang="en">
  <head>
	<title><?=$nama?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="<?=base_url("admin/assets/img/".$set->favicon)?>"/>
	<meta name="google-site-verification" content="G35UyHn6lX6mRzyFws0NJYYxHQp_aejuAFbagRKCL7c" />
	<meta name="description" content="Jual Khimar dan Dress dengan pilihan terlengkap serta menerima reseller" />
	<!--  Social tags      -->
	<meta name="keywords" content="Aplikasi toko online <?=$nama?>">
	<meta name="description" content="Aplikasi toko online <?=$nama?>">
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="<?=$nama?> App By ">
	<meta itemprop="description" content="Aplikasi toko online <?=$nama?>">
	<!-- <meta itemprop="image" content="<?=base_url("admin/assets/img/".$set->favicon)?>"> -->
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="product">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="<?=$nama?> App By ">
	<meta name="twitter:description" content="Aplikasi toko online <?=$nama?>">
	<meta name="twitter:creator" content="">
	<meta name="twitter:image" content="<?=base_url("admin/assets/img/".$set->favicon)?>">
	<!-- Open Graph data -->
	<meta property="fb:app_id" content="655">
	<meta property="og:title" content="<?=$nama?> App " />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?=base_url()?>" />
	<meta property="og:image" content="<?=base_url("admin/assets/img/".$set->favicon)?>" />
	<meta property="og:description" content="Aplikasi toko online <?=$nama?>" />
	<meta property="og:site_name" content="<?=$nama?> App By" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/aos.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2-bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/slick/slick-theme.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/swal/sweetalert2.min.css') ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.min.css') ?>"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css?v='.time()) ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css?v='.time()) ?>">

	<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
	
	<link rel="icon" href="<?php echo base_url('assets/uploads/sites/Logo.png'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/open-iconic-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/animate.css'); ?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/magnific-popup.css'); ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css?v='.time()) ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/aos.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/themes/css/ionicons.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/themes/js/plugins/@fortawesome/fontawesome-free/css/all.min.css', 'argon'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/jquery.timepicker.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/css/icomoon.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/themes/css/style.css'); ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/themes/assets/plugins/toastr/toastr.min.css'); ?>">
	
	<script src="<?php echo base_url('assets/themes/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/themes/js/jquery-migrate-3.0.1.min.js'); ?>"></script>
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-light ftco_navbar  ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo base_url(); ?>"><?=$set->nama?></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
	          <li class="nav-item "><a href="<?php echo site_url('shop'); ?>" class="nav-link">Kategori</a></li>
	          <li class="nav-item"><a href="<?php echo site_url('pages/tentangkami'); ?>" class="nav-link">Tentang Kami</a></li>
              <li class="nav-item"><a href="<?php echo site_url('pages/kontak'); ?>" class="nav-link">Kontak</a></li>
			  <?php if($this->func->cekLogin() != true){ ?>
              <li class="nav-item"><a href="<?php echo site_url('home/signin'); ?>" class="nav-link">Login | Daftar</a></li>
              <?php }else{ ?>
			  <li class="nav-item"><a href="<?php echo site_url('manage/pesanan'); ?>" class="nav-link">Pesananku</a></li>
			  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
              <div class="dropdown-menu" aria-labelledby="dropdown05">
				  <a class="dropdown-item" href="<?php echo site_url('manage'); ?>">Pengaturan Akun</a>
				  <a class="dropdown-item" href="javascript:signoutNow()">Logout</a>
              </div>
            </li>
	          <li class="nav-item cta cta-colored"><a href="<?php echo site_url('home/keranjang'); ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<span class="cart-item-total"><?=$this->func->getKeranjang()?></span>]</a></li>
			<?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<script type="text/javascript">
  		AOS.init();
		  
		function formUang(data){
			return data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
		}
		function signoutNow(){
			swal.fire({
				title: "Logout",
				text: "yakin akan logout dari akun anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					window.location.href="<?=site_url("home/signout")?>";
				}
			});
		}

		function tambahWishlist(id,nama){
			$.post("<?php echo site_url("assync/tambahwishlist/"); ?>"+id,{[$("#names").val()]:$("#tokens").val()},function(msg){
				var data = eval("("+msg+")");
				var wish = parseInt($(".wishlistcount").html());
				updateToken(data.token);
				if(data.success == true){
					$(".wishlistcount").html(wish+1);
					swal.fire(nama, "berhasil ditambahkan ke wishlist", "success");
				}else{
					swal.fire("Gagal", data.msg, "error");
				}
			});
		}

		function updateToken(token){
			$("#tokens").val(token);
		}

		$(".block2-wishlist .fas").on("click",function(){
			$(this).removeClass("active");
			$(this).addClass("active");
		});

	</script>