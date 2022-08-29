<!-- Container -->
	<div class="m-t-30">
		<div class="container m-b-75">
			<h3 class="text-primary font-bold m-b-30">Akun Saya</h3>
			<div class="tab">
				<div class="tab-header">
					<!-- <a class="navlink btn btn-success m-r-8 m-b-8" href="javascript:void(0)" data-link="#saldo"><i class="fas fa-wallet"></i> History Belanja</a> -->
					<a class="navlink btn btn-success m-r-8 m-b-8" href="javascript:void(0)" data-link="#informasi"><i class="fas fa-users-cog"></i> Pengaturan Akun</a>
					<a class="navlink klikrek btn btn-info m-r-8 m-b-8" href="javascript:void(0)" data-link="#rekening"><i class="far fa-credit-card"></i> Rekening</a>
					<a class="navlink btn btn-info m-r-8 m-b-8" href="javascript:void(0)" data-link="#alamat"><i class="fas fa-house-user"></i> Alamat</a>
					<a class="btn btn-danger m-b-8" href="javascript:void(0)" onclick="signoutNow()"><i class="fas fa-power-off"></i> Logout</a>
				</div>

				<!-- Tab panes -->
				<div class="tab-content">
				<div class="tab-pane in m-b-60" style="display:block;" id="informasi">
						<div class="row">
							<div class="col-md-6 m-lr-auto m-tb-30">
								<h4 class="m-b-20 font-bold text-primary">
									Profil Pengguna
								</h4>
								<div class="p-all-40 section">
									<?php
										$profil = $this->func->getProfil($_SESSION["usrid"],"semua","usrid");
										$user = $this->func->getUser($_SESSION["usrid"],"semua");
									?>
									<form class="form-horizontal" id="profil">
										<div class="form-group m-b-12">
											<label>Nama</label>
											<input class="form-control" type="text" name="nama" value="<?php echo $profil->nama; ?>">
										</div>
										<div class="form-group m-b-12">
											<label>Email</label>
											<input class="form-control" type="text" name="email" value="<?php echo $user->username; ?>">
											</div>
										<div class="form-group m-b-12">
											<label>No Handphone</label>
											<input class="form-control col-md-6" type="text" name="nohp" value="<?php echo $profil->nohp; ?>">
										</div>
										<div class="form-group m-b-12">
											<label>Kelamin</label>
											<div class="rs1-select2 rs2-select2">
												<select class="js-select2 form-control" name="kelamin">
													<option value="">Kelamin</option>
														<option value="1" <?php if($profil->kelamin == 1){ echo "selected"; } ?>>Laki-laki</option>
													<option value="2" <?php if($profil->kelamin == 2){ echo "selected"; } ?>>Perempuan</option>
												</select>
												<div class="dropDownSelect2"></div>
											</div>
										</div>
										<div class="form-group m-t-50">
											<a href="javascript:void(0)" onclick="simpanProfil()" class="btn btn-success btn-block btn-lg">
												<i class="fas fa-check-circle"></i> &nbsp;Simpan Profil
												</a>
											<span id="profilload" style="display:none;"><i class='fas fa-spin fa-compact-disc text-success'></i> Menyimpan...</span>
										</div>
									</form>
								</div>
							</div>

							<div class="col-md-6 m-lr-auto p-lr-0 m-tb-30">
								<h4 class="m-b-20 font-bold text-primary">
									Ganti Password
								</h4>
								<div class="section p-all-40 m-b-20">
									<form class="form-horizontal" id="gantipassword">
										<div class="form-group m-b-12">
											<label>Password Baru</label>
											<input class="form-control" type="password" name="password" value="">
										</div>
										<div class="form-group m-b-12">
											<label>Ulangi Password</label>
											<input class="form-control" type="password" value="">
										</div>
										<div class="form-group m-t-30">
											<a href="javascript:void(0)" onclick="simpanPassword()" class="btn btn-success btn-block btn-lg">
												<i class="fas fa-check-circle"></i> &nbsp;Simpan Password
											</a>
											<span id="passwload" style="display:none;"><i class='fas fa-spin fa-compact-disc text-success'></i> Menyimpan...</span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- REKENING -->
					<div class="tab-pane" id="rekening">
						<?php
							$this->db->where("usrid",$_SESSION["usrid"]);
							$db = $this->db->get("rekening");

							if($db->num_rows() <= 10){
						?>
							<div class="row m-t-30">
								<div class="col-md-6 hidesmall font-bold text-primary">
									<h4>Daftar Rekening</h4>
								</div>
								<div class="col-md-6 text-right m-b-20">
									<a href="javascript:tambahRekening();" class="btn btn-success">
										<i class="fas fa-plus"></i> &nbsp;Tambah Rekening
									</a>
								</div>
							</div>
						<?php
							}
						?>

						<div class="section p-all-30 table-responsive">
							<table class="table table-hover table-bordered table-striped">
								<tr class="table_head">
									<th class="p-l-20">#</th>
									<th>No Rekening</th>
									<th>Atasnama</th>
									<th>Bank</th>
									<th>Kantor Cabang</th>
									<th></th>
								</tr>

								<?php
									$no = 1;
									foreach($db->result() as $res){
								?>
								<tr class="table_row">
									<td class="p-lr-20 p-tb-10">
										<p><?php echo $no; ?></p>
									</td>
									<td>
										<p><?php echo $res->norek; ?></p>
									</td>
									<td>
										<p><?php echo $res->atasnama; ?></p>
									</td>
									<td>
										<p>BANK <?php echo $this->func->getBank($res->idbank,"nama"); ?></p>
									</td>
									<td>
										<p><?php echo $res->kcp; ?></p>
									</td>
									<td>
										<a href="javascript:editRekening(<?php echo $res->id; ?>)" class="btn btn-success btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
										<a href="javascript:hapusRekening(<?php echo $res->id; ?>)" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
								<?php
										$no++;
									}
									if($db->num_rows() == 0){
										echo "<tr><td class='p-all-10 txt-center' colspan=6>
										<p><i class='fas fa-exclamation-triangle text-danger'></i> Belum ada daftar rekening, silahkan tambah data untuk menarik saldo.</p>
										</td></tr>";
									}
								?>
							</table>
						</div>
          			</div>

					<!-- ALAMAT -->
					<div class="tab-pane" id="alamat">
						<?php
							$this->db->where("usrid",$_SESSION["usrid"]);
							$db = $this->db->get("alamat");

							if($db->num_rows() <= 10){
						?>
						<div class="row m-t-30">
							<div class="col-md-6 hidesmall font-bold text-primary">
								<h4>Daftar Rekening</h4>
							</div>
							<div class="col-md-6 text-right m-b-20">
								<a href="javascript:tambahAlamat();" class="btn btn-success">
									<i class="fas fa-plus"></i> &nbsp;Tambah Alamat
								</a>
							</div>
						</div>
						<?php
							}
						?>

						<div class="section p-all-30 table-responsive">
							<table class="table table-hover table-bordered table-striped">
								<tr class="table_head">
									<th class="p-l-20">#</th>
									<th>Nama Penerima</th>
									<th>No Handphone</th>
									<th>Alamat</th>
									<th></th>
								</tr>

								<?php
									$no = 1;
									foreach($db->result() as $res){
								?>
								<tr class="table_row">
									<td class="p-lr-20 p-tb-10">
										<p><?php echo $res->judul; ?></p>
										<?php if($res->status == 1){ echo '<small class="badge badge-warning">Alamat Utama</small>'; } ?>
									</td>
									<td>
										<p><?php echo $res->nama; ?></p>
									</td>
									<td>
										<p><?php echo $res->nohp; ?></p>
									</td>
									<td>
										<p><?php echo $res->alamat."<br/><small>Kodepos ".$res->kodepos."</small>"; ?></p>
									</td>
									<td>
										<a href="javascript:editAlamat(<?php echo $res->id; ?>)" class="btn btn-success btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
										<a href="javascript:hapusAlamat(<?php echo $res->id; ?>)" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
								<?php
										$no++;
									}
									if($db->num_rows() == 0){
										echo "<tr><td class='p-all-10 txt-center' colspan=6>
										<p><i class='fas fa-exclamation-triangle text-danger'></i> Belum ada daftar alamat, silahkan tambah data pengiriman pesanan.</p>
										</td></tr>";
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <script type="text/javascript">
    $(function(){
		$("#rekeningchange").change(function(){
			if($(this).val() == 0){
				$('.modal').modal("hide");
				$('#tambahrekening').modal();
				//$(this).val("").trigger("change");
			}
		});
			
		$(".navlink").each(function(){
			var link = $(this);
			var tab = $(this).data("link");
			var res = tab.replace("#","");
				
			$(this).click(function(){
				$(".navlink.btn-success").addClass("btn-info");
				$(".navlink.btn-success").removeClass("btn-success");
				link.removeClass("btn-info");
				link.addClass("btn-success");
				$(".tab-pane").hide();
				$(tab).show();
				//$(tab).html("<div class='m-lr-auto text-center p-tb-40'><h5><i class='fas fa-spin fa-compact-disc'></i> loading...</h5></div>");
				//$(tab).load("<?php echo site_url("assync/pesanan?status="); ?>"+res);
			});
		});

		$("#tariksaldo form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc text-primary'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);

			$.post("<?php echo site_url("manage/saldo"); ?>",$(this).serialize(),function(msg){
				var data = eval("("+msg+")");
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menarik saldo, tunggu maks. 2 hari kerja sampai uang Anda masuk ke rekening","success").then((value) => {
						location.reload();
					});
				}else{
					swal.fire("Gagal!",data.msg,"error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#topupsaldo form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc text-primary'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);

			$.post("<?php echo site_url("assync/topupsaldo"); ?>",$(this).serialize(),function(msg){
				var data = eval("("+msg+")");
				if(data.success == true){
					window.location.href= "<?=site_url("home/topupsaldo")?>?inv="+data.idbayar;
				}else{
					swal.fire("Gagal!",data.msg,"error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#tambahalamat form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc text-primary'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);

			$.post("<?php echo site_url("assync/tambahalamat"); ?>",$(this).serialize(),function(msg){
				var data = eval("("+msg+")");
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menambah alamat","success").then((value) => {
						location.reload();
					});
				}else{
					swal.fire("Gagal!","Gagal menambah alamat baru, silahkan ulangi beberapa saat lagi.","error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#tambahrekening form").on("submit",function(e){
			e.preventDefault();
			$(".submitbutton",this).parent().append("<span class='cl1'><i class='fas fa-spin fa-compact-disc text-primary'></i> Memproses...</span>");
			$(".submitbutton",this).hide();
			var submitbtn =	$(".submitbutton",this);

			$.post("<?php echo site_url("assync/tambahrekening"); ?>",$(this).serialize(),function(msg){
				var data = eval("("+msg+")");
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menambah rekening","success").then((value) => {
						location.reload();
					});
				}else{
					swal.fire("Gagal!","Gagal menambah rekening baru, silahkan ulangi beberapa saat lagi.","error");
					submitbtn.show();
					submitbtn.parent().find("span").remove();
				}
			});
		});

		$("#alamatprov").change(function(){
	      	changeKab($(this).val(),"");
		});

		$("#alamatkab").change(function(){
	      	changeKec($(this).val(),"");
		});

    });

		function copyLink() {
			$("#copylink").select();
			document.execCommand("copy");
			swal.fire("Berhasil menyalin!","silahkan paste/tempel dan kirim alamat yg sudah disalin ke teman Anda","success");
		}

		// FORM CHANGING
		function changeProv(proval,callback){
			$("#alamatprov").val(proval).trigger("change");
			if(callback) callback();
		}
		function changeKec(kabval,valu,callback){
			$("#alamatkec").html("<option value=''>Loading...</option>").trigger("change");
			$.post("<?php echo site_url("assync/getkec"); ?>",{"id":kabval},function(msg){
				var data = eval("("+msg+")");
				$("#alamatkec").html(data.html).promise().done(function(){
					$("#alamatkec").val(valu);
				});
			});
			if(callback) callback();
		}
		function changeKab(proval,valu,callback){
			$("#alamatkab").html("<option value=''>Loading...</option>").trigger("change");
			$("#alamatkec").html("<option value=''>Kecamatan</option>").trigger("change");

			$.post("<?php echo site_url("assync/getkab"); ?>",{"id":proval},function(msg){
				var data = eval("("+msg+")");
				$("#alamatkab").html(data.html).promise().done(function(){
					$("#alamatkab").val(valu);
				})
			});
			if(callback) callback();
		}

		// REKENING
		function tambahRekening(){
			$('.modal').modal("hide");
			$('#tambahrekening').modal();
		}
		function editRekening(rek){
			$.post("<?php echo site_url("assync/getRekening"); ?>",{"rek":rek},function(msg){
				var data = eval("("+msg+")");

				if(data.success == true){
					$("#rekeningid").val(rek);
					$("#rekeningidbank").val(data.idbank).trigger("change");
					$("#rekeningatasnama").val(data.atasnama);
					$("#rekeningnorek").val(data.norek);
					$("#rekeningkcp").val(data.kcp);

					$('.modal').modal('hide');
					$('#tambahrekening').modal();
				}else{
					swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
				}
			});
		}
		function hapusRekening(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "menghapus rekening ini dari akun Anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/hapusRekening"); ?>",{"rek":rek},function(msg){
						var data = eval("("+msg+")");

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil menghapus rekening","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}
		function batalTopup(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "membatalkan topup saldo ini?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/bataltopup"); ?>",{"id":rek},function(msg){
						var data = eval("("+msg+")");

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil membatalkan topup saldo","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}

		// ALAMAT
		function tambahAlamat(){
			$("#alamatid").val(0);
			$("#alamatnama").val("");
			$("#alamatnohp").val("");
			$("#alamatstatus").val(0).trigger("change");
			$("#alamatalamat").val("");
			$("#alamatkodepos").val("");
			$("#alamatjudul").val("");
			$("#alamatprov").val("").trigger("change");
			$('.modal').modal("hide");
			$('#tambahalamat').modal();
		}
		function editAlamat(rek){
			$.post("<?php echo site_url("assync/getAlamat"); ?>",{"rek":rek},function(msg){
				var data = eval("("+msg+")");

				if(data.success == true){
					changeProv(data.prov),
					changeKab(data.prov,data.kab),
					changeKec(data.kab,data.idkec);
					$("#alamatid").val(rek);
					$("#alamatnama").val(data.nama);
					$("#alamatnohp").val(data.nohp);
					$("#alamatstatus").val(data.status).trigger("change");
					$("#alamatalamat").val(data.alamat);
					$("#alamatkodepos").val(data.kodepos);
					$("#alamatjudul").val(data.judul);
					$('.modal').modal("hide");
					$('#tambahalamat').modal();
				}else{
					swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
				}
			});
		}
		function hapusAlamat(rek){
			swal.fire({
				title: "Anda yakin?",
				text: "menghapus alamat ini dari akun Anda?",
				icon: "warning",
				showDenyButton: true,
				confirmButtonText: "Oke",
				denyButtonText: "Batal"
			})
			.then((willDelete) => {
				if (willDelete.isConfirmed) {
					$.post("<?php echo site_url("assync/hapusAlamat"); ?>",{"rek":rek},function(msg){
						var data = eval("("+msg+")");

						if(data.success == true){
							swal.fire("Berhasil!","Berhasil menghapus alamat","success").then((value) => {
								location.reload();
							});
						}else{
							swal.fire("Error!","terjadi kesalahan silahkan ulangi beberapa saat lagi.","error");
						}
					});
				}
			});
		}

		function simpanProfil(){
			$("#profil a").hide();
			$("#profilload").show();
			$.post("<?php echo site_url("assync/updateprofil"); ?>",$("#profil").serialize(),function(msg){
				var data = eval("("+msg+")");
				$("#profil a").show();
				$("#profilload").hide();
				if(data.success == true){
					swal.fire("Berhasil!","Berhasil menyimpan informasi pengguna","success");
				}else{
					swal.fire("Gagal!","Gagal menyimpan informasi pengguna","error");
				}
			});
		}
		function simpanPassword(){
			$("#gantipassword a").hide();
			$("#passwload").show();
			$.post("<?php echo site_url("assync/updatepass"); ?>",$("#gantipassword").serialize(),function(msg){
				var data = eval("("+msg+")");
				$("#gantipassword a").show();
				$("#passwload").hide();
				if(data.success == true){
					$("#gantipassword input").val("");
					swal.fire("Berhasil!","Berhasil menyimpan password baru","success");
				}else{
					swal.fire("Gagal!","Gagal menyimpan informasi password","error");
				}
			});
		}
  </script>


    <!-- Modal3-Tambah Rekening -->
	<div class="modal fade" id="tambahrekening" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informasi Rekening Bank</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body p-tb-40">
					<form class="form-horizontal">
						<input type="hidden" name="id" id="rekeningid" value="0" />
						<div class="p-b-20 p-lr-30">
							<div class="m-b-12">
								<label>Bank</label>
								<div class="m-b-12 rs1-select2 rs2-select2">
									<select class="js-select2 form-control" id="rekeningidbank" name="idbank" required >
										<option value="">Pilih Bank</option>
										<?php
											$db = $this->db->get("rekeningbank");
											foreach($db->result() as $res){
												echo "<option value='".$res->id."'>".$res->nama."</option>";
											}
										?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>No Rekening</label>
								<input class="form-control" id="rekeningnorek" type="text" name="norek" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Atas Nama</label>
								<input class="form-control" id="rekeningatasnama" type="text" name="atasnama" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Kantor Cabang</label>
								<input class="form-control" id="rekeningkcp" type="text" name="kcp" placeholder="" required>
							</div>
						</div>
						<div class="p-lr-30">
							<button type="submit" class="submitbutton btn btn-lg btn-success btn-block">
								Simpan Rekening
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal3-Tambah Rekening -->
	<div class="modal fade" id="tambahalamat" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informasi Alamat</h5>
					<button type="button" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times text-danger fs-24 p-all-2"></i>
					</button>
				</div>
				<div class="modal-body p-tb-40">
					<form class="form-horizontal">
						<input type="hidden" name="id" id="alamatid" value="0" />
						<div class="p-b-15 p-lr-30">
							<div class="m-b-12">
								<label>Simpan sebagai? <small>cth: Alamat Rumah, Alamat Kantor, dll</small></label>
								<input class="form-control" id="alamatjudul" type="text" name="judul" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Nama Penerima</label>
								<input class="form-control" id="alamatnama" type="text" name="nama" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>No Handphone</label>
								<input class="form-control" id="alamatnohp" type="text" name="nohp" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Alamat Lengkap</label>
								<input class="form-control" id="alamatalamat" type="text" name="alamat" placeholder="" required>
							</div>
								<div class="m-b-12">
								<label>Provinsi</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2" id="alamatprov" required >
										<option value="">Pilih Provinsi</option>
										<?php
											$db = $this->db->get("prov");
											foreach($db->result() as $res){
												echo "<option value='".$res->id."'>".$res->nama."</option>";
											}
										?>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kabupaten</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2" id="alamatkab" required >
										<option value="">Pilih Kabupaten/Kota</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kecamatan</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2" id="alamatkec" name="idkec" required >
										<option value="">Pilih Kecamatan</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="m-b-12">
								<label>Kodepos</label>
								<input class="form-control" id="alamatkodepos" type="text" name="kodepos" placeholder="" required>
							</div>
							<div class="m-b-12">
								<label>Simpan Sebagai</label>
								<div class="rs1-select2 rs2-select2">
									<select class="js-select2" id="alamatstatus" name="status" required >
										<option value="0">Alamat</option>
										<option value="1">Alamat Utama</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>
						<div class="p-lr-30">
							<button type="submit" class="submitbutton btn btn-success btn-block btn-lg">
								Simpan Alamat
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
