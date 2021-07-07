	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Persyaratan"></div>
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