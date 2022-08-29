<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
?>
  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row block-12">
        <div class="col-md-12 d-flex">
            <div style="width: 100%">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7903.144668802839!2d113.78350609557!3d-7.939653274521045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6c2c9ee0a126d%3A0x626c8313d02d6f98!2sKantor%20Desa%20Pakuwesi!5e0!3m2!1sid!2sid!4v1609018283784!5m2!1sid!2sid" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
      </div>
        <div class="row d-flex mb-5 contact-info">
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Alamat : </span> <?php echo $set->alamat; ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>No. TELP : </span> <?php echo $set->notelp; ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Email : </span> <?php echo $set->email; ?></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="info bg-white p-4">
              <p><span>Website  : </span> www.ProdukDesa.com</p>
            </div>
        </div>
      </div>
    </div>
  </section>