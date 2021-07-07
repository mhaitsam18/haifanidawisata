	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kontak"></div>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('nama_lengkap','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('jabatan','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('cabang','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('email','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('no_hp','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="" class="btn btn-primary mb-3 newKontakModalButton" data-toggle="modal" data-target="#newKontakModal">Tambah Person Kontak baru</a>
                <table class="table table-hover table-responsive" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($kontak as $key): ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $key['nama_lengkap'] ?></td>
                                <td><?= $key['jabatan'] ?></td>
                                <td><?= $key['cabang'] ?></td>
                                <td><?= $key['email'] ?></td>
                                <td><?= $key['no_hp'] ?></td>
                                <td>
                                    <a href="<?= base_url("Konten/updateKontak/$key[id]"); ?>" class="badge badge-success updateKontakModalButton" data-toggle="modal" data-target="#newKontakModal" data-id="<?=$key['id']?>">Edit</a>
                                    <a href="<?= base_url("Konten/deleteKontak/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Kontak">Delete</a>
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
<div class="modal fade" id="newKontakModal" tabindex="-1" aria-labelledby="newKontakModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKontakModalLabel">Tambah Profil Kontak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Konten/Kontak') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="form-group">
                        <label for="cabang">Cabang</label>
                        <input type="text" class="form-control" id="cabang" name="cabang">
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
