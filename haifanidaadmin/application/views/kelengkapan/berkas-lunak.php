	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Berkas"></div>
		<div class="flash-jamaah" data-jamaah="<?= $this->session->flashdata('flash_jamaah'); ?>"></div>
		<?= $this->session->flashdata('message'); ?>
		<form action="<?= base_url('Kelengkapan/berkasLunak/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" value="<?= $berkas_lunak['id'] ?>">
			<input type="hidden" name="id_jamaah" id="id_jamaah" value="<?= $berkas_lunak['id_jamaah'] ?>">
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Foto 3x4</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="submit_foto">
							<label class="custom-file-label" for="foto">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_foto" name="submit_foto" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['foto'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Scan KTP (PDF)</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="scan_ktp" name="scan_ktp" aria-describedby="submit_scan_ktp">
							<label class="custom-file-label" for="scan_ktp">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_scan_ktp" name="submit_scan_ktp" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['scan_ktp'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Scan KK (PDF)</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="scan_kk" name="scan_kk" aria-describedby="submit_scan_kk">
							<label class="custom-file-label" for="scan_kk">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_scan_kk" name="submit_scan_kk" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['scan_kk'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Scan Rekam Medis (PDF)</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="scan_rekam_medis" name="scan_rekam_medis" aria-describedby="submit_scan_rekam_medis">
							<label class="custom-file-label" for="scan_rekam_medis">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_scan_rekam_medis" name="submit_scan_rekam_medis" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['scan_rekam_medis'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Scan Paspor (PDF)</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="scan_paspor" name="scan_paspor" aria-describedby="submit_scan_paspor">
							<label class="custom-file-label" for="scan_paspor">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_scan_paspor" name="submit_scan_paspor" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['scan_paspor'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="card w-75 mb-4">
				<div class="card-body">
					<h5 class="card-title">Scan Buku Nikah (PDF)</h5>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="scan_buku_nikah" name="scan_buku_nikah" aria-describedby="submit_scan_buku_nikah">
							<label class="custom-file-label" for="scan_buku_nikah">Choose file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="submit" id="submit_scan_buku_nikah" name="submit_scan_buku_nikah" value="Submit">Submit</button>
						</div>
						<?php if ($berkas_lunak['scan_buku_nikah'] == ''): ?>
							<i class="fas fa-fw fa-times text-danger" style="font-size: 28pt;"></i>
						<?php else: ?>
							<i class="fas fa-fw fa-check text-success" style="font-size: 28pt;"></i>
						<?php endif ?>
					</div>
				</div>
			</div>
		</form>
		
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->