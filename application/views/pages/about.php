<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
?>
  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
          <div class="container">
              <div class="row">
                  <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo base_url('admin/assets/img/logo-20201011162936.png'); ?>);">
                      <a href="https://www.youtube.com/watch?v=t8Vm_hModdk" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                          <span class="icon-play"></span>
                      </a>
                  </div>
                  <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                  <h2 class="mb-4">Selamat Datang di <?php echo ''; ?> (E-commerce Produk Desa)</h2>
              </div>
            </div>
            <div class="pb-md-5">
                          <p><a href="<?php echo site_url('browse'); ?>" class="btn btn-primary">Belanja sekarang!</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
      <section class="ftco-section testimony-section">
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
        </div>
      </div>
    </div>
  </section>

  
<section class="ftco-section">
      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
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
        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
              <span class="flaticon-shipped"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Pengiriman Terjamin</h3>
          <span>Pengiriman Online</span>>
        </div>
      </div>    
    </div>
    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services mb-md-0 mb-4">
        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
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