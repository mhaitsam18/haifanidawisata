<!--content body start-->
<div id="content_wrapper">
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li><?= $title ?></li>
		</ul>
	</div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<div class="col-md-12">
				<div class="tour_packages_right_section left_space_40">
					<div class="tour_packages_description">
						<div class="tour_heading">
							<h4>Jadwal Keberangkatan</h4>
						</div>
						<!-- <p class="more_text">There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour. There are many variations of passages of Lorem Ipsu available, but the joy have suffered alteration in some format,by injected humour users Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
					</div>
					<div class="full_width sorting_panel">
						<div class="sorting_destination">
							<select class="form-control selectpicker" id="pilih" name="keberangkatan" id="keberangkatan">
								<option value="">Titik Keberangkatan</option>
								<?php
								foreach ($keberangkatan as $row) {
									$keberangkatan = $row['keberangkatan'];
								?>
									<option value="<?= "$keberangkatan"; ?>"><?= "$keberangkatan"; ?></option>
								<?php
								}
								?>
							</select>
							<i class="fa fa-chevron-down"></i>
						</div>
					</div>
					<div class="full_width sorting_places_section">
						<div id="ctn">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No. </th>
											<th>Keberangkatan</th>
											<th>Tujuan</th>
											<th>Jadwal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($tiket_shuttle as $row) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row['keberangkatan']; ?></td>
												<td><?php echo $row['tujuan']; ?></td>
												<td><?php echo $row['jadwal']; ?></td>
											</tr>
										<?php
											$no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// ambil elements yg di buutuhkan
	var keyword = document.getElementById('pilih');

	var container = document.getElementById('ctn');

	// tambahkan event ketika keyword ditulis

	keyword.addEventListener('change', function() {
		//buat objek ajax
		var xhr = new XMLHttpRequest();

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		}

		xhr.open('GET', '<?= base_url('Informasi/list_keberangkatan/') ?>' + keyword.value, true);
		xhr.send();
	})
</script>