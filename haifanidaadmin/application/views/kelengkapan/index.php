	<!-- Begin Page Content -->
	<div class="container-fluid">
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
					$jamaah = $this->db->get_where('jamaah', ['id_pemesan' => $user['id'], 'id_paket_wisata' => $row['id_paket_wisata']])->result_array();
					$no = 0;
					 ?>
					<table class="table table-hover" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
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
									<td><?= $j['nama_lengkap'] ?></td>
									<td><?= $j['no_ktp'] ?></td>
									<td><?= $j['no_paspor'] ?></td>
									<td>Rp. <?= number_format($j['total_tagihan']-$j['total_bayar'],2,',','.'); ?></td>
									<td><?= $j['status'] ?></td>
									<td>
										<a href="<?= base_url('Member/pembayaranPaket/'.$j['kode_bayar']) ?>" class="badge badge-danger">Pembayaran</a>
										<a href="<?= base_url('Kelengkapan/persyaratan/'.$j['id']) ?>" class="badge badge-warning">Persyaratan</a>
										<a href="<?= base_url('Kelengkapan/berkasLunak/'.$j['id']) ?>" class="badge badge-success">Upload Berkas</a>
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
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->