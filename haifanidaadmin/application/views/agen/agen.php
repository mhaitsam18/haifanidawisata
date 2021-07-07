	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Agen"></div>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('kode_agen','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('perwakilan','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('alamat_kantor','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('email','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('no_hp','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="" class="btn btn-primary mb-3 newAgenModalButton" data-toggle="modal" data-target="#newAgenModal">Tambah Person Agen baru</a>
                <table class="table table-hover table-responsive" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Agen</th>
                            <th scope="col">Perwakilan</th>
                            <th scope="col">Alamat Kantor</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($agen as $key): ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $key['kode_agen'] ?></td>
                                <td><?= $key['perwakilan'] ?></td>
                                <td><?= $key['alamat_kantor'] ?></td>
                                <td><?= $key['email'] ?></td>
                                <td><?= $key['no_hp'] ?></td>
                                <td>
                                    <a href="<?= base_url("Agen/updateAgen/$key[id]"); ?>" class="badge badge-success updateAgenModalButton" data-toggle="modal" data-target="#newAgenModal" data-id="<?=$key['id']?>">Edit</a>
                                    <a href="<?= base_url("Agen/deleteAgen/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Agen">Delete</a>
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
<div class="modal fade" id="newAgenModal" tabindex="-1" aria-labelledby="newAgenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAgenModalLabel">Tambah Profil Agen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Agen/agen') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_agen">Kode Agen</label>
                        <input type="text" class="form-control" id="kode_agen" name="kode_agen">
                    </div>
                    <div class="form-group">
                        <label for="perwakilan">Perwakilan</label>
                        <input type="text" class="form-control" id="perwakilan" name="perwakilan">
                    </div>
                    <div class="form-group">
                        <label for="alamat_kantor">Alamat Kantor</label>
                        <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp">
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
