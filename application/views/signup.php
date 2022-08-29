

	<!-- breadcrumb -->
	<!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo site_url(); ?>" class="text-primary">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 color1">
				Daftar
			</span>
		</div>
	</div> -->


	<!-- Login -->
	<div class="p-t-30">
		<div class="container p-b-20">

            <div class="row p-lr-20">
                <div class="col-md-6 m-lr-auto m-b-30">
                    <div class="p-l-20 p-r-20 p-t-30 p-b-40 m-lr-0-xl p-lr-15-sm" id="load">
						<?php 
							$set = $this->func->getSetting("login_otp");
							if($set == 1){
						?>
							<form id="signup" class="p-t-50 p-b-50 p-lr-30">
								<center><h4>Daftar Sebagai Pembeli</h4></center><br>
								<div class="m-b-12">
									<input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Lengkap" required >
								</div>
								<div class="m-b-12">
									<input onkeypress="return isNumber(event)" class="form-control" type="text" name="nohp" placeholder="No Whatsapp" required >
								</div>
								<div class="bor8 m-b-12 how-pos4-parent">
									<input class="form-control" type="text" id="email" name="email" placeholder="Alamat Email" required >
								</div>
								<p id="imelerror" class="text-danger" style="display:none;"><small>terjadi kesalahan, mohon formulir dilengkapi dulu</small></p>
								<div class="bor8 m-t-15 m-b-12 how-pos4-parent">
									<input class="form-control" type="password" name="pass" placeholder="Password" required >
								</div>
								<div class="rs1-select2 rs2-select2 bor8 how-pos4-parent m-b-12">
								<select class="form-control js-select2" name="kelamin" required >
									<option value="">Jenis Kelamin</option>
									<option value="1">Laki - laki</option>
									<option value="2">Perempuan</option>
								</select>
								<div class="dropDownSelect2"></div>
								</div>
								<div class="row m-b-12 m-t-24 m-l-0 m-r-0">
								<div class='col-12 p-r-0 p-l-5 m-b-10'>Tanggal lahir</div>
								<div class="select2 col-md-3 m-b-10 p-l-0 p-r-0 m-r-14">
									<select class="form-control js-select2" name="tgl" required >
									<option value="">Tanggal</option>
									<?php
														for($i=1; $i<=31; $i++){
															$a = ($i<10) ? 0 .$i : $i;
															echo '<option value="'.$a.'">'.$i.'</option>';
														}
													?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<div class="select2 col-md-5 m-b-10 p-l-0 p-r-0">
									<select class="form-control js-select2" name="bln" required >
									<option value="00">Bulan</option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								<div class="select2 col-md-3 m-b-20 p-l-0 p-r-0 m-l-14">
									<select class="form-control js-select2" name="thn" required >
									<option value="">Tahun</option>
									<?php
													$awal = date("Y") - 65;
													$akhir = date("Y") - 17;
													for($i=$akhir; $i>=$awal; $i--){
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
								</div>
								<div class="row m-t-10">
									<div class="col-md-12">
										<div id="proses" style="display:none;"><h5 class="cl1"><i class="fas fa-compact-disc fa-spin text-success"></i> Memproses...</h5></div>
										<button id="submit" type="submit" class="btn btn-success btn-lg btn-block">MENDAFTAR</button>
										<p class="text-center m-t-20 m-b-10">Sudah punya akun?</p>
										<a href="<?php echo site_url("home/signin"); ?>" class="btn btn-primary btn-lg btn-block"><i class="fas fa-sign-in-alt"></i> &nbsp;M A S U K</a>
									</div>
								</div>
							</form>
						<?php
							}else{
						?>
							<form id="signup_otp" class="p-t-50 p-b-50 p-lr-30">
								<div class="m-b-12 t-center">
									masukkan nomor handphone atau alamat email anda untuk mengirimkan kode otp
								</div>
								<div class="m-b-18">
									<input class="form-control p-tb-28 p-lr-24 fs-20 font-medium text-center" type="text" id="emailhp" name="email" placeholder="No Handphone / Email" required >
									<p id="imelerror" class="text-danger" style="display:none;"><small>terjadi kesalahan, mohon formulir dilengkapi dulu</small></p>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12">
										<div id="proses" style="display:none;"><h5 class="cl1"><i class="fas fa-compact-disc fa-spin text-success"></i> Memproses...</h5></div>
										<button id="submit" type="submit" class="btn btn-success btn-lg btn-block">MENDAFTAR</button>
										<p class="text-center m-t-20 m-b-10">Sudah punya akun?</p>
										<a href="<?php echo site_url("home/signin"); ?>" class="btn btn-primary btn-lg btn-block"><i class="fas fa-sign-in-alt"></i> &nbsp;M A S U K</a>
									</div>
								</div>
							</form>
						<?php
							}
						?>
                    </div>
                </div>
            </div>
		</div>
	</form>


  <script type="text/javascript">
  	function validation(){
  		return 0;
  	}
  	function isNumber(evt) {
  		evt = (evt) ? evt : window.event;
  		var charCode = (evt.which) ? evt.which : evt.keyCode;
  		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
  			return false;
  		}
  		return true;
  	}

    $(".email").each(function(){
      if($(this).val() != ""){
        $(this).trigger("change");
      }
    });

  	$(function(){
  		localStorage["error"] = 1;

  		$("#signup").on("submit",function(e){
  			e.preventDefault();

  			if(localStorage["error"] == 0){
				if($("#email").val().length > 8){
					$("input,select").prop("readonly",true);
						$("#proses").show();
						$("#submit").hide();
				//	$("#submit").html("<i class='fa fa-spin fa-spinner'></i> tunggu sebentar...");
					$.post("<?php echo site_url("home/signup"); ?>",$(this).serialize(),function(msg){
						fbq('track', 'CompleteRegistration',{content_name:$("#nama").val()});
						$("#load").html(msg);
						$('html, body').animate({ scrollTop: $("#load").offset().top - 300 });
					});
				}else{
					swal.fire("Belum sesuai","Cek kembali alamat email atau nomor handphone apakah sudah benar/sesuai?","error");
				}
  			}else{
  				swal.fire("Sudah terdaftar","Alamat email atau nomor handphone sudah terdaftar, silahkan menuju halaman login untuk masuk ke akun","error");
  			}
  		});
  		$("#signup_otp").on("submit",function(e){
  			e.preventDefault();

  			if(localStorage["error"] == 0){
				if($("#emailhp").val().length > 8){
					$("input,select").prop("readonly",true);
					$("#proses").show();
					$("#submit").hide();
					$.post("<?php echo site_url("home/signup_otp"); ?>",$(this).serialize(),function(msg){
						fbq('track', 'CompleteRegistration',{content_name:$("#emailhp").val()});
						window.location.href="<?=site_url("home/signup_otp/challenge")?>";
					});
				}else{
					swal.fire("Belum sesuai","Cek kembali alamat email atau nomor handphone apakah sudah benar/sesuai?","error");
				}
  			}else{
  				swal.fire("Sudah terdaftar","Alamat email atau nomor handphone sudah terdaftar, silahkan menuju halaman login untuk masuk ke akun","error");
  			}
  		});

  		$("#email").change(function(){
  			if($(this).val().indexOf("@") != -1 && $(this).val().indexOf(".") != -1){
  				$.post("<?php echo site_url("home/signup/cekemail"); ?>",{"email":$("#email").val()},function(msg){
  					var result = eval('('+msg+')');
						if(result.success == true){
  						$("#imelerror").hide();
						localStorage["error"] = 0;
  					}else{
						localStorage["error"] = 1;
  						$("#imelerror").show();
  						$("#imelerror small").html(result.message);
  					}
  				});
  			}else{
				localStorage["error"] = 1;
  				$("#imelerror").show();
  				$("#imelerror small").html("masukkan format email dengan benar");
  			}
      	});
  		$("#emailhp").change(function(){
  			$.post("<?php echo site_url("home/signup/cekemail"); ?>",{"email":$("#emailhp").val()},function(msg){
  				var result = eval('('+msg+')');
					if(result.success == true){
  					$("#imelerror").hide();
					localStorage["error"] = 0;
  				}else{
  					$("#imelerror").show();
					localStorage["error"] = 1;
  					$("#imelerror small").html(result.message);
				}
			});
      	});

  	});
  </script>
