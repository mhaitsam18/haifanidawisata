	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Shuttle"></div>
		<?= $this->session->flashdata('message'); ?>
		<div class="form-group">
			<label><?php echo "Jurusan ".$this->input->post('keberangkatan').' - '.$this->input->post('tujuan'); ?></label>
		</div>
		<label><?php echo "Total Penumpang : ".$this->input->post('jml_penumpang'); ?></label>
		<?php $penumpang = $this->input->post('jml_penumpang'); ?>
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
						<td><a class="btn btn-success" href="<?php echo base_url("Member/bookingShuttle?keberangkatan=$row[keberangkatan]&tujuan=$row[tujuan]&jadwal=$row[jadwal]&penumpang=$penumpang") ?>">Pesan</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>