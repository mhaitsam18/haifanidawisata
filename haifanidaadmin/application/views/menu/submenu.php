        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="SubMenu"></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                    	<div class="col-lg">
                    		<a href="" class="btn btn-primary mb-3 newSubMenuModalButton" data-toggle="modal" data-target="#newSubMenuModal">Add New SubMenu</a>
                    		<table class="table table-hover"  id="">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                    					<th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($subMenu as $sm): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
	                    					<td><?= $sm['title'] ?></td>
                                            <td><?= $sm['menu'] ?></td>
                                            <td><?= $sm['url'] ?></td>
                                            <td><?= $sm['icon'] ?></td>
                                            <td>
                                                <?php
                                            if ($sm['is_active']==1) {
                                                echo "Enebled";
                                            } else{
                                                echo "Disabled";
                                            } 
                                             ?>     
                                            </td>
	                    					<td>
	                    						<a href="<?= base_url("Menu/updateSubMenu/$sm[idsm]"); ?>" class="badge badge-success updateSubMenuModalButton" data-toggle="modal" data-target="#newSubMenuModal" data-id="<?=$sm['idsm']?>">Edit</a>
	                    						<a href="<?= base_url("Menu/deleteSubMenu/$sm[idsm]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Sub Menu">Delete</a>
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
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newSubMenuModalLabel">Add New SubMenu</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('menu/subMenu/') ?>" method="post">
                            <input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title">
	            				</div>
                                <div class="form-group">
                                    <select class="form-control" name="menu_id" id="menu_id">
                                        <option value="">Select Menu</option>
                                        <?php foreach ($menu as $m): ?>
                                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu URL">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon">
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                                    <label class="custom-control-label" for="is_active">Active?</label>
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