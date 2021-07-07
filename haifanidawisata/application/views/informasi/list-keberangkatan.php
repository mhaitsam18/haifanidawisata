<div class="table-responsive">
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No. </th>
                <th>Keberangkatan</th>
                <th>Tujuan</th>
                <th>Jadwal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach ($tiket_shuttle as $row) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['keberangkatan']; ?></td>
                    <td><?php echo $row['tujuan']; ?></td>
                    <td><?php echo $row['jadwal']; ?></td>
                </tr>
                <?php
                $no++;
            } ?>
        </tbody>
    </table>
</div>