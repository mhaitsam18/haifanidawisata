        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Fasilitas"></div>
                    <?= form_error('fasilitas','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="row">
                    	<div class="col-lg-6">
                    		<a href="" class="btn btn-primary mb-3 newFasilitasModalButton" data-toggle="modal" data-target="#newFasilitasModal">Tambah Fasilitas</a>
		                    <?php if ($this->uri->segment(3)!=''): ?>
		                    	<h3>Nama Paket : <?= $paket['nama_paket']; ?></h3>
		                    <?php endif ?>
                        	<table class="table table-hover">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                    					<?php if ($this->uri->segment(3)==''): ?>
                    						<th scope="col">Nama Paket</th>
                    					<?php endif ?>
                                        <th scope="col">Fasilitas</th>
                                        <th scope="col">Icon</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($fasilitas as $key): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
	                    					<?php if ($this->uri->segment(3)==''): ?>
                                            	<td><?= $key['nama_paket'] ?></td>
	                    					<?php endif ?>
                                            <td><?= $key['fasilitas'] ?></td>
                                            <td><i class="<?= $key['icon'] ?>"></i> <?= $key['icon'] ?></td>
	                    					<td>
	                    						<a href="<?= base_url("DataMaster/updateFasilitas/$key[fid]"); ?>" class="badge badge-success updateFasilitasModalButton" data-toggle="modal" data-target="#newFasilitasModal" data-id="<?=$key['fid']?>">Edit</a>
	                    						<a href="<?= base_url("DataMaster/deleteFasilitas/$key[fid]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Fasilitas">Delete</a>
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
            <div class="modal fade" id="newFasilitasModal" tabindex="-1" aria-labelledby="newFasilitasModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newFasilitasModalLabel">Tambah Fasilitas</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('Wisata/fasilitas/'.$this->uri->segment(3)) ?>" method="post">
            				<input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<?php if ($this->uri->segment(3) == ''): ?>
	            					<div class="form-group">
	            						<label for="id_paket_wisata">Paket Wisata</label>
	            						<select class="form-control" name="id_paket_wisata" id="id_paket_wisata">
	            							<option>Pilih Paket</option>
	            							<?php foreach ($paket_wisata as $option): ?>
	            								<option value="<?= $option['id'] ?>"><?= $option['nama_paket'] ?></option>	
	            							<?php endforeach ?>
	            						</select>
	            					</div>
	            				<?php else: ?>
	            					<input type="hidden" name="id_paket_wisata" id="id_paket_wisata">
	            				<?php endif ?>
	            				<div class="form-group">
	            					<label for="fasilitas">Fasilitas</label>
	            					<input type="text" class="form-control" id="fasilitas" name="fasilitas">
                                    <?= form_error('fasilitas','<small class="text-danger pl-3">','</small>'); ?>
	            				</div>
	            			</div>
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<label for="icon">Icon</label>
	            					<input type="text" class="form-control" id="icon" name="icon">
                                    <?= form_error('icon','<small class="text-danger pl-3">','</small>'); ?>
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

