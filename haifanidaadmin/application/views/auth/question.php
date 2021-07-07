    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">                                        
                                        <img src="<?= base_url('assets/images/Group 2.1.png') ?>" class="rounded" alt="haifa.jpg" style="height: 150px;">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Hello! Mr. <?= $user['name'] ?>, Please answer The Question!</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth/question/'.$pertanyaan_keamanan['pid']) ?>">
                                        <div class="form-group">
                                            <label><?= $pertanyaan_keamanan['p1'] ?></label>
                                            <input type="text" class="form-control form-control-user" id="jawaban_1" placeholder="" name="jawaban_1" value="<?= set_value('jawaban_1') ?>">
                                                <?= form_error('jawaban_1','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label><?= $pertanyaan_keamanan['p2'] ?></label>
                                            <input type="text" class="form-control form-control-user" id="jawaban_2" placeholder="" name="jawaban_2" value="<?= set_value('jawaban_2') ?>">
                                                <?= form_error('jawaban_2','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Next
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth/forgotPassword') ?>">use another method</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth/registration') ?>">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth/') ?>">Remember your password? Back to Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>