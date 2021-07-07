<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Detail pemesanan"></div>
        <div class="row mb-3">
        	<div class="col-lg-12">
        		<div class="card">
        			<div class="card-header">
        				Detail Pengiriman
        			</div>
        			<div class="card-body">
        				<div class="row">
                            <label class="col-sm-2">
                                Nama Pemesan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['name'] ?>
                            </div>
                            <label class="col-sm-2">
                                Status Pemesanan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['status'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Kode Bayar
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['kode_bayar'] ?>
                            </div>
                            <label class="col-sm-2">
                                Nama Lengkap Jama'ah
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['nama_lengkap'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Nama Sesuai Passport
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['nama_di_paspor'] ?>
                            </div>
                            <label class="col-sm-2">
                                Kewarganegaraan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['kewarganegaraan'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Tempat & Tanggal Lahir
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['tempat_lahir'].', '.date('d F Y', strtotime($jamaah['tanggal_lahir'])); ?>
                            </div>
                            <label class="col-sm-2">
                                Jenis Kelamin
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['jenis_kelamin'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Email
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['email']; ?>
                            </div>
                            <label class="col-sm-2">
                                Golongan Darah
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['golongan_darah'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Pendidikan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['pendidikan']; ?>
                            </div>
                            <label class="col-sm-2">
                                Pekerjaan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['pekerjaan'] ?>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2">
                                Nomor Hp. Jama'ah
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['no_hp'] ?>
                            </div>
                            <label class="col-sm-2">
                                Alamat Jama'ah
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['alamat'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                No. KTP
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['no_ktp'] ?>
                            </div>
                            <label class="col-sm-2">
                                Total Tagihan
                            </label>
                            <div class="col-sm-4">
                                <?= 'Rp. '.number_format($jamaah['total_tagihan'],2,',','.') ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Riwayat Umroh
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['riwayat_umroh'] ?>
                            </div>
                            <label class="col-sm-2">
                                Total Terbayar
                            </label>
                            <div class="col-sm-4">
                                <?= 'Rp. '.number_format($jamaah['total_bayar'],2,',','.') ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Waktu Pemesanan
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['waktu_pemesanan'] ?>
                            </div>
                            <label class="col-sm-2">
                                Metode Bayar
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['metode_bayar'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                Foto
                            </label>
                            <div class="col-sm-10">
                                <img src="<?= base_url('assets/img/persyaratan/'.$jamaah['foto']) ?>" class="img-thumbnail" style="width: 150px;">
                            </div>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="row mb-1">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Detail Passport
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-2">
                                No. Paspor
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['no_paspor'] ?>
                            </div>
                            <label class="col-sm-2">
                                Tempat Pembuatan Paspor
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['tempat_pembuatan_paspor'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">
                                No. Paspor
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['tanggal_cetak_paspor'] ?>
                            </div>
                            <label class="col-sm-2">
                                Tempat Pembuatan Paspor
                            </label>
                            <div class="col-sm-4">
                                <?= $jamaah['tanggal_habis_berlaku_paspor'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <h5 class="card-header">Berkas</h5>
            <div class="card-body">
                <p class="card-text"><i class="fas fa-file-image"></i> = Download Image</p>
                <p class="card-text"><i class="fas fa-file-pdf text-danger"></i> = Download PDF</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Scan KTP</th>
                            <th scope="col">Scan KK</th>
                            <th scope="col">Scan Paspor</th>
                            <th scope="col">Scan Rekam Medis</th>
                            <th scope="col">Scan Buku Nikah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach ($berkas_lunak as $row): ?>
                            <tr>
                                <th scope="row"><?= ++$no; ?></th>
                                <?php if ($row['foto']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['foto'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['foto'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['foto'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['foto'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['foto'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>

                                <?php if ($row['scan_ktp']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['scan_ktp'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['scan_ktp'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_ktp'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['scan_ktp'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_ktp'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>

                                <?php if ($row['scan_kk']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['scan_kk'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['scan_kk'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_kk'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['scan_kk'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_kk'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>

                                <?php if ($row['scan_paspor']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['scan_paspor'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['scan_paspor'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_paspor'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['scan_paspor'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_paspor'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>

                                <?php if ($row['scan_rekam_medis']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['scan_rekam_medis'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['scan_rekam_medis'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_rekam_medis'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['scan_rekam_medis'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_rekam_medis'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>

                                <?php if ($row['scan_buku_nikah']==''): ?>
                                    <td>File Tidak Tersedia</td>
                                <?php elseif (substr($row['scan_buku_nikah'], -3) =='pdf'): ?>
                                    <td><a title="<?= $row['scan_buku_nikah'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_buku_nikah'] ?>"><i class="far fa-file-pdf text-danger"></i></a></td>
                                <?php else: ?>
                                    <td><a title="<?= $row['scan_buku_nikah'] ?>" href="<?= base_url('assets/img/persyaratan/').$row['scan_buku_nikah'] ?>"><i class="fas fa-file-image"></i></a></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5 mb-3">
            <div class="col-lg-12">
    			<h3 class="h3 mt-5">Detail Pesanan</h3>
    			<table class="table table-bordered" style="background-color: white;" id="dataTable">
    				<thead>
    					<tr>
    						<th scope="col">#</th>
    						<th scope="col">Gambar</th>
    						<th scope="col">Kode Paket</th>
    						<th scope="col">Nama Paket</th>
    						<th scope="col">Harga</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $no=0; $total = 0; ?>
    					<?php foreach ($pesanan as $row): ?>
    						<tr>
    							<th scope="row"><?= ++$no ?></th>
    							<td><img src="<?= base_url('assets/img/paket-wisata/').$row['gambar'] ?>" class="img-thumbnail" style="width: 150px;"></td>
    							<td><?= $row['kode_paket'] ?></td>
    							<td><?= $row['nama_paket'] ?></td>
    							<td align="left"><?= 'Rp.'.number_format($row['harga_paket'],2,',','.') ?></td>
    						</tr>
    						<?php $total += $row['harga_paket']; ?>
    					<?php endforeach ?>
    				</tbody>
    				<tfoot>
    					<tr>
    						<td colspan="4" align="right"><b>Total : </b></td>
    						<td align="left"><b><?= 'Rp.'.number_format($total,2,',','.') ?></b></td>
    					</tr>
    				</tfoot>
    			</table>
    			<a href="<?= base_url($this->uri->segment(1).'/') ?>" class="btn btn-sm btn-primary float-right mb-3">Kembali</a>
    		</div>
        </div>
        
        <div class="col-lg-12">
            <div class="card mt-3">
                <h5 class="card-header">Persyaratan</h5>
                <div class="card-body">
                    <p class="card-text"><i class="fas fa-check text-success"></i> = Sudah</p>
                    <p class="card-text"><i class="fas fa-times text-danger"></i> = Belum</p>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">KTP</th>
                                <th scope="col">KK</th>
                                <th scope="col" width="300">Foto 3 x 4</th>
                                <th scope="col" width="300">Foto 4 x 6</th>
                                <th scope="col">Paspor</th>
                                <th scope="col">Visa</th>
                                <th scope="col">Biometrik</th>
                                <th scope="col">Suntik Vaksin</th>
                                <th scope="col">Manasik</th>
                                <th scope="col">Rekam Medis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach ($persyaratan as $row): ?>
                                <tr>
                                    <th scope="row"><?= ++$no; ?></th>
                                    <?php if ($row['ktp']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['kk']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['foto34']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['foto46']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['paspor']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['visa']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['biometrik']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['suntik_vaksin']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['manasik']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    <?php if ($row['rekam_medis']==0): ?>
                                        <td><i class="fas fa-times text-danger"></i></td>
                                    <?php else: ?>
                                        <td><i class="fas fa-check text-success"></i></td>
                                    <?php endif ?>
                                    
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <h3 class="h3 mt-5">Tabel Kelengkapan Fasilitas yang diterima</h3>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php foreach ($kelengkapan as $col): ?>
                            <th scope="col"><?= $col['kelengkapan'] ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; ?>
                    <?php foreach ($jamaah_result as $row): ?>
                        <tr>
                            <th scope="row"><?= ++$no; ?></th>
                            <?php $id_jamaah = $row['id']; ?>
                            <?php foreach ($kelengkapan as $cell): ?>
                                <td>
                                    <i class="<?= cek_kelengkapan_jamaah($id_jamaah, $cell['id']) ?>"></i>
                                    <!-- <div class="form-check">
                                        <input class="form-check-input kelengkapan_jamaah" type="checkbox" <?= cek_kelengkapan($id_jamaah, $cell['id']) ?> data-jamaah="<?= $id_jamaah ?>" data-kelengkapan="<?= $cell['id'] ?>" id="kelengkapan" readonly>
                                    </div> -->
                                </td>
                            <?php endforeach ?>
                            
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 mt-3">
            <h3 class="h3 mt-5">Pembayaran</h3>
            <table class="table table-responsive" style="background-color: white;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Bayar</th>
                        <th scope="col">Rekening Tujuan</th>
                        <th scope="col">Rekening Pengirim</th>
                        <th scope="col">Bank Pengirim</th>
                        <th scope="col">Atas Nama Pengirim</th>
                        <th scope="col">Waktu Transfer</th>
                        <th scope="col">Nominal Transfer</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; ?>
                    <?php foreach ($bukti_pembayaran_paket as $row): ?>
                        <tr>
                            <th scope="row"><?= ++$no ?></th>
                            <td><?= $row['kode_bayar'] ?></td>
                            <td><?= $row['no_rekening'] ?></td>
                            <td><?= $row['rekening_pengirim'] ?></td>
                            <td><?= $row['bank_pengirim'] ?></td>
                            <td><?= $row['nama_pengirim'] ?></td>
                            <td><?= $row['waktu_transfer'] ?></td>
                            <td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
                            <td><img src="<?= base_url('assets/img/bukti_pembayaran/').$row['bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 120px;"></td>
                            <td><?= $row['catatan'] ?></td>
                            <td><?= $row['sbpp'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->