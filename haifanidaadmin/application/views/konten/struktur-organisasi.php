	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Struktur Organisasi"></div>
        <?= form_error('nama','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('jabatan','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
        	<div class="col-lg-11">
    		  <a href="" class="btn btn-primary mb-3 newStrukturModalButton" data-toggle="modal" data-target="#newStrukturModal">Tambah Struktur</a>
            	<table class="table table-hover">
        			<thead>
        				<tr>
        					<th scope="col">No</th>
							<th scope="col">Foto</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jabatan</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($struktur as $key): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
								<td><img src="<?= base_url('assets/img/struktur-organisasi/').$key['foto'] ?>" class="img-thumbnail" style="width: 300px;"></td>
								<td><?= $key['nama'] ?></td>
                                <td><?= $key['jabatan'] ?></td>
            					<td>
            						<a href="<?= base_url("Konten/updateStruktur/$key[id]"); ?>" class="badge badge-success updateStrukturModalButton" data-toggle="modal" data-target="#newStrukturModal" data-id="<?=$key['id']?>">Edit</a>
            						<a href="<?= base_url("Konten/deleteStruktur/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Struktur Organisasi">Delete</a>
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
<div class="modal fade" id="newStrukturModal" tabindex="-1" aria-labelledby="newStrukturModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newStrukturModalLabel">Tambah Struktur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Konten/strukturOrganisasi') ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="id">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
    				</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                        <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan"> -->
						<select class="form-control" id="atasan" name="atasan" placeholder="Atasan">
							<option value="" disabled selected>-- Pilih Atasan --</option>
							<?php foreach ($struktur as $key => $value) {?>
							<option value="<?=$value['id']?>"><?=$value['nama']?></option>
							<?php }?>
						</select>
                        <?= form_error('atasan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
					<div class="custom-file mb-3">
                        <input  type="file" class="custom-file-input" id="foto" name="foto" required>
						<label class="custom-file-label" for="foto">Choose photo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
						<?= form_error('foto','<small class="text-danger pl-3">','</small>'); ?>
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

