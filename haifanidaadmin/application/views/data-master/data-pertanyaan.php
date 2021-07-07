	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('pertanyaan','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						Pertanyaan 1
					</div>
					<div class="card-body">
						<!-- <h5 class="card-title">Pertanyaan 1</h5> -->
						<a href="" class="btn btn-primary mb-3 newPertanyaan1ModalButton" data-toggle="modal" data-target="#newPertanyaan1Modal">Add New Question</a>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Question</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($pertanyaan_1 as $key): ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $key['pertanyaan'] ?></td>
										<td>
											<a href="<?= base_url("DataMaster/updatePertanyaan/1/$key[id]"); ?>" class="badge badge-success updatePertanyaan1ModalButton" data-toggle="modal" data-target="#newPertanyaan1Modal" data-id="<?=$key['id']?>">Edit</a>
											<a href="<?= base_url("DataMaster/deletePertanyaan/1/$key[id]"); ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						Pertanyaan 2
					</div>
					<div class="card-body">
						<!-- <h5 class="card-title">Pertanyaan 2</h5> -->
						<a href="" class="btn btn-info mb-3 newPertanyaan2ModalButton" data-toggle="modal" data-target="#newPertanyaan2Modal">Add New Question</a>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Question</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($pertanyaan_2 as $key): ?>
									<tr>
										<th scope="row"><?= $no ?></th>
										<td><?= $key['pertanyaan'] ?></td>
										<td>
											<a href="<?= base_url("DataMaster/updatePertanyaan/2/$key[id]"); ?>" class="badge badge-success updatePertanyaan2ModalButton" data-toggle="modal" data-target="#newPertanyaan2Modal" data-id="<?=$key['id']?>">Edit</a>
											<a href="<?= base_url("DataMaster/deletePertanyaan/2/$key[id]"); ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newPertanyaan1Modal" tabindex="-1" aria-labelledby="newPertanyaan1ModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPertanyaan1ModalLabel">Add New Question 1</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/pertanyaan/1') ?>" method="post">
				<input type="hidden" name="id" id="id1">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="pertanyaan1" name="pertanyaan" placeholder="Question">
						<?= form_error('pertanyaan','<small class="text-danger pl-3">','</small>'); ?>
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
<!-- Modal -->
<div class="modal fade" id="newPertanyaan2Modal" tabindex="-1" aria-labelledby="newPertanyaan2ModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPertanyaan2ModalLabel">Add New Question 2</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/pertanyaan/2') ?>" method="post">
				<input type="hidden" name="id" id="id2">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="pertanyaan2" name="pertanyaan" placeholder="Question">
						<?= form_error('pertanyaan','<small class="text-danger pl-3">','</small>'); ?>
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
