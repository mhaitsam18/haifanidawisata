<!--content body start-->
<div id="content_wrapper">
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="<?= base_url('Informasi/blog') ?>">Blog</a></li>
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
						<form action="<?= base_url("Informasi/$konten/") ?>" method="post">
							<input type="search" name="keyword" placeholder="Search <?= $konten ?>" id="sidebar_search">
						</form>
					</aside>
					<aside class="widget widget_accordion">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
									<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Recent_Blog" aria-expanded="false"> Blog Terbaru </a> </h4>
								</div>
								<div id="Recent_Blog" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<aside class="widget widget_recent_entries">
											<ul>
												<li> <img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer1.jpg" alt="Recent blog" />
													<div>
														<p>Nunc cursus libero purus ac congue arcu cursus..</p>
														<a href="#">Baca Selengkapnya</a>
													</div>
												</li>
												<li> <img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer2.jpg" alt="Recent blog" />
													<div>
														<p>Nunc cursus libero purus ac congue arcu cursus..</p>
														<a href="#">Baca Selengkapnya</a>
													</div>
												</li>
												<li> <img src="<?= base_url('assets/') ?>images/blog/recent_blog_footer1.jpg" alt="Recent blog" />
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
											<p>blog!<br>
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
				<div class="blog_single_page_wrapper">
					<div class="travel_post_switcher">
						<?php
						$prev = $this->uri->segment(4) - 1;
						$next = $this->uri->segment(4) + 1;
						?>
						<a href="<?= base_url("Informasi/detail/$konten/$prev") ?>" class="previous_post"><i class="fa fa-caret-left"></i> Post Sebelumnya</a>
						<a href="<?= base_url("Informasi/detail/$konten/$next") ?>" class="next_post">Post Selanjutnya <i class="fa fa-caret-right"></i></a>
					</div>
					<?php if ($num_konten >= 1) : ?>
						<div class="travel_post">
							<img src="<?= base_url('assets/') ?>images/blog/post3.jpg" alt="blog" />
							<h3>Rumah Kapal Di India</h3>
							<div class="travel_meta">
								<ul>
									<li><?= date('l, j F Y', strtotime($row_konten['waktu_post'])) ?></li>
									<li><a href="#"><i class="fa fa-heart"></i> Suka</a></li>
									<li><a href="#"><i class="fa fa-comments"></i> Komentar</a></li>
									<li><i class="fa fa-tags"></i> <a href="#">Tur</a>, <a href="#">Tempat</a>, <a href="#">Perjalanan</a>, <a href="#">Negara</a></li>
								</ul>
							</div>
							<div class="post_detail">
								<?= $row_konten['isi'] ?>
								<small>Terakhir diubah: <?= date('j F Y', strtotime($row_konten['terakhir_diubah'])); ?></small>
							</div>
							<!-- <img src="<?= base_url('assets/') ?>images/blog/post3.jpg" alt="blog" />
							<h3>Boat House At India</h3>
							<div class="travel_meta">
								<ul>
									<li>Feb 15, 2015</li>
									<li><a href="#"><i class="fa fa-heart"></i> Likes</a></li>
									<li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
									<li><i class="fa fa-tags"></i> <a href="#">Tour</a>, <a href="#">Place</a>, <a href="#">Trip</a>, <a href="#">Country</a></li>
								</ul>
							</div>
							<div class="post_detail">
								<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users..</p>
								<blockquote>
									<i class="fa fa-quote-left"></i> There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. <i class="fa fa-quote-right"></i>
								</blockquote>
								<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users.</p>
							</div> -->
							<div class="row">
								<div class="col-md-8">
									<div class="tagcloud">
										<i class="fa fa-tags"></i>
										<span class="tag_heading">Tags :</span>
										<a href="javascript:;"> Tours,</a>
										<a href="javascript:;"> Travels,</a>
										<a href="javascript:;"> Trip,</a>
										<a href="javascript:;"> World,</a>
										<a href="javascript:;"> Travelling,</a>
										<a href="javascript:;"> Hotel,</a>
										<a href="javascript:;"> Rental</a>
									</div>
								</div>
								<div class="col-md-4 text-right">
									<div class="post_share">
										<i class="fa fa-share-alt"></i>
										<span class="post_share_heading">Bagikan :</span>
										<a class="facebook" href="javascript:;"><i class="fa fa-facebook-square"></i></a>
										<a class="twitter" href="javascript:;"><i class="fa fa-twitter-square"></i></a>
										<a class="google-plus" href="javascript:;"><i class="fa fa-google-plus-square"></i></a>
									</div>
								</div>
							</div>
							<!--Author detail start-->
							<div class="author_detail">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<div class="author_image">
											<img src="<?= base_url('assets/') ?>images/author_detail.jpg" alt="" />
										</div>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="detail">
											<h4><?= $row_konten['penulis'] ?></h4>
											<span>Dari Canada</span>
											<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour users.</p>
										</div>
									</div>
								</div>
							</div>
							<!--Author detail end-->
							<!--Comment start-->
							<div id="comments">
								<h3><span>(4)</span>Komentar</h3>
								<ol class="comment-list">
									<li class="comment">
										<div>
											<div class="article">
												<div class="gravatar">
													<img alt="" src="<?= base_url('assets/') ?>images/blog/comment_user1.jpg" class="avatar">
												</div>
												<div class="comment-body">
													<div class="comment-meta">
														<div class="comment-author"><a href="javascript:;">Olivia</a></div>
														<div class="comment-date"><a href="javascript:;">6 jam yang lalu</a></div>
														<a class="comment-reply-link" href="javascript:;">Balas</a>
													</div>
													<!--/ .comment-meta-->
													<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. There are many variations of passages.</p>
												</div>
												<!--/ .comment-body-->
											</div>
										</div>
									</li>
									<li class="comment">
										<div>
											<div class="article">
												<div class="gravatar">
													<img alt="" src="<?= base_url('assets/') ?>images/blog/comment_user2.jpg" class="avatar">
												</div>
												<div class="comment-body">
													<div class="comment-meta">
														<div class="comment-author"><a href="javascript:;">Steve Joseph</a></div>
														<div class="comment-date"><a href="javascript:;">6 jam yang lalu</a></div>
														<a class="comment-reply-link" href="javascript:;">Jawab</a>
													</div>
													<!--/ .comment-meta-->
													<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. There are many variations of passages.</p>
												</div>
												<!--/ .comment-body-->
											</div>
										</div>
										<ul class="children">
											<li class="comment">
												<div>
													<div class="article">
														<div class="gravatar">
															<img alt="" src="<?= base_url('assets/') ?>images/blog/comment_user1.jpg" class="avatar">
														</div>
														<div class="comment-body">
															<div class="comment-meta">
																<div class="comment-author"><a href="javascript:;">Olivia</a></div>
																<div class="comment-date"><a href="javascript:;">6 jam yang lalu</a></div>
																<a class="comment-reply-link" href="javascript:;">Jawab</a>
															</div>
															<!--/ .comment-meta-->
															<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.</p>
														</div>
														<!--/ .comment-body-->
													</div>
												</div>
											</li>
										</ul>
									</li>
									<li class="comment">
										<div>
											<div class="article">
												<div class="gravatar">
													<img alt="" src="<?= base_url('assets/') ?>images/blog/comment_user3.jpg" class="avatar">
												</div>
												<div class="comment-body">
													<div class="comment-meta">
														<div class="comment-author"><a href="javascript:;">Ruth</a></div>
														<div class="comment-date"><a href="javascript:;">6 jam yang lalu</a></div>
														<a class="comment-reply-link" href="javascript:;">Jawab</a>
													</div>
													<!--/ .comment-meta-->
													<p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. There are many variations of passages.</p>
												</div>
												<!--/ .comment-body-->
											</div>
										</div>
									</li>
								</ol>
							</div>
							<!--Comment end-->
							<!--Comment reply start-->
							<div id="respond" class="comment-respond">
								<h3 id="reply-title" class="comment-reply-title">Tinggalkan Komentar<small><a rel="nofollow" id="cancel-comment-reply-link" href="http://kamleshyadav.in/wp/adelia/blog-image-post/#respond" style="display: none;">Batal Jawab</a></small></h3>
								<form id="commentform" class="comment-form">
									<p class="comment-notes hide">
										<span id="email-notes">Alamat email Anda tidak akan dipublikasikan.</span> Bidang yang harus diisi ditandai <span class="required">*</span>
									</p>
									<div class="row">
										<div class="col-md-4">
											<p class="comment-form-author">
												<label for="author">Nama <span class="required">*</span></label>
												<input id="author" name="author" type="text" value="" size="30" aria-required="true" required>
											</p>
										</div>
										<div class="col-md-4">
											<p class="comment-form-email">
												<label for="email">Email <span class="required">*</span></label>
												<input id="email" name="email" type="email" value="" size="30" aria-describedby="email-notes" aria-required="true">
											</p>
										</div>
										<div class="col-md-4">
											<p class="comment-form-url">
												<label for="phone">Nomor Telpon <span class="required">*</span></label>
												<input id="phone" name="phone" type="text" value="" size="30">
											</p>
										</div>
									</div>
									<p class="comment-form-comment">
										<label for="comment">Komentar <span class="required">*</span></label>
										<textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea>
									</p>
									<p class="form-submit">
										<input name="submit" type="submit" id="submit" class="btn-travel btn-green" value="Kirim">
									</p>
								</form>
							</div>
							<!--Comment reply end-->
						</div>
					<?php else : ?>
						<div class="travel_post">
							<div class="main_center_error_wrap">
								<div class="travelite_error_heading">
									<h3>Maaf, halaman ini tidak tersedia</h3>
									<p>Halaman yang Anda ikuti mungkin rusak, atau halaman mungkin telah dihapus.</p>
								</div>
								<div class="error_text_with_icon">
									<ul>
										<li class="error_text">404</li>
										<li class="vehicle_img">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="215.597px" height="170.363px" viewBox="0 0 215.597 170.363" enable-background="new 0 0 215.597 170.363" xml:space="preserve">
												<path fill="#86B817" d="M207.496,67.872V39.401h-16.249L168.41,0H75.331l-21.9,37.831L11.648,7.203l-3.994,5.451L44.15,39.401H6.271v28.471H0v13.489h6.28v10.41h39.056v-3.375c0-7.272,5.931-13.2,13.216-13.2c7.275,0,13.196,5.928,13.196,13.2v3.375h16.444v5.389h9.484v66.459H77.166v6.744h61.255v-6.744h-20.51V97.16h9.478v-5.389h12.43c1.613,9.393,9.741,16.572,19.581,16.572c9.854,0,18.008-7.18,19.615-16.572h28.468v-10.41h8.114V67.872H207.496z M159.413,101.6c-7.271,0-13.186-5.916-13.186-13.203c0-7.272,5.914-13.2,13.186-13.2c7.285,0,13.213,5.928,13.213,13.2C172.626,95.684,166.698,101.6,159.413,101.6z M200.751,85.024h-21.723c-1.607-9.396-9.762-16.573-19.615-16.573c-9.84,0-17.969,7.177-19.582,16.573H78.21c-1.604-9.403-9.811-16.573-19.658-16.573c-9.857,0-18.077,7.17-19.674,16.573H13.024V46.146h43.387l22.82-39.401h85.307l22.829,39.401h13.39v38.878H200.751z M117.798,15.195h38.242v30.694h-38.242V15.195z M162.785,20.577l14.663,25.306h-14.663V20.577z M84.085,15.195h26.965v30.694H66.294L84.085,15.195z M50.618,105.406c-11.013,0-19.964,8.944-19.964,19.944c0,5.968,2.697,11.276,6.886,14.938h-5.483v13.489h37.129v-13.489h-5.483c4.176-3.662,6.886-8.971,6.886-14.938C70.563,114.351,61.618,105.406,50.618,105.406z M50.618,138.537c-7.285,0-13.22-5.915-13.22-13.187c0-7.285,5.935-13.2,13.22-13.2c7.271,0,13.193,5.915,13.193,13.2C63.818,132.622,57.903,138.537,50.618,138.537z M32.057,156.874h37.129v13.489H32.057V156.874z" />
											</svg>
										</li>
										<li class="error_text">error</li>
									</ul>
								</div>
								<div class="error_next_prev_links">
									<a href="<?= base_url() ?>" class="home_page">home</a>
									<a href="javascript:history.back()" class="prev_page">Halaman sebelumnya</a>
								</div>
								<div class="serach_here">or<h5>search here</h5>
								</div>
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
</div>
<!--content body end-->