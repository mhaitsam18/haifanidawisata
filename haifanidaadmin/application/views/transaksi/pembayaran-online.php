<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Status Pembayaran"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Pembayaran Customer</h3>
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
						<th scope="col" style="max-width: 150px; min-width: 90px;">Aksi</th>
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
							<td>
								<a href="<?= base_url('assets/img/bukti_pembayaran/').$row['bukti_pembayaran'] ?>" title="<?= $row['bukti_pembayaran'] ?>">
									<img src="<?= base_url('assets/img/bukti_pembayaran/').$row['bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 120px;">
								</a>
							</td>
							<td><?= $row['catatan'] ?></td>
							<td><?= $row['sbt'] ?></td>
							<td>
								<?php if ($row['sbt'] == 'Belum dikonfirmasi'): ?>
									<a href="<?= base_url('Transaksi/updateStatusPembayaran/').$row['idbt'].'/tidak valid' ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Tidak Valid</a>
									<a href="<?= base_url('Transaksi/updateStatusPembayaran/').$row['idbt'].'/valid' ?>" class="badge badge-success" onclick="return confirm('Are you sure?');">Valid</a>
									<a href="<?= base_url('Transaksi/updateStatusPembayaran/').$row['idbt'].'/kurang' ?>" class="badge badge-warning" onclick="return confirm('Are you sure?');">Kurang</a>
								<?php else: ?>
									<span class="badge badge-secondary">Sudah dikonfirmasi</span>
								<?php endif ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
    </div>
</div>