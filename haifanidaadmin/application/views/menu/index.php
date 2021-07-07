        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Menu"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                    	<div class="col-lg-6">
                    		<a href="" class="btn btn-primary mb-3 newMenuModalButton" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                    		<table class="table table-hover">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                    					<th scope="col">Menu</th>
                                        <th scope="col">Active</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($menu as $m): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
	                    					<td><?= $m['menu'] ?></td>
	                    					<td>
                                                <?php
                                            if ($m['active']==1) {
                                                echo "Enebled";
                                            } else{
                                                echo "Disabled";
                                            } 
                                             ?>     
                                            </td>
                                            <td>
	                    						<a href="<?= base_url("Menu/updateMenu/$m[id]"); ?>" class="badge badge-success updateMenuModalButton" data-toggle="modal" data-target="#newMenuModal" data-id="<?=$m['id']?>">Edit</a>
	                    						<a href="<?= base_url("Menu/deleteMenu/$m[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Menu">Delete</a>
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
            <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('menu') ?>" method="post">
            				<input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
	            				</div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" checked>
                                    <label class="custom-control-label" for="active">Active?</label>
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

            