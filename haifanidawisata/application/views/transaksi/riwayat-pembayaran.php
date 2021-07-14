<!--content body start-->
<div id="content_wrapper"> 
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Riwayat Pembayaran</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100">
				<!-- Page Heading -->
		        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		        <?= $this->session->flashdata('message'); ?>
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Riwayat Pembayaran"></div>
		        <div class="col-lg-12">
					<h3 class="h3 mt-5">Riwayat Pembayaran Paket Wisata</h3>
					<table class="table table-responsive" style="background-color: white;" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Pelanggan</th>
								<th scope="col">Kode Bayar</th>
								<th scope="col">Rekening Tujuan</th>
								<th scope="col">Rekening Pengirim</th>
								<th scope="col">Bank Pengirim</th>
								<th scope="col">Atas Nama Pengirim</th>
								<th scope="col">Waktu Transfer</th>
								<th scope="col">Nominal Transfer</th>
								<th scope="col">Bukti Pembayaran</th>
								<th scope="col">Catatan</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; ?>
							<?php foreach ($bukti_pembayaran_paket as $row): ?>
								<tr>
									<th scope="row"><?= ++$no ?></th>
									<td><?= $row['name'] ?></td>
									<td><?= $row['kode_bayar'] ?></td>
									<td><?= $row['no_rekening'] ?></td>
									<td><?= $row['rekening_pengirim'] ?></td>
									<td><?= $row['bank_pengirim'] ?></td>
									<td><?= $row['nama_pengirim'] ?></td>
									<td><?= $row['waktu_transfer'] ?></td>
									<td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
	                            	<?php 
                            		if(file_exists("./assets/img/bukti_pembayaran/$row[bukti_pembayaran]")){
                            			$bukti_pembayaran = base_url("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                            		}else{
                            			$bukti_pembayaran = base_url2("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                            		}
                            		?>
									<td><img src="<?= $bukti_pembayaran ?>" class="img-thumbnail" style="width: 120px;"></td>
									<td><?= $row['catatan'] ?></td>
									<td><?= $row['sbt'] ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="col-lg-12">
					<h3 class="h3 mt-5">Riwayat Pembayaran Produk</h3>
					<table class="table table-responsive" style="background-color: white;" id="dataTable2">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Pelanggan</th>
								<th scope="col">Kode Bayar</th>
								<th scope="col">Rekening Tujuan</th>
								<th scope="col">Rekening Pengirim</th>
								<th scope="col">Bank Pengirim</th>
								<th scope="col">Atas Nama Pengirim</th>
								<th scope="col">Waktu Transfer</th>
								<th scope="col">Nominal Transfer</th>
								<th scope="col">Bukti Pembayaran</th>
								<th scope="col">Catatan</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; ?>
							<?php foreach ($bukti_transfer as $row): ?>
								<tr>
									<th scope="row"><?= ++$no ?></th>
									<td><?= $row['name'] ?></td>
									<td><?= $row['kode_bayar'] ?></td>
									<td><?= $row['no_rekening'] ?></td>
									<td><?= $row['rekening_pengirim'] ?></td>
									<td><?= $row['bank_pengirim'] ?></td>
									<td><?= $row['nama_pengirim'] ?></td>
									<td><?= $row['waktu_transfer'] ?></td>
									<td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
	                            	<?php 
                            		if(file_exists("./assets/img/bukti_pembayaran/$row[bukti_pembayaran]")){
                            			$bukti_pembayaran = base_url("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                            		}else{
                            			$bukti_pembayaran = base_url2("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                            		}
                            		?>
									<td><img src="<?= $bukti_pembayaran ?>" class="img-thumbnail" style="width: 120px;"></td>
									<td><?= $row['catatan'] ?></td>
									<td><?= $row['sbt'] ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
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
				<h2>Dapatkan hingga 20% Penawaran</h2>
				<h5>Tentang Pemesanan Penerbangan Bersama dengan Paket Wisata</h5>
				<div class="coupon_offer"> Gunakan kode kupon: <span>FLI20</span> </div>
			</div>
		</div>
	</div>
</div>