<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= form_error('role','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Role"></div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
        	<div class="col-lg-6">
        		<a href="" class="btn btn-primary mb-3 newRoleModalButton" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
        		<table class="table table-hover"  id="dataTable">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">Role</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($role as $r): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
            					<td><?= $r['role'] ?></td>
            					<td>
            						<a href="<?= base_url("admin/roleAccess/$r[id]"); ?>" class="badge badge-warning">Access</a>
                                    <a href="<?= base_url("admin/updateRole/$r[id]"); ?>" class="badge badge-success updateRoleModalButton" data-toggle="modal" data-target="#newRoleModal" data-id="<?=$r['id']?>">Edit</a>
            						<a href="<?= base_url("admin/deleteRole/$r[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="role">Delete</a>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/role') ?>" method="post">
				<input type="hidden" name="id" id="id">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
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

