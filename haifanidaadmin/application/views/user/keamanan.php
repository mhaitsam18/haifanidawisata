<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('password','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
        	<div class="col-lg-8">
                <?php if ($pertanyaan_keamanan->num_rows() > 0){
                    $pk = $pertanyaan_keamanan->row_array(); ?>
        		<form action="<?= base_url('user/keamanan') ?>" method="post" enctype="multipart/form-data">
        			<div class="form-group row">
        				<label for="id_pertanyaan_1" class="col-sm-2 col-form-label">Question 1</label>
        				<div class="col-sm-10">
                            <select class="form-control" id="id_pertanyaan_1" name="id_pertanyaan_1" value="<?= $pk['id_pertanyaan_1'] ?>">
                                <option selected disabled value="">Select Question 1</option>
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
        			</div>
                    <div class="form-group row">
                        <label for="jawaban_1" class="col-sm-2 col-form-label">Answer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jawaban_1" name="jawaban_1" value="<?= $pk['jawaban_1'] ?>">
                            <?= form_error('jawaban_1','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
        			<div class="form-group row">
                        <label for="id_pertanyaan_2" class="col-sm-2 col-form-label">Question 2</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_pertanyaan_2" name="id_pertanyaan_2" value="<?= $pk['id_pertanyaan_2'] ?>">
                                <option disabled value="">Select Question 2</option>
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
                    </div>
                    <div class="form-group row">
                        <label for="jawaban_2" class="col-sm-2 col-form-label">Answer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jawaban_2" name="jawaban_2" value="<?= $pk['jawaban_2'] ?>">
                            <?= form_error('jawaban_2','<small class="text-danger pl-3">','</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
        				<div class="col-sm">
        					<button type="submit" class="btn btn-primary float-right">Save</button>
        				</div>
        			</div>
        		</form>
                <?php 
                } else{
                    ?>
                    <form action="<?= base_url('user/keamanan') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="id_pertanyaan_1" class="col-sm-2 col-form-label">Question 1</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_pertanyaan_1" name="id_pertanyaan_1">
                                    <option selected disabled value="">Select Question 1</option>
                                    <?php foreach ($pertanyaan_1 as $option): ?>
                                        <option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('id_pertanyaan_1','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jawaban_1" class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jawaban_1" name="jawaban_1">
                                <?= form_error('jawaban_1','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_pertanyaan_2" class="col-sm-2 col-form-label">Pertanyaan 2</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_pertanyaan_2" name="id_pertanyaan_2">
                                    <option selected disabled value="">Select Question 2</option>
                                    <?php foreach ($pertanyaan_2 as $option): ?>
                                        <option value="<?= $option['id'] ?>"><?= $option['pertanyaan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('id_pertanyaan_2','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jawaban_2" class="col-sm-2 col-form-label">Answer</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jawaban_2" name="jawaban_2">
                                <?= form_error('jawaban_2','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->