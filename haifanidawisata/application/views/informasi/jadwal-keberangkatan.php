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
						<!-- <p class="more_text">There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsu available, but the joy have suffered alteration in some format,by injected humour users Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
					</div>
					<div class="full_width sorting_places_section">
						<div id="ctn">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No. </th>
											<th>Tanggal Keberangkatan</th>
											<th>Nama Paket</th>
											<th>Bintang</th>
											<th>Destinasi</th>
											<th>Jumlah Peserta</th>
											<th>Lama Trip</th>
											<th>Maskapai</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										foreach ($jadwal_keberangkatan as $row) { ?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= date('l, j F Y', strtotime($row['tanggal_keberangkatan'])); ?></td>
												<td><?= $row['nama_paket']; ?></td>
												<td><?= $row['bintang']; ?></td>
												<td><?= $row['destinasi']; ?></td>
												<td><?= $row['jumlah_terpesan']; ?></td>
												<td><?= $row['lama_wisata']; ?></td>
												<td><?= $row['maskapai']; ?></td>
											</tr>
											<?php
											$no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>