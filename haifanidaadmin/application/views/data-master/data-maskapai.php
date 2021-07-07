        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Maskapai"></div>
                    <?= form_error('maskapai','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="row">
                    	<div class="col-lg-6">
                		  <a href="" class="btn btn-primary mb-3 newMaskapaiModalButton" data-toggle="modal" data-target="#newMaskapaiModal">Tambah Maskapai</a>
                        	<table class="table table-hover">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                                        <th scope="col">Maskapai</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($maskapai as $key): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
                                            <td><?= $key['maskapai'] ?></td>
	                    					<td>
	                    						<a href="<?= base_url("DataMaster/updateMaskapai/$key[id]"); ?>" class="badge badge-success updateMaskapaiModalButton" data-toggle="modal" data-target="#newMaskapaiModal" data-id="<?=$key['id']?>">Edit</a>
	                    						<a href="<?= base_url("DataMaster/deleteMaskapai/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Maskapai">Delete</a>
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
            <div class="modal fade" id="newMaskapaiModal" tabindex="-1" aria-labelledby="newMaskapaiModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newMaskapaiModalLabel">Tambah Maskapai</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('DataMaster/maskapai') ?>" method="post">
            				<input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<input type="text" class="form-control" id="maskapai" name="maskapai" placeholder="Maskapai">
                                    <?= form_error('maskapai','<small class="text-danger pl-3">','</small>'); ?>
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

