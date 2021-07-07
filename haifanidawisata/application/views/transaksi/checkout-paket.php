<!--content body start-->
<div id="content_wrapper"> 
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Tour package - booking</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100"> 
				<!-- left sidebar start --> 
				<!-- left sidebar end --> 
				<!-- right main start -->
				<div class="col-lg-12">
					<div class="tour_package_booking_section"> 
						<!-- package tabs start -->
						<div id="tour_booking_tabs"> 
							<!-- tabs start -->
							<div class="tour_booking_tabs">
								<ul>
									<li><a href="#booking_details">Booking Details</a></li>
									<li><a href="#personal_info">Personal Info</a></li>
									<li><a href="#payment_info">Payment Info</a></li>
									<li><a href="#confirmation">Confirmation</a></li>
								</ul>
							</div>
							<!-- tabs end --> 
							<!-- booking_details Start -->
							<div id="booking_details" class="main_content_area">
								<div class="inner_container"> 
									<!--  tab inner section Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>Tour package Details</h5>
											<span>change tour</span>
										</div>
										<div class="tab_inner_body full_width"> 
											<!--  review area start -->
											<div class="tab_review_area">
												<img src="<?= base_url2('assets/img/paket-wisata/').$paket_wisata['gambar'] ?>" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['nama_paket'] ?></h4>
														<span class="country_span"><?= $paket_wisata['destinasi'] ?></span><span class="time_date"><i class="fa fa-clock-o"></i><?= $paket_wisata['lama_wisata'] ?>days</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating">
															<?php $bintang = 1;
															while ($bintang <= 5) { ?>
																<?php 
																if ($bintang <= $paket_wisata['bintang']){
																	$color = '#FDB714';
																} else{
																	$color = '#C0CCD3';
																}
																$bintang++;
																?>
																<i class="fa fa-star" style="color: <?= $color ?>;"></i>
															<?php } ?>
														</div>
														<!-- <div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> -->
														<span><?= $paket_wisata['jumlah_terpesan'] ?> Reviews</span>
													</div>
												</div>
											</div>
											<!--  review area start --> 
											<!-- tab include area Start -->
											<div class="inludes_section">
												<div class="left_lists col-lg-4 col-md-4">
													<table>
														<tr>
															<td class="label_list">Hari</td>
															<td>-</td>
															<td><?= $paket_wisata['lama_wisata'] ?></td>
														</tr>
														<tr>
															<td class="label_list">Harga</td>
															<td>-</td>
															<td>Rp.<?= number_format($paket_wisata['harga_paket'],2,',','.') ?></td>
														</tr>
														<?php if ($paket_wisata['diskon']>0): ?>
															<tr>
																<td class="label_list"></td>
																<td>-</td>
																<td><?= number_format($paket_wisata['diskon']*100,0,',','.') ?>%</td>
															</tr>
														<?php endif ?>
														<tr>
															<td class="label_list">Class</td>
															<td>-</td>
															<td><?= $paket_wisata['kualitas'] ?></td>
														</tr>
														<tr>
															<td class="label_list">Kategori</td>
															<td>-</td>
															<td><?= $paket_wisata['kategori_wisata'] ?></td>
														</tr>
														<tr>
															<td class="label_list">Maskapai</td>
															<td>-</td>
															<td><?= $paket_wisata['maskapai'] ?></td>
														</tr>
														<tr>
															<td class="label_list">Keberangkatan</td>
															<td>-</td>
															<td><?= date('j F Y', strtotime($paket_wisata['tanggal_keberangkatan'])); ?></td>
														</tr>
														<tr>
															<td class="label_list">Tour Leader</td>
															<td>-</td>
															<td><?= $paket_wisata['tour_leader'] ?></td>
														</tr>
														
													</table>
												</div>
												<div class="right_includes col-lg-8 col-md-8">
													<h5 class="includes_text">includes:</h5>
													<ul class="sort_place_icons">
														<?php $fasilitas = $this->db->get_where('fasilitas', ['id_paket_wisata' => $paket_wisata['pid']])->result_array(); ?>
														<?php foreach ($fasilitas as $f): ?>
															<li><i class="<?= $f['icon'] ?>"></i><?= $f['fasilitas'] ?></li>
														<?php endforeach ?>
														<!-- <li><i class="fa fa-car"></i> transports</li>
														<li><i class="fa fa-plane"></i> flights</li>
														<li><i class="fa fa-binoculars"></i> sight seeing</li>
														<li><i class="fa fa-cutlery"></i> food</li>
														<li><i class="fa fa-building-o"></i> hotels</li> -->
													</ul>
												</div>
											</div>
											<!-- tab include area End -->
										</div>
									</div>
									<!--  tab inner section End -->
									<!--  tab inner section two Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>hotel Details</h5>
											<span>change hotel</span>
										</div>
										<div class="tab_inner_body full_width">
											<!--  review area start -->
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour2.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['hotel_pertama'] ?></h4>
														<span class="country_span">Mekkah</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span>
													</div>
												</div>
											</div>
											<!--  review area start --> 
											<!-- tab include area Start -->
											<div class="inludes_section">
												<div class="left_lists col-lg-5 col-md-5">
													<table>
														<tr>
															<td class="label_list">room type</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">adults</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">children</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">duration</td>
															<td>-</td>
															<td>5 Nights/ 4 Days</td>
														</tr>
													</table>
												</div>
												<div class="right_includes col-lg-7 col-md-7">
													<div class="check_in_out_wrap">
														<div class="check_in">
															<label>Check in</label>
															<div class="check_in_box">
																<span class="day"><?= date('D', strtotime('+1 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="date"><?= date('j', strtotime('+1 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="month"><?= date('M', strtotime('+1 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span>
															</div>
														</div>
														<div class="check_in">
															<label>Check out</label>
															<div class="check_in_box">
																<span class="day"><?= date('D', strtotime('+5 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="date"><?= date('j', strtotime('+5 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="month"><?= date('M', strtotime('+5 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- tab include area End --> 
										</div>
									</div>
									<!--  tab inner section two Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>hotel Details</h5>
											<span>change hotel</span>
										</div>
										<div class="tab_inner_body full_width">
											<!--  review area start -->
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour2.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['hotel_kedua'] ?></h4>
														<span class="country_span">Madinah</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span>
													</div>
												</div>
											</div>
											<!--  review area start --> 
											<!-- tab include area Start -->
											<div class="inludes_section">
												<div class="left_lists col-lg-5 col-md-5">
													<table>
														<tr>
															<td class="label_list">room type</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">adults</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">children</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">duration</td>
															<td>-</td>
															<td>4 Nights/ 3 Days</td>
														</tr>
													</table>
												</div>
												<div class="right_includes col-lg-7 col-md-7">
													<div class="check_in_out_wrap">
														<div class="check_in">
															<label>Check in</label>
															<div class="check_in_box">
																<span class="day"><?= date('D', strtotime('+6 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="date"><?= date('j', strtotime('+6 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="month"><?= date('M', strtotime('+6 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span>
															</div>
														</div>
														<div class="check_in">
															<label>Check out</label>
															<div class="check_in_box">
																<span class="day"><?= date('D', strtotime('+10 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="date"><?= date('j', strtotime('+10 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span> <span class="month"><?= date('M', strtotime('+10 days', strtotime($paket_wisata['tanggal_keberangkatan']) )) ?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- tab include area End --> 
										</div>
									</div>
									<!--  tab inner section two Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>hotel Details</h5>
											<span>change hotel</span>
										</div>
										<div class="tab_inner_body full_width">
											<!--  review area start -->
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour2.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['hotel_ketiga'] ?></h4>
														<span class="country_span">-</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>0 Reviews</span>
													</div>
												</div>
											</div>
											<!--  review area start --> 
											<!-- tab include area Start -->
											<div class="inludes_section">
												<div class="left_lists col-lg-5 col-md-5">
													<table>
														<tr>
															<td class="label_list">room type</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">adults</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">children</td>
															<td>-</td>
															<td>-</td>
														</tr>
														<tr>
															<td class="label_list">duration</td>
															<td>-</td>
															<td>-</td>
														</tr>
													</table>
												</div>
												<div class="right_includes col-lg-7 col-md-7">
													<div class="check_in_out_wrap">
														<div class="check_in">
															<label>Check in</label>
															<div class="check_in_box">
																<span class="day">-</span> <span class="date">-</span> <span class="month">-</span>
															</div>
														</div>
														<div class="check_in">
															<label>Check out</label>
															<div class="check_in_box">
																<span class="day">-</span> <span class="date">-</span> <span class="month">-</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- tab include area End --> 
										</div>
									</div>
									<!-- <div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>hotel Details</h5>
											<span>change hotel</span>
										</div>
										<div class="tab_inner_body full_width">
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour2.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4>Park Central</h4>
														<span class="country_span">perth, Australia</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span>
													</div>
												</div>
											</div>
											<div class="inludes_section">
												<div class="left_lists col-lg-5 col-md-5">
													<table>
														<tr>
															<td class="label_list">room type</td>
															<td>-</td>
															<td>Luxurious Two BedRoom</td>
														</tr>
														<tr>
															<td class="label_list">adults</td>
															<td>-</td>
															<td>2</td>
														</tr>
														<tr>
															<td class="label_list">children</td>
															<td>-</td>
															<td>1</td>
														</tr>
														<tr>
															<td class="label_list">duration</td>
															<td>-</td>
															<td>3 Nights/ 2 Days</td>
														</tr>
													</table>
												</div>
												<div class="right_includes col-lg-7 col-md-7">
													<div class="check_in_out_wrap">
														<div class="check_in">
															<label>Check in</label>
															<div class="check_in_box">
																<span class="day">Mon</span> <span class="date">22</span> <span class="month">sep</span>
															</div>
														</div>
														<div class="check_in">
															<label>Check out</label>
															<div class="check_in_box">
																<span class="day">Mon</span> <span class="date">22</span> <span class="month">sep</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> -->
									<!--  tab inner two section End --> 
									<!--  tab inner section three Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>flight Details</h5>
											<span>change flight</span>
										</div>
										<div class="tab_inner_body full_width"> 
											<!--  review area start -->
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour3.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['maskapai'] ?></h4>
														<span class="country_span">Indonesia to <?= $paket_wisata['destinasi'] ?></span> <span class="country_span">One Way Flight</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span>
													</div>
												</div>
											</div>
											<!--  review area start --> 
											<!-- tab include area Start -->
											<div class="inludes_section flight_section">
												<div class="country_section_box">
													<h4>Indonesia</h4>
													<p><?= date('j M Y', strtotime($paket_wisata['tanggal_keberangkatan'])); ?> at 5.30am</p>
												</div>
												<div class="middle_flight_section">
													<div class="border_line"> <i class="fa fa-plane"></i> </div>
													<p><i class="fa fa-clock-o"></i> 9 hours, 30 Minutes</p>
												</div>
												<div class="country_section_box">
													<h4><?= $paket_wisata['destinasi'] ?></h4>
													<p><?= date('j M Y', strtotime('+1 days', strtotime($paket_wisata['tanggal_keberangkatan']))); ?> at 5.30am</p>
												</div>
											</div>
											<!-- tab include area End --> 
										</div>
									</div>
									<!-- <div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>flight Details</h5>
											<span>change flight</span>
										</div>
										<div class="tab_inner_body full_width">
											<div class="tab_review_area">
												<img src="<?= base_url('assets/') ?>images/tour-booking/tour3.jpg" alt="review image">
												<div class="review_content">
													<div class="top_head_bar">
														<h4>Emirates</h4>
														<span class="country_span">Singapore to Australia</span> <span class="country_span">One Way Flight</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span>
													</div>
												</div>
											</div>
											<div class="inludes_section flight_section">
												<div class="country_section_box">
													<h4>singapore</h4>
													<p>20 Sep 2015 at 5.30am</p>
												</div>
												<div class="middle_flight_section">
													<div class="border_line"> <i class="fa fa-plane"></i> </div>
													<p><i class="fa fa-clock-o"></i> 48 hours, 30 Minutes</p>
												</div>
												<div class="country_section_box">
													<h4>australia</h4>
													<p>22 Sep 2015 at 5.30am</p>
												</div>
											</div>
										</div>
									</div> -->
									<!--  tab inner three section End -->
								</div>
								<!-- proceed button -->
								<div class="full_width t_align_c">
									<button type="submit" value="proceed to next step" class="btn_green proceed_buttton btns">proceed to next step</button>
								</div>
								<!-- proceed button --> 
							</div>
							<!-- booking_details End --> 
							<!-- personal_info Start -->
							<div id="personal_info" class="main_content_area"> 
								<!--  tab inner section three Start -->
								<div class="inner_container">
									<form class="package_booking_form_main" action="<?= base_url('Transaksi/insertJamaah/'.$paket_wisata['pid']) ?>" method="post">
										<div class="tab_inner_section inner_section_2">
											<div class="tab_inner_body full_width"> 
												<!--  package_booking_form start -->
												<div class="package_booking_form">
													<input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="<?= $paket_wisata['pid'] ?>">
													<div class="col-lg-6 col-md-6">
														<label for="kode_agen">Kode Agen</label>
														<input type="text" class="booking_input" id="kode_agen" name="kode_agen" placeholder="(Masukkan Kode Agen, Jika Anda mendaftar melalui Agen)" value="<?= set_value('nama_lengkap') ?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="nama_lengkap">Nama Lengkap</label>
														<input type="text" class="booking_input" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="no_ktp">Nomor KTP</label>
														<input type="number" class="booking_input" id="no_ktp" name="no_ktp" value="<?= set_value('no_ktp') ?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="kewarganegaraan">Kewarganegaraan</label>
														<select class="booking_input" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>">
															<option value="">Pilih Kewarganegaraan</option>
															<option value="WNI">WNI</option>
															<option value="WNA">WNA</option>
														</select>
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="tempat_lahir">Tempat Lahir</label>
														<input type="text" class="booking_input" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="tanggal_lahir">Tanggal Lahir</label>
														<input type="date" class="booking_input" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="jenis_kelamin">Jenis Kelamin</label>
														<select class="booking_input" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
															<option value="">Pilih Gender</option>
															<option value="Laki-laki">Laki-laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
													<div class="col-lg-6 col-md-6">
														<label for="alamat">Alamat</label>
														<textarea class="booking_input" id="alamat" name="alamat" rows="3" value="<?= set_value('alamat') ?>"></textarea>
													</div>
													<div class="col-lg-6 col-md-6">
								                        <label for="email">Email</label>
								                        <input type="email" class="booking_input" id="email" name="email" value="<?= set_value('email') ?>">
								                    </div>
								                    <div class="col-lg-6 col-md-6">
								                        <label for="no_hp">Nomor Handphone</label>
								                        <input type="number" class="booking_input" id="no_hp" name="no_hp" value="<?= set_value('no_hp') ?>">
								                    </div>
								                    <div class="col-lg-6 col-md-6">
								                        <label for="id_pendidikan">Pendidikan Terakhir</label>
								                        <select class="booking_input" name="id_pendidikan" id="id_pendidikan" value="<?= set_value('id_pendidikan') ?>">
								                            <option value="">Pilih Pendidikan</option>
								                            <?php foreach ($pendidikan as $key): ?>
								                                <option value="<?= $key['id'] ?>"><?= $key['pendidikan'] ?></option>
								                            <?php endforeach ?>
								                        </select>
								                    </div>
								                    <div class="col-lg-6 col-md-6">
								                        <label for="pekerjaan">Pekerjaan</label>
								                        <input type="text" class="booking_input" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
								                    </div>
								                    <div class="col-lg-6 col-md-6">
								                        <label for="riwayat_umroh">Riwayat Umroh/Haji</label>
								                        <select class="booking_input" name="riwayat_umroh" id="riwayat_umroh" value="<?= set_value('riwayat_umroh') ?>">
								                            <option value="">Pilih Riwayat</option>
								                                <option value="Pernah">Pernah</option>
								                                <option value="Belum Pernah">Belum Pernah</option>
								                        </select>
								                    </div>
													<div class="col-lg-6 col-md-6">
														<label for="golongan_darah">Golongan Darah</label>
														<div class="radio_book">
															<input type="radio" name="golongan_darah" value="A"> A
															<input type="radio" name="golongan_darah" value="B"> B
															<input type="radio" name="golongan_darah" value="AB"> AB
															<input type="radio" name="golongan_darah" value="O"> O
														</div>
													</div>
													<div class="checkbox_book">
														<input id="cek_paspor" type="checkbox" name="cek_paspor" value="sudah" class="detail">
														<label for="cek_paspor">Sudah memiliki paspor?</label>
													</div>
													<div id="paspor">
														<div class="col-lg-6 col-md-6">
															<label for="no_paspor">Nomor Paspor</label>
															<input type="text" class="booking_input" id="no_paspor" name="no_paspor" value="<?= set_value('no_paspor') ?>">
														</div>
														<div class="col-lg-6 col-md-6">
															<label for="nama_di_paspor">Nama Sesuai Paspor</label>
															<input type="text" class="booking_input" id="nama_di_paspor" name="nama_di_paspor" value="<?= set_value('nama_di_paspor') ?>">
														</div>
														<div class="col-lg-6 col-md-6">
															<label for="tanggal_cetak_paspor">Tanggal Cetak Paspor</label>
															<input type="date" class="booking_input" id="tanggal_cetak_paspor" name="tanggal_cetak_paspor" value="<?= set_value('tanggal_cetak_paspor') ?>">
														</div>
														<div class="col-lg-6 col-md-6">
															<label for="tempat_pembuatan_paspor">Tempat Pembuatan Paspor</label>
															<input type="text" class="booking_input" id="tempat_pembuatan_paspor" name="tempat_pembuatan_paspor" value="<?= set_value('tempat_pembuatan_paspor') ?>">
														</div>
														<div class="col-lg-6 col-md-6">
															<label for="tanggal_habis_berlaku_paspor">Tanggal Habis Masa Berlaku Paspor</label>
															<input type="date" class="booking_input" id="tanggal_habis_berlaku_paspor" name="tanggal_habis_berlaku_paspor" value="<?= set_value('tanggal_habis_berlaku_paspor') ?>">
														</div>
													</div>
												</div>
												<!--  package_booking_form END --> 
											</div>
											<!--  tab_inner_body end --> 
										</div>
										<!--  tab inner three section End --> 
										<!-- proceed button -->
										<div class="full_width t_align_c">
											<button type="submit" value="proceed to next step" class="btn_green proceed_buttton btns">proceed to next step</button>
										</div>
										<!-- proceed button -->
									</form>
								</div>
								<!--  inner container end --> 
							</div>
							<!-- personal_info End -->
							<!-- payment_info Start -->
							<div id="payment_info" class="main_content_area"> 
								<!-- inner_container Start -->
								<div class="inner_container"> 
									<!--  tab inner three section Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>payment Details</h5>
										</div>
										<!--  tab_inner_body Start-->
										<div class="tab_inner_body full_width">
											<div class="payment_details_main"> 
												<!-- Review content main -->
												<div class=" col-lg-8 col-md-8 review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['nama_paket'] ?></h4>
														<span class="country_span"><?= $paket_wisata['destinasi'] ?></span> <span class="time_date"><i class="fa fa-clock-o"></i><?= $paket_wisata['lama_wisata'] ?>days</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating">
															<?php $bintang = 1;
															while ($bintang <= 5) { ?>
																<?php 
																if ($bintang <= $paket_wisata['bintang']){
																	$color = '#FDB714';
																} else{
																	$color = '#C0CCD3';
																}
																$bintang++;
																?>
																<i class="fa fa-star" style="color: <?= $color ?>;"></i>
															<?php } ?>
														</div>
														<!-- <div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> -->
														<!-- <span>345 Reviews</span> -->
													</div>
												</div>
												<!-- Review content main -->
												<div class="col-lg-4 col-md-4">
													<div class="payment_table">
														<ul>
															<li>
																<span>Harga Paket</span><span>Rp. <?= number_format($paket_wisata['harga_paket'],2,',','.') ?></span>
															</li>
															<li>
																<span>Tambahan(1)</span><span>Rp. 0,00</span>
															</li>
															<li>
																<span>Pajak 10%</span><span>Rp. 0,00</span>
															</li>
															<li>
																<span>Diskon <?= number_format($paket_wisata['diskon']*100,0) ?></span><span>(-)Rp. <?= number_format($paket_wisata['diskon']*$paket_wisata['harga_paket'],2,',','.')  ?></span>
															</li>
															<li class="total_row">
																<span>Total</span><span>Rp. <?= number_format($paket_wisata['harga_paket'] - ($paket_wisata['diskon']*$paket_wisata['harga_paket']),2,',','.')  ?></span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- payment_details_main end --> 
										</div>
										<!--  tab_inner_body end --> 
									</div>
									<!--  tab inner three section End --> 
									<!--  tab inner  section start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>payment method</h5>
										</div>
										<!--  tab_inner_body Start-->
										<div class="tab_inner_body full_width">
											<div class="payment_mathod_tabs" id="payment_vertical_tabs">
												<div class="payment_vertical_tabs">
													<ul>
														<li><a href="#credit_card">credit card</a></li>
														<li><a href="#debit_card">debit card</a></li>
														<li><a href="#net_banking">net banking</a></li>
														<li><a href="#paypal">paypal</a></li>
														<li><a href="#transfer">Transfer</a></li>
													</ul>
												</div>
												<!-- credit card  content -->
												<div id ="credit_card" class="vertical_tab_content"> 
													<!-- Inner Body Payment Start -->
													<div class="inner_body_payment">
														<form class="payment_method_form">
															<fieldset>
																<label>Card Holder’s Name (please enter the same name which is written on your card)</label>
																<input type="text" placeholder="Name On Card" class="input_card">
															</fieldset>
															<fieldset>
																<label>Credit Card Number</label>
																<input type="text" placeholder="Name On Card" class="input_credit_card">
																<a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card3.jpg" alt="debit card"></a>
															</fieldset>
															<fieldset>
																<div class="select_tabs">
																	<label>Expiry Date</label>
																	<select>
																		<option>month</option>
																		<option>january</option>
																		<option>fabuary</option>
																		<option>march</option>
																		<option>april</option>
																		<option>may</option>
																		<option>june</option>
																		<option>july</option>
																		<option>august</option>
																		<option>september</option>
																		<option>november</option>
																		<option>december</option>
																	</select>
																	<select>
																		<option>year</option>
																		<option>2010</option>
																		<option>2011</option>
																		<option>2012</option>
																		<option>2013</option>
																		<option>2014</option>
																		<option>2015</option>
																		<option>2018</option>
																	</select>
																</div>
																<div class="cvv_input">
																	<label>CVV</label>
																	<input type="text"  class="cvv">
																</div>
															</fieldset>
															<div class="checkbox_section">
																<div class="checkbox_book">
																	<input id="tabcheck" type="checkbox" name="tabcheck" value="tabcheck">
																	<label for="tabcheck">Yes, I have read and I agree to the booking conditions</label>
																</div>
																<button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
															</div>
														</form>
													</div>
													<!-- Inner Body Payment End --> 
												</div>
												<!-- credit card content end --> 
												<!-- debit card content start -->
												<div id ="debit_card" class="vertical_tab_content"> 
													<!-- Inner Body Payment Start -->
													<div class="inner_body_payment">
														<form class="payment_method_form">
															<fieldset>
																<label>Card Holder’s Name (please enter the same name which is written on your card)</label>
																<input type="text" placeholder="Name On Card" class="input_card">
															</fieldset>
															<fieldset>
																<label>Credit Card Number</label>
																<input type="text" placeholder="Name On Card" class="input_credit_card">
																<a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card3.jpg" alt="debit card"></a>
															</fieldset>
															<fieldset>
																<div class="select_tabs">
																	<label>Expiry Date</label>
																	<select>
																		<option>month</option>
																		<option>january</option>
																		<option>fabuary</option>
																		<option>march</option>
																		<option>april</option>
																		<option>may</option>
																		<option>june</option>
																		<option>july</option>
																		<option>august</option>
																		<option>september</option>
																		<option>november</option>
																		<option>december</option>
																	</select>
																	<select>
																		<option>year</option>
																		<option>2010</option>
																		<option>2011</option>
																		<option>2012</option>
																		<option>2013</option>
																		<option>2014</option>
																		<option>2015</option>
																		<option>2018</option>
																	</select>
																</div>
																<div class="cvv_input">
																	<label>CVV</label>
																	<input type="text"  class="cvv">
																</div>
															</fieldset>
															<div class="checkbox_section">
																<div class="checkbox_book">
																	<input id="tabcheck1" type="checkbox" name="tabcheck" value="tabcheck">
																	<label for="tabcheck1">Yes, I have read and I agree to the booking conditions</label>
																</div>
																<button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
															</div>
														</form>
													</div>
													<!-- Inner Body Payment End -->
												</div>
												<!-- debit card content End --> 
												<!-- Net Banking  content Start -->
												<div id ="net_banking" class="vertical_tab_content">
													<!-- Inner Body Payment Start -->
													<div class="inner_body_payment">
														<form class="payment_method_form">
															<fieldset>
																<label>Card Holder’s Name (please enter the same name which is written on your card)</label>
																<input type="text" placeholder="Name On Card" class="input_card">
															</fieldset>
															<fieldset>
																<label>Credit Card Number</label>
																<input type="text" placeholder="Name On Card" class="input_credit_card">
																<a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card3.jpg" alt="debit card"></a>
															</fieldset>
															<fieldset>
																<div class="select_tabs">
																	<label>Expiry Date</label>
																	<select>
																		<option>month</option>
																		<option>january</option>
																		<option>fabuary</option>
																		<option>march</option>
																		<option>april</option>
																		<option>may</option>
																		<option>june</option>
																		<option>july</option>
																		<option>august</option>
																		<option>september</option>
																		<option>november</option>
																		<option>december</option>
																	</select>
																	<select>
																		<option>year</option>
																		<option>2010</option>
																		<option>2011</option>
																		<option>2012</option>
																		<option>2013</option>
																		<option>2014</option>
																		<option>2015</option>
																		<option>2018</option>
																	</select>
																</div>
																<div class="cvv_input">
																	<label>CVV</label>
																	<input type="text"  class="cvv">
																</div>
															</fieldset>
															<div class="checkbox_section">
																<div class="checkbox_book">
																	<input id="tabcheck2" type="checkbox" name="tabcheck" value="tabcheck">
																	<label for="tabcheck2">Yes, I have read and I agree to the booking conditions</label>
																</div>
																<button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
															</div>
														</form>
													</div>
													<!-- Inner Body Payment End --> 
												</div>
												<!-- Net Banking  content End --> 
												<!-- Paypal card content Start -->
												<div id ="paypal" class="vertical_tab_content"> 
													<!-- Inner Body Payment Start -->
													<div class="inner_body_payment">
														<form class="payment_method_form">
															<fieldset>
																<label>Card Holder’s Name (please enter the same name which is written on your card)</label>
																<input type="text" placeholder="Name On Card" class="input_card">
															</fieldset>
															<fieldset>
																<label>Credit Card Number</label>
																<input type="text" placeholder="Name On Card" class="input_credit_card">
																<a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card1.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card2.jpg" alt="debit card"></a> <a href="#"><img src="<?= base_url('assets/') ?>images/tour-booking/card3.jpg" alt="debit card"></a>
															</fieldset>
															<fieldset>
																<div class="select_tabs">
																	<label>Expiry Date</label>
																	<select>
																		<option>month</option>
																		<option>january</option>
																		<option>fabuary</option>
																		<option>march</option>
																		<option>april</option>
																		<option>may</option>
																		<option>june</option>
																		<option>july</option>
																		<option>august</option>
																		<option>september</option>
																		<option>november</option>
																		<option>december</option>
																	</select>
																	<select>
																		<option>year</option>
																		<option>2010</option>
																		<option>2011</option>
																		<option>2012</option>
																		<option>2013</option>
																		<option>2014</option>
																		<option>2015</option>
																		<option>2018</option>
																	</select>
																</div>
																<div class="cvv_input">
																	<label>CVV</label>
																	<input type="text"  class="cvv">
																</div>
															</fieldset>
															<div class="checkbox_section">
																<div class="checkbox_book">
																	<input id="tabcheck3" type="checkbox" name="tabcheck" value="tabcheck">
																	<label for="tabcheck3">Yes, I have read and I agree to the booking conditions</label>
																</div>
																<button type="submit" value="proceed payment" class="btn_green proceed_buttton btns">proceed payment</button>
															</div>
														</form>
													</div>
													<!-- Inner Body Payment End -->
												</div>
												<!-- Paypal card content End --> 
											</div>
											<!-- payment tab main end -->
										</div>
										<!--  tab_inner_body end -->
									</div>
									<!--  tab inner three section End -->
								</div>
								<!-- inner_container end --> 
							</div>
							<!-- content area end --> 
							<!-- payment_info End --> 
							<!-- confirmation Start -->
							<div id="confirmation" class="main_content_area">
								<div class="inner_container"> 
									<!-- confirmation message -->
									<div class="full_width confirmation_msg">
										<span>Thank you. Your Booking is Confirmed Now</span>
									</div>
									<!-- confirmation message End--> 
									<!--  tab inner three section Start -->
									<div class="tab_inner_section">
										<div class="heading_tab_inner">
											<h5>payment Details</h5>
										</div>
										<!--  tab_inner_body Start-->
										<div class="tab_inner_body full_width">
											<div class="payment_details_main">
												<!-- Review content main -->
												<div class=" col-lg-9 col-md-9 review_content">
													<div class="top_head_bar">
														<h4><?= $paket_wisata['nama_paket'] ?></h4>
														<span class="country_span"><?= $paket_wisata['destinasi'] ?></span> <span class="time_date"><i class="fa fa-clock-o"></i><?= $paket_wisata['lama_wisata'] ?>days</span>
													</div>
													<div class="review_star_cover">
														<div class="bottom_star_rating">
															<?php $bintang = 1;
															while ($bintang <= 5) { ?>
																<?php 
																if ($bintang <= $paket_wisata['bintang']){
																	$color = '#FDB714';
																} else{
																	$color = '#C0CCD3';
																}
																$bintang++;
																?>
																<i class="fa fa-star" style="color: <?= $color ?>;"></i>
															<?php } ?>
														</div>
														<!-- <div class="bottom_star_rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
														<span>345 Reviews</span> -->
													</div>
												</div>
												<div class="col-lg-3 col-md-3">
													<div class="doller_left">
														<h2><?= number_format($paket_wisata['harga_paket'],2,',','.') ?></h2>
														<p>Per Person</p>
													</div>
												</div>
											</div>
											<!-- payment_details_main end --> 
											<!-- table section main start-->
											<div class="full_width package_table_section">
												<div class="col-lg-6 col-md-6 border_right">
													<div class="payment_table_package">
														<table class="table">
															<tr>
																<td>Starting Date</td>
																<td>:</td>
																<td><?= date('j F Y', strtotime($paket_wisata['tanggal_keberangkatan'])) ?></td>
															</tr>
															<tr>
																<td>Starting Date</td>
																<td>:</td>
																<td><?= date('j F Y', strtotime('+'.$paket_wisata['lama_wisata'].' days', strtotime($paket_wisata['tanggal_keberangkatan']))) ?></td>
															</tr>
															<tr>
																<td>Day</td>
																<td>:</td>
																<td><?= $paket_wisata['lama_wisata'] ?></td>
															</tr>
															<tr>
																<td>Adults</td>
																<td>:</td>
																<td>1</td>
															</tr>
															<tr>
																<td>Children</td>
																<td>:</td>
																<td>-</td>
															</tr>
														</table>
													</div>
													<!--  Payment Table End -->
												</div>
												<div class="col-lg-6 col-md-6"> 
													<!--  Payment Table Start -->
													<div class="payment_table_package">
														<table>
															<tr>
																<td>Harga Paket</td>
																<td>Rp. <?= number_format($paket_wisata['harga_paket'],2,',','.') ?></td>
															</tr>
															<tr>
																<td>Tambahan(0)</td>
																<td>Rp. 0,00</td>
															</tr>
															<tr>
																<td>Pajak</td>
																<td>Rp. 0,00</td>
															</tr>
															<tr>
																<td>Diskon <?= number_format($paket_wisata['diskon'],2,',','.') ?>%</td>
																<td>(-)Rp. <?= number_format($paket_wisata['diskon']*$paket_wisata['harga_paket'],2,',','.')  ?></td>
															</tr>
															<tr class="total_row">
																<td>Total</td>
																<td>Rp. <?= number_format($paket_wisata['harga_paket'] - $paket_wisata['diskon']*$paket_wisata['harga_paket'],2,',','.')  ?></td>
															</tr>
														</table>
														<!--  Payment Table End --> 
													</div>
												</div>
											</div>
											<!-- table section main end-->
											<div class="full_width total_price_row">
												<p>Total Price - </p>
												<h2>Rp. <?= number_format($paket_wisata['harga_paket'] - $paket_wisata['diskon']*$paket_wisata['harga_paket'],2,',','.')  ?></h2>
											</div>
										</div>
										<!--  tab_inner_body end --> 
									</div>
									<!--  tab inner three section End --> 
									<!-- information_section start -->
									<div class="full_width information_section">
										<div class="information_title"> Traveler Information </div>
										<div class="full_width information_table_main">
											<div class="col-lg-6 col-md-6 border_right">
												<div class="payment_table_package">
													<table class="table">
														<tr>
															<td>Booking Number :</td>
															<td>-</td>
														</tr>
														<tr>
															<td>Full Name :</td>
															<td><?= $user['name'] ?></td>
														</tr>
														<tr>
															<td>Jenis Kelamin :</td>
															<td><?= $user['gender'] ?></td>
														</tr>
														<tr>
															<td>Email :</td>
															<td><?= $user['email'] ?></td>
														</tr>
														<tr>
															<td>Foto :</td>		
															<?php 
															if(file_exists("./assets/img/profile/$user[image]")){
																$image = base_url("assets/img/profile/$user[image]");
															}else{
																$image = base_url2("assets/img/profile/$user[image]");
																echo "Tidak Tersedia";
															}
															?>
															<td><img src="<?= $image ?>" class="img-thumbnail"></td>
														</tr>
														
													</table>
												</div>
												<!--  Payment Table End -->
											</div>
											<div class="col-lg-6 col-md-6 border_right">
												<div class="payment_table_package">
													<table class="table">
														<tr>
															<td>Tempat, Tanggal Lahir :</td>
															<td><?= $user['place_of_birth'] ?>, <?= date('j F Y', strtotime($user['birthday'])) ?></td>
														</tr>
														<tr>
															<td>Nomor Telepon :</td>
															<td><?= $user['phone_number'] ?></td>
														</tr>
														<tr>
															<td>Alamat :</td>
															<td><?= $user['address'] ?></td>
														</tr>
														<tr>
															<td>Agama :</td>
															<td><?= $user['agama'] ?></td>
														</tr>
													</table>
												</div>
												<!--  Payment Table End --> 
											</div>
										</div>
										<!-- information_table End -->
									</div>
									<!-- information_section End -->
									<!-- information_section start -->
									<div class="full_width information_section space_top_65">
										<div class="information_title"> payment Information </div>
										<!-- information_table End -->
										<div class="full_width information_table_main">
											<div class="paymentinfo_list">
												<ul>
													<li>You have now confirmed and guaranteed your booking by credit card.</li>
													<li>All payments are to be made at the hotel during your stay, unsess otherwise stated in the hotel policies or in the room conditions.</li>
													<li>Please note that your credit card may be pre-authorised prior to your arrival.</li>
												</ul>
												<p>This Package accepts the following forms of payment :</p>
												<span>Credit Card (Visa)</span>
											</div>
										</div>
										<!-- information_table End -->
										<!-- information_table End -->
										<div class="full_width information_table_main">
											<div class="booking_text t_align_c">
												<p>If you can change or cancel your booking via out online self service tool <a href="#">here. </a></p>
												<span>We Wish You a Pleasent stay</span>
											</div>
										</div>
										<!-- information_table End -->
										<div class="full_width t_align_c">
											<button type="button" value="proceed to next step" class="btn_green proceed_buttton btns">print booking</button>
										</div>
									</div>
									<!-- information_section End --> 
								</div>
								<!--  inner container --> 
							</div>
							<!-- confirmation End --> 
						</div>
						<!-- package tabs End --> 
					</div>
					<!-- right main start -->
				</div>
				<!-- col-lg-9-end -->
			</div>
			<!--  row main -->
		</div>
		<!-- container --> 
	</div>
</div>
<!-- main wrapper -->
<div class="clearfix"></div>
<div class="full_width section_booking_bottom">
	<div class="icon_circle_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="middle_text full_width">
				<h2>Get up to 20% Offer</h2>
				<h5>On Booking Flights Along with Tour Packages</h5>
				<div class="coupon_offer"> Use Coupon Code: <span>FLI20</span> </div>
			</div>
		</div>
	</div>
</div>
<!--content body end--> 
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#paspor").css("display","none");
        $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='cek_paspor']:checked").val() == "sudah" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                $("#paspor").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#paspor").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
        });
    });
</script>