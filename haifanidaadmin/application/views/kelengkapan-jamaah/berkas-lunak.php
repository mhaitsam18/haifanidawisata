	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h-3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Berkas"></div>
		<div class="card">
			<h5 class="card-header">Berkas</h5>
			<div class="card-body">
				<p class="card-text"><i class="fas fa-file-image"></i> = Download Image</p>
				<p class="card-text"><i class="fas fa-file-pdf text-danger"></i> = Download PDF</p>
				<table class="table table-bordered table-responsive" id="dataTable">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Jama'ah</th>
							<th scope="col">Nama Pemesan</th>
							<th scope="col">Paket</th>
							<th scope="col">Tanggal Keberangkatan</th>
							<th scope="col">Foto</th>
							<th scope="col">Scan KTP</th>
							<th scope="col">Scan KK</th>
							<th scope="col">Scan Paspor</th>
							<th scope="col">Scan Rekam Medis</th>
							<th scope="col">Scan Buku Nikah</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; ?>
						<?php foreach ($berkas_lunak as $row): ?>
							<tr>
								<th scope="row"><?= ++$no; ?></th>
								<td><?= $row['nama_lengkap']; ?></td>
								<td><?= $row['name']; ?></td>
								<td><?= $row['nama_paket']; ?></td>
								<td><?= date('d F Y', strtotime($row['tanggal_keberangkatan'])) ; ?></td>
								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[foto]")){
                        			$base_foto = base_url("assets/img/persyaratan/$row[foto]");
                        		}else{
                        			$base_foto = base_url2("assets/img/persyaratan/$row[foto]");
                        		}
                        		?>
								<?php if ($row['foto']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['foto'], -3) =='pdf'): ?>
									<td><a title="<?= $row['foto'] ?>" href="<?= $base_foto ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['foto'] ?>" href="<?= $base_foto ?>"><i class="fas fa-file-image"></i></a></td>
								<?php endif ?>

								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[scan_ktp]")){
                        			$base_scan_ktp = base_url("assets/img/persyaratan/$row[scan_ktp]");
                        		}else{
                        			$base_scan_ktp = base_url2("assets/img/persyaratan/$row[scan_ktp]");
                        		}
                        		?>
								<?php if ($row['scan_ktp']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['scan_ktp'], -3) =='pdf'): ?>
									<td><a title="<?= $row['scan_ktp'] ?>" href="<?= $base_scan_ktp ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['scan_ktp'] ?>" href="<?= $base_scan_ktp ?>"><i class="fas fa-file-image"></i></a></td>
								<?php endif ?>
								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[scan_kk]")){
                        			$base_scan_kk = base_url("assets/img/persyaratan/$row[scan_kk]");
                        		}else{
                        			$base_scan_kk = base_url2("assets/img/persyaratan/$row[scan_kk]");
                        		}
                        		?>
								<?php if ($row['scan_kk']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['scan_kk'], -3) =='pdf'): ?>
									<td><a title="<?= $row['scan_kk'] ?>" href="<?= $base_scan_kk ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['scan_kk'] ?>" href="<?= $base_scan_kk ?>"><i class="fas fa-file-image"></i></a></td>
								<?php endif ?>

								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[scan_paspor]")){
                        			$base_scan_paspor = base_url("assets/img/persyaratan/$row[scan_paspor]");
                        		}else{
                        			$base_scan_paspor = base_url2("assets/img/persyaratan/$row[scan_paspor]");
                        		}
                        		?>
								<?php if ($row['scan_paspor']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['scan_paspor'], -3) =='pdf'): ?>
									<td><a title="<?= $row['scan_paspor'] ?>" href="<?= $base_scan_paspor ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['scan_paspor'] ?>" href="<?= $base_scan_paspor ?>"><i class="fas fa-file-image"></i></a></td>
								<?php endif ?>

								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[scan_rekam_medis]")){
                        			$base_scan_rekam_medis = base_url("assets/img/persyaratan/$row[scan_rekam_medis]");
                        		}else{
                        			$base_scan_rekam_medis = base_url2("assets/img/persyaratan/$row[scan_rekam_medis]");
                        		}
                        		?>
								<?php if ($row['scan_rekam_medis']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['scan_rekam_medis'], -3) =='pdf'): ?>
									<td><a title="<?= $row['scan_rekam_medis'] ?>" href="<?= $base_scan_rekam_medis ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['scan_rekam_medis'] ?>" href="<?= $base_scan_rekam_medis ?>"><i class="fas fa-file-image"></i></a></td>
								<?php endif ?>

								<?php 
                        		if(file_exists("./assets/img/persyaratan/$row[scan_buku_nikah]")){
                        			$base_scan_buku_nikah = base_url("assets/img/persyaratan/$row[scan_buku_nikah]");
                        		}else{
                        			$base_scan_buku_nikah = base_url2("assets/img/persyaratan/$row[scan_buku_nikah]");
                        		}
                        		?>
								<?php if ($row['scan_buku_nikah']==''): ?>
									<td>File Tidak Tersedia</td>
								<?php elseif (substr($row['scan_buku_nikah'], -3) =='pdf'): ?>
									<td><a title="<?= $row['scan_buku_nikah'] ?>" href="<?= $base_scan_buku_nikah ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
								<?php else: ?>
									<td><a title="<?= $row['scan_buku_nikah'] ?>" href="<?= $base_scan_buku_nikah ?>"><i class="fas fa-file-image"></i></a></td>
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