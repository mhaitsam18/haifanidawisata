    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pemesanan Shuttle"></div>
        <div class="shuttle" data-shuttle="<?= $this->session->flashdata('shuttle'); ?>"></div>
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Reservasi Online</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url("Member/cariKeberangkatan") ?>">

                        <div class="form-group">
                            <label for="waktu_pemesanan">Tanggal Keberangkatan</label>
                            <input class="form-control" type="date" readonly name="waktu_pemesanan" value="<?=date("Y-m-d"); ?>" min="<?=date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group">
                            <label for="keberangkatan">Pilih Kota Keberangkatan</label>
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
                                <label for="tujuan">Pilih Tujuan</label>
                                <select class="form-control" id="tujuan" name="tujuan" required>
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
                        <button class="btn btn-danger float-right" type="submit" name="submit">
                            Cari Keberangkatan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
            url: 'proses_tujuan.php',
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script>
    // ambil elements yg di buutuhkan
var keyword = document.getElementById('pilih');

var container = document.getElementById('ctn');

// tambahkan event ketika keyword ditulis

keyword.addEventListener('change', function () {


    //buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '<?= base_url('Member/getTujuan/') ?>' + keyword.value, true);
    xhr.send();


});
</script>