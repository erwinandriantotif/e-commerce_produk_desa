<h4 class="page-title">Pesan Masuk</h4>

<div class="m-b-60">
	<div class="card">
		<div class="card-header row">
			<div class="tabs col-md-8 m-b-10">
				<a href="javascript:loadBaca(1)" class="tabs-item active" data-selector="baca">
					Belum Dibaca
				</a>
				<a href="javascript:loadSemua(1)" class="tabs-item" data-selector="semua">
					Semua Pesan
				</a>
			</div>
			<div class="col-md-4 row m-lr-0">
				<div class="col-10 p-lr-0"><input type="text" class="form-control" onchange="cariData()" placeholder="cari pesan" id="cari" /></div>
				<div class="col-2 p-lr-0"><button class="btn btn-sm btn-secondary w-full" onclick="cariData()"><i class="fas fa-search"></i></button></div>
			</div>
		</div>
		<div class="card-body" id="load">
			<i class="fas fa-spin fa-spinner"></i> Loading data...
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		loadBaca(1);
		
		$(".tabs-item").on('click',function(){
			$(".tabs-item.active").removeClass("active");
			$(this).addClass("active");
		});
	});
	
	function loadBaca(page){
		$("#load").html('<i class="fas fa-spin fa-spinner"></i> Loading data...');
		$.post("<?=site_url("Admin/pesan?load=baca&page=")?>"+page,{"cari":$("#cari").val()},function(msg){
			$("#load").html(msg);
		});
	}
	function loadSemua(page){
		$("#load").html('<i class="fas fa-spin fa-spinner"></i> Loading data...');
		$.post("<?=site_url("Admin/pesan?load=semua&page=")?>"+page,{"cari":$("#cari").val()},function(msg){
			$("#load").html(msg);
		});
	}
	function openPesan(id){
		$("#tujuan").val(id);
		$("#temp").val(id);
		$("#modalpesan").modal();
		$("#pesan").html('<div class="pesanwrap center"><div class="isipesan"><i class="fa fa-spin fa-spinner"></i> memuat pesan...</div></div>');
		$( "#modalpesan" ).on('shown.bs.modal', function(){
			var setin = setInterval(() => {
				loadPesan();
			}, 3000);
			$( "#modalpesan" ).on('hidden.bs.modal', function(){
				clearInterval(setin);
			});
		});
	}
	
	function loadPesan(){
		var id = $("#temp").val();
		$("#pesan").load("<?=site_url("api/pesanmasuk")?>/"+id,function(){
			$("#pesan").animate({ scrollTop: $("#pesan").prop('scrollHeight')}, 1000);
		});
	}
	function cariData(){
		if($(".tabs-item.active").data("selector") == "baca"){
			loadBaca(1);
		}else{
			loadSemua(1);
		}
	}
</script>

<script type="text/javascript">
	$(function(){
		$("#kirimpesan").on("submit",function(e){
			e.preventDefault();
			$.post("<?=site_url("api/kirimpesan")?>",$(this).serialize(),function(s){
				var data = eval("("+s+")");
				$("#isipesan").val("");
				if(data.success == true){
					$("#pesan").html('<div class="isipesan"><i class="fa fa-spin fa-spinner"></i> memuat pesan...</div>');
					loadPesan();
				}else{
					swal("GAGAL!","terjadi kendala saat mengirim pesan, coba ulangi beberapa saat lagi","error");
				}
			});
		});
	});
</script>
<input type="hidden" id="temp" style="display:none" />

	<div class="modal fade" id="modalpesan" tabindex="-1" role="dialog" style="background: rgba(0,0,0,.5);" style="bottom:0;right:0; aria-hidden="true">
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
					<input type="hidden" id="tujuan" name="tujuan" value="0" />
					<div class="modal-footer">
						<div class="formpesan row w-full m-lr-0">
							<input type="text" class="form-control col-9" id="isipesan" placeholder="ketik pesan..." name="isipesan" required />
							<button type="submit" id="submit" class="btn btn-success col-3"><i class="fa fa-paper-plane"></i> KIRIM</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>