<div class="table-responsive">
	<table class="table table-condensed table-hover">
		<tr>
			<th scope="col">Tanggal</th>
			<th scope="col">No Transaksi</th>
			<th scope="col">Nama Pembeli</th>
			<th scope="col">Total</th>
			<th scope="col">Kurir</th>
		</tr>
		<?php
			$page = (isset($_GET["page"]) AND $_GET["page"] != "") ? $_GET["page"] : 1;
			$cari = (isset($_POST["cari"]) AND $_POST["cari"] != "") ? $_POST["cari"] : "";
			$orderby = (isset($data["orderby"]) AND $data["orderby"] != "") ? $data["orderby"] : "id";
			$perpage = 10;

			$where = "orderid LIKE '%$cari%' OR total LIKE '%$cari%' OR kodebayar LIKE '%$cari%'";
			$this->db->like("orderid",$cari);
			$this->db->where("status",4);
			$rows = $this->db->get("transaksi");
			$rows = $rows->num_rows();

			$this->db->like("orderid",$cari);
			$this->db->where("status",4);
			$this->db->order_by("id","DESC");
			$this->db->limit($perpage,($page-1)*$perpage);
			$db = $this->db->get("transaksi");
			
			if($rows > 0){
				$no = 1;
				foreach($db->result() as $r){
					$trx = $this->func->getTransaksi($r->id,"semua","idbayar");
					$kurir = strtoupper($trx->kurir." ".$trx->paket);
					$this->db->where("idtransaksi",$r->id);
					$db = $this->db->get("transaksiproduk");
					$total = $r->ongkir;
					foreach($db->result() as $rs){
						$total += $rs->harga * $rs->jumlah;
					}
		?>
			<tr>
				<td class="text-center"><i class="fas fa-circle text-danger blink"></i> &nbsp; <?=$this->func->ubahTgl("d M Y H:i",$r->tgl);?></td>
				<td><?=$r->orderid?></td>
				<td><?=$this->func->getProfil($r->usrid,"nama","usrid")?></td>
				<td><?=$this->func->formUang($total)?></td>
				<td><?=$kurir?></td>
			</tr>
		<?php	
					$no++;
				}
			}else{
				echo "<tr><td colspan=6 class='text-center text-danger'>Belum ada pesanan</td></tr>";
			}
		?>
	</table>

	<?=$this->func->createPagination($rows,$page,$perpage,"loadBatal");?>
</div>