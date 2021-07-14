<!--Header start-->
<header id="header_wrapper">
	<div class="header_top">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<?php
					$dashboard = $this->db->get_where('dashboard', ['id' => 1])->row_array();
					$this->db->order_by('id', 'DESC');
					$haifa = $this->db->get('haifa', 1)->row_array(); ?>
					<p>SK: <?= $haifa['nomor_sk'] . ' ' ?> <i class="fa fa-phone"></i> Untuk Bantuan? Hubungi Kami: <span><?= $dashboard['contact'] ?></span></p>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="top_menu">
						<style type="text/css">
							.d-flex {
								display: flex !important;
							}

							.icon-circle {
								height: 2.5rem;
								width: 2.5rem;
								border-radius: 100%;
								display: flex;
								align-items: center;
								justify-content: center;
							}

							.align-items-center {
								align-items: center !important;
							}

							.font-weight-bold {
								font-weight: 700 !important;
							}

							.text-gray-500 {
								color: #b7b9cc !important;
							}
						</style>
						<ul>
							<!-- <li><a href="#"><i class="fa fa-globe"></i> Languages</a>
								<ul class="sub-menu">
									<li><a href="#">English</a></li>
									<li><a href="#">France</a></li>
									<li><a href="#">German</a></li>
								</ul>
							</li> -->
							<?php if (!$this->session->userdata('email')) : ?>
								<li class="travelite_login_alert"><a href="#">Masuk</a></li>
								<li class="travelite_signup_alert"><a href="#">Daftar</a></li>
							<?php else : ?>
								<!-- Nav Item - Alerts -->
								<?php
								$this->db->order_by('id', 'DESC');
								$notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id']], 5)->result_array();
								$notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id'], 'is_read' => 0])->num_rows();
								?>
								<li class="nav-item dropdown no-arrow mx-1" id="show">
									<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bell fa-fw"></i>
										<!-- Counter - Alerts -->
										<span class="badge badge-danger badge-counter">
											<?php if ($notifikasi_unread > 5) : ?>
												5+
											<?php else : ?>
												<?= $notifikasi_unread ?>
											<?php endif ?>
										</span>
									</a>
									<!-- Dropdown - Alerts -->
									<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="width: 400px;">
										<h6 class="dropdown-header">
											Pusat Notifikasi
											<a href="" class="forgot_link" style="color: #A3D0EF;" onclick="notifikasi()">
												Tandai Semua Sudah dibaca
											</a>
										</h6>
										<?php $icon = ''; ?>
										<?php $bg = ''; ?>
										<?php foreach ($notifikasi as $key) : ?>
											<?php
											switch ($key['id_kategori_notifikasi']) {
												case 1:
													$bg = 'bg-primary';
													$icon = 'fa fa-warning';
													break;
												case 2:
													$bg = 'bg-primary';
													$icon = 'fa fa-warning';
													break;
												case 3:
													$bg = 'bg-primary';
													$icon = 'fa fa-warning';
													break;
												case 4:
													$bg = 'bg-primary';
													$icon = 'fa fa-warning';
													break;
												case 5:
													$bg = 'bg-primary';
													$icon = 'fa fa-file';
													break;
												case 6:
													$bg = 'bg-primary';
													$icon = 'fa fa-file';
													break;
												case 7:
													$bg = 'bg-primary';
													$icon = 'fa fa-file';
													break;
												case 8:
													$bg = 'bg-primary';
													$icon = 'fa fa-file';
													break;
												case 9:
													$bg = 'bg-primary';
													$icon = 'fa fa-warning';
													break;
												case 10:
													$bg = 'bg-primary';
													$icon = 'fa fa-dollar';
													break;

												default:
													$bg = 'bg-primary';
													$icon = 'fas fa-file-alt';
													break;
											} ?>
											<a class="dropdown-item d-flex" href="#">
												<div class="ml-3" style="margin-left: 20px; margin-right: 20px;">
													<div class="icon-circle <?= $bg ?>">
														<i class="<?= $icon ?> text-white"></i>
													</div>
												</div>
												<div class="">
													<h6 class="small" style="color: black; margin-bottom: 0px;"><?= date('j F Y, H:i:s', strtotime($key['waktu_notifikasi'])) ?></h6>
													<?php if ($key['is_read'] == 0) : ?>
														<span class="font-weight-bold" style="color: black; margin-top: 0px;"><?= $key['pesan'] ?></span>
													<?php else : ?>
														<span class="" style="color: black; margin-top: 0px;">
															<?= $key['pesan'] ?>
														</span>
													<?php endif ?>
												</div>
											</a>
										<?php endforeach ?>
										<!-- <a class="dropdown-item d-flex" href="#">
		                                    <div class="ml-3" style="margin-left: 20px; margin-right: 20px;">
		                                        <div class="icon-circle bg-primary">
		                                            <i class="fa fa-file text-white"></i>
		                                        </div>
		                                    </div>
		                                    <div class="">
		                                        <h6 class="small" style="color: black; margin-bottom: 0px;">December 12, 2019</h6>
		                                        <span class="font-weight-bold" style="color: black; margin-top: 0px;">A new monthly report is ready to download!</span>
		                                    </div>
		                                </a> -->
										<a class="dropdown-item text-center btn btn-link" style="color: black;" href="#">Lihat Semua Notifikasi</a>
									</div>
								</li>
								<li><a href="<?= base_url('Profil/') ?>">Akun Saya</a></li>
								<li class=""><a href="<?= base_url('Auth/logout') ?>">Keluar</a></li>
							<?php endif ?>
							<!-- <li><a href="#">USD</a>
								<ul class="sub-menu">
									<li><a href="#">INR</a></li>
									<li><a href="#">USD</a></li>
								</ul>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- popup form Start -->
	<div class="full_width login_wrapper">
		<div class="row">
			<div class="container">
				<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-6 col-md-offset-6 col-sm-offset-6">
					<!-- login form start -->
					<div class="popup_alert_main travelite_login_form">
						<div class="login_heading">
							Masuk
							<span class="close_btn"><i class="fa fa-times"></i></span>
						</div>
						<div class="popup_inner">
							<form action="<?= base_url('Auth/login') ?>" method="post">
								<input type="email" name="email" id="" placeholder="Email Id" class="input_login">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="password" name="password" id="password" placeholder="Password" class="input_login">
								<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="checkbox" id="login_check" name="checkbox" class="checkbox_login">
								<label for="login_check" class="remember_me">Ingat saya</label>
								<a href="<?= base_url('auth/forgotPassword') ?>" class="forgot_link">Lupa password?</a>
								<input type="submit" value="LOG IN" class="sub_signup">
							</form>
							<div class="have_an_acnt">
								<p>Sudah punya akun? <a href="<?= base_url('auth/registration') ?>">Daftar</a></p>
							</div>
							<div class="or_line">
								<span>(OR)</span>
							</div>
							<div class="social_links_login">
								<ul>
									<li class="facebook_login"><a href="#"><i class="fa fa-facebook"></i>Masuk dengan facebook</a></li>
									<li class="gplus_login"><a href="#"><i class="fa fa-google-plus"></i>Masuk dengan Google+</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- login form  End -->
					<!-- signup form start -->
					<div class="popup_alert_main travelite_signup_form">
						<div class="login_heading">
							Daftar
							<span class="close_btn"><i class="fa fa-times"></i></span>
						</div>
						<div class="popup_inner">
							<?php $agama = $this->db->get('agama')->result_array(); ?>
							<form class="signup_form" method="post" action="<?= base_url('auth/registration') ?>">
								<input type="text" name="name" id="name" placeholder="Nama Lengkap" class="input_login" value="<?= set_value('name') ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="email" name="email" id="email" placeholder="Email" class="input_login" value="<?= set_value('email') ?>">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
								<select name="gender" id="gender" class="input_login" value="<?= set_value('gender') ?>">
									<option selected disabled value="">Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="text" name="place_of_birth" id="place_of_birth" class="input_login" value="<?= set_value('place_of_birth') ?>" placehokder="Tempat Lahir">
								<?= form_error('place_of_birth', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="text" name="birthday" id="birthday" placeholder="Tanggal Lahir" class="input_login" value="<?= set_value('birthday') ?>">
								<?= form_error('birthday', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="number" class="input_login" id="phone_number" name="phone_number" placeholder="Nomor Ponsel" value="<?= set_value('phone_number') ?>">
								<?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
								<textarea class="input_login" id="address" name="address" rows="3" placeholder="Alamat"><?= set_value('address') ?></textarea>
								<?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
								<select class="input_login" name="religion_id" id="religion_id">
									<option value="">Pilih Agama</option>
									<?php foreach ($agama as $row) : ?>
										<option value="<?= $row['id'] ?>"><?= $row['agama'] ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('religion_id', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="password" name="password1" id="password1" placeholder="Kata Sandi" class="input_login">
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="password" name="password2" id="password2" placeholder="Konfirmasi Kata Sandi" class="input_login">
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
								<input type="checkbox" id="signup_check" name="checkbox" class="checkbox_login">
								<label for="signup_check" class="remember_me">Saya menyetujui Ketentuan Layanan, Kebijakan Privasi, Kebijakan Pengembalian Uang Tamu, dan Ketentuan Jaminan Tuan Rumah.</label>
								<input type="submit" value="SIGN UP" class="sub_signup">
							</form>
							<div class="or_line">
								<span>(OR)</span>
							</div>
							<div class="social_links_login">
								<ul>
									<li class="facebook_login"><a href="#"><i class="fa fa-facebook"></i>Masuk dengan facebook</a></li>
									<li class="gplus_login"><a href="#"><i class="fa fa-google-plus"></i>Masuk dengan Google+</a></li>
								</ul>
							</div>
							<div class="already_member"> Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Masuk disini</a></div>
						</div>
					</div>
					<!-- signup form  End -->
				</div>
			</div>
		</div>
	</div>
	<!-- popup form  End -->
	<div class="header_bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2">
					<div class="travel_logo"> <a href="<?= base_url() ?>"><img src="<?= base_url('assets/') ?>images/Group 2.1.png" alt="logo" /></a></div>
					<!-- <div class="travel_logo"> <a href="<?= base_url() ?>"><img src="<?= base_url('assets/') ?>svg/Logo.svg" alt="logo" /></a></div> -->
				</div>
				<div class="col-md-10 col-sm-10"> <a href="javascript:;" class="menu-toggle"></a>
					<div class="main_menu">
						<ul>
							<?php
							if (!$this->session->userdata('email')) {
								$this->db->where('login', 0);
							}
							$this->db->order_by('id', 'ASC');
							$menu = $this->db->get_where('haifa_menu', ['active' => 1])->result_array();
							?>
							<?php foreach ($menu as $m) : ?>
								<?php
								if ($m['dropdown'] == 0) {
									$url = base_url() . $m['url'];
								} else {
									$url = '#';
								}
								?>
								<?php
								if ($link == $m['menu']) {
									$active = 'active';
								} else {
									$active = '';
								}
								?>
								<li class="<?= $active ?>">
									<a href="<?= $url ?>"><?= $m['menu'] ?></a>
									<?php if ($m['dropdown'] == 1) : ?>
										<ul class="sub-menu">
											<?php
											$submenu = $this->db->get_where('haifa_sub_menu', ['menu_id' => $m['id'], 'is_active' => 1])->result_array();
											?>
											<?php foreach ($submenu as $sm) : ?>
												<li><a href="<?= base_url($sm['url']); ?>"><?= $sm['title'] ?></a></li>
											<?php endforeach ?>
										</ul>
									<?php endif ?>
								</li>
							<?php endforeach ?>
							<!-- <li class="active"><a href="#">home</a>
								<ul class="sub-menu">
									<li><a href="Home_01.html">home-version-1</a></li>
									<li><a href="Home_02.html">home-version-2</a></li>
									<li><a href="Home_03.html">home-version-3</a></li>
									<li><a href="Home_04.html">home-version-4</a></li>
									<li><a href="Home_05.html">home-version-5</a></li>
									<li><a href="Home_06.html">home-version-6</a></li>
									<li><a href="Home_07.html">home-version-7</a></li>
								</ul>
							</li>
							<li><a href="Tour_Home.html">tours</a>
								<ul class="sub-menu">
									<li><a href="Tour_destination.html">Destination</a>
										<ul class="sub-menu">
											<li><a href="tour_australia.html">Australia</a></li>
											<li><a href="tour_egypt.html">Egypt</a></li>
											<li><a href="tour_singapore.html">Singapore</a></li>
											<li><a href="tour_malaysia.html">Malaysia</a></li>
											<li><a href="tour_india.html">India</a></li>
											<li><a href="tour_nepal.html">Nepal</a></li>
											<li><a href="tour_russia.html">Russia</a></li>
										</ul>
									</li>
									<li><a href="Tour-Packages-Details.html">Tour Detail</a></li>
									<li><a href="Tour-Packages-Booking.html">Booking</a></li>
									<li><a href="Tour-Packages-Booking.html">Checkout</a></li>
									<li><a href="Tour-Packages-Grid-View.html">tour-packages-grid-view</a></li>
									<li><a href="Tour-Packages-List-View.html">tour-packages-list-view</a></li>
								</ul>
							</li>
							<li><a href="Hotel-Home.html">hotels</a>
								<ul class="sub-menu">
									<li><a href="Hotel-Home.html">Hotel-Home</a></li>
									<li><a href="Hotel-Grid-View.html">Hotel-Grid-View</a></li>
									<li><a href="Hotel-list-View.html">Hotel-list-View</a></li>
									<li><a href="Hotel-Details.html">Hotel-Details</a></li>      
									<li><a href="Hotel-Booking.html">Hotel-Booking</a></li>      
								</ul>
							</li>
							<li><a href="Flight-Home.html">flights</a>
								<ul class="sub-menu">
									<li><a href="Flight-Home.html">flight-Home</a></li>
									<li><a href="Flights-Grid-with-sidebar.html">flights-Grid-with-sidebar</a></li>
									<li><a href="Flights-List-view.html">flights-list-View</a></li>
									<li><a href="Flights-Details.html">flights-Details</a></li>
									<li><a href="Flights-Booking.html">flights-Booking</a></li>
								</ul>
							</li>
							<li><a href="#">special offers</a></li>
							<li><a href="Contact.html">contact</a></li>
							<li><a href="#">pages</a>
								<ul class="sub-menu">
									<li><a href="About.html">About</a></li>
									<li><a href="Services.html">services</a></li>
									<li><a href="Blog.html">blog</a></li>
									<li><a href="Blog_Detail.html">blog-Details</a></li>
									<li><a href="Tour_Gallery_1_Columns.html">Tour-Gallery-1-Columns</a></li>
									<li><a href="Tour_Gallery_2_Columns.html">Tour-Gallery-2-Columns</a></li>
									<li><a href="Tour_Gallery_3_Columns.html">Tour-Gallery-3-Columns</a></li>
									<li><a href="Offers.html">Offers</a></li>
									<li><a href="Event.html">Event</a></li>
									<li><a href="Coming_soon.html">Coming-soon</a></li>
									<li><a href="404_Error.html">404-Error</a></li>
								</ul>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>