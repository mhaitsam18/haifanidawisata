	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Konten"></div>
		<div class="card text-left">
			<div class="card-header">
				<?= $dashboard['header'] ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $dashboard['title'] ?></h5>
				<p class="card-text"><?= $dashboard['content'] ?></p>
			</div>
			<div class="card-footer text-muted">
				-<?= $dashboard['footer'] ?>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->