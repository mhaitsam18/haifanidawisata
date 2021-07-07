<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Profil"></div>
        <?= form_error('password','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
        	<div class="col-lg-8">
        		<form action="<?= base_url('user/edit') ?>" method="post" enctype="multipart/form-data">
        			<div class="form-group row">
        				<label for="email" class="col-sm-2 col-form-label">Email</label>
        				<div class="col-sm-10">
        					<input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
        				</div>
        			</div>
        			<div class="form-group row">
        				<label for="name" class="col-sm-2 col-form-label">Name</label>
        				<div class="col-sm-10">
        					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
        					<?= form_error('name','<small class="text-danger pl-3">','</small>') ?>
        				</div>
        			</div>
        			<div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender" id="gender">
                                <option>Select Gender</option>
                                <?php if ($user['gender'] == 'Laki-laki'): ?>
                                    <option value="Laki-laki" selected>Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                <?php elseif ($user['gender'] == 'Perempuan'): ?>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan" selected>Perempuan</option>
                                <?php endif ?>
                            </select>
                            <?= form_error('gender','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="place_of_birth" class="col-sm-2 col-form-label">Place of Birth</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?= $user['place_of_birth'] ?>">
                            <?= form_error('place_of_birth','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Birth Day</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $user['birthday'] ?>">
                            <?= form_error('birthday','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>">
                            <?= form_error('phone_number','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="religion_id" class="col-sm-2 col-form-label">Religion</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="religion_id" id="religion_id">
                                <option value="">Select Religion</option>
                                <?php foreach ($agama as $row): ?>
                                    <?php if ($row['agama']== $user['agama']): ?>
                                        <option value="<?= $row['id'] ?>" selected>
                                            <?= $row['agama']; ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $row['id'] ?>">
                                            <?= $row['agama']; ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('religion_id','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"><?= $user['address'] ?></textarea>
                            <?= form_error('address','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
        				<div class="col-sm-2">Picture</div>
        				<div class="col-sm-10">
        					<div class="row">
        						<div class="col-sm-3">
                                    <?php 
                                    if(file_exists("./assets/img/profile/$user[image]")){
                                        $image = base_url("assets/img/profile/$user[image]");
                                    }else{
                                        $image = base_url2("assets/img/profile/$user[image]");
                                    }
                                     ?>
        							<img src="<?= $image ?>" class="img-thumbnail">
        						</div>
        						<div class="col-sm-9">
        							<div class="custom-file">
        								<input type="file" class="custom-file-input" id="image" name="image">
        								<label class="custom-file-label" for="image">Choose file</label>
        							</div>
        						</div>
        					</div>
        				</div>

        			</div>
        			<div class="form-group row">
        				<div class="col-sm">
        					<button type="submit" class="btn btn-primary float-right">Save</button>
        				</div>
        			</div>
                    <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#deleteAccountModal">Delete Account</button>
        			
        		</form>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Are You Sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('User/delete') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?= form_error('password','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>