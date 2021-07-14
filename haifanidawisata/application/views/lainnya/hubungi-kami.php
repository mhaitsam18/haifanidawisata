<!--content body start-->
<div id="content_wrapper">
	<!--page title start-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>ContactFrom_v8/css/main.css"> -->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Hubungi Kami</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<!-- contact map section start -->
	<div class="full_width tr_contact_map_section">
		<div class="map_main">
			<div id="bigth_googleMap"></div>
			<!-- <div class="contact100-map" id="google_map" data-map-x="-6.2996093474320345" data-map-y="107.29940432617946" data-pin="<?= base_url('assets/') ?>/images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div> -->
		</div>
	</div>
	<!-- contact map section End -->
	<!-- contact details section start -->
	<div class="full_width tr_contact_detais_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="conatact_form_ds">
						<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pesan Anda"></div>
						<?= $this->session->flashdata('message'); ?>
						<form action="<?= base_url('Lainnya/hubungiKami') ?>" method="post" enctype="multipart/form-data">
							<input type="text" name="nama" id="nama" placeholder="Nama" class="input_c" value="<?= set_value('nama') ?>">
							<?= form_error('nama','<small class="text-danger pl-3">','</small>') ?>
							<input type="email" name="email" id="email" placeholder="Email" class="input_c" value="<?= set_value('email') ?>">
							<?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
							<input type="text" name="no_wa" id="no_wa" placeholder="Nomor WhatsApp" class="input_c" value="<?= set_value('no_wa') ?>">
							<?= form_error('no_wa','<small class="text-danger pl-3">','</small>') ?>
							<input type="text" name="subjek" id="subjek" placeholder="Subjek" class="input_c" value="<?= set_value('subjek') ?>">
							<?= form_error('subjek','<small class="text-danger pl-3">','</small>') ?>
							<textarea class="text_area_c" placeholder="Pesan" name="pesan" id="pesan" required></textarea>
							<label>Upload Gambar</label>
							<input type="file" name="bukti" id="bukti" class="input_c">
							<?= form_error('bukti','<small class="text-danger pl-3">','</small>') ?>
							<input type="submit" value="Kirim" class="btn_green" id="form_submit">
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-6 col-md-7 col-sm-8 col-lg-offset-2">
							<?php foreach ($kantor as $row): ?>
								<div class="address_contact_details">
									<div class="address_detais_city">
										<?= $row['region'] ?>
									</div>
									<ul>
										<li><i class="fa fa-building"></i> <?= $row['nama_kantor'] ?></li>
										<li><i class="fa fa-map-marker"></i> <?= $row['alamat'] ?></li>
										<li><i class="fa fa-envelope"></i> <?= $row['email'] ?></li>
										<li><i class="fa fa-phone"></i> <?= $row['nomor_telepon'] ?></li>
									</ul>
								</div>
							<?php endforeach ?>
							<!-- <div class="address_contact_details">
								<div class="address_detais_city">
									Houston:
								</div>
								<ul>
									<li><i class="fa fa-map-marker"></i> 1234, Street Name, City Name.</li>
									<li><i class="fa fa-envelope"></i> Info@travellers.com</li>
									<li><i class="fa fa-phone"></i> +1 235 654 4569</li>
								</ul>
							</div>
							<div class="address_contact_details">
								<div class="address_detais_city">
									Melbourne:
								</div>
								<ul>
									<li><i class="fa fa-map-marker"></i> 1234, Street Name, City Name.</li>
									<li><i class="fa fa-envelope"></i> Info@travellers.com</li>
									<li><i class="fa fa-phone"></i> +1 235 654 4569</li>
								</ul>
							</div>
							<div class="address_contact_details">
								<div class="address_detais_city">
									Delhi:
								</div>
								<ul>
									<li><i class="fa fa-map-marker"></i> 1234, Street Name, City Name.</li>
									<li><i class="fa fa-envelope"></i> Info@travellers.com</li>
									<li><i class="fa fa-phone"></i> +1 235 654 4569</li>
								</ul>
							</div> -->
						</div>
						<div class="col-lg-4 col-md-5 col-sm-4 t_align_c">
							<!-- facebook squre start -->
							<div class="social_box facebook_b_wrap">
								<a href="#"><i class="fa fa-facebook-square"></i></a>
								<div class="social_likes">30000</div>
								<div class="shares_and_likes">bagikan & suka</div>
							</div>
							<!-- facebook squre End -->
							<!-- twitter squre start -->
							<div class="social_box twitter_b_wrap">
								<a href="#"><i class="fa fa-twitter-square"></i></a>
								<div class="social_likes">9000</div>
								<div class="shares_and_likes">pengikut</div>
							</div>
							<!-- twitter squre End -->
							<!-- RSS squre start -->
							<div class="social_box rss_b_wrap">
								<a href="#"><i class="fa fa-rss-square"></i></a>
								<div class="social_likes">15000</div>
								<div class="shares_and_likes">pelanggan</div>
							</div>
							<!-- RSS squre End -->
							<!-- Linkedin squre start -->
							<div class="social_box linkedin_b_wrap">
								<a href="#"><i class="fa fa-linkedin-square"></i></a>
								<div class="social_likes">3200</div>
								<div class="shares_and_likes">koneksi</div>
							</div>
							<!-- Linkedin squre End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact details section End -->
	<!-- contact section End -->
	<!-- counter section End -->
</div>
<!--content body end--> 