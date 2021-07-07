	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?php if ($this->session->flashdata('flash') == 'Telah dikonfirmasi'): ?>
			<?php $isi = 'keluhan'; ?>
		<?php else: ?>
			<?php $isi = 'Email'; ?>
		<?php endif ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="<?= $isi ?>"></div>
		<div class="card text-left">
			<div class="card-header">
				Pesan
			</div>
			<div class="card-body">
				<table class="table table-hover table-responsive" id="">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor WhatsApp</th>
                            <th scope="col">Subjek</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu Pengiriman</th>
                            <th scope="col">Gambar Bukti</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($pesan as $key): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
            					<td><?= $key['nama']; ?></td>
                                <td><?= $key['email']; ?></td>
                                <td><?= $key['no_wa']; ?></td>
                                <td><?= $key['subjek']; ?></td>
                                <td><?= $key['pesan']; ?></td>
                                <td><?= $key['status']; ?></td>
                                <td><?= date('d F Y - H:i:s', strtotime($key['waktu_kirim'])); ?></td>
                                <td>
                                	<?php if ($key['bukti'] != ''): ?>
                                		<?php 
                                		if(file_exists("./assets/img/pesan/$key[bukti]")){
                                			$bukti = base_url("assets/img/pesan/$key[bukti]");
                                		}else{
                                			$bukti = base_url2("assets/img/pesan/$key[bukti]");
                                		}
                                		?>
                                		<img src="<?= $bukti ?>" class="img-thumbnail" style="width: 300px;">
                                	<?php else: ?>
                                		Tidak ada gambar
                                	<?php endif ?>
                                </td>
            					<td>
            						<?php if ($key['status']!='Sudah dikonfirmasi'): ?>
            							<a href="<?= base_url("admin/updateStatusPesan/$key[id]/Sudah dikonfirmasi") ?>" class="badge badge-info">Konfirmasi</a>
            						<?php endif ?>
            							<a href="<?= "http://api.whatsapp.com/send?phone=$key[no_wa]" ?>" class="badge badge-success" data-toggle="modal" data-target="#whatsAppModal<?= $key['id']; ?>"><i class="fab fa-fw fa-whatsapp"></i> Balas VIA WA</a>
            							<a href="#" class="badge badge-danger" data-toggle="modal" data-target="#emailModal<?= $key['id']; ?>"><i class="far fa-fw fa-envelope"></i> Balas VIA Email</a>
            					</td>
            				</tr>
            			<?php $no++; ?>
        				<?php endforeach ?>
        			</tbody>
        		</table>
			</div>
			<div class="card-footer text-muted">
				-
			</div>
		</div>
	</div>
</div>
<?php foreach ($pesan as $row): ?>
	<div class="modal fade" id="emailModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="emailModalLabel">Balas Pesan VIA Email</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/kirimPesan/') ?>" method="post">
					<div class="modal-body">
						<p class="modal-text">
							To : <?= $row['email'] ?>
							<input type="hidden" name="email" id="email" value="<?= $row['email'] ?>">
						</p>
						<div class="form-group">
							<label for="subjek">Subjek</label>
							<input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek">
							<?= form_error('subjek','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="pesan">Pesan</label>
							<textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan"></textarea>
							<?= form_error('pesan','<small class="text-danger pl-3">','</small>') ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>

<?php foreach ($pesan as $row): ?>
	<div class="modal fade" id="whatsAppModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="whatsAppModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="whatsAppModalLabel">Balas Pesan VIA Email</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/kirimWhatsApp/') ?>" target="_blank" method="post">
					<div class="modal-body">
						<p class="modal-text">
							Ke : <?= $row['nama'] ?>
						</p>
						<p class="modal-text">
							Nomor WhatsApp: <?= $row['no_wa'] ?>
							<input type="hidden" name="no_wa" id="no_wa" value="<?= $row['no_wa'] ?>">
						</p>
						<div class="form-group">
							<label for="pesan">Pesan</label>
							<textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan"></textarea>
							<?= form_error('pesan','<small class="text-danger pl-3">','</small>') ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>