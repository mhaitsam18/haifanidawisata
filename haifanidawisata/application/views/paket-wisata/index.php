<div id="content_wrapper">
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Tujuan Wisata</a></li>
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
							<form action="<?= base_url('PaketWisata/index/'.$list.'/') ?>" method="post">
								<input type="search" name="keyword" placeholder="Search" id="sidebar_search">
							</form>
						</div>
						<aside class="widget destination_widget">
							<h4 class="widget-title">pilih tujuan</h4>
							<div class="travel_checkbox_round list_destination">
								<?php foreach ($destinasi as $item): ?>
									<input type="checkbox" name="destinasi" id="choose_destination_<?= $item['id'] ?>" value=".dest_<?= $item['id'] ?>">
									<label for="choose_destination_<?= $item['id'] ?>"><?= $item['destinasi'] ?></label>
								<?php endforeach ?>
								<!-- <input type="checkbox" id="africa">
								<label for="africa">africa</label>
								<input type="checkbox" id="australia">
								<label for="australia">australia</label>
								<input type="checkbox" id="america">
								<label for="america">america</label>
								<input type="checkbox" id="nepal">
								<label for="nepal">nepal</label>
								<input type="checkbox" id="europe">
								<label for="europe">europe</label>
								<input type="checkbox" id="japan">
								<label for="japan">japan</label>
								<input type="checkbox" id="india">
								<label for="india">india</label>
								<input type="checkbox" id="egypt">
								<label for="egypt">egypt</label>
								<input type="checkbox" id="malaysia">
								<label for="malaysia">malaysia</label> -->
							</div>
						</aside>
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
							<h4 class="widget-title">Kategori</h4>
							<div class="travel_checkbox_round list_kategori_wisata">
								<?php foreach ($kategori_wisata as $item): ?><input type="checkbox" name="kategori_wisata" id="choose_kategori_wisata_<?= $item['id'] ?>" value=".kat_<?= $item['id'] ?>">
									<label for="choose_kategori_wisata_<?= $item['id'] ?>"><?= $item['kategori_wisata'] ?></label>
								<?php endforeach ?>
								<!-- <input type="checkbox" id="default">
								<label for="default">default</label>
								<input type="checkbox" id="island_tour">
								<label for="island_tour">island tour</label>
								<input type="checkbox" id="summer_holidays">
								<label for="summer_holidays">summer holidays</label>
								<input type="checkbox" id="boat_house">
								<label for="boat_house">boat house</label>
								<input type="checkbox" id="honeyMoon">
								<label for="honeyMoon">honeyMoon</label>
								<input type="checkbox" id="beachholidays">
								<label for="beachholidays">beach holidays</label> -->
							</div>
						</aside>
						<script type="text/javascript">
							function getClick(str) {
								var c = document.querySelector("input[type=checkbox]");

								// if (c.checked == true) {
								// 	console.log(str);
								// } else{
								// 	console.log("");
								// }
							}
						</script>
						<aside class="widget hotel_widgets">
							<h4 class="widget-title">Paket Wisata Unggulan</h4>
							<!-- <h4 class="widget-title">Australia Hotels</h4> -->
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
								<!-- <li> <img src="<?= base_url('assets/') ?>images/tour-grid/thumb_2.jpg" alt="hotel thumb">
									<div>
										<h4><a href="#">Diamond Hotel</a></h4>
										<p>$199 / Night</p>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</li>
								<li>
									<img src="<?= base_url('assets/') ?>images/tour-grid/thumb_2.jpg" alt="hotel thumb">
									<div>
										<h4><a href="#">sliver Hotel</a></h4>
										<p>$199 / Night</p>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</li>
								<li>
									<img src="<?= base_url('assets/') ?>images/tour-grid/thumb_3.jpg" alt="hotel thumb">
									<div>
										<h4><a href="#">platinum Hotel</a></h4>
										<p>$199 / Night</p>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</li> -->
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
								<h4>Paket Wisata</h4>
								<span class="packs">(<?= $total_rows ?> Packs Found)</span>
							</div>
							<p class="more_text">There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsu available, but the joy have suffered alteration in some format,by injected humour users Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
						</div>
						<div class="full_width sorting_panel">
							<div class="sorting_destination">
								<select class="form-control selectpicker" id="search_rooms">
									<option value="jumlah_terpesan">Urutkan berdasarkan : Pupularitas</option>
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
								<select class="form-control selectpicker" id="search_places">
									<option value="tanggal_keberangkatan">Urutkan berdasarkan: Tanggal Berangkatan</option>
									<?php 
									$d = 1;
									while ($d <= $count_page) { ?>
										<option value="tanggal_keberangkatan,<?= $p*$per_page ?>"><?= $p ?></option>
									<?php
									$d++;
									 } ?>
								</select>
								<i class="fa fa-chevron-down"></i>
							</div>
							<div class="sorting_destination">
								<select class="form-control selectpicker" id="search_prices">
									<option value="harga_paket">Urutkan berdasarkan : Harga</option>
									<?php 
									$h = 1;
									while ($h <= $count_page) { ?>
										<option value="harga_paket,<?= $p*$per_page ?>"><?= $p ?></option>
									<?php
									$h++;
									 } ?>
								</select>
								<i class="fa fa-chevron-down"></i>
							</div>
							<!-- sorting list -->
							<div class="pull-right sort_list_grid">
								<a href="<?= base_url('PaketWisata/index/grid') ?>"><i class="fa fa-th-large <?php if($list == 'grid'): echo('active_sort'); endif; ?>"></i></a>
								<a href="<?= base_url('PaketWisata/index/list') ?>"><i class="fa fa-th-list <?php if($list == 'list'): echo('active_sort'); endif; ?>"></i></a>
							</div>
							<!-- sorting list end-->
						</div>
						<!--  sorting panel End -->
						<!-- sorting places section -->
						<div class="full_width sorting_places_section gridd">
							<?php if ($list != 'grid'): ?>
								<?php foreach ($paket_wisata as $pw): ?>
									<!--sort_list start -->
									<div class="sorting_places_wrap list_sorting_view grid-item dest_<?=$pw['id_destinasi']?> kat_<?=$pw['id_kategori_wisata']?>">
										<div class="col-lg-5 col-md-5 col-sm-5 padding_none">
											<div class="thumb_wrape">
												<img src="<?= base_url2('assets/img/paket-wisata/'.$pw['gambar']) ?>" class="img-responsive" alt="list thumb">
											</div>
										</div>
										<div class="col-lg-7 col-md-7 col-sm-7">
											<div class="top_head_bar">
												<h4><a href="<?= base_url('Transaksi/checkoutPaket/'.$pw['pid']) ?>"><?= $pw['nama_paket'] ?></a></h4>
												<span class="time_date"><i class="fa fa-clock-o"></i><?= $pw['lama_wisata'] ?> Hari</span>
											</div>
											<div class="bottom_desc">
												<h5>Harga <span>Rp. <?= number_format($pw['harga_paket'],2,',','.') ?> /</span>orang</h5>
												<!-- desc icons Start-->
												<ul class="sort_place_icons">
													<?php $fasilitas = $this->db->get_where('fasilitas', ['id_paket_wisata' => $pw['pid']])->result_array(); ?>
													<?php foreach ($fasilitas as $f): ?>
														<li><i class="<?= $f['icon'] ?>"></i><?= $f['fasilitas'] ?></li>
													<?php endforeach ?>
												</ul>
												<!-- desc icons End-->
												<div>
													<!-- <a href="#" class="list_view_details btns">view Details</a> -->
													<a href="<?= base_url('Transaksi/checkoutPaket/').$pw['pid'] ?>" class="list_view_details btns">Checkout</a>
												</div>
											</div>
										</div>
									</div>
									<!--sort_list start end-->
								<?php endforeach ?>
							<?php else: ?>
								<?php foreach ($paket_wisata as $pw): ?>
									<!--  place sort start -->
									<div class="col-lg-6 col-md-6 col-sm-6 grid-item dest_<?=$pw['id_destinasi']?> kat_<?=$pw['id_kategori_wisata']?>">
										<div class="sorting_places_wrap grid_sorting">
											<div class="top_head_bar">
												<h4><a href="<?= base_url('Transaksi/checkoutPaket/'.$pw['pid']) ?>"><?= $pw['nama_paket'] ?></a></h4>
												<span class="time_date"><i class="fa fa-clock-o"></i><?= $pw['lama_wisata'] ?> Hari</span>
											</div>
											<div class="thumb_wrape">
												<img src="<?= base_url2('assets/img/paket-wisata/'.$pw['gambar']) ?>" alt="Grid pic">
											</div>
											<div class="bottom_desc">
												<h5>Harga <span>Rp. <?= number_format($pw['harga_paket'],2,',','.') ?> /</span>Orang</h5>
												<!-- desc icons Start-->
												<ul class="sort_place_icons">
													<?php $fasilitas = $this->db->get_where('fasilitas', ['id_paket_wisata' => $pw['pid']])->result_array(); ?>
													<?php foreach ($fasilitas as $f): ?>
														<li><i class="<?= $f['icon'] ?>"></i> <?= $f['fasilitas'] ?> </li>
													<?php endforeach ?>
												</ul>
												<!-- desc icons End-->
											</div>
										</div>
									</div>
									<!--  place sort End -->
								<?php endforeach ?>
							<?php endif ?>
							<!-- <div class="sorting_places_wrap  list_sorting_view">
								<div class="col-lg-5 col-md-5 col-sm-5 padding_none">
									<div class="thumb_wrape">
										<img src="<?= base_url('assets/') ?>images/tour-list/list-thumb1.jpg" class="img-responsive" alt="list thumb">
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<div class="top_head_bar">
										<h4><a href="#">Discover Australia</a></h4>
										<span class="time_date"><i class="fa fa-clock-o"></i>4days</span>
									</div>
									<div class="bottom_desc">
										<h5>Starting from<span>$1000 /</span>per person</h5>
										<ul class="sort_place_icons">
											<li><i class="fa fa-car"></i> transports</li>
											<li><i class="fa fa-plane"></i> flights</li>
											<li><i class="fa fa-binoculars"></i> sight seeing</li>
											<li><i class="fa fa-cutlery"></i> food</li>
											<li><i class="fa fa-building-o"></i> hotels</li>
										</ul>
										<div>
											<a href="#" class="list_view_details btns">view Details</a>
										</div>
									</div>
								</div>
							</div>
							<div class="sorting_places_wrap  list_sorting_view">
								<div class="col-lg-5 col-md-5 col-sm-5 padding_none">
									<div class="thumb_wrape">
										<img src="<?= base_url('assets/') ?>images/tour-list/list-thumb2.jpg" class="img-responsive" alt="list thumb">
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<div class="top_head_bar">
										<h4><a href="#">Victoria Scenic Tour</a></h4>
										<span class="time_date"><i class="fa fa-clock-o"></i>4days</span>
									</div>
									<div class="bottom_desc">
										<h5>Starting from<span>$1500 /</span>per person</h5>
										<ul class="sort_place_icons">
											<li><i class="fa fa-car"></i> transports</li>
											<li><i class="fa fa-plane"></i> flights</li>
											<li><i class="fa fa-binoculars"></i> sight seeing</li>
											<li><i class="fa fa-cutlery"></i> food</li>
											<li><i class="fa fa-building-o"></i> hotels</li>
										</ul>
										<div>
											<a href="#" class="list_view_details btns">view Details</a>
										</div>
									</div>
								</div>
							</div>
							<div class="sorting_places_wrap  list_sorting_view">
								<div class="col-lg-5 col-md-5 col-sm-5 padding_none">
									<div class="thumb_wrape">
										<img src="<?= base_url('assets/') ?>images/tour-list/list-thumb3.jpg" class="img-responsive" alt="list thumb">
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<div class="top_head_bar">
										<h4><a href="#">Glimpses Of Australia</a></h4>
										<span class="time_date"><i class="fa fa-clock-o"></i>4days</span>
									</div>
									<div class="bottom_desc">
										<h5>Starting from<span>$1000 /</span>per person</h5>
										<ul class="sort_place_icons">
											<li><i class="fa fa-car"></i> transports</li>
											<li><i class="fa fa-plane"></i> flights</li>
											<li><i class="fa fa-binoculars"></i> sight seeing</li>
											<li><i class="fa fa-cutlery"></i> food</li>
											<li><i class="fa fa-building-o"></i> hotels</li>
										</ul>
										<div>
											<a href="#" class="list_view_details btns">view Details</a>
										</div>
									</div>
								</div>
							</div>
							<div class="sorting_places_wrap  list_sorting_view">
								<div class="col-lg-5 col-md-5 col-sm-5 padding_none">
									<div class="thumb_wrape">
										<img src="<?= base_url('assets/') ?>images/tour-list/list-thumb4.jpg" class="img-responsive" alt="list thumb">
									</div>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7">
									<div class="top_head_bar">
										<h4><a href="#">Melbourne Now</a></h4>
										<span class="time_date"><i class="fa fa-clock-o"></i>4days</span>
									</div>
									<div class="bottom_desc">
										<h5>Starting from<span>$1200 /</span>per person</h5>
										<ul class="sort_place_icons">
											<li><i class="fa fa-car"></i> transports</li>
											<li><i class="fa fa-plane"></i> flights</li>
											<li><i class="fa fa-binoculars"></i> sight seeing</li>
											<li><i class="fa fa-cutlery"></i> food</li>
											<li><i class="fa fa-building-o"></i> hotels</li>
										</ul>
										<div>
											<a href="#" class="list_view_details btns">view Details</a>
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<!-- sorting places section -->
						<!-- pagination section -->
						<?php echo $this->pagination->create_links(); ?>
						<!-- <div class="full_width pagination_bottom">
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							</ul>
						</div> -->
						<!-- pagination section -->
					</div>
				</div>
				<!-- right main start -->
			</div>
		</div>
	</div>
	<!--content body end--> 
</div>