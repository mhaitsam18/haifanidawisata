<!--content body start-->
<div id="content_wrapper">
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="<?= base_url('Informasi/blog') ?>">Blog</a></li>
			<li><a href="<?= base_url('Informasi/berita') ?>">Berita</a></li>
			<li>Pengumuman</li>
			<li><a href="<?= base_url('Informasi/peraturan') ?>">Peraturan</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<div class="col-md-3">
				<div class="travel_sidebar_wrapper">
					<aside class="widget widget_search">
						<form action="<?= base_url('Informasi/pengumuman/') ?>" method="post">
							<input type="search" name="keyword" placeholder="Search" id="sidebar_search">
						</form>
					</aside>
					<aside class="widget widget_accordion">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#All_Categories" aria-expanded="true"> Semua Kategori </a> </h4>
									</div>
									<div id="All_Categories" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<aside class="widget widget_categories">
												<!-- Squared THREE -->
												<ul>
													<li>
														<input type="checkbox" value="None" id="All" name="check" />
														<label for="All">Semua (300)</label>
													</li>
													<li>
														<input type="checkbox" value="None" id="Family" name="check" />
														<label for="Family">Keluarga (300)</label>
													</li>
													<li>
														<input type="checkbox" value="None" id="Wild-Life" name="check" checked />
														<label for="Wild-Life">Kehidupan Liar (250)</label>
													</li>
													<li>
														<input type="checkbox" value="None" id="Honey-Moon" name="check" checked />
														<label for="Honey-Moon">Bulan Madu (150)</label>
													</li>
													<li>
														<input type="checkbox" value="None" id="Beach" name="check" />
														<label for="Beach">Pantai (350)</label>
													</li>
													<li>
														<input type="checkbox" value="None" id="Adventure" name="check" />
														<label for="Adventure">Petualangan (650)</label>
													</li>
												</ul>
											</aside>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Twitter_Feeds" aria-expanded="false"> Umpan Twitter </a> </h4>
									</div>
									<div id="Twitter_Feeds" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<aside class="widget widget_twitter_feed">
												<ul>
													<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> - 10 menit yang lalu</span> </li>
													<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> - 10 menit yang lalu</span> </li>
													<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> - 10 menit yang lalu</span> </li>
													<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> - 10 menit yang lalu</span> </li>
												</ul>
											</aside>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingThree">
										<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Recent_pengumuman" aria-expanded="false"> Pengumuman Baru</a> </h4>
									</div>
									<div id="Recent_pengumuman" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<aside class="widget widget_recent_entries">
												<ul>
													<li>
														<img src="<?= base_url('assets/') ?>images/pengumuman/recent_pengumuman_footer1.jpg" alt="Recent pengumuman" />
														<div>
															<p>Nunc cursus libero purus ac congue arcu cursus..</p>
															<a href="#">Baca Selengkapnya</a>
														</div>
													</li>
													<li> <img src="<?= base_url('assets/') ?>images/pengumuman/recent_pengumuman_footer2.jpg" alt="Recent pengumuman" />
														<div>
															<p>Nunc cursus libero purus ac congue arcu cursus..</p>
															<a href="#">Baca Selengkapnya</a>
														</div>
													</li>
													<li>
														<img src="<?= base_url('assets/') ?>images/pengumuman/recent_pengumuman_footer1.jpg" alt="Recent pengumuman" />
														<div>
															<p>Nunc cursus libero purus ac congue arcu cursus..</p>
															<a href="#">Baca Selengkapnya</a>
														</div>
													</li>
												</ul>
											</aside>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFour">
										<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Archives" aria-expanded="false"> Arsip </a> </h4>
									</div>
									<div id="Archives" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
										<div class="panel-body">
											<aside class="widget widget_archive">
												<ul>
													<li><a href="javascript:;">Januari 2015</a></li>
													<li><a href="javascript:;">Februari 2015</a></li>
													<li><a href="javascript:;">Maret 2015</a></li>
													<li><a href="javascript:;">April 2015</a></li>
													<li><a href="javascript:;">Mei 2015</a></li>
												</ul>
											</aside>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFive">
										<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#About_us" aria-expanded="false"> Tentang Kami </a> </h4>
									</div>
									<div id="About_us" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
										<div class="panel-body">
											<aside class="widget widget_text">
												<p>pengumuman!<br>
													Modo rutrum a nec nibh. Vestibulum elementum suscipit orci sed consectetur. Morbi sapien nibh, vestibulum cursus molestie vitae.</p>
											</aside>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingSix">
										<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Flicker" aria-expanded="false"> Berkedip </a> </h4>
									</div>
									<div id="Flicker" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
										<div class="panel-body">
											<aside class="widget widget_flickr">
												<ul>
													<li><a href="#"><img src="<?= base_url('assets/') ?>images/widget/flickr1.jpg" alt="" /></a></li>
													<li><a href="#"><img src="<?= base_url('assets/') ?>images/widget/flickr2.jpg" alt="" /></a></li>
													<li><a href="#"><img src="<?= base_url('assets/') ?>images/widget/flickr3.jpg" alt="" /></a></li>
													<li><a href="#"><img src="<?= base_url('assets/') ?>images/widget/flickr4.jpg" alt="" /></a></li>
												</ul>
											</aside>
										</div>
									</div>
								</div>
							</div>
					</aside>
				</div>
			</div>
			<div class="col-md-9">
				<div class="post_wrapper">
					<?php if ($num_pengumuman) : ?>
						<div class="travel_loader"> <img src="<?= base_url('assets/') ?>images/icon/travel_loader.gif" alt="Loading..." /> </div>
						<?php foreach ($pengumuman as $item) : ?>
							<div class="travel_post">
								<h3><?= $item['judul'] ?></h3>
								<div class="travel_meta">
									<ul>
										<li><?= date('j F Y', strtotime($item['terakhir_diubah'])) ?></li>
										<li><a href="#"><i class="fa fa-heart"></i> Suka</a></li>
										<li><a href="#"><i class="fa fa-comments"></i> Komentar</a></li>
										<li><i class="fa fa-tags"></i> <a href="#">Tur</a>, <a href="#">Tempat</a>, <a href="#">Perjalanan</a>, <a href="#">Negara</a></li>
									</ul>
								</div>
								<img src="<?= base_url2('assets/img/pengumuman/') . $item['thumbnail'] ?>" alt="pengumuman" />
								<?php
								$jml_karakter = strlen($item['isi']);
								if ($jml_karakter > 280) {
									$isi = strrev($item['isi']);
									$x = $jml_karakter - 280;
									$isi = substr($isi, $x);
									$isi = strrev($isi) . '</p>';
								} else {
									$isi = $item['isi'];
								}
								?>
								<?= $isi ?>
								<a href="<?= base_url('Informasi/detail/pengumuman/' . $item['id']) ?>" class="btn-travel btn-green">Baca Selengkapnya</a>
							</div>
						<?php endforeach ?>
						<?php echo $this->pagination->create_links(); ?>
					<?php else : ?>
						<div class="main_center_error_wrap">
							<div class="travelite_error_heading">
								<h3>Konten Tidak tersedia</h3>
							</div>
							<div class="error_next_prev_links">
								<a href="<?= base_url() ?>" class="home_page">home</a>
								<a href="javascript:history.back()" class="prev_page">Halaman Sebelumnya</a>
							</div>
							<div class="serach_here">atau<h5> cari disini</h5>
							</div>
							<form>
								<div class="bottom_searching_part">
									<input type="text" class="search_page" name="search">
									<button class="btn_search" type="submit"> <i class="fa fa-search"></i> </button>
								</div>
							</form>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>