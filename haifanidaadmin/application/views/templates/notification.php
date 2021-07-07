<!-- Nav Item - Alerts -->
<?php 
    $this->db->order_by('id', 'DESC');
    $notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id']], 5)->result_array();
    $notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id'], 'is_read' => 0])->num_rows();
 ?>
<li class="nav-item dropdown no-arrow mx-1" id="show">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
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
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        <a href="" class="float-right mr-3" style="color: #A3D0EF;" onclick="notifikasi()">
            <small>Tandai Semua Sudah dibaca</small>
        </a>
        <?php $icon = ''; ?>
        <?php $bg = ''; ?>
        <?php foreach ($notifikasi as $key): ?>
            <?php 
            switch ($key['id_kategori_notifikasi']) {
                 case 1: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 2: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 3: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 4: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 5: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
                 case 6: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
                 case 7: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
                 case 8: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
                 case 9: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 10: $bg = 'bg-success'; $icon = 'fas fa-donate'; break;
                 
                 default: $bg = 'bg-primary'; $icon = 'fas fa-file-alt'; break;
             } ?>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle <?= $bg ?>">
                        <i class="<?= $icon ?> text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?= date('j F Y, H:i:s', strtotime($key['waktu_notifikasi'])) ?></div>
                    <?php if ($key['is_read'] == 0): ?>
                        <span class="font-weight-bold"><?= $key['pesan'] ?></span>
                    <?php else: ?>
                        <?= $key['pesan'] ?>
                    <?php endif ?>
                </div>
            </a>
        <?php endforeach ?>
        <!-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
            </div>
        </a> -->
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>