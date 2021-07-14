<div id="content_wrapper">
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Haifa Nida OlShop</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100">
				<!-- left sidebar start -->
				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="travelite_left_sidebar">
						<div class="sidebar_search_bar">
							<form action="<?= base_url('Produk/index/') ?>" method="post">
								<input type="search" name="keyword" placeholder="Cari" id="sidebar_search">
							</form>
						</div>
						<aside class="widget widget_filter">
							<h4 class="widget-title">filter berdasarkan harga</h4>
							<div class="price_filter_slider">
								<div id="slider"></div>
								<p class="range_text">
									<label for="amount">Kisaran harga:</label>
									<input type="text" id="amount" readonly style="width: 200px;">
								</p>
							</div>
						</aside>
						<aside class="widget category_widget">
							<h4 class="widget-title">kategori</h4>
							<div class="travel_checkbox_round list_kategori">
								<?php foreach ($kategori as $item): ?>
									<input type="checkbox" name="kategori" id="choose_kategori_<?= $item['id'] ?>" value=".kat_<?= $item['id'] ?>">
									<label for="choose_kategori_<?= $item['id'] ?>"><?= $item['kategori'] ?></label>
								<?php endforeach ?>
							</div>
						</aside>
						<script type="text/javascript">
							function getClick(str) {
								var c = document.querySelector("input[type=checkbox]");

								if (c.checked == true) {
									console.log(str);
								} else{
									console.log("");
								}
							}
						</script>
						<aside class="widget hotel_widgets">
							<h4 class="widget-title">Paket Wisata Unggulan</h4>
							<ul>
								<?php foreach ($paket_unggulan as $item): ?>
									<li> <img src="<?= base_url2('assets/img/paket-wisata/'. $item['gambar']) ?>" alt="hotel thumb">
										<div>
											<h4><a href="<?= base_url('Transaksi/checkoutPaket/'.$item['id']) ?>"><?= $item['nama_paket'] ?></a></h4>
											<p>Rp. <?= number_format($item['harga_paket'],2,',','.') ?> / <?= $item['lama_wisata'] ?> Hari</p>
											<?php $bintang = 1;
											while ($bintang <= 5) { ?>
												<?php 
												if ($bintang <= $item['bintang']){
													$color = '#FDB714';
												} else{
													$color = '#C0CCD3';
												}
												$bintang++;
												?>
												<i class="fa fa-star" style="color: <?= $color ?>;"></i>
											<?php } ?>
										</div>
									</li>
								<?php endforeach ?>
							</ul>
						</aside>
					</div>
				</div>
				<!-- left sidebar end -->
				
				<!-- right main start -->
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="tour_packages_right_section left_space_40">
						<div class="tour_packages_description">
							<div class="tour_heading">
								<h4>Toko Haifa Nida</h4>
								<span class="packs">(<?= $total_rows ?> Produk ditemukan)</span>
							</div>
							<?php if ($this->cart->total_items()>0): ?>
								<h3 class="h3 mt-5">Detail Keranjang</h3>
								<table class="table table-bordered" style="background-color: white;">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Nama Produk</th>
											<th scope="col">Harga</th>
											<th scope="col">Sub Total</th>
											<th scope="col" style="max-width: 150px; min-width: 90px;">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=0; ?>
										<?php foreach ($this->cart->contents() as $item): ?>
											<tr>
												<th scope="row"><?= ++$no ?></th>
												<td><?= $item['name'] ?></td>
												<td align="left"><?= 'Rp.'.number_format($item['price'],2,',','.') ?></td>
												<td align="left"><?= 'Rp.'.number_format($item['subtotal'],2,',','.') ?></td>
												<td>
													<a href="<?= base_url('Transaksi/kurangKeranjang/').$item['rowid'].'/'.$item['qty'] ?>" class="badge badge-danger"><i class="fa fa-minus"></i></a>
													<?= $item['qty'] ?>
													<a href="<?= base_url('Transaksi/tambahKeranjang/').$item['id'].'/'.$item['rowid'] ?>" class="badge badge-primary"><i class="fa fa-plus"></i></a>
												</td>
											</tr>
											
										<?php endforeach ?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3" align="right"><b>Total : </b></td>
											<td align="left" colspan="2"><b><?= 'Rp.'.number_format($this->cart->total(),2,',','.') ?></b></td>
										</tr>
									</tfoot>
								</table>
								<button type="button" class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#checkoutModal">
									CheckOut
								</button>
								<a href="<?= base_url('Transaksi/bersihkanKeranjang') ?>" class="btn btn-secondary float-right ml-3">
									Batal
								</a>
							<?php endif ?>
						</div>
						<div class="full_width sorting_panel">
							<div class="sorting_destination">
								<select class="form-control selectpicker" id="search_rooms">
									<option value="jumlah_terpesan">Urutkan Berdasarkan : Popularitas</option>
									<?php 
									$p = 1;
									while ($p <= $count_page) { ?>
										<option value="jumlah_terpesan,<?= $p*$per_page ?>"><?= $p ?></option>
									<?php
									$p++;
									 } ?>
								</select>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div class="sorting_destination">
								<select class="form-control selectpicker" id="search_prices">
									<option value="harga_jual">Urutkan Berdasarkan : Harga</option>
									<?php 
									$h = 1;
									while ($h <= $count_page) { ?>
										<option value="harga_jual,<?= $p*$per_page ?>"><?= $p ?></option>
									<?php
									$h++;
									 } ?>
								</select>
								<i class="fa fa-chevron-down"></i>
							</div>
							<a href="<?= base_url('Transaksi/keranjang') ?>" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>Lihat Keranjang</a>
							<span class="packs">(Total Keranjang: <?= $this->cart->total_items() ?>)</span>
							<!-- sorting list --><!-- 
							<div class="pull-right sort_list_grid">
								<a href="<?= base_url('Produk/index/grid') ?>"><i class="fa fa-th-large <?php if($list == 'grid'): echo('active_sort'); endif; ?>"></i></a>
								<a href="<?= base_url('Produk/index/list') ?>"><i class="fa fa-th-list <?php if($list == 'list'): echo('active_sort'); endif; ?>"></i></a>
							</div> -->
							<!-- sorting list end-->
						</div>
						<!--  sorting panel End -->
						<!-- sorting places section -->
						<div class="full_width sorting_places_section gridd">
							<?php foreach ($produk as $p): ?>
								<!--  place sort start -->
								<div class="col-lg-6 col-md-6 col-sm-6 grid-item kat_<?=$p['id_kategori']?>">
									<div class="sorting_places_wrap grid_sorting">
										<div class="thumb_wrape">
											<img src="<?= base_url2('assets/img/produk/'.$p['gambar']) ?>" alt="Grid pic">
										</div>
										<div class="bottom_desc">
											<div class="bottom_title">
												<div class="pull-left">
													<h5><a href="<?= base_url('Transaksi/tambahKeranjang/'.$p['pid']) ?>"><?= $p['nama_produk'] ?></a></h5>
													<div class="sub_city"><?= $p['kategori'] ?></div>
												</div>
												<div class="right_span">
													<span class="doller">Rp. <?= number_format($p['harga_jual'],2,',','.') ?></span><br><span>/pcs</span>
												</div>
											</div>
											<a href="<?= base_url('Transaksi/tambahKeranjang/'.$p['pid']) ?>" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart"></i> Tambah Keranjang</a>
											<div class="distance_text">
												<span><?= $p['terjual'] ?></span> Terjual
											</div>
											<div class="review_right">
												Tersisa <span><?= $p['stok'] ?></span>
											</div>
											<!-- desc icons Start-->
											<!-- desc icons End-->
											<div class="bottom_review_rating">
												<div class="rating_bottom">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<span class="review_right"><i class="fa fa-thumbs-up"></i> 52 Ulasan</span>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						<!-- sorting places section -->
						<!-- pagination section -->
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
				<!-- right main start -->
			</div>
		</div>
	</div>
	<!--content body end--> 
</div>
<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="checkoutModalLabel"><i class="fas fa-shopping-cart"></i> CheckOut</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Transaksi/checkout') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_penerima">Nama Penerima</label>
						<input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
					</div>
					<div class="form-group">
						<label for="no_hp_penerima">Nomor Hp. Penerima</label>
						<input type="number" class="form-control" id="no_hp_penerima" name="no_hp_penerima" placeholder="Nomor Hp. Penerima">
					</div>
					<div class="form-group">
						<label for="id_kurir">Kurir</label>
						<select class="form-control" id="id_kurir" name="id_kurir">
							<option selected disabled>Pilih Kurir</option>
							<?php foreach ($kurir as $row): ?>
								<option value="<?= $row['id'] ?>"><?= $row['kurir'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="alamat_penerima">Alamat Penerima</label>
						<textarea class="form-control" id="alamat_penerima" name="alamat_penerima" rows="3" placeholder="Alamat Penerima"></textarea>
					</div>
					<input type="hidden" name="id_metode_bayar" id="id_metode_bayar" value="1">
					<div class="form-group">
						<label for="total_harga">Total Harga</label>
						<input type="number" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" value="<?= $this->cart->total() ?>" readonly>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">CheckOut</button>
				</div>
			</form>
		</div>
	</div>
</div>