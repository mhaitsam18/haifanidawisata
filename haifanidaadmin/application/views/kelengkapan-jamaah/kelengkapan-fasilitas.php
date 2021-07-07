<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kelengkapan"></div>
        <div class="row">
        	<div class="col-lg-12">
        		<table class="table table-hover table-responsive">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
                            <th scope="col">Nama Jama'ah</th>
                            <th scope="col">Paket</th>
                            <th scope="col">Tanggal Keberangkatan</th>
                            <?php foreach ($kelengkapan as $col): ?>
                                <th scope="col"><?= $col['kelengkapan'] ?></th>
                            <?php endforeach ?>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=0; ?>
                        <?php foreach ($jamaah as $row): ?>
                            <tr>
                                <th scope="row"><?= ++$no; ?></th>
                                <td><?= $row['nama_lengkap']; ?></td>
                                <td><?= $row['nama_paket']; ?></td>
                                <td><?= date('d F Y', strtotime($row['tanggal_keberangkatan'])) ; ?></td>
                                <?php $id_jamaah = $row['id']; ?>
                                <?php foreach ($kelengkapan as $cell): ?>
                                    <td>
                                        <i class="<?= cek_kelengkapan_jamaah($id_jamaah, $cell['id']) ?>"></i>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input kelengkapan_jamaah" type="checkbox" <?= cek_kelengkapan($id_jamaah, $cell['id']) ?> data-jamaah="<?= $id_jamaah ?>" data-kelengkapan="<?= $cell['id'] ?>" id="kelengkapan" readonly>
                                        </div> -->
                                    </td>
                                <?php endforeach ?>
                                
                            </tr>
                        <?php endforeach ?>
        			</tbody>
        		</table>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->