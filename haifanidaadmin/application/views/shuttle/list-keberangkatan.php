<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No. </th>
                <th>ID Tiket</th>
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
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>