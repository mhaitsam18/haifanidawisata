    <style type="text/css">
        body{
            overflow-y: scroll;
            scroll-behavior: smooth;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Paket Wisata"></div>
        <?= form_error('kode_paket','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('nama_paket','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('harga_paket','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('kualitas','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('kuota','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('lama_wisata','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('id_kategori_wisata','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('id_destinasi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('id_maskapai','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('tanggal_keberangkatan','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('hotel_pertama','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('hotel_kedua','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('hotel_ketiga','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('deskripsi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('tour_leader','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
        	<div class="col-lg-12">
        		<a href="" class="btn btn-primary mb-3 newPaketWisataModalButton" data-toggle="modal" data-target="#newPaketWisataModal">Tambah Paket Wisata Baru</a>
        		<table class="table table-responsive" id="">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">Kode Paket</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Harga Paket</th>
                            <th scope="col">Kualitas</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">Sisa Kuota</th>
                            <th scope="col">Lama Perjalanan</th>
                            <th scope="col">Kategori Wisata</th>
                            <th scope="col">Destinasi</th>
                            <th scope="col">Maskapai</th>
                            <th scope="col">Tanggal keberangkatan</th>
                            <th scope="col">Hotel Pertama</th>
                            <th scope="col">Hotel Kedua</th>
                            <th scope="col">Hotel Ketiga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tour Leader</th>
                            <th scope="col">Gambar</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($paket_wisata as $key): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
            					<td><?= $key['kode_paket'] ?></td>
                                <td><?= $key['nama_paket'] ?></td>
                                <td><?= "Rp. ".number_format($key['harga_paket']).",00" ?></td>
                                <td><?= $key['kualitas'] ?></td>
                                <td><?= $key['kuota'] ?></td>
                                <td><?= $key['kuota']-$key['jumlah_terpesan'] ?></td>
                                <td><?= $key['lama_wisata'].' Hari' ?></td>
                                <td><?= $key['kategori_wisata'] ?></td>
                                <td><?= $key['destinasi'] ?></td>
                                <td><?= $key['maskapai'] ?></td>
                                <td><?= date('d F Y', strtotime("$key[tanggal_keberangkatan]")); ?></td>
                                <td><?= $key['hotel_pertama'] ?></td>
                                <td><?= $key['hotel_kedua'] ?></td>
                                <td><?= $key['hotel_ketiga'] ?></td>
                                <td><?= $key['deskripsi'] ?></td>
                                <td><?= $key['tour_leader'] ?></td>
                                <td><img src="<?= base_url('assets/img/paket-wisata/').$key['gambar'] ?>" class="img-thumbnail" style="width: 300px;"></td>
            					<td>
            						<a href="<?= base_url("Wisata/updatePaketWisata/$key[pid]"); ?>" class="badge badge-success updatePaketWisataModalButton" data-toggle="modal" data-target="#newPaketWisataModal" data-id="<?=$key['pid']?>">Edit</a>
            						<a href="<?= base_url("Wisata/deletePaketWisata/$key[pid]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Maskapai">Delete</a>
                                    <a href="<?= base_url("Wisata/fasilitas/$key[pid]"); ?>" class="badge badge-info" data-hapus="Maskapai">Fasilitas</a>
            					</td>
            				</tr>
            			<?php $no++; ?>
        				<?php endforeach ?>
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
</div>
<div class="modal fade" id="newPaketWisataModal" tabindex="-1" aria-labelledby="newPaketWisataModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPaketWisataModalLabel">Tambah Paket Wisata</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Wisata/paketWisata') ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="id">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" class="form-control" id="kode_paket" name="kode_paket" placeholder="Kode Paket">
                        <?= form_error('kode_paket','<small class="text-danger pl-3">','</small>'); ?>
    				</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama Paket">
                        <?= form_error('nama_paket','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga_paket" name="harga_paket" placeholder="Harga Paket">
                        <?= form_error('harga_paket','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kualitas" name="kualitas" placeholder="Kualitas">
                        <?= form_error('kualitas','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="bintang" id="bintang">
                            <option value="" selected disabled>Pilih Bintang</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="kuota" name="kuota" placeholder="Kuota">
                        <?= form_error('kuota','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="lama_wisata" name="lama_wisata" placeholder="Lama Wisata">
                        <?= form_error('lama_wisata','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_kategori_wisata" id="id_kategori_wisata">
                            <option value="">Pilih Kategori Wisata</option>
                            <?php foreach ($kategori_wisata as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['kategori_wisata'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_destinasi" id="id_destinasi">
                            <option value="">Pilih Destinasi Wisata</option>
                            <?php foreach ($destinasi as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['destinasi'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_maskapai" id="id_maskapai">
                            <option value="">Pilih Maskapai</option>
                            <?php foreach ($maskapai as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['maskapai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan" placeholder="Tanggal keberangkatan">
                        <?= form_error('tanggal_keberangkatan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_pertama" name="hotel_pertama" placeholder="Hotel Pertama">
                        <?= form_error('hotel_pertama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_kedua" name="hotel_kedua" placeholder="Hotel Kedua">
                        <?= form_error('hotel_kedua','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hotel_ketiga" name="hotel_ketiga" placeholder="Hotel Ketiga">
                        <?= form_error('hotel_ketiga','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tour_leader" name="tour_leader" placeholder="Tour Leader">
                        <?= form_error('tour_leader','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Thumbnail</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
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