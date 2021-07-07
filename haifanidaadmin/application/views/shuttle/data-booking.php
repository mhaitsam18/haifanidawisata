	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Status Keberangkatan"></div>
		<div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Booking Shuttle</div>
            <div class="card-body">
                <a href="<?php echo base_url('Shuttle/deleteAllPemesananTiket') ?>" class="btn btn-info tombol-hapus" data-hapus="Seluruh Data Booking">Clean Up</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Book ID</td>
                                <td>Nama Pemesan</td>
                                <td>Nama</td>
                                <td>Nomor HandPhone</td>
                                <td>Email</td>
                                <td>Waktu Pemesanan</td>
                                <td>Status</td>
                                <td>Kode Tiket</td>
                                <td>Keberangkatan</td>
                                <td>Tujuan</td>
                                <td>Jadwal</td>
                                <td>Harga</td>
                                <td>Diskon</td>
                                <td>Total Bayar</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            foreach ($pemesanan_tiket as $row) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['book_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['no_hp']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['waktu_pemesanan']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['kode_tiket']; ?></td>
                                    <td><?php echo $row['keberangkatan']; ?></td>
                                    <td><?php echo $row['tujuan']; ?></td>
                                    <td><?php echo $row['jadwal']; ?></td>
                                    <td><?php echo "Rp. ".number_format($row['harga']).".00"; ?></td>
                                    <td><?php echo ($row['diskon']*100)."%"; ?></td>
                                    <td><?php echo "Rp. ".number_format($row['harga']-($row['harga']*$row['diskon'])).".00"; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-outline-primary" href="<?php echo base_url("Shuttle/updateStatusPemesananTiket/$row[book_id]/$row[kode_tiket]/Berangkat"); ?>">Departed</a>
                                        <a type="button" class="btn btn-outline-danger" href="<?php echo base_url("Shuttle/updateStatusPemesananTiket/$row[book_id]/$row[kode_tiket]/Batal"); ?>">Cancel</a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
	<!-- /.container-fluid -->
</div>