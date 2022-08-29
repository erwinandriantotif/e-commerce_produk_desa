<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$set = $this->func->globalset("semua");
$nama = (isset($titel)) ? $set->nama." &#8211; ".$titel: $set->nama." &#8211; ".$set->slogan;
include 'footv2.php';?>
  <footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                      <a href="#" class="mouse-icon">
                          <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                      </a>
                  </div>
        </div>
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><?=$nama?></h2>
            <p><?php echo 'Belanja Produk Desa dengan murah, mudah dan cepat'; ?></p>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Menu</h2>
            <ul class="list-unstyled">
              <li><a href="<?php echo site_url('shop'); ?>" class="py-2 d-block">Kategori</a></li>
              </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Bantuan</h2>
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                <li><a href="<?php echo site_url('pages/tentangkami'); ?>" class="py-2 d-block">Tentang Kami</a></li>
              <li><a href="<?php echo site_url('pages/kontak'); ?>" class="py-2 d-block">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-2">
              <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate bg-danger"><a href="#"><span class="icon-youtube text-white"></span></a></li>
              <li class="ftco-animate bg-primary"><a href="#"><span class="icon-facebook text-white"></span></a></li>
              <li class="ftco-animate bg-danger"><a href="#"><span class="icon-instagram text-white"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with Desa Pakuwesi for every people.
        </div>
      </div>
    </div>
  </footer>

  
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="<?php echo base_url('assets/themes/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/jquery.easing.1.3.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/jquery.stellar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/aos.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/jquery.animateNumber.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/scrollax.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/themes/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>



<script>
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

  $.ajax({
    method: 'GET',
    url: '<?php echo site_url('shop/cart_api?action=cart_info'); ?>',
    success: function (res) {
      var data = res.data;

      var total_item = data.total_item;
      $('.cart-item-total').text(total_item);
    }
  });

  $('.add-cart').click(function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var sku = $(this).data('sku');
    var qty = $(this).data('qty');
    qty = (qty > 0) ? qty : 1;
    var price = $(this).data('price');
    var name = $(this).data('name');

    $.ajax({
      method: 'POST',
      url: '<?php echo site_url('shop/cart_api?action=add_item'); ?>',
      data: {
        id: id,
        sku: sku,
        qty: qty,
        price: price,
        name: name
      },
      success: function (res) {
        if (res.code == 200) {
          var totalItem = res.total_item;

          $('.cart-item-total').text(totalItem);
          toastr.info('Item ditambahkan dalam keranjang');
        }
        else {
          console.log('Terjadi kesalahan');
        }
      }
    });
  });
</script>
  
</body>
</html>