<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Pemesanan Offline</h3>
			<table class="table table-bordered" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Kode Bayar</th>
						<th scope="col">Nama Kasir</th>
						<th scope="col">Nama Produk</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Harga</th>
						<th scope="col">Sub Total</th>
						<th scope="col">Waktu Transaksi</th>
						<th scope="col">Catatan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; ?>
					<?php foreach ($transaksi as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['kode_bayar'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['nama_produk'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td><?= 'Rp.'.number_format(($row['sub_total_harga']/$row['jumlah']),2,',','.') ?></td>
							<td><?= 'Rp.'.number_format($row['sub_total_harga'],2,',','.') ?></td>
							<td><?= $row['waktu_transaksi'] ?></td>
							<td><?= $row['catatan'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->