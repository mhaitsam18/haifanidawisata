	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Kantor"></div>
		<?= form_error('nama_kantor','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('nama_pimpinan','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('alamat','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('region','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('email','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('nomor_telepon','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('latitude','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<?= form_error('longitude','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-12">
				<a href="" class="btn btn-primary mb-3 newKantorModalButton" data-toggle="modal" data-target="#newKantorModal">Tambah Kantor</a>
				<table class="table table-hover table-responsive">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Kantor</th>
							<th scope="col">Nama Pimpinan</th>
							<th scope="col">Alamat</th>
							<th scope="col">Region</th>
							<th scope="col">Email</th>
							<th scope="col">Nomor Telepon</th>
							<th scope="col">Latitude</th>
							<th scope="col">Longitude</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($kantor as $key): ?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $key['nama_kantor'] ?></td>
								<td><?= $key['nama_pimpinan'] ?></td>
								<td><?= $key['alamat'] ?></td>
								<td><?= $key['region'] ?></td>
								<td><?= $key['email'] ?></td>
								<td><?= $key['nomor_telepon'] ?></td>
								<td><?= $key['latitude'] ?></td>
								<td><?= $key['longitude'] ?></td>
								<td>
									<a href="<?= base_url("DataMaster/updateKantor/$key[id]"); ?>" class="badge badge-success updateKantorModalButton" data-toggle="modal" data-target="#newKantorModal" data-id="<?=$key['id']?>">Edit</a>
									<a href="<?= base_url("DataMaster/deleteKantor/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Kantor">Delete</a>
								</td>
							</tr>
							<?php $no++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newKantorModal" tabindex="-1" aria-labelledby="newKantorModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newKantorModalLabel">Tambah Kantor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/kantor') ?>" method="post">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="nama_kantor" name="nama_kantor" placeholder="Nama Kantor">
						<?= form_error('nama_kantor','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama Pimpinan">
						<?= form_error('nama_pimpinan','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
						<?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="region" name="region" placeholder="Region">
						<?= form_error('region','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
						<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon">
						<?= form_error('nomor_telepon','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude">
						<?= form_error('Latitude','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude">
						<?= form_error('Longitude','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>