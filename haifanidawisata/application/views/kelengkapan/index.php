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
			<?php foreach ($jamaah_by_paket as $row) : ?>
				<div class="card mb-3">
					<div class="card-header">
						Paket : <?= $row['nama_paket'] ?>
					</div>
					<div class="card-body">
						<h5 class="card-title">Keberangkatan : <?= date('d F Y', strtotime($row['tanggal_keberangkatan'])) ?></h5>
						<?php
						$this->db->select("DATE_FORMAT(waktu_pemesanan,'%Y-%m-%d') AS waktu_pemesanan,kode_bayar,sum(total_tagihan) AS total_tagihan,total_bayar,status");
						$this->db->group_by(['kode_bayar', "DATE_FORMAT(waktu_pemesanan,'%Y-%m-%d')"]);
						$this->db->order_by('id', 'DESC');
						$jamaah = $this->db->get_where('jamaah', ['id_pemesan' => $user['id'], 'id_paket_wisata' => $row['id_paket_wisata']])->result_array();
						$no = 0;
						?>
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Waktu Pemesanan</th>
									<th scope="col">Kode Bayar</th> <!-- new -->
									<!-- <th scope="col">Nama Jama'ah</th> -->
									<!-- <th scope="col">No KTP</th>
									<th scope="col">No Paspor</th> -->
									<th scope="col">Sisa Tagihan</th>
									<th scope="col">Status</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jamaah as $j) : ?>
									<?php
									if ($j['status'] == 'Sudah Lunas') {
										$bg_color = 'table-success';
									} elseif ($j['status'] == 'Pesanan dibatalkan') {
										$bg_color = 'table-danger';
									} else {
										$bg_color = '';
									}
									?>
									<tr class="<?= $bg_color ?>">
										<th scope="row"><?= ++$no; ?></th>
										<td><?= date('j F Y', strtotime($j['waktu_pemesanan'])); ?></td>
										<td><?= $j['kode_bayar'] ?></td>
										<!-- <td><?= $j['nama_lengkap'] ?></td>
										<td><?= $j['no_ktp'] ?></td>
										<td><?= $j['no_paspor'] ?></td> -->
										<td>Rp. <?= number_format($j['total_tagihan'] - $j['total_bayar'], 2, ',', '.'); ?></td>
										<!-- <td><?= $j['total_tagihan'] ?></td>
										<td><?= $j['total_bayar'] ?></td> -->
										<td><?= $j['status'] ?></td>
										<td>
											<?php if ($j['status'] != 'Sudah Lunas') : ?>
												<a href="<?= base_url('Transaksi/pembayaranPaket/' . $j['kode_bayar']) ?>" class="badge badge-danger">Pembayaran</a>
											<?php endif ?>
											<button data-href="<?= base_url('Transaksi/AllJamaah/' . $j['kode_bayar']) ?>" class="badge badge-secondary" id="detail_jamaah">Detail Jama'ah</a>
												<!-- <a href="<?= base_url('Kelengkapan/persyaratan/' . $j['id']) ?>" class="badge badge-warning">Persyaratan</a> -->
												<!-- <a href="<?= base_url('Kelengkapan/uploadBerkas/' . $j['id']) ?>" class="badge badge-success">Upload Berkas</a> -->
												<!-- <a href="<?= base_url('Kelengkapan/kelengkapan/' . $j['id']) ?>" class="badge badge-info">Kelengkapan Fasilitas yang diterima</a> -->
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<br>
			<?php endforeach ?>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="checkoutModalLabel">Detail Data Jamaah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover" id="dataTable">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Waktu Pemesanan</th>
							<!-- <th scope="col">Kode Bayar</th> new -->
							<th scope="col">Nama Jama'ah</th>
							<th scope="col">No KTP</th>
							<th scope="col">No Paspor</th>
							<!-- <th scope="col">Sisa Tagihan</th> -->
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody id="tbody_data_jamaah">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '#detail_jamaah', function() {
		event.preventDefault();
		var _url = $(this).data('href');
		$.ajax({
			type: "GET",
			url: _url,
			dataType: 'json',
			success: function(response) {
				var html = '';
				var i = 1;
				var _bg = '';
				response.forEach(element => {
					if (element.status == 'Sudah Lunas') {
						_bg = 'table-success';
					} else if (element.status == 'Pesanan dibatalkan') {
						_bg = 'table-danger';
					}
						html += `
						<tr class="${_bg}">
							<td scope="row">${i}</td>
							<td>${element.waktu_pemesanan}</td>
							<td>${element.nama_lengkap}</td>
							<td>${element.no_ktp}</td>
							<td>${element.no_paspor}</td>
							<td>${element.status}</td>
							<td>
								<a href="<?= base_url('Kelengkapan/persyaratan/') ?>${element.id}" class="badge badge-warning">Persyaratan</a>
								<a href="<?= base_url('Kelengkapan/kelengkapan/') ?>${element.id}" class="badge badge-info">Kelengkapan Fasilitas yang diterima</a>
							</td>
						</tr>
					`;
					i++;
				});
				$("#tbody_data_jamaah").html(html);
			}
		});
		$("#checkoutModal").modal('show');
	});
</script>