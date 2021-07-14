<!--content body start-->
<div id="content_wrapper"> 
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Pembayaran</a></li>
		</ul>
	</div>
	<style type="text/css">
		
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}
.col {
  flex-basis: 0;
  flex-grow: 1;
  max-width: 100%;
}

.row-cols-1 > * {
  flex: 0 0 100%;
  max-width: 100%;
}

.row-cols-2 > * {
  flex: 0 0 50%;
  max-width: 50%;
}

.row-cols-3 > * {
  flex: 0 0 33.33333%;
  max-width: 33.33333%;
}

.row-cols-4 > * {
  flex: 0 0 25%;
  max-width: 25%;
}

.row-cols-5 > * {
  flex: 0 0 20%;
  max-width: 20%;
}

.row-cols-6 > * {
  flex: 0 0 16.66667%;
  max-width: 16.66667%;
}

.col-auto {
  flex: 0 0 auto;
  width: auto;
  max-width: 100%;
}

.col-1 {
  flex: 0 0 8.33333%;
  max-width: 8.33333%;
}

.col-2 {
  flex: 0 0 16.66667%;
  max-width: 16.66667%;
}

.col-3 {
  flex: 0 0 25%;
  max-width: 25%;
}

.col-4 {
  flex: 0 0 33.33333%;
  max-width: 33.33333%;
}

.col-5 {
  flex: 0 0 41.66667%;
  max-width: 41.66667%;
}

.col-6 {
  flex: 0 0 50%;
  max-width: 50%;
}

.col-7 {
  flex: 0 0 58.33333%;
  max-width: 58.33333%;
}

.col-8 {
  flex: 0 0 66.66667%;
  max-width: 66.66667%;
}

.col-9 {
  flex: 0 0 75%;
  max-width: 75%;
}

.col-10 {
  flex: 0 0 83.33333%;
  max-width: 83.33333%;
}

.col-11 {
  flex: 0 0 91.66667%;
  max-width: 91.66667%;
}

.col-12 {
  flex: 0 0 100%;
  max-width: 100%;
}
	</style>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100">
				<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		        <?= $this->session->flashdata('message'); ?>
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan/Pembayaran Anda"></div>
		        <div class="col-lg-10">
		        	<div class="card">
		        		<h5 class="card-header">Form Bukti Pembayaran</h5>
		        		<div class="card-body">
		        			<form action="<?= base_url('Transaksi/'.$form) ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="kode_bayar">Kode Bayar</label>
									<input type="text" class="form-control" id="kode_bayar" name="kode_bayar" placeholder="Kode Bayar" value="<?=$kode_bayar ?>">
								</div>
								<div class="form-group">
									<label for="id_rekening_tujuan">Rekening Tujuan</label>
									<select class="form-control" id="id_rekening_tujuan" name="id_rekening_tujuan">
										<option selected disabled>Pilih Rekening</option>
										<?php foreach ($rekening_tujuan as $row): ?>
											<option value="<?= $row['id'] ?>"><?= $row['no_rekening'].' | '.$row['bank'].' | '.$row['atas_nama'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label for="rekening_pengirim">Rekening Pengirim</label>
									<input type="number" class="form-control" id="rekening_pengirim" name="rekening_pengirim" placeholder="Rekening Pengirim">
								</div>
								<div class="form-group">
									<label for="bank_pengirim">Instansi Bank</label>
									<input type="text" class="form-control" id="bank_pengirim" name="bank_pengirim" placeholder="Bank">
								</div>
								<div class="form-group">
									<label for="nama_pengirim">Nama Pengirim</label>
									<input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Pengirim">
								</div>
								<div class="form-group">
									<label for="waktu_transfer">Waktu Transfer</label>
									<div class="row">
										<div class="col">
											<input type="date" class="form-control" id="tanggal_transfer" name="tanggal_transfer">
										</div>
										<div class="col">
											<input type="time" class="form-control" id="waktu_transfer" name="waktu_transfer">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="nominal_transfer">Nominal Transfer</label>
									<input type="number" class="form-control" id="nominal_transfer" name="nominal_transfer" placeholder="Nominal Transfer">
								</div>
								<div class="form-group">
									<label for="bukti_pembayaran">Upload Bukti Transfer</label>
									<input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
								</div>
								<div class="form-group">
									<label for="catatan">Catatan</label>
									<textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan"></textarea>
								</div>
								<input type="submit" name="submit" id="submit" class="btn btn-lg btn-dark float-right" value="Kirim">
							</form>
		        		</div>
		        	</div>
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