<?php
    if($id != 0){
        $this->db->where("id",intval($id));
        $db = $this->db->get("kategori");
        foreach($db->result() as $r){
        }
    }
?>
<form id="saveform" method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=intval($id)?>" />
    <div class="row">
        <div class="col-md-12">
            <a class="float-right btn btn-danger" href="javascript:history.back()"><i class="la la-arrow-left"></i> Kembali</a>
            <?php if($id == 0){ ?>
			<h4 class="page-title">Tambah Kategori Baru</h4>
			<?php }else{ ?>
			<h4 class="page-title">Edit Kategori</h4>
			<?php } ?>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Kategori</div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo (isset($r->nama)) ? $r->nama : ""; ?>" required />
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="">
        <button type="submit" class="btn btn-primary"><i class="la la-check-circle"></i> Simpan Kategori</button>
        <button type="reset" class="btn btn-warning"><i class="la la-refresh"></i> Reset</button>
    </div>
</form>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function(){
		$("#saveform").on("submit",function(){
			var btn = $(".btn-primary").html();
			$(".btn-primary").html("<i class='fas fa-spin fa-spinner'></i> Menyimpan...");
			$(".btn-primary").prop("disabled",true);
		});
		
    });
</script>