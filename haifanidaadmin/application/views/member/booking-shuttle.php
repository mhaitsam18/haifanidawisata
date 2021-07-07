	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Shuttle"></div>
		<div id="tampilkan" style="text-align: center; vertical-align: middle; height: 40px;" class="bg-danger text-light">
			Silahkan Pilih Kursi dan Isi data dalam waktu 3 menit, Jika tidak maka Transaksi akan dibatalkan
		</div>
		<img src="<?php echo base_url('assets/img/mobil.jpeg') ?>" class="img-fluid">
		<div class="card mt-3">
			<div class="card-header">
				Isi data Berikut
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('Member/prosesBooking') ?>" method="POST">
					<input type="hidden" name="keberangkatan" value="<?=$keberangkatan?>">
					<input type="hidden" name="tujuan" value="<?=$tujuan?>">
					<input type="hidden" name="jadwal" value="<?=$jadwal?>">
					<div class="row">
						<div class="col-lg-4">
							<table class="table table-border">
								<thead class="thead-light">
									<tr>
										<td colspan="4" scope="col">Pilih Kursi</td>
									</tr>
								</thead>
								<tbody>
									<?php 
									$a=0;
									foreach ($cari_kursi as $row) {
										$harga=$row['harga'];
										$arr_data[$a] = $row['ketersediaan'];
										$a++;
									}
									?>
									<tr>
										<?php for ($i=0; $i <= 1; $i++) { ?> 
											<?php if ($arr_data[$i]=="Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]"><br><?php echo $i+1; ?></td>
											<?php elseif ($arr_data[$i]=="Tidak Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]" disabled><br><?php echo $i+1; ?></td>
											<?php endif ?>
										<?php } ?>
										<td scope="col"></td>
										<td scope="col"><img src="<?php echo base_url('assets/img/setir.png') ?>" width="30"></td>
									</tr>
									<tr>
										<td scope="col"></td>
										<?php for ($i=2; $i <= 4; $i++) { ?> 
											<?php if ($arr_data[$i]=="Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]"><br><?php echo $i+1; ?></td>
											<?php elseif ($arr_data[$i]=="Tidak Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]" disabled><br><?php echo $i+1; ?></td>
											<?php endif ?>
										<?php } ?>
									</tr>
									<tr>
										<?php if ($arr_data[5]=="Tersedia"): ?>
											<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="6" name="kursi[]"><br>6</td>
										<?php elseif ($arr_data[5]=="Tidak Tersedia"): ?>
											<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="6" name="kursi[]" disabled><br>6</td>
										<?php endif ?>
										<td scope="col"></td>
										<?php for ($i=6; $i <= 7; $i++) { ?> 
											<?php if ($arr_data[$i]=="Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]"><br><?php echo $i+1; ?></td>
											<?php elseif ($arr_data[$i]=="Tidak Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]" disabled><br><?php echo $i+1; ?></td>
											<?php endif ?>
										<?php } ?>
									</tr>
									<tr>
										<?php if ($arr_data[8]=="Tersedia"): ?>
											<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="9" name="kursi[]"><br>9</td>
										<?php elseif ($arr_data[8]=="Tidak Tersedia"): ?>
											<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="9" name="kursi[]" disabled><br>9</td>
										<?php endif ?>
										<td scope="col"></td>
										<?php for ($i=9; $i <= 10; $i++) { ?> 
											<?php if ($arr_data[$i]=="Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]"><br><?php echo $i+1; ?></td>
											<?php elseif ($arr_data[$i]=="Tidak Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]" disabled><br><?php echo $i+1; ?></td>
											<?php endif ?>
										<?php } ?>
									</tr>
									<tr>
										<?php for ($i=11; $i <= 14; $i++) { ?> 
											<?php if ($arr_data[$i]=="Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]"><br><?php echo $i+1; ?></td>
											<?php elseif ($arr_data[$i]=="Tidak Tersedia"): ?>
												<td scope="col"><input type="checkbox" id="kursi" onclick="setChecks(this)" value="<?=$i+1?>" name="kursi[]" disabled><br><?php echo $i+1; ?></td>
											<?php endif ?>
										<?php } ?>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-4">
							<table class="table">
								<thead class="thead-light">
									<tr>
										<td scope="col">Data Penumpang</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="form-group">
												<label for="FormControlInputNoHp">Nomor HandPhone (Wajib)</label>
												<input type="number" class="form-control" id="FormControlInputNoHp" placeholder="Enter Phone Number" name="no_hp" required>
											</div>
											<div class="form-group">
												<label for="FormControlInputEmail">Email (Wajib)</label>
												<input type="email" class="form-control" id="FormControlInputEmail" placeholder="Enter Email" name="email" required>
											</div>
											<?php for ($i=1; $i <=$penumpang ; $i++) { ?>
												<div class="form-group">
													<label for="NamaPenumpang<?=$i?>">Nama Penumpang <?php echo $i; ?></label>
													<input type="text" class="form-control" id="NamaPenumpang<?=$i?>" placeholder="Enter Name" name="nama<?=$i?>" required pattern="[A-Za-z ]+">
												</div>
											<?php } ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-4">
							<table class="table">
								<thead class="thead-light">
									<tr>
										<td scope="col">Informasi Lainnya</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="form-group">
												<label for="FormControlInputPenumpang">Jumlah Penumpang</label>
												<input type="number" class="form-control" id="FormControlInputPenumpang" readonly name="jumlah_penumpang" value="<?=$penumpang?>">
											</div>
											<div class="form-group">
												<label for="FormControlInputTotal">Total Harga</label>
												<input type="text" class="form-control" id="FormControlInputTotal" name="total_harga" readonly value="<?php echo "Rp. ".number_format($penumpang*$harga).".00" ?>">
											</div>
											<div class="form-group">
												<input type="submit" class="btn btn-danger" name="simpan" id="simpan" value="Booking Sekarang" >
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php if ($penumpang==1): ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var checkCount=0
		var maxChecks= 1
		function setChecks(obj){
			if(obj.checked){
				checkCount=checkCount+1
			}else{
				checkCount=checkCount-1
			}
			if (checkCount>maxChecks){
				obj.checked=false
				checkCount=checkCount-1
				alert('Anda hanya bisa memilih maksimal '+maxChecks+' kursi')
			}
		}
		$('input[type=checkbox]').on('change', function(evt) {
			var kursi = $('input[id=kursi]:checked');
			if(kursi.length < 1){
				$("input[name=simpan]").prop("disabled", true);
			}else{
				$("input[name=simpan]").prop("disabled", false);
			}
		});
	</script>
<?php elseif ($penumpang==2): ?>
	<script type="text/javascript">
		var checkCount=0
		var maxChecks= 2
		function setChecks(obj){
			if(obj.checked){
				checkCount=checkCount+1
			}else{
				checkCount=checkCount-1
			}
			if (checkCount>maxChecks){
				obj.checked=false
				checkCount=checkCount-1
				alert('Anda hanya bisa memilih maksimal '+maxChecks+' kursi')
			}
		}
		$("input[type=checkbox]").on('change', function(evt) {
			var kursi = $("input[id=kursi]:checked");
			if(kursi.length < 2){
				$("input[name=simpan]").prop("disabled", true);
			}else{
				$("input[name=simpan]").prop("disabled", false);
			}
		});
	</script>
<?php elseif ($penumpang==3): ?>
	<script type="text/javascript">
		var checkCount=0
		var maxChecks= 3
		function setChecks(obj){
			if(obj.checked){
				checkCount=checkCount+1
			}else{
				checkCount=checkCount-1
			}
			if (checkCount>maxChecks){
				obj.checked=false
				checkCount=checkCount-1
				alert('Anda hanya bisa memilih maksimal '+maxChecks+' kursi')
			}
		}
		$('input[type=checkbox]').on('change', function(evt) {
			var kursi = $('input[id=kursi]:checked');
			if(kursi.length < 3){
				$("input[name=simpan]").prop("disabled", true);
			}else{
				$("input[name=simpan]").prop("disabled", false);
			}
		});
	</script>
<?php endif ?>