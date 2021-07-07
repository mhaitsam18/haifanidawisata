    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan/Pembayaran Anda"></div>
        <div class="col-lg-10">
        	<div class="card">
        		<h5 class="card-header">Form Bukti Pembayaran</h5>
        		<div class="card-body">
        			<form action="<?= base_url('Member/'.$form) ?>" method="post" enctype="multipart/form-data">
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content