<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Riwayat Pembayaran"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Riwayat Pembayaran Paket Wisata</h3>
			<table class="table table-responsive" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Pelanggan</th>
						<th scope="col">Kode Bayar</th>
						<th scope="col">Rekening Tujuan</th>
						<th scope="col">Rekening Pengirim</th>
						<th scope="col">Bank Pengirim</th>
						<th scope="col">Atas Nama Pengirim</th>
						<th scope="col">Waktu Transfer</th>
						<th scope="col">Nominal Transfer</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Catatan</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; ?>
					<?php foreach ($bukti_pembayaran_paket as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['name'] ?></td>
							<td><?= $row['kode_bayar'] ?></td>
							<td><?= $row['no_rekening'] ?></td>
							<td><?= $row['rekening_pengirim'] ?></td>
							<td><?= $row['bank_pengirim'] ?></td>
							<td><?= $row['nama_pengirim'] ?></td>
							<td><?= $row['waktu_transfer'] ?></td>
							<td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
							<td><img src="<?= base_url('assets/img/bukti_pembayaran/').$row['bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 120px;"></td>
							<td><?= $row['catatan'] ?></td>
							<td><?= $row['sbt'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-lg-12">
			<h3 class="h3 mt-5">Riwayat Pembayaran Produk</h3>
			<table class="table table-responsive" style="background-color: white;" id="dataTable2">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Pelanggan</th>
						<th scope="col">Kode Bayar</th>
						<th scope="col">Rekening Tujuan</th>
						<th scope="col">Rekening Pengirim</th>
						<th scope="col">Bank Pengirim</th>
						<th scope="col">Atas Nama Pengirim</th>
						<th scope="col">Waktu Transfer</th>
						<th scope="col">Nominal Transfer</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Catatan</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; ?>
					<?php foreach ($bukti_transfer as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['name'] ?></td>
							<td><?= $row['kode_bayar'] ?></td>
							<td><?= $row['no_rekening'] ?></td>
							<td><?= $row['rekening_pengirim'] ?></td>
							<td><?= $row['bank_pengirim'] ?></td>
							<td><?= $row['nama_pengirim'] ?></td>
							<td><?= $row['waktu_transfer'] ?></td>
							<td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
							<td><img src="<?= base_url('assets/img/bukti_pembayaran/').$row['bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 120px;"></td>
							<td><?= $row['catatan'] ?></td>
							<td><?= $row['sbt'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

    </div>
</div>