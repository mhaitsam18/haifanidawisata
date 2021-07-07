<!-- Footer -->
            <footer class="sticky-footer"  style="background-color: #4EB0DA !important;">
                <div class="container my-auto">
                    <div class="copyright text-center text-white my-auto">
                        <?php $dashboard = $this->db->get('dashboard')->row_array(); ?>
                        <span>Copyright &copy; Proyek Akhir <?= $dashboard['footer'].' '.date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>


    <!--Chart Js-->
    <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        const flashData = $('.flash-data').data('flashdata');
        const jamaah = $('.flash-jamaah').data('jamaah');
        const shuttle = $('.shuttle').data('shuttle');
        const objek = $('.flash-data').data('objek');
        console.log(flashData);
        console.log(objek);
        if (jamaah) {
            Swal.fire({
                title: 'Data Jamaah',
                text: jamaah,
                icon: 'success'
            });
        }
        if (flashData) {
            //'Data ' + 
            Swal.fire({
                title: objek,
                text: flashData,
                icon: 'success'
            });
        }
        if (shuttle) {
            Swal.fire({
                title: 'Pemesanan Anda Berhasil',
                text: shuttle,
                icon: 'success'
            });
        }
        $('.tombol-hapus').on('click', function(e) {
            const hapus = $(this).data('hapus');
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data " + hapus + " akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        $('.tombol-terima').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Pesanan yang diterima, tidak dapat dikembalikan!",
                icon: 'warning',
                confirmButtonText: 'diterima',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.tombol-yakin').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "",
                icon: 'warning',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.minta-password').on('click', function(e) {
            Swal.fire({
                title: 'Masukkan Password',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                            )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `${result.value.login}'s avatar`,
                        imageUrl: result.value.avatar_url
                    })
                }
            })
        });
    </script>

    <script type="text/javascript">
        $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });

        $(function() {
            $('.newMenuModalButton').on('click', function(){
                $('#newMenuModalLabel').html('Add New Menu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>menu');
            });

            $('.updateMenuModalButton').on('click', function() {
                $('#newMenuModalLabel').html('Edit Menu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/updateMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>menu/getUpdateMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#menu').val(data.menu);
                        $('#active').attr("checked", true);
                        if(data.active == 1){
                            $('#active').attr("checked", true);
                        } else{
                            $('#active').attr("checked", false);
                        }
                    }
                });
            });
        });

        $(function() {
            $('.newHaifaMenuModalButton').on('click', function(){
                $('#newHaifaMenuModalLabel').html('Add New Menu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/HaifaMenu');
            });

            $('.updateHaifaMenuModalButton').on('click', function() {
                $('#newHaifaMenuModalLabel').html('Edit Menu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/updateHaifaMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>menu/getUpdateHaifaMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#menu').val(data.menu);
                        $('#url').val(data.url);
                        $('#active').attr("checked", true);
                        if(data.active == 1){
                            $('#active').attr("checked", true);
                        } else{
                            $('#active').attr("checked", false);
                        }
                        $('#dropdown').attr("checked", true);
                        if(data.dropdown == 1){
                            $('#dropdown').attr("checked", true);
                        } else{
                            $('#dropdown').attr("checked", false);
                        }
                        $('#login').attr("checked", true);
                        if(data.login == 1){
                            $('#login').attr("checked", true);
                        } else{
                            $('#login').attr("checked", false);
                        }
                        
                    }
                });
            });
        });

        $(function() {
            $('.newRoleModalButton').on('click', function(){
                $('#newRoleModalLabel').html('Add New Role');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Admin/role/');
            });

            $('.updateRoleModalButton').on('click', function() {
                $('#newRoleModalLabel').html('Edit Role');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Admin/updateRole');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>admin/getUpdateRole',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#role').val(data.role);
                    }
                });
            });
        });

        $(function() {
            $('.setRoleButton').on('click', function() {
                $('#setRoleLabel').html('Set User Role');
                $('.modal-footer button[type=submit]').html('Save');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>admin/getUserData',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#role_id').val(data.role_id);
                    }
                });
            });
        });

        $(function() {
            $('.newSubMenuModalButton').on('click', function(){
                $('#newSubMenuModalLabel').html('Add New SubMenu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/subMenu');
            });

            $('.updateSubMenuModalButton').on('click', function() {
                $('#newSubMenuModalLabel').html('Edit SubMenu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/updateSubMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>menu/getUpdateSubMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#menu_id').val(data.menu_id);
                        $('#url').val(data.url);
                        $('#icon').val(data.icon);
                        $('#is_active').attr("checked", true);
                        if(data.is_active == 1){
                            $('#is_active').attr("checked", true);
                        } else if(data.is_active == 0){
                            $('#is_active').attr("checked", false);
                        }
                    }
                });
            });
        });

        $(function() {
            $('.newHaifaSubMenuModalButton').on('click', function(){
                $('#newHaifaSubMenuModalLabel').html('Add New SubMenu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/haifaSubMenu');
            });

            $('.updateHaifaSubMenuModalButton').on('click', function() {
                $('#newHaifaSubMenuModalLabel').html('Edit SubMenu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>menu/updateHaifaSubMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>menu/getUpdateHaifaSubMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#menu_id').val(data.menu_id);
                        $('#url').val(data.url);
                        $('#is_active').attr("checked", true);
                        if(data.is_active == 1){
                            $('#is_active').attr("checked", true);
                        } else if(data.is_active == 0){
                            $('#is_active').attr("checked", false);
                        }
                    }
                });
            });
        });

        $(function() {
            $('.newAgamaModalButton').on('click', function(){
                $('#newAgamaModalLabel').html('Add New Religion');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/agama');
            });

            $('.updateAgamaModalButton').on('click', function() {
                $('#newAgamaModalLabel').html('Edit Religion');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateAgama');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateAgama',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#agama').val(data.agama);
                    }
                });
            });
        });

        $(function() {
            $('.newHaifaModalButton').on('click', function(){
                $('#newHaifaModalLabel').html('Add New Haifa Profile');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Konten/haifa')?>');
            });

            $('.updateHaifaModalButton').on('click', function() {
                $('#newHaifaModalLabel').html('Edit Haifa Profile');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Konten/updateHaifa')?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('Konten/getUpdateHaifa')?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#status').val(data.status);
                        if(data.status == 1){
                            $('#status_tidak').attr("checked", true);
                        } else if(data.status == 0){
                            $('#status_ya').attr("checked", true);
                        }
                        $('#nomor_sk').val(data.nomor_sk);
                        $('#tanggal_sk').val(data.tanggal_sk);
                        $('#nama_direktur').val(data.nama_direktur);
                        $('#alamat_kantor').val(data.alamat_kantor);
                        $('#akreditasi').val(data.akreditasi);
                        $('#tanggal_akreditasi').val(data.tanggal_akreditasi);
                        $('#lembaga_akreditasi').val(data.lembaga_akreditasi);
                    }
                });
            });
        });

        $(function() {
            $('.newPertanyaan1ModalButton').on('click', function(){
                $('#newPertanyaan1ModalLabel').html('Add New Question 1');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/pertanyaan/1');
            });

            $('.updatePertanyaan1ModalButton').on('click', function() {
                $('#newPertanyaan1ModalLabel').html('Edit Question 1');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/updatePertanyaan/1');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>/DataMaster/getUpdatePertanyaan1',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id1').val(data.id);
                        $('#pertanyaan1').val(data.pertanyaan);
                    }
                });
            });
        });

        $(function() {
            $('.newPertanyaan2ModalButton').on('click', function(){
                $('#newPertanyaan2ModalLabel').html('Add New Question 2');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/pertanyaan/2');
            });

            $('.updatePertanyaan2ModalButton').on('click', function() {
                $('#newPertanyaan2ModalLabel').html('Edit Question 2');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>/DataMaster/updatePertanyaan/2');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>/DataMaster/getUpdatePertanyaan2',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id2').val(data.id);
                        $('#pertanyaan2').val(data.pertanyaan);
                    }
                });
            });
        });

        $(function() {
            $('.newKontakModalButton').on('click', function(){
                $('#newKontakModalLabel').html('Add New Contact Person');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Konten/kontak')?>');
            });

            $('.updateKontakModalButton').on('click', function() {
                $('#newKontakModalLabel').html('Edit Contact Person');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Konten/updateKontak')?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('Konten/getUpdateKontak')?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#nama_lengkap').val(data.nama_lengkap);
                        $('#jabatan').val(data.jabatan);
                        $('#cabang').val(data.cabang);
                        $('#email').val(data.email);
                        $('#no_hp').val(data.no_hp);
                    }
                });
            });
        });

        $(function() {
            $('.newKantorModalButton').on('click', function(){
                $('#newKantorModalLabel').html('Add New Office');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/kantor')?>');
            });

            $('.updateKantorModalButton').on('click', function() {
                $('#newKantorModalLabel').html('Edit Office');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateKantor')?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateKantor')?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#nama_kantor').val(data.nama_kantor);
                        $('#nama_pimpinan').val(data.nama_pimpinan);
                        $('#alamat').val(data.alamat);
                        $('#region').val(data.region);
                        $('#email').val(data.email);
                        $('#nomor_telepon').val(data.nomor_telepon);
                        $('#latitude').val(data.latitude);
                        $('#longitude').val(data.longitude);
                    }
                });
            });
        });

        $(function() {
            $('.newAgenModalButton').on('click', function(){
                $('#newAgenModalLabel').html('Add New Agent');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Agen/agen')?>');
            });

            $('.updateAgenModalButton').on('click', function() {
                $('#newAgenModalLabel').html('Edit Agent');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Agen/updateAgen')?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('Agen/getUpdateAgen')?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kode_agen').val(data.kode_agen);
                        $('#perwakilan').val(data.perwakilan);
                        $('#alamat_kantor').val(data.alamat_kantor);
                        $('#email').val(data.email);
                        $('#no_hp').val(data.no_hp);
                    }
                });
            });
        });

        $(function() {
            $('.newKurirModalButton').on('click', function(){
                $('#newKurirModalLabel').html('Add New Shipper');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/kurir');
            });

            $('.updateKurirModalButton').on('click', function() {
                $('#newKurirModalLabel').html('Edit Shipper');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateKurir');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateKurir',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kurir').val(data.kurir);
                    }
                });
            });
        });

        $(function() {
            $('.newRekeningModalButton').on('click', function(){
                $('#newRekeningModalLabel').html('Add New Bank Account');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/rekening');
            });

            $('.updateRekeningModalButton').on('click', function() {
                $('#newRekeningModalLabel').html('Edit Bank Account');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateRekening');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateRekening',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#no_rekening').val(data.no_rekening);
                        $('#bank').val(data.bank);
                        $('#atas_nama').val(data.atas_nama);
                        $('#email').val(data.email);
                    }
                });
            });
        });

        $(function() {
            $('.newKategoriModalButton').on('click', function(){
                $('#newKategoriModalLabel').html('Add New Category');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/kategori');
            });

            $('.updateKategoriModalButton').on('click', function() {
                $('#newKategoriModalLabel').html('Edit Category');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateKategori');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateKategori',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kategori').val(data.kategori);
                    }
                });
            });
        });

        $(function() {
            $('.newDestinasiModalButton').on('click', function(){
                $('#newDestinasiModalLabel').html('Add New Destination');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/destinasi');
            });

            $('.updateDestinasiModalButton').on('click', function() {
                $('#newDestinasiModalLabel').html('Edit Destination');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateDestinasi');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateDestinasi',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#destinasi').val(data.destinasi);
                    }
                });
            });
        });

        $(function() {
            $('.newFasilitasModalButton').on('click', function(){
                $('#newFasilitasModalLabel').html('Add New Amenities');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Wisata/fasilitas/').$this->uri->segment(3) ?>');
            });

            $('.updateFasilitasModalButton').on('click', function() {
                $('#newFasilitasModalLabel').html('Edit Amenities');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Wisata/updateFasilitas/').$this->uri->segment(3) ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Wisata/getUpdateFasilitas',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#id_paket_wisata').val(data.id_paket_wisata);
                        $('#fasilitas').val(data.fasilitas);
                        $('#icon').val(data.icon);
                    }
                });
            });
        });

        $(function() {
            $('.updatePersyaratanModalButton').on('click', function() {
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>KelengkapanJamaah/getUpdatePersyaratan',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#id_jamaah').val(data.id_jamaah);
                        $('#ktp').val(data.ktp);
                        $('#kk').val(data.kk);
                        $('#foto34').val(data.foto34);
                        $('#foto46').val(data.foto46);
                        $('#paspor').val(data.paspor);
                        $('#visa').val(data.visa);
                        $('#biometrik').val(data.biometrik);
                        $('#suntik_vaksin').val(data.suntik_vaksin);
                        $('#manasik').val(data.manasik);
                        $('#rekam_medis').val(data.rekam_medis);
                    }
                });
            });
        });

        $(function() {
            $('.newKelengkapanModalButton').on('click', function(){
                $('#newKelengkapanModalLabel').html('Add New Completeness');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/kelengkapan');
            });

            $('.updateKelengkapanModalButton').on('click', function() {
                $('#newKelengkapanModalLabel').html('Edit Completeness');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateKelengkapan');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateKelengkapan',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kelengkapan').val(data.kelengkapan);
                    }
                });
            });
        });

        $(function() {
            $('.newKategoriWisataModalButton').on('click', function(){
                $('#newKategoriWisataModalLabel').html('Add New Category');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/kategoriWisata');
            });

            $('.updateKategoriWisataModalButton').on('click', function() {
                $('#newKategoriWisataModalLabel').html('Edit Category');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateKategoriWisata');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateKategoriWisata',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kategori_wisata').val(data.kategori_wisata);
                    }
                });
            });
        });

        $(function() {
            $('.newMaskapaiModalButton').on('click', function(){
                $('#newMaskapaiModalLabel').html('Add New Category');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/maskapai');
            });

            $('.updateMaskapaiModalButton').on('click', function() {
                $('#newMaskapaiModalLabel').html('Edit Category');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateMaskapai');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateMaskapai',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#maskapai').val(data.maskapai);
                    }
                });
            });
        });

        $(function() {
            $('.newMetodeBayarModalButton').on('click', function(){
                $('#newMetodeBayarModalLabel').html('Add New Payment');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/metodeBayar');
            });

            $('.updateMetodeBayarModalButton').on('click', function() {
                $('#newMetodeBayarModalLabel').html('Edit Payment');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateMetodeBayar');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateMetodeBayar',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#metode_bayar').val(data.metode_bayar);
                    }
                });
            });
        });

        $(function() {
            $('.newKontenModalButton').on('click', function(){
                $('#newKontenModalLabel').html('Add New Content');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/konten');
            });

            $('.updateKontenModalButton').on('click', function() {
                $('#newKontenModalLabel').html('Edit Content');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>DataMaster/updateKonten');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>DataMaster/getUpdateKonten',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#header').val(data.header);
                        $('#konten').val(data.content);
                        $('#footer').val(data.footer);
                    }
                });
            });
        });

        $(function() {
            $('.newProdukModalButton').on('click', function(){
                $('#newProdukModalLabel').html('Add New Produk');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Produk/produk');
                $('#stok').attr('readonly', false);
                $('#pemasok').attr('type', 'text');
            });

            $('.updateProdukModalButton').on('click', function() {
                $('#newProdukModalLabel').html('Edit Produk');
                $('#stok').attr('readonly', true);
                $('#pemasok').attr('type', 'hidden');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Produk/updateProduk');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Produk/getUpdateProduk',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kode_produk').val(data.kode_produk);
                        $('#nama_produk').val(data.nama_produk);
                        $('#merk').val(data.merk);
                        $('#id_kategori').val(data.id_kategori);
                        $('#stok').val(data.stok);
                        $('#harga_jual').val(data.harga_jual);
                        $('#harga_beli').val(data.harga_beli);
                        $('#deskripsi').val(data.deskripsi);
                    }
                });
            });
        });

        $(function() {
            $('.newPaketWisataModalButton').on('click', function(){
                $('#newPaketWisataModalLabel').html('Add New Paket Wisata');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Wisata/paketWisata');
            });

            $('.updatePaketWisataModalButton').on('click', function() {
                $('#newPaketWisataModalLabel').html('Edit Paket Wisata');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Wisata/updatePaketWisata');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Wisata/getUpdatePaketWisata',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kode_paket').val(data.kode_paket);
                        $('#nama_paket').val(data.nama_paket);
                        $('#harga_paket').val(data.harga_paket);
                        $('#kualitas').val(data.kualitas);
                        $('#bintang').val(data.bintang);
                        $('#sisa_kuota').val(data.kuota-data.jumlah_terpesan);
                        $('#kuota').val(data.kuota);
                        $('#jumlah_terpesan').val(data.jumlah_terpesan);
                        $('#lama_wisata').val(data.lama_wisata);
                        $('#id_destinasi').val(data.id_destinasi);
                        $('#id_kategori_wisata').val(data.id_kategori_wisata);
                        $('#id_maskapai').val(data.id_maskapai);
                        $('#tanggal_keberangkatan').val(data.tanggal_keberangkatan);
                        $('#hotel_pertama').val(data.hotel_pertama);
                        $('#hotel_kedua').val(data.hotel_kedua);
                        $('#hotel_ketiga').val(data.hotel_ketiga);
                        $('#deskripsi').val(data.deskripsi);
                        $('#tour_leader').val(data.tour_leader);
                    }
                });
            });
            $('.detailPaketWisataModalButton').on('click', function() {
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Wisata/getUpdatePaketWisata',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kode_paket').val(data.kode_paket);
                        $('#nama_paket').val(data.nama_paket);
                        $('#harga_paket').val(data.harga_paket);
                        $('#kualitas').val(data.kualitas);
                        $('#sisa_kuota').val(data.kuota-data.jumlah_terpesan);
                        $('#kuota').val(data.kuota);
                        $('#jumlah_terpesan').val(data.jumlah_terpesan);
                        $('#lama_wisata').val(data.lama_wisata+' Hari');
                        $('#id_kategori_wisata').val(data.id_kategori_wisata);
                        $('#id_maskapai').val(data.id_maskapai);
                        $('#tanggal_keberangkatan').val(data.tanggal_keberangkatan);
                        $('#hotel_pertama').val(data.hotel_pertama);
                        $('#hotel_kedua').val(data.hotel_kedua);
                        $('#hotel_ketiga').val(data.hotel_ketiga);
                        $('#deskripsi').val(data.deskripsi);
                        $('#tour_leader').val(data.tour_leader);
                        $('#button_pesan').attr('data-target', '#pesanPaketWisataModal'+data.id);
                    }
                });
            });
        });

        $(function() {
            $('.newPengumumanModalButton').on('click', function(){
                $('#newPengumumanModalLabel').html('Add New Announcement');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/pengumuman');
            });

            $('.updatePengumumanModalButton').on('click', function() {
                $('#newPengumumanModalLabel').html('Edit Announcement');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/updatePengumuman');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Konten/getUpdatePengumuman',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#penulis').val(data.penulis);
                    }
                });
            });
        });

        $(function() {
            $('.newBeritaModalButton').on('click', function(){
                $('#newBeritaModalLabel').html('Add New News');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/berita');
            });

            $('.updateBeritaModalButton').on('click', function() {
                $('#newBeritaModalLabel').html('Edit News');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/updateBerita');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Konten/getUpdateBerita',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#penulis').val(data.penulis);
                    }
                });
            });
        });

        $(function() {
            $('.newBlogModalButton').on('click', function(){
                $('#newBlogModalLabel').html('Add New Blogs');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/blog');
            });

            $('.updateBlogModalButton').on('click', function() {
                $('#newBlogModalLabel').html('Edit Blogs');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/updateBlog');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Konten/getUpdateBlog',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#penulis').val(data.penulis);
                    }
                });
            });
        });

        $(function() {
            $('.newNotulensiModalButton').on('click', function(){
                $('#newNotulensiModalLabel').html('Add New Minutes');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/notulensi');
            });

            $('.updateNotulensiModalButton').on('click', function() {
                $('#newNotulensiModalLabel').html('Edit Minutes');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/updateNotulensi');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Konten/getUpdateNotulensi',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#penulis').val(data.penulis);
                    }
                });
            });
        });

        $(function() {
            $('.newPeraturanModalButton').on('click', function(){
                $('#newPeraturanModalLabel').html('Add New Minutes');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/peraturan');
            });

            $('.updatePeraturanModalButton').on('click', function() {
                $('#newPeraturanModalLabel').html('Edit Minutes');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url() ?>Konten/updatePeraturan');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Konten/getUpdatePeraturan',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#penulis').val(data.penulis);
                    }
                });
            });
        });

        

        $(function() {
            $('.pasokProdukModalButton').on('click', function() {
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url() ?>Produk/getUpdateProduk',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#pasok_id').val(data.id);
                        $('#pasok_nama_produk').val(data.nama_produk);
                        $('#pasok_merk').val(data.merk);
                        $('#pasok_harga_beli').val(data.harga_beli);
                        $('#pasok_gambar').val(data.gambar);
                    }
                });
            });
        });

        $(function() {
            $('.akses_role').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                    url: "<?= base_url('admin/changeaccess') ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: roleId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                    }
                });
            });
        });

        $(function() {
            $('.kelengkapan_cek').on('click', function() {
                const kelengkapanId = $(this).data('kelengkapan');
                const jamaahId = $(this).data('jamaah');

                $.ajax({
                    url: "<?= base_url('kelengkapan/ubahkelengkapan') ?>",
                    type: 'post',
                    data: {
                        kelengkapanId: kelengkapanId,
                        jamaahId: jamaahId
                    },
                    success: function() {
                        document.location.href = "<?= base_url('kelengkapan/kelengkapan/'); ?>" + jamaahId;
                    }
                });
            });
        });
        
    </script>

    <script>
            $(document).ready(function() {
                setInterval(function() {
                    $('#show').load('<?= base_url('User/notifikasi') ?>')
                }, 30000);
            });

            function notifikasi() {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('User/readAllNotification') ?>',
                    data:{action:'call_this'},
                    success:function(html) {

                    }
                });
            }
        </script>
    
</body>

</html>