<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Kelengkapan Fasilitas</li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
			<?= $this->session->flashdata('message'); ?>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Status Kelengkapan"></div>
			<h5>Nama Lengkap : <?= $jamaah['nama_lengkap']; ?></h5>
			<div class="row">
				<div class="col-lg-6">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Kelengkapan</th>
								<th scope="col">Status Fasilitas</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
							<?php foreach ($kelengkapan as $k): ?>
								<tr>
									<th scope="row"><?= $no ?></th>
									<td><?= $k['kelengkapan'] ?></td>
									<?php if (cek_kelengkapan2($jamaah['id'], $k['id']) == 1): ?>
										<td class="bg-success">
											Sudah diterima
										</td>
									<?php else: ?>
										<td class="bg-warning">
											Belum diterima
										</td>
									<?php endif ?>
									<!-- <td>
										<div class="form-check">
											<input class="form-check-input kelengkapan_cek" type="checkbox" <?= cek_kelengkapan($jamaah['id'], $k['id']) ?> data-jamaah="<?= $jamaah['id'] ?>" data-kelengkapan="<?= $k['id'] ?>" id="kelengkapan">
											<label class="form-check-label" for="kelengkapan">diterima</label>
										</div>
									</td> -->
								</tr>
								<?php $no++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>