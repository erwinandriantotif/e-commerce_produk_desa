<?php
		$page = (isset($_GET["page"]) AND $_GET["page"] != "") ? $_GET["page"] : 1;
		$cari = (isset($_POST["cari"]) AND $_POST["cari"] != "") ? $_POST["cari"] : "";
		$orderby = (isset($data["orderby"]) AND $data["orderby"] != "") ? $data["orderby"] : "id";
		$perpage = 10;
		$blink = "";
		
		$where = "(isipesan LIKE '%$cari%' OR tgl LIKE '%$cari%') AND tujuan = 0";
		if($_GET["load"] == "baca"){
			$blink = "blink";
			$where .= " AND baca = 0";
		}
		$this->db->select("id");
		$this->db->where($where);
		$this->db->group_by("dari");
		$rows = $this->db->get("pesan");
		$rows = $rows->num_rows();
		
		$this->db->where($where);
		$this->db->order_by("id DESC");
		$this->db->group_by("dari");
		$this->db->limit($perpage,($page-1)*$perpage);
		$db = $this->db->get("pesan");
			
		if($rows > 0){
			$no = 1;
			foreach($db->result() as $r){
	?>
		<div class="pesanmasuk" onclick="openPesan(<?=$r->dari?>)">
			<div class="nama">
				<i class="float-right"><small><?=$this->func->ubahTgl("d/m/Y H:i",$r->tgl)?></small></i>
				<i class="fas fa-circle text-success <?=$blink?>"></i> &nbsp;<?=strtoupper($this->func->getProfil($r->dari,"nama","usrid"))?>
			</div>
			<div class="isipesan"><?=$this->func->potong($r->isipesan,60,"..")?></div>
		</div>
	<?php	
				$no++;
			}
		}else{
			echo "<div class='well well-success text-center text-danger'>Belum ada pesan</div>";
		}
	?>

	<?=$this->func->createPagination($rows,$page,$perpage);?>