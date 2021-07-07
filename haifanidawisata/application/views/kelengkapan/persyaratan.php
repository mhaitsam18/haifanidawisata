<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Persyaratan</li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
			<?= $this->session->flashdata('message'); ?>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Persyaratan"></div>
			<div class="card">
				<h5 class="card-header">Persyaratan</h5>
				<div class="card-body">
					<p class="card-text"><i class="fa fa-check text-success"></i> = Sudah</p>
					<p class="card-text"><i class="fa fa-times text-danger"></i> = Belum</p>
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
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['kk']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['foto34']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['foto46']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['paspor']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['visa']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['biometrik']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['suntik_vaksin']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['manasik']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									<?php if ($row['rekam_medis']==0): ?>
										<td><i class="fa fa-times text-danger"></i></td>
									<?php else: ?>
										<td><i class="fa fa-check text-success"></i></td>
									<?php endif ?>
									
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<a href="<?= base_url('Lainnya/hubungiKami') ?>" class="btn btn-link float-right"><i class="fa fa-phone"></i> Hubungi Kami</a>
				</div>
			</div>
		</div>
	</div>
</div>