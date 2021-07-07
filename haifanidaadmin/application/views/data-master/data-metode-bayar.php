        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Metode Bayar"></div>
                    <?= form_error('metode_bayar','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="row">
                    	<div class="col-lg-6">
                		  <a href="" class="btn btn-primary mb-3 newMetodeBayarModalButton" data-toggle="modal" data-target="#newMetodeBayarModal">Tambah Metode Bayar</a>
                        	<table class="table table-hover">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                                        <th scope="col">Metode Bayar</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($metodeBayar as $key): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
                                            <td><?= $key['metode_bayar'] ?></td>
	                    					<td>
	                    						<a href="<?= base_url("DataMaster/updateMetodeBayar/$key[id]"); ?>" class="badge badge-success updateMetodeBayarModalButton" data-toggle="modal" data-target="#newMetodeBayarModal" data-id="<?=$key['id']?>">Edit</a>
	                    						<a href="<?= base_url("DataMaster/deleteMetodeBayar/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Metode Bayar">Delete</a>
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
            <div class="modal fade" id="newMetodeBayarModal" tabindex="-1" aria-labelledby="newMetodeBayarModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newMetodeBayarModalLabel">Tambah Metode Bayar</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('DataMaster/metodeBayar') ?>" method="post">
            				<input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<input type="text" class="form-control" id="metode_bayar" name="metode_bayar" placeholder="Metode Bayar">
                                    <?= form_error('metode_bayar','<small class="text-danger pl-3">','</small>'); ?>
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

