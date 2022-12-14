<?php
  if($saldo->num_rows() > 0){
      $namatoko = $this->func->getSetting("nama");
?>
  <div class="table-list">
        <?php
          foreach($saldo->result() as $res){
            $status = ($res->status == 1) ? "<span class='text-success'>berhasil</span>" : "<i class='text-warning'>belum dibayar</i>";
            $status = ($res->status == 2) ? "<span class='text-danger'>dibatalkan</span>" : $status;
            $jumlah = $this->func->formUang($res->total);
            $idbayar = $this->func->arrEnc(array("trxid"=>$res->trxid),"encode");
        ?>
        <div class="table-item">
          <div class="row">
            <div class="col-md-3">
              <p><?php echo $this->func->ubahTgl("d M Y H:i",$res->tgl); ?></p>
            </div>
            <div class="col-md-3">
                <?php if($res->ipaymu_tipe == ""){ ?>
                  <p>TopUp Saldo <?=$namatoko?></p>
                <?php }else{ ?>
                  <p>Channel <?=strtoupper(strtolower($res->ipaymu_channel)).": <span class='text-success font-bold'>".$res->ipaymu_kode."</span>";?></p>
                <?php } ?>
            </div>
            <div class="col-md-2">
              <?php echo $status; ?>
            </div>
            <div class="col-md-2 font-bold text-dark">
              Rp &nbsp;<p><?php echo $jumlah; ?></p>
            </div>
            <div class="col-md-2 text-right">
              <?php if($res->status == 0){ ?>
                  <a href="<?=site_url("home/topupsaldo?inv=".$idbayar)?>" class="btn btn-sm btn-success" ><i class="fas fa-check-circle"></i> Bayar</a>&nbsp;
                  <a href="javascript:void(0)" onclick="batalTopup(<?=$res->id?>)" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
  </div>
<?php
    echo $this->func->createPagination($rows,$page,$perpage,"getopupSaldo");
  }else{
    echo "
      <div class='w-full text-center section p-tb-30 m-t-10'>
        <i class='fas fa-exchange-alt fs-40 m-b-10 text-danger'></i><br/>
        <h5>BELUM ADA TRANSAKSI</h5>
      </div>
    ";
  }
?>
