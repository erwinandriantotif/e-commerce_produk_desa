<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$cari = (isset($_GET["cari"]) AND $_GET["cari"] != "") ? $_GET["cari"] : "";
?>
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo base_url('assets/themes/images/bg_1.jpg'); ?>);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <!-- <h1 class="mb-2">Kami Menjual Produk Desa Terbaik</h1> -->
            <p><a href="#products" class="btn btn-primary">Belanja Sekarang</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(<?php echo base_url('assets/themes/images/bg_2.jpg'); ?>);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <!-- <h1 class="mb-2">100% Produk Halal</h1> -->
            <p><a href="#products" class="btn btn-primary">Belanja Sekarang</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section" id="products">
      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-award"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Kualitas Terbaik</h3>
          <span>Kualitas dari Desa Terbaik</span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-shipped"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Pengiriman Terjamin</h3>
          <span>Pengiriman Online</span>
        </div>
      </div>      
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-box"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Harga Terjangkau</h3>
          <span>Diproduksi Langsung dari Desa</span>
        </div>
      </div>    
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-customer-service"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Bantuan</h3>
          <span>Bantuan 24/kerja Selalu Online</span>
        </div>
      </div>      
    </div>
  </div>
      </div>
  </section>
  <div class="search-product pos-relative m-b-40 m-l-auto m-r-auto col-md-8 ftco-animate">
					<form action="shop" class="row" method="GET">
						<input class="col-md-11 col-10" type="text" value="<?=$cari?>" name="cari" placeholder="Cari Produk">
						<button type="submit" class="col-2 col-md-1">
							<i class="fas fa-search text-primary" aria-hidden="true"></i>
						</button>
					</form>
				</div>
  <section class="ftco-section">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Semua Produk </span>
    </div>
  </div>   		
  </div>

  <div class="container">
      <div class="row produk-wrap">
				<?php
					$this->db->where("preorder !=",1);
					$this->db->limit(300);
					$this->db->order_by("stok DESC,tglupdate DESC");
					$db = $this->db->get("produk");
					$totalproduk = 0;
					foreach($db->result() as $r){
						$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 0;
							$result = $r->harga;
						$ulasan = $this->func->getReviewProduk($r->id);

						$this->db->where("idproduk",$r->id);
						$dbv = $this->db->get("produkvariasi");
						$totalstok = ($dbv->num_rows() > 0) ? 0 : $r->stok;
						$hargs = 0;
						$harga = array();
						foreach($dbv->result() as $rv){
							$totalstok += $rv->stok;
								$harga[] = $rv->harga;
							$hargs += $rv->harga;
						}

						if($totalstok > 0 AND $totalproduk < 12){
							$totalproduk += 1;
        ?>
        <div class="col-6 col-md-3 m-b-30 cursor-pointer produk-item ftco-animate" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
							<!-- Block2 -->
          <!-- <div class="col-md-6 col-lg-3 ftco-animate"> -->
              <div class="product">
                  <a href="<?php echo site_url('produk/'.$r->url); ?>" class="img-prod">
                      <img src="<?=$this->func->getFoto($r->id,"utama")?>" alt="<?=$r->nama?>" height="200px" width="300px">
                        <!-- <span class="status"><?php echo 'diskon 6'; ?>%</span> -->
                      <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <h3><a href="<?php echo site_url('produk/'.$r->url); ?>">
                      <?=$r->nama?></a></h3>
                      <div class="d-flex">
                          <div class="pricing">
                              <p class="price">
                                  <span class="price-sale"><?php 
                                  echo "Rp. ".$this->func->formUang($result);
                              ?></span>
                                </p>
                          </div>
                      </div>
                      <div class="row block2-ulasan">
									<div class='col-6'>
										<small><?=$ulasan['ulasan']?> Ulasan</small>
									</div>
									<div class='col-6 text-right'>
										<span class="badge badge-warning bdg-1 text-white"><i class='fa fa-star text-white'></i> <?=$ulasan['nilai']?></span>
									</div>
								</div>
                      <div class="bottom-area d-flex px-3">
                          <div class="m-auto d-flex">
                              <a href="<?php echo site_url('produk/'.$r->url); ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                  <span><i class="ion-ios-menu"></i></span>
                              </a>
                              <!-- <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1" data-id="<?=$r->id?>"> -->
                              <!-- <?php if($this->func->cekLogin() == true){ ?>
                                <a href="<?php echo site_url("home/signin"); ?>" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1"><span><i class="ion-ios-cart"></i></span></a>
                              <?php }else{ ?>
                                <a href="<?php echo site_url("home/signin"); ?>" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1"><span><i class="ion-ios-cart"></i></span></a>
					                    <?php } ?>
                              </a> -->
                          </div>
                      </div>             
                  </div>
              </div>
          </div>

<?php
    }
  }
      
  if($totalproduk == 0){
    echo "<div class='col-12 text-center m-tb-40'><h2><mark>Produk Kosong</mark></h2></div>";
  }
?>
      </div>
  </div>
</section>
  
  <section class="ftco-section img" style="background-image: url(<?php echo base_url('assets/themes/images/bg_3.jpg'); ?>);">
  <div class="container">
          <div class="row justify-content-end">
    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
        <span class="subheading">Produk dengan Kualitas Terbaik</span>
      <h3><a href="#"><?php echo 'Madu Khas Desa Pakuwesi'; ?></a></h3>
      <span class="price"><a href="#">Madu Dengan Kualitas terbaik hanya  
      <?php echo 'ada di desa Pakuwesi'; ?></a></span>
    </div>
  </div>   		
  </div>
</section>
<script type="text/javascript">
		function refreshTabel(page){
			window.location.href = "<?=site_url("shop?cari=".$cari)?>;
		}
	</script>
<!-- <section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Apa yang pelanggan kami katakan?</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php
              $this->db->where("status",1);
              $this->db->limit(9);
              $db = $this->db->get("testimoni");
              foreach($db->result() as $r){
            ?>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?=base_url("admin/uploads/".$r->foto)?>)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line"><?=$r->komentar?></p>
                  <p class="name"><?=$r->nama?></p>
                  <span class="position"><?=$r->tgl?></span>
                </div>
              </div>
              </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section> -->