<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>ContactFrom_v8/css/main.css">
<!--content body start-->
<div id="content_wrapper"> 
	<!--page title start-->
	<div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?= base_url('assets/') ?>images/bg/page_title_bg.jpg);">
		<ul>
			<li>Shuttle</li>
		</ul>
	</div>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Shuttle"></div>
	<div class="shuttle" data-shuttle="<?= $this->session->flashdata('shuttle'); ?>"></div>
	<div class="shuttle_gagal" data-shuttle="<?= $this->session->flashdata('shuttle_gagal'); ?>"></div>
	<!--page title end-->
	<div class="clearfix"></div>
	<div class="container">
		<div class="row push-down-100">
			<div class="col-md-12">
				<div class="container-contact100">
				    <div class="contact100-map" id="google_map" data-map-x="-6.2996093474320345" data-map-y="107.29940432617946" data-pin="<?= base_url('assets/') ?>ContactFrom_v8/images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

				    <div class="wrap-contact100" style="margin-right: 800px;">
				        <form class="contact100-form validate-form" method="POST" action="<?= base_url("Shuttle/cariKeberangkatan") ?>">
				            <span class="contact100-form-title">
				                Reservasi Online
				            </span>

				            <div class="wrap-input100 validate-input" data-validate="Name is required">
				                <input class="input100" type="date" readonly name="tanggal_pemesanan" value="<?=date("Y-m-d"); ?>" min="<?=date("Y-m-d"); ?>">
				                <span class="focus-input100-1"></span>
				                <span class="focus-input100-2"></span>
				            </div>
				            <div class="form-group">
				                <label for="exampleFormControlSelect1">Pilih Kota Keberangkatan</label>
				                <select class="form-control" id="pilih" name="keberangkatan" required>
				                    <option value="">---Pilih---</option>
				                    <?php 
				                    foreach ($keberangkatan as $row) {
				                        $keberangkatan = $row['keberangkatan'];
				                        ?>
				                        <option value="<?php echo "$keberangkatan"; ?>"><?php echo "$keberangkatan"; ?></option>
				                        <?php
				                    }
				                     ?>
				                </select>
				            </div>
				            <div id="ctn">
				                <div class="form-group">
				                    <label for="exampleFormControlSelect2">Pilih Tujuan</label>
				                    <select class="form-control" id="exampleFormControlSelect2" name="tujuan" required>
				                        <option>---Pilih---</option>

				                    </select>
				                </div>
				            </div>
				            <div class="form-group">
				                <label for="JumlahPenumpang">Jumlah Penumpang</label>
				                <select class="form-control" id="JumlahPenumpang" name="jml_penumpang" required>
				                    <option value="1">1 Penumpang</option>
				                    <option value="2">2 Penumpang</option>
				                    <option value="3">3 Penumpang</option>
				                </select>
				            </div>

				            <div class="container-contact100-form-btn">
				                <button class="contact100-form-btn" type="submit" name="submit">
				                    Cari Keberangkatan
				                </button>
				            </div>
				        </form>
				    </div>
				</div>
				<script>
				  window.dataLayer = window.dataLayer || [];
				  function gtag(){dataLayer.push(arguments);}
				  gtag('js', new Date());

				  gtag('config', 'UA-23581568-13');


				  $(document).ready(function(){

				    $("#sel_keberangkatan").change(function(){
				        var keberangkatan = $(this).val();

				        $.ajax({
				            url: '<?= base_url('Shuttle/prosesTujuan'); ?>',
				            type: 'post',
				            data: {keberangkatan:keberangkatan},
				            dataType: 'json',
				            success:function(response){

				                var len = response.length;

				                $("#sel_tujuan").empty();
				                for( var i = 0; i<len; i++){
				                    var tujuan = response[i]['tujuan'];
				                    
				                    $("#sel_tujuan").append("<option value='"+tujuan+"'>"+tujuan+"</option>");

				                }
				            }
				        });
				    });

				});
				</script>
			</div>
		</div>
	</div>
</div>
<!-- <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script> -->
<script>
    // ambil elements yg di buutuhkan
// var keyword = document.getElementById('pilih');

// var container = document.getElementById('ctn');

// // tambahkan event ketika keyword ditulis

// keyword.addEventListener('change', function () {


//     //buat objek ajax
//     var xhr = new XMLHttpRequest();

//     // cek kesiapan ajax
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     xhr.open('GET', '<?= base_url('Shuttle/getTujuan/') ?>' + keyword.value, true);
//     xhr.send();


// });
</script>