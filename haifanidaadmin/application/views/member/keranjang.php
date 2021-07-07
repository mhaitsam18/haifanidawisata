<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Anda"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Detail Keranjang</h3>
			<table class="table table-bordered" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Gambar</th>
						<th scope="col">Nama Produk</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Harga</th>
						<th scope="col">Sub Total</th>
						<th scope="col" style="max-width: 150px; min-width: 90px;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($this->session->userdata('cart_checkout')): ?>
						<?php $no=0; ?>
						<?php foreach ($this->cart->contents() as $item): ?>
							<tr>
								<th scope="row"><?= ++$no ?></th>
								<td><img src="<?= base_url('assets/img/produk/').$item['gambar'] ?>" class="img-thumbnail" style="width: 150px;"></td>
								<td><?= $item['name'] ?></td>
								<td><?= $item['qty'] ?></td>
								<td align="left"><?= 'Rp.'.number_format($item['price'],2,',','.') ?></td>
								<td align="left"><?= 'Rp.'.number_format($item['subtotal'],2,',','.') ?></td>
								<td>
									<a href="<?= base_url('Member/kurangKeranjang/').$item['rowid'].'/'.$item['qty'].'/keranjang' ?>" class="badge badge-warning"><i class="fas fa-minus"></i></a>
									<a href="<?= base_url('Member/tambahKeranjang/').$item['id'].'/'.$item['rowid'].'/keranjang' ?>" class="badge badge-primary"><i class="fas fa-plus"></i></a>
									<a href="<?= base_url('Member/hapusItem/').$item['rowid'].'/keranjang' ?>" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
							
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right"><b>Total : </b></td>
						<td align="left" colspan="2"><b><?= 'Rp.'.number_format($this->cart->total(),2,',','.') ?></b></td>
					</tr>
				</tfoot>
			</table>
			<button type="button" class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#checkoutModal">
				Check Out
			</button>
			<a href="<?= base_url('Member/bersihkanKeranjang/keranjang') ?>" class="btn btn-warning float-right ml-3">
				Bersihkan
			</a>
		</div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="checkoutModalLabel"><i class="fas fa-shopping-cart"></i> Check Out</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Member/checkout') ?>" method="post">
				<div class="modal-body">
						<div class="form-group">
							<label for="nama_penerima">Nama Penerima</label>
							<input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
						</div>
						<div class="form-group">
							<label for="no_hp_penerima">Nomor Hp. Penerima</label>
							<input type="number" class="form-control" id="no_hp_penerima" name="no_hp_penerima" placeholder="Nomor Hp. Penerima">
						</div>
						<div class="form-group">
							<label for="id_kurir">Kurir</label>
							<select class="form-control" id="id_kurir" name="id_kurir">
								<option selected disabled>Pilih Kurir</option>
								<?php foreach ($kurir as $row): ?>
									<option value="<?= $row['id'] ?>"><?= $row['kurir'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="alamat_penerima">Alamat Penerima</label>
							<textarea class="form-control" id="alamat_penerima" name="alamat_penerima" rows="3" placeholder="Alamat Penerima"></textarea>
						</div>
						<input type="hidden" name="id_metode_bayar" id="id_metode_bayar" value="1">
						<div class="form-group">
							<label for="total_harga">Total Harga</label>
							<input type="number" class="form-control" id="total_harga" name="total_harga" placeholder="Nomor Hp. Penerima" value="<?= $this->cart->total() ?>" readonly>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-success">Check Out</button>
				</div>
			</form>
		</div>
	</div>
</div>
