<?php
	$page = (isset($_GET["page"]) AND $_GET["page"] != "") ? $_GET["page"] : 1;
	$orderby = (isset($_GET["orderby"]) AND $_GET["orderby"] != "") ? $_GET["orderby"] : "stok DESC";
	$cari = (isset($_GET["cari"]) AND $_GET["cari"] != "") ? $_GET["cari"] : "";
	$perpage = 12;
?>
	<!-- Content page -->
	<section class="bgwhite p-t-30 p-b-65">
		<div class="container">
		<div class="p-b-50 t-center">
		<!-- <div class="bread-crumb"> -->
			<div class="cat-button ftco-animate">
			<a href="javascript:void(0)" class="btn btn-success bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12">Semua Kategori
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i></a>
			<?php 
							$this->db->where("parent",0);
							$db = $this->db->get("kategori");
							foreach($db->result() as $r){
						?>
							<a href="<?=site_url("kategori/".$r->url)?>" class="btn btn-primary bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12">
								<?=ucwords(strtolower($r->nama))?>
							<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
							</a>
						<?php
							}
						?>
			</a>
		<!-- </div> -->
		</div>
<!-- <div class="p-r-20 p-r-0-sm t-center">
					<div class="cat-button">
						<a href="javascript:void(0)" class="btn btn-success bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12">Semua Kategori</a>
						<?php 
							$this->db->where("parent",0);
							$db = $this->db->get("kategori");
							foreach($db->result() as $r){
						?>
							<a href="<?=site_url("kategori/".$r->url)?>" class="btn btn-info bo-rad-23 p-l-16 p-r-16 m-r-4 m-b-12">
								<?=ucwords(strtolower($r->nama))?>
							</a>
						<?php
							}
						?>
					</div>
				</div> -->
			</div>
			<div class="search-product pos-relative m-b-40 m-l-auto m-r-auto col-md-8 ftco-animate">
					<form action="" class="row" method="GET">
						<input class="col-md-11 col-10" type="text" value="<?=$cari?>" name="cari" placeholder="Cari Produk">
						<button type="submit" class="col-2 col-md-1">
							<i class="fas fa-search text-primary" aria-hidden="true"></i>
						</button>
					</form>
				</div>

			<div class="p-b-50">
					<!-- Product -->
					<div class="row produk-wrap">
						<?php
							$this->db->select("SUM(stok) AS stok,idproduk");
							$this->db->group_by("idproduk");
							$dbvar = $this->db->get("produkvariasi");
							$notin = array();
							foreach($dbvar->result() as $not){
								if($not->stok <= 0){
									$notin[] = $not->idproduk;
								}
							}
			
							$where = "(nama LIKE '%$cari%' OR harga LIKE '%$cari%' OR deskripsi LIKE '%$cari%') AND status = 1 AND preorder != 1 AND stok > 0";
							$this->db->where($where);
							if(count($notin) > 0){
								$this->db->where_not_in($notin);
							}
							$dbs = $this->db->get("produk");
							
							$this->db->where($where);
							if(count($notin) > 0){
								$this->db->where_not_in($notin);
							}
							$this->db->limit($perpage,($page-1)*$perpage);
							$this->db->order_by($orderby);
							$db = $this->db->get("produk");
							$totalproduk = 0;
							
							foreach($db->result() as $r){
								$level = isset($_SESSION["lvl"]) ? $_SESSION["lvl"] : 0;
									$result = $r->harga;
								$ulasan = $this->func->getReviewProduk($r->id);

								$this->db->where("idproduk",$r->id);
								$dbv = $this->db->get("produkvariasi");
								$totalstok = ($dbv->num_rows() > 0) ? 0 : $r->stok;
								$hargs = 0;
								$harga = array();
								foreach($dbv->result() as $rv){
									$totalstok += $rv->stok;
										$harga[] = $rv->harga;
									$hargs += $rv->harga;
								}

								if($totalstok > 0){
									$totalproduk += 1;
						?>
						<div class="col-6 col-md-3 m-b-30 cursor-pointer produk-item ftco-animate" onclick="window.location.href='<?php echo site_url('produk/'.$r->url); ?>'">
							<!-- Block2 -->
							
              <div class="product">
                  <a href="<?php echo site_url('produk/'.$r->url); ?>" class="img-prod">
                      <img src="<?=$this->func->getFoto($r->id,"utama")?>" alt="<?=$r->nama?>" height="200px" width="300px">
                        <!-- <span class="status"><?php echo 'diskon 6'; ?>%</span> -->
                      <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <h3><a href="<?php echo site_url('produk/'.$r->url); ?>">
                      <?=$r->nama?></a></h3>
                      <div class="d-flex">
                          <div class="pricing">
                              <p class="price">
                                  <span class="price-sale"><?php 
                                  echo "Rp. ".$this->func->formUang($result);
                              ?></span>
                                </p>
                          </div>
                      </div>
                      <div class="row block2-ulasan">
									<div class='col-6'>
										<small><?=$ulasan['ulasan']?> Ulasan</small>
									</div>
									<div class='col-6 text-right'>
										<span class="badge badge-warning bdg-1 text-white"><i class='fa fa-star text-white'></i> <?=$ulasan['nilai']?></span>
									</div>
								</div>
                      <div class="bottom-area d-flex px-3">
                          <div class="m-auto d-flex">
                              <a href="<?php echo site_url('produk/'.$r->url); ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                  <span><i class="ion-ios-menu"></i></span>
                              </a>
                              <!-- <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1" 
                               data-name="<?=$r->nama?>" data-price="<?php 
                                  echo "Rp. ".$this->func->formUang($result);
                              ?>" data-id="<?=$r->id?>">
                              <?php if($this->func->cekLogin() == true){ ?>
                                <a href="<?php echo site_url("home/signin"); ?>"><span><i class="ion-ios-cart"></i></span></a>
                              <?php }else{ ?>
                                <a href="<?php echo site_url("home/signin"); ?>"><span><i class="ion-ios-cart"></i></span></a>
					                    <?php } ?>
                              </a> -->
                          </div>
                      </div>             
                  </div>
              </div>
						</div>
						<?php
								}
							}
							
							if($totalproduk == 0){
								echo "<div class='col-12 text-center m-tb-40'><h2><mark>Produk Kosong</mark></h2></div>";
							}
						?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<?php
							if($totalproduk > 0){
								echo $this->func->createPagination($dbs->num_rows(),$page,$perpage);
							}
						?>
					</div>
				</div>
			</div>
	</section>
	
	<script type="text/javascript">
		function refreshTabel(page){
			window.location.href = "<?=site_url("shop?cari=".$cari)?>&page="+page;
		}
	</script>
