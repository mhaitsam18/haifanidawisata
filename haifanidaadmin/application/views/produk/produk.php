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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Produk"></div>
        <?= form_error('kode_produk','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('nama_produk','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('merk','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('id_kategori','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('stok','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('harga_beli','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('harga_jual','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('deskripsi','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= form_error('gambar','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="row">
        	<div class="col-lg-12">
        		<a href="" class="btn btn-primary mb-3 newProdukModalButton" data-toggle="modal" data-target="#newProdukModal">Tambah Produk Baru</a>
                <?php if ($this->cart->total_items()>0 && $this->session->userdata('cart_supply')): ?>
                    <a href="#lihatPasokan" class="btn btn-success mb-3">Lihat Detail Pasokan</a>
                    <div class="row">
                        <h5 class="h5 mb-4 text-gray-800">Total Item: <?=$this->cart->total_items() ?></h5>
                    </div>
                <?php endif ?>
        		<table class="table table-hover" id="">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($produk as $key): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
            					<td><?= $key['kode_produk'] ?></td>
                                <td><?= $key['nama_produk'] ?></td>
                                <td><?= $key['merk'] ?></td>
                                <td><?= $key['kategori'] ?></td>
                                <td><?= $key['stok'] ?></td>
                                <td><?= "Rp. ".number_format($key['harga_beli']).",00" ?></td>
                                <td><?= "Rp. ".number_format($key['harga_jual']).",00" ?></td>
                                <td><?= $key['deskripsi'] ?></td>
                                <td><img src="<?= base_url('assets/img/produk/').$key['gambar'] ?>" class="img-thumbnail" style="width: 300px;"></td>
            					<td>
            						<a href="<?= base_url("Produk/updateProduk/$key[pid]"); ?>" class="badge badge-success updateProdukModalButton" data-toggle="modal" data-target="#newProdukModal" data-id="<?=$key['pid']?>">Edit</a>
            						<a href="<?= base_url("Produk/deleteProduk/$key[pid]"); ?>" class="badge badge-danger tombol-hapus" data-hapus="Produk">Delete</a>
                                    <a href="<?= base_url("Produk/pasokProduk/$key[pid]"); ?>" class="badge badge-info pasokProdukModalButton"  data-toggle="modal" data-target="#pasokProdukModal" data-id="<?=$key['pid']?>">Tambah Stok</a>
            					</td>
            				</tr>
            			<?php $no++; ?>
        				<?php endforeach ?>
        			</tbody>
        		</table>
        	</div>
        </div>
        <div class="col-lg-12" id="lihatPasokan">
            <?php if ($this->cart->total_items()>0 && $this->session->userdata('cart_supply')): ?>
                <h3 class="h3 mt-5">Detail Pasokan</h3>
                <table class="table table-bordered" style="background-color: white;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Nama Pemasok/Supplier</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col" style="max-width: 150px; min-width: 90px;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; ?>
                        <?php foreach ($this->cart->contents() as $item): ?>
                            <tr>
                                <th scope="row"><?= ++$no ?></th>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['pemasok'] ?></td>
                                <td align="left"><?= 'Rp.'.number_format($item['price'],2,',','.') ?></td>
                                <td align="left"><?= 'Rp.'.number_format($item['subtotal'],2,',','.') ?></td>
                                <td>
                                    <a href="<?= base_url('Produk/kurangPasokan/').$item['rowid'].'/'.$item['qty'].'/'.$item['pemasok'] ?>" class="badge badge-danger"><i class="fas fa-minus"></i></a>
                                    <?= $item['qty'] ?>
                                    <a href="<?= base_url('Produk/tambahPasokan/').$item['rowid'].'/'.$item['qty'].'/'.$item['pemasok'] ?>" class="badge badge-primary"><i class="fas fa-plus"></i></a>
                                    <a href="<?= base_url('Produk/hapusItem/').$item['rowid'] ?>" class="badge badge-dark"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><b>Total : </b></td>
                            <td align="left" colspan="2"><b><?= 'Rp.'.number_format($this->cart->total(),2,',','.') ?></b></td>
                        </tr>
                    </tfoot>
                </table>
                <a href="<?= base_url('Produk/supply') ?>" class="btn btn-danger float-right ml-3 mb-3">
                    Simpan
                </a>
                <a href="<?= base_url('Produk/bersihkanPasokan') ?>" class="btn btn-secondary float-right ml-3 mb-3">
                    Batal
                </a>
            <?php endif ?>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newProdukModal" tabindex="-1" aria-labelledby="newProdukModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newProdukModalLabel">Tambah Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Produk/produk') ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="id">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Kode Produk">
                        <?= form_error('kode_produk','<small class="text-danger pl-3">','</small>'); ?>
    				</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pemasok" name="pemasok" placeholder="Pemasok">
                        <?= form_error('pemasok','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                        <?= form_error('nama_produk','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
                        <?= form_error('merk','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $key): ?>
                                <option value="<?= $key['id'] ?>"><?= $key['kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                        <?= form_error('stok','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        <?= form_error('harga_beli','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        <?= form_error('harga_jual','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar</label>
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

<div class="modal fade" id="pasokProdukModal" tabindex="-1" aria-labelledby="pasokProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pasokProdukModalLabel">Tambah Stok Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Produk/pasokProduk') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="pasok_id" id="pasok_id">
                <input type="hidden" name="pasok_gambar" id="pasok_gambar">
                <div class="modal-body"><div class="form-group">
                        <input type="text" class="form-control" id="pasok_nama_produk" name="pasok_nama_produk" placeholder="Nama Produk" readonly>
                        <?= form_error('pasok_nama_produk','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pasok_merk" name="pasok_merk" placeholder="Merk" readonly="">
                        <?= form_error('pasok_merk','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pasok_pemasok" name="pasok_pemasok" placeholder="Pemasok">
                        <?= form_error('pasok_pemasok','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pasok_harga_beli" name="pasok_harga_beli" placeholder="Harga Beli">
                        <?= form_error('pasok_harga_beli','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pasok_stok" name="pasok_stok" placeholder="Jumlah Pasokan">
                        <?= form_error('pasok_stok','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" id="save" class="btn btn-primary" value="save">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

