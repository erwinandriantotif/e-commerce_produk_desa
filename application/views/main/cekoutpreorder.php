<?php
	$set = $this->func->getSetting("semua");
?>
	<!-- Shoping Cart -->
	<style rel="stylesheet">
		@media only screen and (min-width:721px){
			.mobilefix{
				margin-left: -36px;
			}
		}
	</style>
	<div class="p-t-0 p-b-85">
		<div class="container p-t-10 p-b-50" style="background: #f8f9fa1c;">
			<div class="row">
				<div class="col-md-7 m-l-auto m-r-auto">
					<div class="p-lr-40 p-t-30 p-b-40 m-l-0-xl m-r-0-xl p-r-15-sm p-l-15-sm">
						<div class="row">
							<div class="col-2 mobilefix">
								<i class="fas fa-check-circle text-success fs-54"></i>
							</div>
							<div class="col-10 mobilefix">
								<p style="font-size: 16px;color:#383838">Order ID <?php echo $data->invoice; ?></p>
								<h4 class="mtext-105">Terima Kasih <?php echo $this->func->getProfil($_SESSION["usrid"],"nama","usrid"); ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 m-l-auto m-r-auto m-b-30">
					<div class="bg0 bor10 p-l-40 p-r-40 p-t-30 p-b-40 m-r-0-xl m-l-0-xl p-r-15-sm p-l-15-sm">
						<h4 class="mtext-109 cl2 p-b-20">
							Pembayaran
						</h4>
						<?php
							if($data->transfer > 0){
								$tombol = "KONFIRMASI PEMBAYARAN";
						?>
							<div class="p-b-13">
								<div class="row p-t-20">
									<div class="col-md-12">
										<h5 class="text-black">Metode Pembayaran: <span class="color1" style="font-size: 16px;">Bank Transfer</span> </h5>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-12">
										<p>Mohon lakukan pembayaran sejumlah <span style="color: #c0392b; font-size: 20px;"><b>Rp <?php echo $this->func->formUang($data->harga); ?></b></span>
											ke rekening di bawah ini: </p>
									</div>
										<div class="col-md-12">
										<p></p>
										<?php
											foreach($bank->result() as $bn){
													echo '
														<h5 class="cl2 m-t-10 m-b-10 p-t-10 p-l-10 p-b-10" style="border-left: 8px solid #C0A230;">
															<b class="text-primary">Bank '.$bn->nama.': </b><b class="text-success">'.$bn->norek.'</b><br/>
															<span style="font-size: 90%">a/n '.$bn->atasnama.'<br/>
															KCP '.$bn->kcp.'</span>
														</h5>
													';
											}
										?>
										<p class="m-b-5 m-t-20">
										<b>PENTING: </b>
										</p>
										<ul style="margin-left: 15px;">
											<li style="list-style-type: disc;">Mohon lakukan pembayaran dalam <b>1x24 jam</b></li>
											<li style="list-style-type: disc;">Sistem akan otomatis mendeteksi apabila pembayaran sudah masuk</li>
											<li style="list-style-type: disc;">Apabila sudah transfer dan status pembayaran belum berubah, mohon konfirmasi pembayaran manual di bawah</li>
											<li style="list-style-type: disc;">Pesanan akan dibatalkan secara otomatis jika Anda tidak melakukan pembayaran.</li>
										</ul>
									</div>
								</div>
							</div>
							<a href="javascript:void(0)" onclick="konfirmasi(<?=$data->id?>)" class="cl1 text-center w-full dis-block"><b><?php echo $tombol; ?></b> <i class="fa fa-chevron-circle-right"></i></a>
						<?php
							}else{
								$tombol = "STATUS PESANAN";
						?>
							<div class="p-b-13">
								<div class="row p-t-20">
									<div class="col-md-12">
										<h5 class="text-black">Metode Pembayaran: <span class="cl1" style="font-size: 16px;">Saldo <?=$this->func->getSetting("nama")?></span> </h5>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-12">
										<p>Terima kasih, saldo <b class='cl1'> <?=$this->func->getSetting("nama")?></b> sudah terpotong sebesar
											<span style="color: #c0392b; font-size: 20px;"><b>Rp <?php echo $this->func->formUang($data->saldo); ?></b></span>
											untuk pembayaran pesanan Anda.<br/>
											<!--Kami sudah menginformasikan kepada merchant untuk memproses pesanan Anda.-->
										</p>
									</div>
								</div>
							</div>
						<?php } ?>
						<hr class="m-t-30"/>
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-7 m-l-auto m-r-auto m-b-30">
					<h4 class="text-primary font-bold p-b-20 m-t-30">
						Produk Pesanan
					</h4>
			    	<div class="produk p-b-40 m-l-0 m-r-0">
							
							<?php
								$produk = $this->func->getProduk($data->idproduk,"semua");
								$variasee = $this->func->getVariasi($data->variasi,"semua");
								$variasi = ($data->variasi != 0) ? $this->func->getWarna($variasee->warna,"nama")." size ".$this->func->getSize($variasee->size,"nama") : "";
								$variasi = ($data->variasi != 0) ? "<br/><small class='text-warning'>variasi: ".$variasi."</small>" : "";
							?>
							<div class="produk-item row m-b-30 m-lr-0">
								<div class="col-md-2 row m-lr-0 p-lr-0">
									<div class="img" style="background-image:url('<?php echo $this->func->getFoto($data->idproduk,"utama"); ?>')"></div>
								</div>
								<div class="col-md-7 hidesmall">
									<div class="p-l-10 font-medium"><?php echo $produk->nama.$variasi; ?></div>
								</div>
								<div class="col-3 font-medium text-info">
								<p>Rp <?php echo $this->func->formUang($data->harga); ?> <span style="font-size:11px">x<?php echo $data->jumlah; ?></span></p>
								</div>
							</div>
					</div>
				</div>
		</div>
	</div>
	
<script type="text/javascript">
	function konfirmasi(bayar){
		$('.js-modal2').addClass('show-modal2');
		$("#bayar").val(bayar);
	}
</script>
	<!-- Modal1 -->
	<!-- <div class="wrap-modal2 js-modal2 p-t-60 p-b-20">
		<div class="overlay-modal2 js-hide-modal2"></div>
		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent col-md-6 m-lr-auto">
				<button class="how-pos3 hov3 trans-04 js-hide-modal2">
					<img src="<?php echo base_url("assets/images/icons/icon-close.png"); ?>" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-12 p-b-20">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<h4>Upload Bukti Transfer <span style="font-size: 15px">(.jpg, .png, .pdf)</span></h4>
						</div>
					</div>
					<form id="upload" class="row p-lr-0 m-lr-0 w-full" method="POST" enctype="multipart/form-data" action="<?php echo site_url("manage/konfirmasipreorder"); ?>">
						<input name="idbayar" type="hidden" id="bayar" value="0"/>
						<div class="col-md-12 p-b-20">
							<div class="m-lr-20">
								<div class="upload-options">
									<label>
										<input type="file" name="bukti" class="w-full pointer image-upload bor8 p-t-15 p-b-15 p-l-25 p-r-30 p-lr-0-lg" accept="image/*" />
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-4 m-lr-10 p-l-25 p-r-30 p-lr-0-lg">
							<button type="submit" class="flex-c-m stext-101 cl0 size-107 bg1 hov-btn1 p-lr-15 trans-04 m-b-10">
								Upload
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->
