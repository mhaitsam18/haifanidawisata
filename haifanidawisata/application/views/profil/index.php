<div id="content_wrapper">
	<!--page title Start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><a href="javascript:;">Akun Saya</a></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="full_width destinaion_sorting_section">
		<div class="container">
			<div class="row space_100">
				<?= $this->session->flashdata('message'); ?>
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Profil"></div>
				<?= form_error('password','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<div class="col-lg-7">
					<form action="<?= base_url('Profil/') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
								<?= form_error('name','<small class="text-danger pl-3">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-10">
								<select class="form-control" name="gender" id="gender">
									<option>Pilih Jenis Kelamin</option>
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
							<label for="place_of_birth" class="col-sm-2 col-form-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?= $user['place_of_birth'] ?>">
								<?= form_error('place_of_birth','<small class="text-danger pl-3">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="birthday" class="col-sm-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="birthday" name="birthday" value="<?= $user['birthday'] ?>">
								<?= form_error('birthday','<small class="text-danger pl-3">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="phone_number" class="col-sm-2 col-form-label">Nomor Telpon</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>">
								<?= form_error('phone_number','<small class="text-danger pl-3">','</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="religion_id" class="col-sm-2 col-form-label">Agama</label>
							<div class="col-sm-10">
								<select class="form-control" name="religion_id" id="religion_id">
									<option value="">Pilih Agama</option>
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
							<label for="address" class="col-sm-2 col-form-label">Alamat</label>
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
											echo "Tidak Tersedia";
										}
										?>
										<img src="<?= $image ?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image">
											<label class="custom-file-label" for="image">Pilih file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm">
								<button type="submit" class="btn btn-primary float-right">Simpan</button>
							</div>
						</div>
						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteAccountModal">Hapus Akun</button>
					</form>
				</div>
				<div class="col-lg-5">
					<form action="<?= base_url('user/changePassword') ?>" method="post">
						<div class="form-group">
							<label for="current_password">Password Lama</label>
							<input type="password" class="form-control" id="current_password" name="current_password">
							<?= form_error('current_password','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="new_password1">Password Baru</label>
							<input type="password" class="form-control" id="new_password1" name="new_password1">
							<?= form_error('new_password1','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="new_password2">Ulangi Password Baru</label> 
							<input type="password" class="form-control" id="new_password2" name="new_password2">
							<?= form_error('new_password2','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Ubah Password
							</button>
						</div>
					</form>
					<?php 
					if ($pertanyaan_keamanan->num_rows() > 0){
						$pk = $pertanyaan_keamanan->row_array(); ?>
						<form action="<?= base_url('user/keamanan') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="id_pertanyaan_1">Pertanyaan 1</label>
								<select class="form-control" id="id_pertanyaan_1" name="id_pertanyaan_1" value="<?= $pk['id_pertanyaan_1'] ?>">
									<option selected disabled value="">Pilih Pertanyaan 1</option>
									<?php foreach ($pertanyaan_1 as $option): ?>
										<?php if ($option['id']==$pk['id_pertanyaan_1']): ?>
											<option value="<?= $option['id'] ?>" selected><?= $option['pertanyaan'] ?></option>
										<?php else: ?>
											<option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
								<?= form_error('id_pertanyaan_1','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jawaban_1">Jawaban</label>
								<input type="text" class="form-control" id="jawaban_1" name="jawaban_1" value="<?= $pk['jawaban_1'] ?>">
								<?= form_error('jawaban_1','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_pertanyaan_2">Pertanyaan 2</label>
								<select class="form-control" id="id_pertanyaan_2" name="id_pertanyaan_2" value="<?= $pk['id_pertanyaan_2'] ?>">
									<option disabled value="">Pilih Pertanyaan 2</option>
									<?php foreach ($pertanyaan_2 as $option): ?>
										<?php if ($option['id']==$pk['id_pertanyaan_2']): ?>
											<option value="<?= $option['id'] ?>" selected><?= $option['pertanyaan'] ?></option>
										<?php else: ?>
											<option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
								<?= form_error('id_pertanyaan_2','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jawaban_2">Jawaban</label>
								<input type="text" class="form-control" id="jawaban_2" name="jawaban_2" value="<?= $pk['jawaban_2'] ?>">
								<?= form_error('jawaban_2','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<div class="col-sm">
									<button type="submit" class="btn btn-primary float-right">Simpan</button>
								</div>
							</div>
						</form>
						<?php
					} else{
						?>
						<form action="<?= base_url('user/keamanan') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="id_pertanyaan_1">Pertanyaan 1</label>
								<select class="form-control" id="id_pertanyaan_1" name="id_pertanyaan_1">
									<option selected disabled value="">Pilih Pertanyaan 1</option>
									<?php foreach ($pertanyaan_1 as $option): ?>
										<option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_pertanyaan_1','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jawaban_1">Jawaban</label>
								<input type="text" class="form-control" id="jawaban_1" name="jawaban_1">
								<?= form_error('jawaban_1','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_pertanyaan_2">Pertanyaan 2</label>
								<select class="form-control" id="id_pertanyaan_2" name="id_pertanyaan_2">
									<option selected disabled value="">Pilih Pertanyaan 2</option>
									<?php foreach ($pertanyaan_2 as $option): ?>
										<option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_pertanyaan_2','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jawaban_2">Jawaban</label>
								<input type="text" class="form-control" id="jawaban_2" name="jawaban_2">
								<?= form_error('jawaban_2','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<div class="col-sm">
									<button type="submit" class="btn btn-primary float-right">Simpan</button>
								</div>
							</div>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--content body end--> 
</div>
<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteAccountModalLabel">Apakah anda yakin?</h5>
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
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>