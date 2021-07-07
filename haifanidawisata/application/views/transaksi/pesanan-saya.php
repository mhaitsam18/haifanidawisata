<!--content body start-->
<div id="content_wrapper"> 
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Pesanan Saya</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100">
				<!-- Page Heading -->
		        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Bukti Pembayaran Terkirim / Status Pemesanan"></div>
		        <?= $this->session->flashdata('message'); ?>
		        <div class="col-lg-12">
					<h3 class="h3 mt-5">Pesanan Saya</h3>
					<table class="table table-bordered" style="background-color: white;" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Kode Bayar</th>
								<th scope="col">Nama Penerima</th>
								<th scope="col">Total</th>
								<th scope="col">Metode Bayar</th>
								<th scope="col">Status</th>
								<th scope="col" style="max-width: 150px; min-width: 90px;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; ?>
							<?php foreach ($checkout as $row): ?>
								<tr>
									<th scope="row"><?= ++$no ?></th>
									<td><?= $row['kode_bayar'] ?></td>
									<td><?= $row['nama_penerima'] ?></td>
									<td><?= 'Rp.'.number_format($row['total_harga'],2,',','.') ?></td>
									<td><?= $row['metode_bayar'] ?></td>
									<td><?= $row['status'] ?></td>
									<td>
										<?php if ($row['status'] == 'Belum dibayar'): ?>
											<a href="<?= base_url('Transaksi/updateStatusPesanan/').$row['idc'].'/dibatalkan' ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Batalkan</a>
											<a href="<?= base_url('Transaksi/pembayaran/').$row['kode_bayar'] ?>" class="badge badge-success">Bayar</a>
										<?php endif ?>
										<a href="<?= base_url('Transaksi/detailPesanan/').$row['idc'] ?>" class="badge badge-primary">Detail</a>
										<?php if ($row['status'] == 'Pesanan dikirim'): ?>
											<a href="<?= base_url('Transaksi/updateStatusPesanan/').$row['idc'].'/diterima' ?>" class="badge badge-info tombol-terima">Pesanan diterima</a>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- col-lg-9-end -->
			</div>
			<!--  row main -->
		</div>
		<!-- container --> 
	</div>
</div>
<!-- main wrapper -->