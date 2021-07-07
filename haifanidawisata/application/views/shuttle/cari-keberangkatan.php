<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Cari Keberangkatan</li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<div class="col-md-12">
				<div class="form-group">
	                <label><?php echo "Jurusan ".$this->input->post('keberangkatan').' - '.$this->input->post('tujuan'); ?></label>
	            </div>
	            <label><?php echo "Total Penumpang ".$this->input->post('jml_penumpang'); ?></label>
	            <?php $penumpang = $this->input->post('jml_penumpang'); ?>
	            <form class="form-inline" method="POST" action="<?php echo base_url('index.php/Haifa/cek_kode_pemesanan') ?>">
	                <table class="table">
	                    <thead class="thead-dark">
	                        <tr>
	                            <th scope="col">No</th>
	                            <th scope="col">Pilih Jam Keberangkatan</th>
	                            <th scope="col">Aksi</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
	                        $no = 1; 
	                        foreach ($cari_keberangkatan as $row) {
	                            ?>
	                            <tr>
	                                <th scope="row"><?php echo $no; ?></th>
	                                <td><?php echo "Keberangkatan ".$row['jadwal']." Tersedia ".$row['jumlah']." Kursi Rp.".number_format($row['harga']).".00"; ?></td>
	                                <td><a class="btn btn-success" href="<?= base_url("Shuttle/bookingShuttle?keberangkatan=$row[keberangkatan]&tujuan=$row[tujuan]&jadwal=$row[jadwal]&penumpang=$penumpang") ?>">Pesan</a></td>
	                            </tr>

	                            <?php
	                        }
	                         ?>
	                    </tbody>
	                </table>
	            </form>
			</div>
		</div>
	</div>
</div>