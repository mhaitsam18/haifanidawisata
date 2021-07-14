<?php 
$this->db->order_by('id', 'DESC');
$notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id']], 5)->result_array();
$notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id'], 'is_read' => 0])->num_rows();
?>
<li class="nav-item dropdown no-arrow mx-1">
	<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-bell fa-fw"></i>
		<!-- Counter - Alerts -->
		<span class="badge badge-danger badge-counter">
			<?php if ($notifikasi_unread > 5): ?>
				5+
			<?php else: ?>
				<?= $notifikasi_unread ?>
			<?php endif ?>
		</span>
	</a>
	<!-- Dropdown - Alerts -->
	<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="width: 400px;">
		<h6 class="dropdown-header">
			Pusat Notifikasi
			<a href="" class="forgot_link" style="color: #A3D0EF;" onclick="notifikasi()">
				Tandai Semua Sudah dibaca
			</a>
		</h6>
		<?php $icon = ''; ?>
		<?php $bg = ''; ?>
		<?php foreach ($notifikasi as $key): ?>
			<?php 
			switch ($key['id_kategori_notifikasi']) {
				case 1: $bg = 'bg-primary'; $icon = 'fa fa-warning'; break;
				case 2: $bg = 'bg-primary'; $icon = 'fa fa-warning'; break;
				case 3: $bg = 'bg-primary'; $icon = 'fa fa-warning'; break;
				case 4: $bg = 'bg-primary'; $icon = 'fa fa-warning'; break;
				case 5: $bg = 'bg-primary'; $icon = 'fa fa-file'; break;
				case 6: $bg = 'bg-primary'; $icon = 'fa fa-file'; break;
				case 7: $bg = 'bg-primary'; $icon = 'fa fa-file'; break;
				case 8: $bg = 'bg-primary'; $icon = 'fa fa-file'; break;
				case 9: $bg = 'bg-primary'; $icon = 'fa fa-warning'; break;
				case 10: $bg = 'bg-primary'; $icon = 'fa fa-dollar'; break;
				default: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
			} ?>
			<a class="dropdown-item d-flex" href="#">
				<div class="ml-3" style="margin-left: 20px; margin-right: 20px;">
					<div class="icon-circle <?= $bg ?>">
						<i class="<?= $icon ?> text-white"></i>
					</div>
				</div>
				<div class="">
					<h6 class="small" style="color: black; margin-bottom: 0px;"><?= date('j F Y, H:i:s', strtotime($key['waktu_notifikasi'])) ?></h6>
					<?php if ($key['is_read'] == 0): ?>
						<span class="font-weight-bold" style="color: black; margin-top: 0px;"><?= $key['pesan'] ?></span>
					<?php else: ?>
						<span class="" style="color: black; margin-top: 0px;">
							<?= $key['pesan'] ?>
						</span>
					<?php endif ?>
				</div>
			</a>
		<?php endforeach ?>
		<!-- <a class="dropdown-item d-flex" href="#">
			<div class="ml-3" style="margin-left: 20px; margin-right: 20px;">
				<div class="icon-circle bg-primary">
					<i class="fa fa-file text-white"></i>
				</div>
			</div>
			<div class="">
				<h6 class="small" style="color: black; margin-bottom: 0px;">December 12, 2019</h6>
				<span class="font-weight-bold" style="color: black; margin-top: 0px;">A new monthly report is ready to download!</span>
			</div>
		</a> -->
		<a class="dropdown-item text-center btn btn-link" style="color: black;" href="#">Lihat Semua Notifikasi</a>
	</div>
</li>