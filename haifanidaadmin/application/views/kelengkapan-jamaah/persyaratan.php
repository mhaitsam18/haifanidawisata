	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Status Persyaratan"></div>
		<div class="card">
			<h5 class="card-header">Persyaratan</h5>
			<div class="card-body">
				<p class="card-text"><i class="fas fa-check text-success"></i> = Sudah</p>
				<p class="card-text"><i class="fas fa-times text-danger"></i> = Belum</p>
				<table class="table table-bordered table-responsive">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Jama'ah</th>
							<th scope="col">Paket</th>
							<th scope="col">Tanggal Keberangkatan</th>
							<th scope="col">KTP</th>
							<th scope="col">KK</th>
							<th scope="col" width="300">Foto 3 x 4</th>
							<th scope="col" width="300">Foto 4 x 6</th>
							<th scope="col">Paspor</th>
							<th scope="col">Visa</th>
							<th scope="col">Biometrik</th>
							<th scope="col">Suntik Vaksin</th>
							<th scope="col">Manasik</th>
							<th scope="col">Rekam Medis</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; ?>
						<?php foreach ($persyaratan as $row): ?>
							<tr>
								<th scope="row"><?= ++$no; ?></th>
								<td><?= $row['nama_lengkap']; ?></td>
								<td><?= $row['nama_paket']; ?></td>
								<td><?= date('d F Y', strtotime($row['tanggal_keberangkatan'])) ; ?></td>
								<?php if ($row['ktp']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['kk']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['foto34']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['foto46']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['paspor']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['visa']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['biometrik']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['suntik_vaksin']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['manasik']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<?php if ($row['rekam_medis']==0): ?>
									<td><i class="fas fa-times text-danger"></i></td>
								<?php else: ?>
									<td><i class="fas fa-check text-success"></i></td>
								<?php endif ?>
								<td><a href="" class="badge badge-success updatePersyaratanModalButton" data-toggle="modal" data-target="#newPersyaratanModal" data-id="<?=$row['pid']?>">Edit</a></td>
								
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="<?= base_url('Lainnya/hubungi') ?>" class="btn btn-link float-right"><i class="fas fa-phone-alt"></i> Hubungi Kami</a>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<div class="modal fade" id="newPersyaratanModal" tabindex="-1" aria-labelledby="newPersyaratanModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="newPersyaratanModalLabel">Tambah Persyaratan</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="<?= base_url('KelengkapanJamaah/updatePersyaratan') ?>" method="post">
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="id_jamaah" id="id_jamaah">
				<div class="form-group">
					<label for="ktp">Kartu Tanda Penduduk</label>
					<select class="form-control" name="ktp" id="ktp">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="kk">Kartu Keluarga</label>
					<select class="form-control" name="kk" id="kk">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="foto34">Foto 3 x 4</label>
					<select class="form-control" name="foto34" id="foto34">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="foto46">Foto 4 x 6</label>
					<select class="form-control" name="foto46" id="foto46">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="paspor">Passport</label>
					<select class="form-control" name="paspor" id="paspor">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="visa">Manifes VISA</label>
					<select class="form-control" name="visa" id="visa">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="biometrik">Biometrik</label>
					<select class="form-control" name="biometrik" id="biometrik">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="suntik_vaksin">Suntik Vaksin</label>
					<select class="form-control" name="suntik_vaksin" id="suntik_vaksin">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				<div class="form-group">
					<label for="manasik">Manasik</label>
					<select class="form-control" name="manasik" id="manasik">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
						<option value="2">Tidak mengikuti Manasik</option>
					</select>
				</div>
				<div class="form-group">
					<label for="rekam_medis">Rekam Medis</label>
					<select class="form-control" name="rekam_medis" id="rekam_medis">
						<option value="">Pilih</option>
						<option value="1">Sudah</option>
						<option value="0">Belum</option>
					</select>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
</div>

