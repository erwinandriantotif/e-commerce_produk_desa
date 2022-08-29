
<?php $set = $this->func->getSetting("semua"); ?>
<input type="hidden" id="names" value="<?=$this->security->get_csrf_token_name()?>" />
<input type="hidden" id="tokens" value="<?=$this->security->get_csrf_hash();?>" />

	<?php if($this->func->cekLogin() == true){ ?>
	<script type="text/javascript">
		$(function(){
			//$("#modalpesan").modal();
			$("#modalpilihpesan,#modalpesan").on('shown.bs.modal', function(){
				$(".chat-sticky").hide();
			});
			$("#modalpilihpesan,#modalpesan").on('hidden.bs.modal', function(){
				$(".chat-sticky").show();
			});
			$("#modalpesan").on('shown.bs.modal', function(){
				fbq("track","Contact");
				var seti = setInterval(()=>{ loadPesan(); },3000);
				$("#modalpesan").on('hidden.bs.modal', function(){
					clearInterval(seti);
				});
			});
			
			$("#kirimpesan").on("submit",function(e){
				e.preventDefault();
				var datar = $(this).serialize();
				datar = datar + "&" + $("#names").val() + "=" + $("#tokens").val();
				$.post("<?=site_url("assync/kirimpesan")?>",datar,function(s){
					fbq("track","Contact");
					var data = eval("("+s+")");
					updateToken(data.token);
					$("#kirimpesan input").val("");
					if(data.success == true){
						$("#pesan").html('<div class="isipesan"><i class="fas fa-spin fa-compact-disc"></i> memuat pesan...</div>');
						loadPesan();
					}else{
						swal("GAGAL!","terjadi kendala saat mengirim pesan, coba ulangi beberapa saat lagi","error");
					}
				});
			});
			
			//$("#modalpilihpesan").modal();
			
			function loadPesan(){
				$("#pesan").load("<?=site_url("assync/pesanmasuk")?>",function(){
					$("#pesan").animate({ scrollTop: $("#pesan").prop('scrollHeight')}, 1000);
				});
			}

		});
	</script>
	<div class="modal fade" id="modalpesan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.5);" style="bottom:0;right:0;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title"><i class="fa fa-comments"></i> Live Chat</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pesan" id="pesan">
					<div class="pesanwrap center">
						<div class="isipesan"><i class="fa fa-spin fa-spinner"></i> memuat pesan...</div>
					</div>
				</div>
				<form id="kirimpesan" method="POST">
					<div class="modal-footer">
						<div class="formpesan row w-full m-lr-0">
							<input type="text" class="form-control col-9" placeholder="ketik pesan..." name="isipesan" required />
							<button type="submit" id="submit" class="btn btn-success col-3"><i class="fa fa-paper-plane"></i> KIRIM</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalpilihpesan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.5);" style="bottom:0;right:0;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content p-lr-30 p-tb-40 text-center">
				<h3 class="text-primary font-bold">Hubungi Admin</h3><br/>
				<a href="https://wa.me/<?=$this->func->getRandomWasap()?>" target="_blank" class="btn btn-lg btn-block btn-success m-b-10"><i class="fab fa-whatsapp"></i> &nbsp;Hubungi via Whatsapp</a>
				<button onclick="$('#modalpilihpesan').modal('hide');$('#modalpesan').modal()" class="btn btn-lg btn-block btn-primary"><i class="fas fa-comments"></i> &nbsp;Live Chat</button>
			</div>
		</div>
	</div>
	<a href="javascript:void(0)" class="chat-sticky" onclick='$("#modalpilihpesan").modal()'><i class="fas fa-comment-dots"></i> Live Chat</a>
	<?php }else{ ?>
	<a href="https://wa.me/<?=$this->func->getRandomWasap()?>" target="_blank" class="whatsapp-sticky"><i class="fab fa-whatsapp"></i></a>
	<?php }?>
	

	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>
	<script type="text/javascript">
		$(".js-select2").each(function(){
			$(this).select2({
    			theme: 'bootstrap4',
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
	</script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/slick/slick.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/vendor/swal/sweetalert2.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/aos.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>
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
	</script>
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?=$set->fb_pixel?>');
		fbq('track', 'PageView');
		</script>
		<noscript>
		<img height="1" width="1" style="display:none" 
			src="https://www.facebook.com/tr?id=<?=$set->fb_pixel?>&ev=PageView&noscript=1"/>
		</noscript>
	<!-- End Facebook Pixel Code -->

</body>
</html>
