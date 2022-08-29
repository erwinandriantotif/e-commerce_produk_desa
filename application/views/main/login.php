                    <div class="p-l-20 p-r-20 m-lr-0-xl p-lr-15-sm" id="load">
						<?php 
							$set = $this->func->getSetting("login_otp");
							if($set == 1){
						?>
							<form id="signin" class="p-t-50 p-b-50 p-lr-30">
								<center><h4>Masuk Sebagai Pembeli</h4></center><br>
								<div class="m-b-12">
									<input class="form-control" type="text" name="email" placeholder="Email" required >
								</div>
								<div class="m-t-15 m-b-12">
									<input class="form-control" type="password" name="pass" placeholder="Password" required >
								</div>
								<div class="row m-b-30">
									<div class="col-6 text-left">
										<a href="<?php echo site_url('home/signin'); ?>" class="text-danger"><b>Log In OTP</b></a>
									</div>
									<div class="col-6 text-right">
										<a href="javascript:void(0)" id="reset" class="text-danger"><b>Lupa Password?</b></a>
									</div>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<button type="submit" id="submit" class="btn btn-primary btn-block btn-lg">MASUK</button>
										<p class="text-center m-t-20 m-b-10">Belum punya akun?</p>
										<a href="<?php echo site_url("home/signup"); ?>" class="btn btn-success btn-block btn-lg"><i class="fas fa-chevron-circle-right"></i> MENDAFTAR DISINI </a>
									</div>
								</div>
							</form>
						<?php
							}else{
						?>
							<form id="signin_otp" class="p-t-50 p-b-50 p-lr-30">
								<div class="m-b-12 t-center">
									masukkan nomor handphone atau alamat email anda untuk mengirimkan kode otp
								</div>
								<div class="m-b-18">
									<input class="form-control p-tb-28 p-lr-24 fs-20 font-medium text-center" type="text" name="email" placeholder="No Handphone / Email" required >
								</div>
								<div class="row m-b-30">
									<!-- <div class="col-6">
										<a href="javascript:void(0)" id="" class="text-primary"><b>Masuk OTP</b></a>
									</div> -->
									<div class="col-12 text-right">
										<a href="javascript:void(0)" id="login" class="text-danger"><b>Log in dengan Password?</b></a>
									</div>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<button type="submit" id="submit" class="btn btn-primary btn-block btn-lg">MASUK</button>
										<p class="text-center m-t-20 m-b-10">Belum punya akun?</p>
										<a href="<?php echo site_url("home/signup"); ?>" class="btn btn-warning btn-block btn-lg"><i class="fas fa-chevron-circle-right"></i> MENDAFTAR DISINI </a>
									</div>
								</div>
							</form>
						<?php
							}
						?>
	</form>


  <script type="text/javascript">
  	$(function(){
  		$("#signin").on("submit",function(e){
  			e.preventDefault();

  			var submit = $("#submit").html();
  			$(".form").prop("readonly",true);
  			$("#submit").html("<i class='fas fa-spin fa-compact-disc'></i> tunggu sebentar...");
  			$.post("<?php echo site_url("home/signin"); ?>",$(this).serialize(),function(msg){
  				var data = eval('('+msg+')');
  				if(data.success == true){
  					window.location.href=data.redirect;
  				}else{
  					$("#submit").html(submit);
  					swal.fire("Warning!","alamat email atau password salah, silahkan cek kembali","error");
  				}
  			});
  		});


  		$("#reset").click(function(){
  			$("#load").html("<div class='t-center m-tb-40'><i class='fas fa-spin fa-compact-disc text-info'></i> mohon tunggu sebentar...</div>");
  			$("#load").load("<?php echo site_url("home/signin/pwreset"); ?>");
  		});

		  $("#login").click(function(){
  			$("#load").html("<div class='t-center m-tb-40'><i class='fas fa-spin fa-compact-disc text-info'></i> mohon tunggu sebentar...</div>");
  			$("#load").load("<?php echo site_url("home/signin"); ?>");
  		});
  	});
  </script>
