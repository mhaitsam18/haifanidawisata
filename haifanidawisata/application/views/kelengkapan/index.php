<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Kelengkapan</li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
			<?= $this->session->flashdata('message'); ?>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kelengkapan"></div>
			<?php foreach ($jamaah_by_paket as $row): ?>
				<div class="card mb-3">
					<div class="card-header">
						Paket : <?= $row['nama_paket'] ?>
					</div>
					<div class="card-body">
						<h5 class="card-title">Keberangkatan : <?= date('d F Y', strtotime($row['tanggal_keberangkatan'])) ?></h5>
						<?php 
						$this->db->order_by('id', 'DESC');
						$jamaah = $this->db->get_where('jamaah', ['id_pemesan' => $user['id'], 'id_paket_wisata' => $row['id_paket_wisata']])->result_array();
						$no = 0;
						 ?>
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Waktu Pemesanan</th>
									<th scope="col">Nama Jama'ah</th>
									<th scope="col">No KTP</th>
									<th scope="col">No Paspor</th>
									<th scope="col">Sisa Tagihan</th>
									<th scope="col">Status</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jamaah as $j): ?>
									<?php 
									if ($j['status']=='Sudah Lunas') {
										$bg_color = 'table-success';
									} elseif ($j['status']=='Pesanan dibatalkan') {
										$bg_color = 'table-danger';
									} else{
										$bg_color = '';
									}
									 ?>
									<tr class="<?= $bg_color ?>">
										<th scope="row"><?= ++$no; ?></th>
										<td><?= date('j F Y H:i:s',strtotime($j['waktu_pemesanan'])); ?></td>
										<td><?= $j['nama_lengkap'] ?></td>
										<td><?= $j['no_ktp'] ?></td>
										<td><?= $j['no_paspor'] ?></td>
										<td>Rp. <?= number_format($j['total_tagihan']-$j['total_bayar'],2,',','.'); ?></td>
										<td><?= $j['status'] ?></td>
										<td>
											<?php if ($j['status'] != 'Sudah Lunas'): ?>
												<a href="<?= base_url('Transaksi/pembayaranPaket/'.$j['kode_bayar']) ?>" class="badge badge-danger">Pembayaran</a>
											<?php endif ?>
											<a href="<?= base_url('Kelengkapan/persyaratan/'.$j['id']) ?>" class="badge badge-warning">Persyaratan</a>
											<!-- <a href="<?= base_url('Kelengkapan/uploadBerkas/'.$j['id']) ?>" class="badge badge-success">Upload Berkas</a> -->
											<a href="<?= base_url('Kelengkapan/kelengkapan/'.$j['id']) ?>" class="badge badge-info">Kelengkapan Fasilitas yang diterima</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>