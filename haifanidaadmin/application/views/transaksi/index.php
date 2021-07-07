	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Transaksi"></div>
		<div class="row">
			<div class="col-lg-6">
				<div class="row mb-3">
					<div class="col-md">
						<form action="" method="post">
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword" value="<?= set_value('keyword') ?>">
								</div>
								<div class="col">
									<select class="form-control" name="kategori" id="kategori">
										<option value="All Category" selected>All Category</option>
										<?php foreach ($kategori as $row): ?>
											<?php if ($row['id']==$this->session->userdata('pilih_kategori')): ?>
												<option value="<?= $row['id'] ?>" selected><?= $row['kategori'] ?></option>
											<?php else: ?>
												<option value="<?= $row['id'] ?>"><?= $row['kategori'] ?></option>
											<?php endif ?>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col">
									<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Search">
								</div>
								
							</div>
						</form>
					</div>
				</div>
				<?php foreach ($produk as $row): ?>
					<div class="card mb-3" style="max-width: 540px;">
						<div class="row no-gutters">
							<div class="col-md-4">
								<img src="<?= base_url('assets/img/produk/').$row['gambar'] ?>" alt="<?= $row['gambar'] ?>" style="width: 180px;">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h4 class="card-title" style="color: #a36362;"><?= $row['nama_produk'] ?></h5>
									<p class="card-text"><?= $row['deskripsi'] ?></p>
									<p class="card-text">
										<?php if ($row['stok']> 10): ?>
											<small class="text-muted font-weight-bold">
												Stok: <?= $row['stok'] ?>
											</small>
										<?php elseif($row['stok']> 0): ?>
											<small class="text-danger font-weight-bold">
												Stok tersisa <?= $row['stok'] ?> buah
											</small>
										<?php else: ?>
											<small class="text-danger font-weight-bold">
												Stok Habis
											</small>
										<?php endif ?>
									</p>
									<div class="btn btn-sm btn-success">Rp. <?= number_format($row['harga_jual'],2,',','.') ?></div>
									<a href="<?= base_url('Transaksi/tambahKeranjang/').$row['id'] ?>" class="btn btn-sm btn-primary">Tambah</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<?php if (empty($produk)): ?>
					Data not Found
				<?php endif ?>
				<div class="row justify-content-center mt-5">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
			<div class="col-lg-6">
				<?php if ($this->cart->total_items()>0): ?>
					<h3 class="h3 mt-5">Detail Keranjang</h3>
					<table class="table table-bordered" style="background-color: white;" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Produk</th>
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
									<td align="left"><?= 'Rp.'.number_format($item['price'],2,',','.') ?></td>
									<td align="left"><?= 'Rp.'.number_format($item['subtotal'],2,',','.') ?></td>
									<td>
										<a href="<?= base_url('Transaksi/kurangKeranjang/').$item['rowid'].'/'.$item['qty'] ?>" class="badge badge-danger"><i class="fas fa-minus"></i></a>
										<?= $item['qty'] ?>
										<a href="<?= base_url('Transaksi/tambahKeranjang/').$item['id'].'/'.$item['rowid'] ?>" class="badge badge-primary"><i class="fas fa-plus"></i></a>
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
					<button type="button" class="btn btn-danger float-right ml-3" data-toggle="modal" data-target="#checkoutModal">
						Check Out
					</button>
					<a href="<?= base_url('Transaksi/bersihkanKeranjang') ?>" class="btn btn-secondary float-right ml-3">
						Batal
					</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="checkoutModalLabel"><i class="fas fa-shopping-cart"></i> Check Out</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Transaksi/checkout') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="total">Total Harga</label>
						<input type="text" class="form-control" id="total" name="total" placeholder="Total Harga" value="<?= 'Rp. '.number_format($this->cart->total(),2,',','.') ?>" readonly>
						<input type="hidden" name="total_harga" id="total_harga" value="<?= $this->cart->total() ?>">
					</div>
					<div class="form-group">
						<label for="catatan">Catatan</label>
						<textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan"></textarea>
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