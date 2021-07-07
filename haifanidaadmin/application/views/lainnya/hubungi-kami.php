<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kontak"></div>
        <?= $this->session->flashdata('message'); ?>
        <div class="card text-left mb-4">
			<div class="card-header">
				<?= $konten['header'] ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $konten['title'] ?></h5>
				<p class="card-text"><?= $konten['content'] ?></p>
			</div>
			<div class="card-footer text-muted">
				-<?= $konten['footer'] ?>
			</div>
		</div>
		<div class="card text-center">
			<div class="card-header">
				Hubungi Kami
			</div>
			<div class="card-body">
				<div style="padding-right: 300px; padding-left: 300px;">
					<form action="<?= base_url('Lainnya/hubungi') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
							<?= form_error('nama','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							<?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="no_wa">Nomor WhatsApp</label>
							<input type="number" class="form-control" id="no_wa" name="no_wa" placeholder="Nomor WhatsApp">
							<?= form_error('no_wa','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="subjek">Subjek</label>
							<input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek">
							<?= form_error('subjek','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="pesan">Pesan</label>
							<textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan"></textarea>
							<?= form_error('pesan','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="bukti">Upload Bukti</label>
							<input type="file" class="form-control-file" id="bukti" name="bukti">
							<?= form_error('bukti','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<button type="submit" class="btn btn-primary float-right">Kirim</button>
					</form>
				</div>
			</div>
			<div class="card-footer text-muted">
				-
			</div>
		</div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->