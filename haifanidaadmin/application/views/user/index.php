        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Profil"></div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php 
                                if(file_exists("./assets/img/profile/$user[image]")){
                                    $image = base_url("assets/img/profile/$user[image]");
                                }else{
                                    $image = base_url2("assets/img/profile/$user[image]");
                                }
                                 ?>
                                <img src="<?= $image ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']) ?></small></p>
                                    <a href="<?= base_url2() ?>" class="btn btn-outline-info">Buka Halaman Website Haifanidawisata</a>
                                    <?php if ($user['role_id']==2): ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->