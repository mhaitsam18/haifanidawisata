	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Haifa"></div>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('status','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('nomor_sk','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('tanggal_sk','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('nama_direktur','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('alamat_kantor','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('akreditasi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('tanggal_akreditasi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('lembaga_akreditasi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
            <div class="col-lg-12">
                <a href="" class="btn btn-primary mb-3 newHaifaModalButton" data-toggle="modal" data-target="#newHaifaModal">Tambah Profile Haifa terbaru</a>
                <table class="table table-hover table-responsive" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status Blacklist</th>
                            <th scope="col">Nomor SK</th>
                            <th scope="col">Tanggal SK</th>
                            <th scope="col">Nama Direktur</th>
                            <th scope="col">Alamat Kantor</th>
                            <th scope="col">Akreditasi</th>
                            <th scope="col">Tanggal Akreditasi</th>
                            <th scope="col">Lembaga Akreditasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($haifa as $key): ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td>
                                    <?php if ($key['status']==1): ?>
                                        <span class="badge badge-success">Tidak</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Blacklist</span>
                                    <?php endif ?>
                                </td>
                                <td><?= $key['nomor_sk'] ?></td>
                                <td><?= date('d F Y', strtotime($key['tanggal_sk'])); ?></td>
                                <td><?= $key['nama_direktur'] ?></td>
                                <td><?= $key['alamat_kantor'] ?></td>
                                <td><?= $key['akreditasi'] ?></td>
                                <td><?= date('d F Y', strtotime($key['tanggal_akreditasi'])); ?></td>
                                <td><?= $key['lembaga_akreditasi'] ?></td>
                                <td>
                                    <a href="<?= base_url("Konten/updateHaifa/$key[id]"); ?>" class="badge badge-success updateHaifaModalButton" data-toggle="modal" data-target="#newHaifaModal" data-id="<?=$key['id']?>">Edit</a>
                                    <a href="<?= base_url("Konten/deleteHaifa/$key[id]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Haifa">Delete</a>
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
<div class="modal fade" id="newHaifaModal" tabindex="-1" aria-labelledby="newHaifaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHaifaModalLabel">Tambah Profil Haifa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Konten/Haifa') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status BlackList</label>
                        <div class="form-control" style="border: none;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_ya" value="0">
                                <label class="form-check-label" for="status">Iya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_tidak" value="1">
                                <label class="form-check-label" for="status">Tidak</label>
                            </div>
                        </div>
                        <?= form_error('judul','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nomor_sk">Nomor SK</label>
                        <input type="text" class="form-control" id="nomor_sk" name="nomor_sk">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sk">Tanggal SK</label>
                        <input type="date" class="form-control" id="tanggal_sk" name="tanggal_sk">
                    </div>
                    <div class="form-group">
                        <label for="nama_direktur">Nama Direktur</label>
                        <input type="text" class="form-control" id="nama_direktur" name="nama_direktur">
                    </div>
                    <div class="form-group">
                        <label for="alamat_kantor">Alamat Kantor</label>
                        <textarea class="form-control" id="alamat_kantor" name="alamat_kantor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="akreditasi">Akreditasi</label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_akreditasi">Tanggal Akreditasi</label>
                        <input type="date" class="form-control" id="tanggal_akreditasi" name="tanggal_akreditasi">
                    </div>
                    <div class="form-group">
                        <label for="lembaga_akreditasi">Lembaga Akreditasi</label>
                        <input type="text" class="form-control" id="lembaga_akreditasi" name="lembaga_akreditasi">
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
