	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Umroh/Haji"></div>
		<div class="row">
			<?php foreach ($paket_wisata as $row): ?>
				<div class="card mr-3" style="width: 18rem;">
					<img src="<?= base_url('assets/img/paket-wisata/').$row['gambar'] ?>" class="card-img-top" alt="<?= $row['gambar'] ?>">
					<div class="card-body">
						<h5 class="card-title"><?= $row['nama_paket'] ?></h5>
						<small>Keberangkatan: <?= date('d F Y', strtotime("$row[tanggal_keberangkatan]")) ?></small>
						<p class="card-text"><?= $row['deskripsi'] ?></p>
						<span class="btn btn-sm btn-success">Rp. <?= number_format($row['harga_paket'],2,',','.') ?></span>
						<button class="btn btn-sm btn-primary detailPaketWisataModalButton" data-toggle="modal" data-target="#newPaketWisataModal" data-id="<?=$row['pid']?>">Detail</button>
						<button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#pesanPaketWisataModal<?= $row['pid'] ?>">Pesan</button>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="row justify-content-center mt-5">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
<!-- /.container-fluid -->
</div>
<div class="modal fade" id="newPaketWisataModal" tabindex="-1" aria-labelledby="newPaketWisataModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPaketWisataModalLabel">Detail Paket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form>
				<input type="hidden" name="id" id="id">
    			<div class="modal-body">
    				<div class="form-group">
    					<label for="kode_paket">Kode Paket</label>
    					<input type="text" class="form-control" id="kode_paket" name="kode_paket" readonly>
    				</div>
                    <div class="form-group">
    					<label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" readonly>
                    </div>
                    <div class="form-group">
    					<label for="harga_paket">Harga Paket</label>
                        <input type="number" class="form-control" id="harga_paket" name="harga_paket" readonly>
                    </div>
                    <div class="form-group">
    					<label for="kualitas">Kelas</label>
                        <input type="text" class="form-control" id="kualitas" name="kualitas" readonly>
                    </div>
                    <div class="form-group">
    					<label for="sisa_kuota">Sisa Kuota</label>
                        <input type="number" class="form-control" id="sisa_kuota" name="sisa_kuota" readonly>
                    </div>
                    <div class="form-group">
    					<label for="sisa_kuota">Lama Perjalanan</label>
                        <input type="text" class="form-control" id="lama_wisata" name="lama_wisata" readonly>
                    </div>
                    <div class="form-group">
    					<label for="id_maskapai">Maskapai</label>
                        <select class="form-control" name="id_maskapai" id="id_maskapai" readonly>
                            <option value="">Pilih Maskapai</option>
                            <?php foreach ($maskapai as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['maskapai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
    					<label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan" placeholder="Tanggal keberangkatan" readonly>
                    </div>
                    <div class="form-group">
    					<label for="hotel_pertama">Hotel Pertama</label>
                        <input type="text" class="form-control" id="hotel_pertama" name="hotel_pertama" readonly>
                    </div>
                    <div class="form-group">
    					<label for="hotel_kedua">Hotel Kedua</label>
                        <input type="text" class="form-control" id="hotel_kedua" name="hotel_kedua" readonly>
                    </div>
                    <div class="form-group">
    					<label for="hotel_ketiga">Hotel Ketiga</label>
                        <input type="text" class="form-control" id="hotel_ketiga" name="hotel_ketiga" readonly>
                    </div>
                    <div class="form-group">
    					<label for="tour_leader">Tour Leader</label>
                        <input type="text" class="form-control" id="tour_leader" name="tour_leader" readonly>
                    </div>
                    <div class="form-group">
    					<label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" readonly></textarea>
                    </div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="button" class="btn btn-danger" id="button_pesan" data-dismiss="modal" data-toggle="modal">Daftar</button>
    			</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal -->
<?php foreach ($paket_wisata as $row): ?>
<div class="modal fade" id="pesanPaketWisataModal<?= $row['pid'] ?>" tabindex="-1" aria-labelledby="pesanPaketWisataModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="pesanPaketWisataModalLabel">Isi Biodata Calon Jama'ah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('Member/insertJamaah') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="<?= $row['id'] ?>">
					<div class="form-group">
                        <label for="kode_agen">Kode Agen</label>
                        <input type="text" class="form-control" id="kode_agen" name="kode_agen" placeholder="(Masukkan Kode Agen, Jika Anda mendaftar melalui Agen)" value="<?= set_value('nama_lengkap') ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">Nomor KTP</label>
                        <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="<?= set_value('no_ktp') ?>">
                    </div>
                    <div class="form-group">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
                            <option value="">Pilih Gender</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" value="<?= set_value('alamat') ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= set_value('no_hp') ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_pendidikan">Pendidikan Terakhir</label>
                        <select class="form-control" name="id_pendidikan" id="id_pendidikan" value="<?= set_value('id_pendidikan') ?>">
                            <option value="">Pilih Pendidikan</option>
                            <?php foreach ($pendidikan as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['pendidikan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
                    </div>
                    <div class="form-group">
                        <label for="riwayat_umroh">Riwayat Umroh/Haji</label>
                        <select class="form-control" name="riwayat_umroh" id="riwayat_umroh" value="<?= set_value('riwayat_umroh') ?>">
                            <option value="">Pilih Riwayat</option>
                                <option value="Pernah">Pernah</option>
                                <option value="Belum Pernah">Belum Pernah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <div class="form-control" style="border: none;">
                            <input type="hidden" name="golongan_darah" id="golongan_darah" value="<?= set_value('golongan_darah') ?>">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah" value="A">
                                <label class="form-check-label" for="golongan_darah">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah" value="B">
                                <label class="form-check-label" for="golongan_darah">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah" value="AB">
                                <label class="form-check-label" for="golongan_darah">AB</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah" value="O">
                                <label class="form-check-label" for="golongan_darah">O</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input detail" type="radio" name="cek_paspor" id="cek_paspor" value="belum" checked>
                        <label class="form-check-label" for="cek_paspor">Belum Memiliki Paspor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input detail" type="radio" name="cek_paspor" id="cek_paspor" value="sudah">
                        <label class="form-check-label" for="cek_paspor">Sudah Memiliki Paspor</label>
                    </div>
                    <div id="paspor">
                        <div class="form-group">
                            <label for="no_paspor">Nomor Paspor</label>
                            <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?= set_value('no_paspor') ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_di_paspor">Nama Sesuai Paspor</label>
                            <input type="text" class="form-control" id="nama_di_paspor" name="nama_di_paspor" value="<?= set_value('nama_di_paspor') ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_cetak_paspor">Tanggal Cetak Paspor</label>
                            <input type="date" class="form-control" id="tanggal_cetak_paspor" name="tanggal_cetak_paspor" value="<?= set_value('tanggal_cetak_paspor') ?>">
                        </div>
                        <div class="form-group">
                            <label for="tempat_pembuatan_paspor">Tempat Pembuatan Paspor</label>
                            <input type="text" class="form-control" id="tempat_pembuatan_paspor" name="tempat_pembuatan_paspor" value="<?= set_value('tempat_pembuatan_paspor') ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_habis_berlaku_paspor">Tanggal Habis Masa Berlaku Paspor</label>
                            <input type="date" class="form-control" id="tanggal_habis_berlaku_paspor" name="tanggal_habis_berlaku_paspor" value="<?= set_value('tanggal_habis_berlaku_paspor') ?>">
                        </div>    
                    </div>
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-danger">Daftar</button>
    			</div>
            </form>
		</div>
	</div>
</div>
<?php endforeach ?>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#paspor").css("display","none");
        $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
            if ($("input[name='cek_paspor']:checked").val() == "sudah" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                $("#paspor").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
            } else {
                $("#paspor").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
            }
        });
    });
</script>