	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Tiket"></div>
		<?= $this->session->flashdata('message'); ?>
		<div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Tabel Tiket</div>
            <div class="card-body">
            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tiketShuttleModal">Tambah Data Tiket</button>
                <div class="form-group" style="width: 20%;">
                    <label for="point">Point Departure</label>
                    <select class="custom-select" id="pilih" name="keberangkatan" id="keberangkatan">
                        <option value="">---Pilih---</option>
                        <?php 
                        foreach ($keberangkatan as $row) {
                            $keberangkatan = $row['keberangkatan'];
                            ?>
                            <option value="<?= "$keberangkatan"; ?>"><?= "$keberangkatan"; ?></option>
                            <?php
                        }
                         ?>
                    </select>
                </div>
                Make it All <a href="<?php echo base_url("Shuttle/updateStatusAllTiket/Tersedia"); ?>" class="btn btn-outline-info">Available</a>
                <a href="<?php echo base_url("Shuttle/updateStatusAllTiket/Tidak Tersedia"); ?>" class="btn btn-outline-warning">Not Available</a>
                <div id="ctn">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Kode Tiket</th>
                                    <th>Keberangkatan</th>
                                    <th>Tujuan</th>
                                    <th>Jadwal</th>
                                    <th>Harga</th>
                                    <th>Nomor Kursi</th>
                                    <th>Ketersediaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($tiket_shuttle as $row) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['kode_tiket']; ?></td>
                                        <td><?php echo $row['keberangkatan']; ?></td>
                                        <td><?php echo $row['tujuan']; ?></td>
                                        <td><?php echo $row['jadwal']; ?></td>
                                        <td><?php echo "Rp. ".number_format($row['harga']); ?></td>
                                        <td><?php echo $row['no_kursi']; ?></td>
                                        <td><?php echo $row['ketersediaan']; ?></td>
                                        <td>
                                            <?php if ($row['ketersediaan']=="Tersedia"): ?>
                                                <a type="button" class="btn btn-outline-primary" href="<?php echo base_url("Shuttle/updateStatusTiket/$row[kode_tiket]/Tidak Tersedia"); ?>">Book</a>
                                            <?php elseif ($row['ketersediaan']=="Tidak Tersedia"): ?>    
                                                <a type="button" class="btn btn-outline-danger" href="<?php echo base_url("Shuttle/updateStatusTiket/$row[kode_tiket]/Tersedia"); ?>">Cancel</a>
                                            <?php endif ?>
                                            <!-- <a type="button" class="btn btn-outline-primary" href="<?php echo base_url("Shuttle/edit_tiket?kode_tiket=$row[kode_tiket]"); ?>">Edit</a>
                                            <a type="button" class="btn btn-outline-danger" href="<?php echo base_url("Shuttle/hapus_tiket?kode_tiket=$row[kode_tiket]"); ?>">Hapus</a> -->
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
	</div>
	<!-- /.container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade" id="tiketShuttleModal" tabindex="-1" aria-labelledby="tiketShuttleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tiketShuttleModalLabel">Tambah Tiket Shuttle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('Shuttle/'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label class="small mb-1" for="inputKodeTiket">Kode Tiket</label>
						<input class="form-control py-4" id="inputKodeTiket" type="text"  placeholder="Enter Ticket Code" name="kode_tiket" id="kode_tiket" required />
					</div>
					<div class="form-group">
						<label class="small mb-1" for="inputKeberangkatan">Keberangkatan</label>
						<input class="form-control py-4" id="inputKeberangkatan" type="text" placeholder="Enter Departure" name="keberangkatan" id="keberangkatan" required />
					</div>
					<div class="form-group">
						<label class="small mb-1" for="inputTujuan">Tujuan</label>
						<input class="form-control py-4" id="inputTujuan" type="text" placeholder="Enter Purpose" name="tujuan" id="tujuan" required />
					</div>
					<div class="form-group">
						<label class="small mb-1" for="inputJadwal">Jadwal</label>
						<input class="form-control py-4" id="inputJadwal" type="time"  placeholder="Enter Schedule" name="jadwal" id="jadwal" />
					</div>
					<div class="form-group">
						<label class="small mb-1" for="inputHarga">Harga</label>
						<input class="form-control py-4" id="inputHarga" type="number"  placeholder="Enter Price" name="harga" id="harga" />
					</div>
					<div class="form-group">
						<label class="small mb-1" for="inputSeat">Nomor Kursi</label>
						<input class="form-control py-4" id="inputSeat" type="number"  placeholder="Enter Seat" name="no_kursi" id="no_kursi" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
    // ambil elements yg di buutuhkan
    var keyword = document.getElementById('pilih');

    var container = document.getElementById('ctn');

    // tambahkan event ketika keyword ditulis

    keyword.addEventListener('change', function () {


        //buat objek ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= base_url('Shuttle/list_keberangkatan/') ?>' + keyword.value, true);
        xhr.send();
    })
</script>
<!-- End of Main Content -->