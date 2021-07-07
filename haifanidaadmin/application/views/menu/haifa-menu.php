        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Menu"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                    	<div class="col-lg-10">
                    		<a href="" class="btn btn-primary mb-3 newHaifaMenuModalButton" data-toggle="modal" data-target="#newHaifaMenuModal">Add New Menu</a>
                    		<table class="table table-hover">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                    					<th scope="col">Menu</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Dropdown</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Login</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($menu as $m): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
	                    					<td><?= $m['menu'] ?></td>
                                            <td><?= $m['url'] ?></td>
	                    					<td>
                                                <?php
                                            if ($m['dropdown']==1) {
                                                echo "Enebled";
                                            } else{
                                                echo "Disabled";
                                            } 
                                             ?>     
                                            </td>
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
                                                <?php
                                            if ($m['login']==1) {
                                                echo "Yes";
                                            } else{
                                                echo "No";
                                            } 
                                             ?>     
                                            </td>
                                            <td>
	                    						<a href="<?= base_url("Menu/updateHaifaMenu/$m[id]"); ?>" class="badge badge-success updateHaifaMenuModalButton" data-toggle="modal" data-target="#newHaifaMenuModal" data-id="<?=$m['id']?>">Edit</a>
	                    						<a href="<?= base_url("Menu/deleteHaifaMenu/$m[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Menu">Delete</a>
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
            <div class="modal fade" id="newHaifaMenuModal" tabindex="-1" aria-labelledby="newHaifaMenuModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newHaifaMenuModalLabel">Add New Menu</h5>
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
                                <div class="form-group">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="active" value="1" name="active" checked>
                                        <label class="form-check-label mr-2" for="active">Active?</label>
                                        <input class="form-check-input" type="checkbox" id="dropdown" value="1" name="dropdown">
                                        <label class="form-check-label mr-2" for="dropdown">Use Dropdown?</label>
                                        <input class="form-check-input" type="checkbox" id="login" value="1" name="login">
                                        <label class="form-check-label" for="login">Must be logged in?</label>
                                    </div>
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

            