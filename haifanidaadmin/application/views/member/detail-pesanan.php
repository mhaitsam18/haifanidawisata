<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Detail Pemesanan"></div>
        <div class="row">
        	<div class="col-lg-12">
        		<div class="card">
        			<div class="card-header">
        				Detail Pengiriman
        			</div>
        			<div class="card-body">
        				<div class="row">
                            <label class="col-sm-2">
                                Nama Customer
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['name'] ?>
                            </div>
                            <label class="col-sm-2">
                                Status Pemesanan
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['status'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Kode Bayar
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['kode_bayar'] ?>
                            </div>
                            <label class="col-sm-2">
                                Nama Penerima
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['nama_penerima'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Nomor Hp. penerima
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['no_hp_penerima'] ?>
                            </div>
                            <label class="col-sm-2">
                                Alamat Penerima
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['alamat_penerima'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Kurir
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['kurir'] ?>
                            </div>
                            <label class="col-sm-2">
                                Total Harga
                            </label>
                            <div class="col-sm-4">
                                <?= 'Rp. '.number_format($checkout['total_harga'],2,',','.') ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Waktu Pemesanan
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['waktu_pemesanan'] ?>
                            </div>
                            <label class="col-sm-2">
                                Metode Bayar
                            </label>
                            <div class="col-sm-4">
                                <?= $checkout['metode_bayar'] ?>
                            </div>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Detail Pesanan</h3>
			<table class="table table-bordered" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Gambar</th>
						<th scope="col">Kode Pesanan</th>
						<th scope="col">Nama Produk</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Harga</th>
						<th scope="col">Sub Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; $total = 0; ?>
					<?php foreach ($pesanan as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><img src="<?= base_url('assets/img/produk/').$row['gambar'] ?>" class="img-thumbnail" style="width: 150px;"></td>
							<td><?= $row['kode_pesanan'] ?></td>
							<td><?= $row['nama_produk'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td align="left"><?= 'Rp.'.number_format($row['harga_jual'],2,',','.') ?></td>
							<td align="left"><?= 'Rp.'.number_format($row['sub_total_harga'],2,',','.') ?></td>
						</tr>
						<?php $total += $row['sub_total_harga']; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right"><b>Total : </b></td>
						<td align="left"><b><?= 'Rp.'.number_format($total,2,',','.') ?></b></td>
					</tr>
				</tfoot>
			</table>
			<a href="<?= base_url($this->uri->segment(1).'/online') ?>" class="btn btn-sm btn-primary float-right">Kembali</a>
		</div>
        <div class="col-lg-12">
            <h3 class="h3 mt-5">Pembayaran</h3>
            <table class="table table-responsive" style="background-color: white;">
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->