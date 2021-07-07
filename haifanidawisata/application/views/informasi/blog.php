<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Blog</li>
			<li><a href="<?= base_url('Informasi/berita') ?>">Berita</a></li>
			<li><a href="<?= base_url('Informasi/pengumuman') ?>">Pengumuman</a></li>
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
					<form action="<?= base_url('Informasi/blog/') ?>" method="post">
						<input type="search" name="keyword" placeholder="Search" id="sidebar_search">
					</form>
					</aside>
					<aside class="widget widget_accordion">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#All_Categories" aria-expanded="true"> All Categories </a> </h4>
								</div>
								<div id="All_Categories" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<aside class="widget widget_categories">
											<!-- Squared THREE -->
											<ul>
												<li>
													<input type="checkbox" value="None" id="All" name="check" />
													<label for="All">All (300)</label>
												</li>
												<li>
													<input type="checkbox" value="None" id="Family" name="check" />
													<label for="Family">Family (300)</label>
												</li>
												<li>
													<input type="checkbox" value="None" id="Wild-Life" name="check" checked />
													<label for="Wild-Life">Wild Life (250)</label>
												</li>
												<li>
													<input type="checkbox" value="None" id="Honey-Moon" name="check" checked />
													<label for="Honey-Moon">Honey Moon (150)</label>
												</li>
												<li>
													<input type="checkbox" value="None" id="Beach" name="check" />
													<label for="Beach">Beach (350)</label>
												</li>
												<li>
													<input type="checkbox" value="None" id="Adventure" name="check" />
													<label for="Adventure">Adventure (650)</label>
												</li>
											</ul>
										</aside>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Twitter_Feeds" aria-expanded="false"> Twitter Feeds </a> </h4>
								</div>
								<div id="Twitter_Feeds" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										<aside class="widget widget_twitter_feed">
											<ul>
												<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> -  10 minutes ago</span> </li>
												<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> -  10 minutes ago</span> </li>
												<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> -  10 minutes ago</span> </li>
												<li> <a href="#"><i>@andrew</i></a> <span> Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</span> <span class="time"> -  10 minutes ago</span> </li>
											</ul>
										</aside>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Recent_Blog" aria-expanded="false"> Recent Blog </a> </h4>
								</div>
								<div id="Recent_Blog" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<aside class="widget widget_recent_entries">
											<ul>
												<li>
													<img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer1.jpg" alt="Recent blog" />
													<div>
														<p>Nunc cursus libero purus ac congue arcu cursus..</p>
														<a href="#">Read More</a>
													</div>
												</li>
												<li> <img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer2.jpg" alt="Recent blog" />
													<div>
														<p>Nunc cursus libero purus ac congue arcu cursus..</p>
														<a href="#">Read More</a>
													</div>
												</li>
												<li>
													<img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer1.jpg" alt="Recent blog" />
													<div>
														<p>Nunc cursus libero purus ac congue arcu cursus..</p>
														<a href="#">Read More</a>
													</div>
												</li>
											</ul>
										</aside>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Archives" aria-expanded="false"> Archives </a> </h4>
								</div>
								<div id="Archives" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									<div class="panel-body">
										<aside class="widget widget_archive">
											<ul>
												<li><a href="javascript:;">January 2015</a></li>
												<li><a href="javascript:;">February 2015</a></li>
												<li><a href="javascript:;">March 2015</a></li>
												<li><a href="javascript:;">April 2015</a></li>
												<li><a href="javascript:;">May 2015</a></li>
											</ul>
										</aside>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFive">
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#About_us" aria-expanded="false"> About us </a> </h4>
								</div>
								<div id="About_us" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
									<div class="panel-body">
										<aside class="widget widget_text">
											<p>Welcome to our blog!<br>
											Modo rutrum a nec nibh. Vestibulum elementum suscipit orci sed consectetur. Morbi sapien nibh, vestibulum cursus molestie vitae.</p>
										</aside>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingSix">
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Flicker" aria-expanded="false"> Flicker </a> </h4>
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
				<?php if ($num_blog): ?>
					<div class="post_wrapper">
						<div class="travel_loader"> <img src="<?= base_url('assets/') ?>images/icon/travel_loader.gif" alt="" /> </div>
						<?php foreach ($blog as $item): ?>
							<div class="travel_post">
								<h3><?= $item['judul'] ?></h3>
								<div class="travel_meta">
									<ul>
										<li><?= date('j F Y', strtotime($item['terakhir_diubah'])) ?></li>
										<li><a href="#"><i class="fa fa-heart"></i> Likes</a></li>
										<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
										<li><i class="fa fa-tags"></i> <a href="#">Tour</a>, <a href="#">Place</a>, <a href="#">Trip</a>, <a href="#">Country</a></li>
									</ul>
								</div>
								<img src="<?= base_url2('assets/img/blog/').$item['thumbnail'] ?>" alt="blog" />
								<?php 
								$jml_karakter = strlen($item['isi']);
								if ($jml_karakter>280) {
									$isi = strrev($item['isi']);
									$x = $jml_karakter - 280;
									$isi = substr($isi, $x);
									$isi = strrev($isi).'</p>';
								} else{
									$isi = $item['isi'];
								}
								 ?>
								<?= $isi ?>
								<a href="<?= base_url('Informasi/detail/blog/'.$item['id']) ?>" class="btn-travel btn-green">Read More</a>
							</div>
						<?php endforeach ?>
						<!-- <div class="travel_post">
							<h3>Holiday Tours</h3>
							<div class="travel_meta">
								<ul>
									<li>Feb 15, 2015</li>
									<li><a href="#"><i class="fa fa-heart"></i> Likes</a></li>
									<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><i class="fa fa-tags"></i> <a href="#">Tour</a>, <a href="#">Place</a>, <a href="#">Trip</a>, <a href="#">Country</a></li>
								</ul>
							</div>
							<img src="<?= base_url('assets/') ?>images/blog/post1.jpg" alt="blog" />
							<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p>
							<a href="#" class="btn-travel btn-green">Read More</a>
						</div>
						<div class="travel_post">
							<h3>Last Year Adventure Trip Experiance</h3>
							<div class="travel_meta">
								<ul>
									<li>Feb 15, 2015</li>
									<li><a href="#"><i class="fa fa-heart"></i> Likes</a></li>
									<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><i class="fa fa-tags"></i> <a href="#">Tour</a>, <a href="#">Place</a>, <a href="#">Trip</a>, <a href="#">Country</a></li>
								</ul>
							</div>
							<img src="<?= base_url('assets/') ?>images/blog/post2.jpg" alt="blog" />
							<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p>
							<a href="#" class="btn-travel btn-green">Read More</a>
						</div>
						<div class="travel_post">
							<h3>Boat House at India</h3>
							<div class="travel_meta">
								<ul>
									<li>Feb 15, 2015</li>
									<li><a href="#"><i class="fa fa-heart"></i> Likes</a></li>
									<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><i class="fa fa-tags"></i> <a href="#">Tour</a>, <a href="#">Place</a>, <a href="#">Trip</a>, <a href="#">Country</a></li>
								</ul>
							</div>
							<img src="<?= base_url('assets/') ?>images/blog/post3.jpg" alt="blog" />
							<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p>
							<a href="#" class="btn-travel btn-green">Read More</a>
						</div> -->
						<?php echo $this->pagination->create_links(); ?>
						<!-- <ul class="travel_pagination">
							<li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
						</ul> -->
					</div>
				<?php else: ?>
					<div class="post_wrapper">
						<div class="main_center_error_wrap"> 
							<div class="travelite_error_heading">
								<h3>Konten Tidak tersedia</h3>
							</div>
							<div class="error_next_prev_links">
								<a href="<?= base_url() ?>" class="home_page">home</a>
								<a href="javascript:history.back()" class="prev_page">Previous Page</a>
							</div>
							<div class="serach_here">or<h5>search here</h5></div>
							<form>
								<div class="bottom_searching_part">
									<input type="text" class="search_page" name="search">
									<button class="btn_search" type="submit"> <i class="fa fa-search"></i> </button>
								</div>
							</form>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>