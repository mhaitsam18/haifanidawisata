<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		date_default_timezone_set('Asia/Jakarta');
		$url = $this->uri->segment(1) . '___' . $this->uri->segment(2) . '___' . $this->uri->segment(3);
		if($this->uri->segment(4)){
			$url .= '___' . $this->uri->segment(4);
		}
		is_logged_in($url);
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['link'] = 'Transaksi';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer', $data);
	}


	public function checkoutPaket($id = null, $sum = 1)
	{
		// $url = $this->uri->segment(1).'___'.$this->uri->segment(2);
		// is_logged_in($url);
		$data['title'] = 'Checkout Paket Wisata';
		$data['link'] = 'Produk & Jasa';
		$this->db->select('*, user.id AS uid');
		$this->db->join('agama', 'user.religion_id=agama.id');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, paket_wisata.id AS pid');
		$this->db->join('maskapai', 'paket_wisata.id_maskapai=maskapai.id');
		$this->db->join('kategori_wisata', 'paket_wisata.id_kategori_wisata=kategori_wisata.id');
		$this->db->join('destinasi', 'paket_wisata.id_destinasi=destinasi.id');
		$data['paket_wisata'] = $this->db->get_where('paket_wisata', ['paket_wisata.id' => $id])->row_array();
		$data['sum'] = $sum;
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['pendidikan'] = $this->db->get('pendidikan')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/checkout-paket', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahKeranjang($id, $rowid = '', $area = '')
	{
		// $url = $this->uri->segment(1).'___'.$this->uri->segment(2);
		// is_logged_in($url);
		$produk = $this->Produk_model->getProdukById($id);
		$keranjang = $this->cart->get_item($rowid);
		$rowid2 = get_rowid_cart($id);
		$keranjang2 = $this->cart->get_item($rowid2);
		if ($keranjang) {
			if ($produk['stok'] <= $keranjang['qty']) {
				$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Mohon Maaf, Stok produk tidak mencukupi!
					</div>');
				if ($area == 'keranjang') {
					redirect('Transaksi/keranjang');
				}
				redirect('Produk/');
			}
		} elseif ($produk['stok'] <= 0) {
			$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Mohon Maaf, Stok produk tidak mencukupi!
				</div>');
			if ($area == 'keranjang') {
				redirect('Transaksi/keranjang');
			}
			redirect('Produk');
		} elseif ($keranjang2) {
			if ($produk['stok'] <= $keranjang2['qty']) {
				$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Mohon Maaf, Stok produk tidak mencukupi!
					</div>');
				if ($area == 'keranjang') {
					redirect('Transaksi/keranjang');
				}
				redirect('Produk');
			}
		}
		$data = array(
			'id'      => $produk['id'],
			'qty'     => 1,
			'price'   => $produk['harga_jual'],
			'name'    => $produk['nama_produk'],
			'gambar'    => $produk['gambar']
			// 'options' => array('Size' => 'L', 'Color' => 'Red')
		);
		$this->cart->insert($data);
		if ($area == 'keranjang') {
			redirect('Transaksi/keranjang');
		}
		redirect('produk');
	}

	public function kurangKeranjang($rowid, $qty, $area = '')
	{
		$data = array(
			'rowid' => $rowid,
			'qty'   => ($qty - 1)
		);
		$this->cart->update($data);
		if ($area == 'keranjang') {
			redirect('Transaksi/keranjang');
		}
		redirect('Produk');
	}
	public function bersihkanKeranjang($area = '')
	{
		$this->cart->destroy();
		if ($area == 'keranjang') {
			redirect('Transaksi/keranjang');
		}
		redirect('Produk');
	}

	public function hapusItem($rowid, $area = '')
	{
		$this->cart->remove($rowid);
		if ($area == 'keranjang') {
			redirect('Transaksi/keranjang');
		}
		redirect('Produk');
	}

	public function checkout()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$kode_bayar = strtoupper(bin2hex(random_bytes(16)));
		$data = array(
			'id_user' => $data['user']['id'],
			'kode_bayar' => $kode_bayar,
			'nama_penerima' => $this->input->post('nama_penerima'),
			'no_hp_penerima' => $this->input->post('no_hp_penerima'),
			'alamat_penerima' => $this->input->post('alamat_penerima'),
			'id_kurir' => $this->input->post('id_kurir'),
			'total_harga' => $this->input->post('total_harga'),
			'total_harga' => $this->input->post('total_harga'),
			'id_metode_bayar' => $this->input->post('id_metode_bayar'),
			'waktu_pemesanan' => date("Y-m-d H:i:s"),
			'Status' => 'Belum dibayar',
		);
		$this->db->insert('checkout', $data);
		$checkout = $this->db->get_where('checkout', ['kode_bayar' => $kode_bayar])->row_array();
		foreach ($this->cart->contents() as $item) {
			$kode_pesanan = strtoupper(bin2hex(random_bytes(16)));
			$data = array(
				'id_checkout' => $checkout['id'],
				'id_produk' => $item['id'],
				'kode_pesanan' => $kode_pesanan,
				'jumlah' => $item['qty'],
				'sub_total_harga' => $item['subtotal']
			);
			$this->db->insert('pesanan', $data);
			$produk = $this->db->get_where('produk', ['id' => $item['id']])->row_array();
			$new_stok = $produk['stok'] - $item['qty'];
			$this->db->where('id', $item['id']);
			$this->db->update('produk', ['stok' => $new_stok]);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('flash', 'berhasil! Silahkan mengisi Form Bukti Pembayaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pemesanan Anda berhasil! Silahkan mengisi Form Bukti Pembayaran
			</div>');
		redirect("Transaksi/pembayaran/$kode_bayar");
	}

	public function keranjang()
	{
		$data['title'] = "Keranjang";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/keranjang', $data);
		$this->load->view('templates/footer');
	}

	public function pesanan()
	{
		$data['title'] = "Pesanan Saya";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, checkout.id AS idc');
		$this->db->join('metode_bayar', 'checkout.id_metode_bayar = metode_bayar.id');
		$this->db->order_by('checkout.id', 'DESC');
		$data['checkout'] = $this->db->get_where('checkout', ['id_user' => $data['user']['id']])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pesanan-saya', $data);
		$this->load->view('templates/footer');
	}

	public function detailPesanan($id = null)
	{
		if (!$id) {
			redirect('auth');
		}
		$data['title'] = "Detail Pesanan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['link'] = 'Transaksi';
		$this->db->select('*, checkout.id AS idc');
		$this->db->join('metode_bayar', 'checkout.id_metode_bayar = metode_bayar.id');
		$this->db->join('kurir', 'checkout.id_kurir = kurir.id');
		$this->db->join('user', 'checkout.id_user = user.id');
		$data['checkout'] = $this->db->get_where('checkout', ['checkout.id' => $id])->row_array();

		$this->db->join('produk', 'produk.id = pesanan.id_produk');
		$data['pesanan'] = $this->db->get_where('pesanan', ['id_checkout' => $id])->result_array();

		$this->db->select('*, bukti_transfer.id AS idbt, bukti_transfer.status AS sbt');
		$this->db->join('checkout', 'bukti_transfer.id_checkout = checkout.id');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('rekening', 'bukti_transfer.id_rekening_tujuan = rekening.id');
		$data['bukti_transfer'] = $this->db->get_where('bukti_transfer', ['id_checkout' => $id])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/detail-pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function updateStatusPesanan($id, $status = '')
	{
		$this->db->where('id', $id);
		$this->db->update('checkout', ['status' => 'Pesanan ' . $status]);
		if ($status == 'dibatalkan') {
			$pesanan = $this->db->get_where('pesanan', ['id_checkout' => $id])->result_array();
			foreach ($pesanan as $row) {
				$produk = $this->db->get_where('produk', ['id' => $row['id_produk']])->row_array();
				$new_stok = $produk['stok'] + $row['jumlah'];
				$this->db->where('id', $row['id_produk']);
				$this->db->update('produk', ['stok' => $new_stok]);
			}
		}
		$this->session->set_flashdata('flash', 'Pesanan telah ' . $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pesanan telah ' . $status . '
			</div>');
		redirect('transaksi/pesanan');
	}

	public function pembayaran($kode_bayar = '')
	{
		$data['title'] = "Pembayaran Produk";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekening_tujuan'] = $this->db->get('rekening')->result_array();
		$data['kode_bayar'] = $kode_bayar;
		$data['form'] = 'uploadBuktiTransfer';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaranPaket($kode_bayar = '')
	{
		$data['title'] = "Pembayaran Paket Wisata";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekening_tujuan'] = $this->db->get('rekening')->result_array();
		$data['kode_bayar'] = $kode_bayar;
		$data['form'] = 'uploadBuktiPembayaran';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaranProduk()
	{
		redirect('Transaksi/pembayaran');
	}

	public function pembayaranUmroh()
	{
		redirect('Transaksi/pembayaranPaket');
	}

	public function uploadBuktiTransfer()
	{
		$checkout = $this->db->get_where('checkout', ['kode_bayar' => $this->input->post('kode_bayar')])->row_array();
		$num_checkout = $this->db->get_where('checkout', ['kode_bayar' => $this->input->post('kode_bayar')])->num_rows();
		if ($num_checkout < 1) {
			$this->session->set_flashdata('flash_gagal', 'Kode Bayar tidak terdaftar');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Kode Bayar tidak terdaftar
				</div>');
			redirect('transaksi/pembayaran');
		}
		$upload_image = $_FILES['bukti_pembayaran']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['upload_path'] = './assets/img/bukti_pembayaran';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti_pembayaran')) {
				$new_image = $this->upload->data('file_name');
				$data = array(
					'id_checkout' => $checkout['id'],
					'id_rekening_tujuan' => $this->input->post('id_rekening_tujuan'),
					'rekening_pengirim' => $this->input->post('rekening_pengirim'),
					'bank_pengirim' => $this->input->post('bank_pengirim'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'waktu_transfer' => $this->input->post('tanggal_transfer') . ' ' . $this->input->post('waktu_transfer'),
					'nominal_transfer' => $this->input->post('nominal_transfer'),
					'bukti_pembayaran' => $new_image,
					'catatan' => $this->input->post('catatan'),
					'status' => 'Belum dikonfirmasi',
				);
				$this->db->insert('bukti_transfer', $data);

				$this->db->where('id', $checkout['id']);
				$this->db->update('checkout', ['status' => 'Menunggu konfirmasi pembayaran']);
				$this->session->set_flashdata('flash', 'Terkirim');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Bukti Pembayaran Terkirim
					</div>');
				redirect('transaksi/pesanan');
			} else {
				$this->session->set_flashdata('flash_error', $this->upload->display_errors());
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				redirect('transaksi/pembayaran');
			}
		} else {
			$this->session->set_flashdata('flash_gagal', 'Bukti Pembayaran Wajib diupload');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Bukti Pembayaran Wajib diupload
				</div>');
			redirect('transaksi/pembayaran');
		}
	}

	public function uploadBuktiPembayaran()
	{
		$jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $this->input->post('kode_bayar')])->result_array();
		$num_jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $this->input->post('kode_bayar')])->num_rows();
		if ($num_jamaah < 1) {
			$this->session->set_flashdata('flash_gagal', 'Kode Bayar tidak terdaftar');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Kode Bayar tidak terdaftar
				</div>');
			redirect('transaksi/pembayaranPaket');
		}
		$upload_image = $_FILES['bukti_pembayaran']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['upload_path'] = './assets/img/bukti_pembayaran';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti_pembayaran')) {
				$new_image = $this->upload->data('file_name');
				$data = array(
					'kode_bayar' => $this->input->post('kode_bayar'),
					'id_rekening_tujuan' => $this->input->post('id_rekening_tujuan'),
					'rekening_pengirim' => $this->input->post('rekening_pengirim'),
					'bank_pengirim' => $this->input->post('bank_pengirim'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'waktu_transfer' => $this->input->post('tanggal_transfer') . ' ' . $this->input->post('waktu_transfer'),
					'nominal_transfer' => $this->input->post('nominal_transfer'),
					'bukti_pembayaran' => $new_image,
					'catatan' => $this->input->post('catatan'),
					'status' => 'Belum dikonfirmasi',
				);
				$this->db->insert('bukti_pembayaran_paket', $data);
				for ($i=0; $i < count($jamaah); $i++) { 
					# code...
					$this->db->where('id', $jamaah[$i]['id']);
					$this->db->update('jamaah', ['status' => 'Menunggu konfirmasi pembayaran']);
				}
				$this->session->set_flashdata('flash', 'Terkirim');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Bukti Pembayaran Terkirim
					</div>');
				redirect('Kelengkapan/');
			} else {
				$this->session->set_flashdata('flash_error', $this->upload->display_errors());
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
				redirect('transaksi/pembayaranPaket');
			}
		} else {
			$this->session->set_flashdata('flash_gagal', 'Bukti Pembayaran Wajib diupload');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Bukti Pembayaran Wajib diupload
				</div>');
			redirect('transaksi/pembayaranPaket');
		}
	}

	public function riwayatPembayaran($id_checkout = '', $id_jamaah = '')
	{
		$data['title'] = "Riwayat Pembayaran";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($id_checkout) {
			$where = ['id_user' => $data['user']['id'], 'id_checkout' => $id_checkout];
		} else {
			$where = ['id_user' => $data['user']['id']];
		}
		if ($id_jamaah) {
			$where2 = ['id_pemesan' => $data['user']['id'], 'id_jamaah' => $id_jamaah];
		} else {
			$where2 = ['id_pemesan' => $data['user']['id']];
		}
		$this->db->select('*, bukti_transfer.id AS idbt, bukti_transfer.status AS sbt');
		$this->db->join('checkout', 'bukti_transfer.id_checkout = checkout.id');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('rekening', 'bukti_transfer.id_rekening_tujuan = rekening.id');
		$data['bukti_transfer'] = $this->db->get_where('bukti_transfer', $where)->result_array();

		$this->db->select('*, bukti_pembayaran_paket.id AS idbt, bukti_pembayaran_paket.status AS sbt');
		$this->db->join('jamaah', 'bukti_pembayaran_paket.id_jamaah = jamaah.id');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('rekening', 'bukti_pembayaran_paket.id_rekening_tujuan = rekening.id');
		$data['bukti_pembayaran_paket'] = $this->db->get_where('bukti_pembayaran_paket', $where2)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/riwayat-pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function online()
	{
		redirect('transaksi/pesanan');
	}

	public function insertJamaah($_id_paket)
	{
		$data['title'] = "Insert Jama'ah";
		$data['link'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$paket_wisata = $this->db->get_where('paket_wisata', ['id' => $_id_paket])->row_array();
		$this->form_validation->set_rules('nama_lengkap[]', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('no_ktp[]', 'KTP ID', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$kode_bayar = strtoupper(bin2hex(random_bytes(16)));
			$_kode_agen = $this->input->post('kode_agen');
			$_id_paket_wisata = $this->input->post('id_paket_wisata');
			$_nama_lengkap = $this->input->post('nama_lengkap');
			$_no_ktp = $this->input->post('no_ktp');
			$_kewarganegaraan = $this->input->post('kewarganegaraan');
			$_tempat_lahir = $this->input->post('tempat_lahir');
			$_tanggal_lahir = $this->input->post('tanggal_lahir');
			$_jenis_kelamin = $this->input->post('jenis_kelamin');
			$_alamat = $this->input->post('alamat');
			$_email = $this->input->post('email');
			$_no_hp = $this->input->post('no_hp');
			$_id_pendidikan = $this->input->post('id_pendidikan');
			$_pekerjaan = $this->input->post('pekerjaan');
			$_riwayat_umroh = $this->input->post('riwayat_umroh');
			$_golongan_darah = $this->input->post('golongan_darah');
			$_no_paspor = $this->input->post('no_paspor');
			$_nama_di_paspor = $this->input->post('nama_di_paspor');
			$_tanggal_cetak_paspor = $this->input->post('tanggal_cetak_paspor');
			$_tempat_pembuatan_paspor = $this->input->post('tempat_pembuatan_paspor');
			$_tanggal_habis_berlaku_paspor = $this->input->post('tanggal_habis_berlaku_paspor');

			echo count($_nama_lengkap);
			echo "<pre>";
			print_r($this->input->post());
			for ($i = 0; $i < count($_nama_lengkap); $i++) {
				$this->db->insert('jamaah', [
					'id_pemesan' => $data['user']['id'],
					'kode_bayar' => $kode_bayar,
					'kode_agen' => $_kode_agen[$i],
					'id_paket_wisata' => $_id_paket_wisata[$i],
					'nama_lengkap' => $_nama_lengkap[$i],
					'no_ktp' => $_no_ktp[$i],
					'kewarganegaraan' => $_kewarganegaraan[$i],
					'tempat_lahir' => $_tempat_lahir[$i],
					'tanggal_lahir' => $_tanggal_lahir[$i],
					'jenis_kelamin' => $_jenis_kelamin[$i],
					'alamat' => $_alamat[$i],
					'email' => $_email[$i],
					'no_hp' => $_no_hp[$i],
					'id_pendidikan' => $_id_pendidikan[$i],
					'pekerjaan' => $_pekerjaan[$i],
					'riwayat_umroh' => $_riwayat_umroh[$i],
					'golongan_darah' => $_golongan_darah[$i],
					'no_paspor' => $_no_paspor[$i],
					'nama_di_paspor' => $_nama_di_paspor[$i],
					'tanggal_cetak_paspor' => $_tanggal_cetak_paspor[$i],
					'tempat_pembuatan_paspor' => $_tempat_pembuatan_paspor[$i],
					'tanggal_habis_berlaku_paspor' => $_tanggal_habis_berlaku_paspor[$i],
					'waktu_pemesanan' => date("Y-m-d H:i:s"),
					'total_tagihan' => $paket_wisata['harga_paket'],
					'id_metode_bayar' => 1,
					'total_bayar' => 0,
					'status' => 'Belum Lunas',
				]);
				$this->db->order_by('id', 'DESC');
				$jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $kode_bayar])->row_array();
				$this->db->insert('berkas_lunak', [
					'id_jamaah' => $jamaah['id'],
					'foto' => '',
					'scan_ktp' => '',
					'scan_kk' => '',
					'scan_rekam_medis' => '',
					'scan_paspor' => '',
					'scan_buku_nikah' => ''
				]);
				$this->db->insert('persyaratan', [
					'id_jamaah' => $jamaah['id'],
					'ktp' => 0,
					'kk' => 0,
					'foto34' => 0,
					'foto46' => 0,
					'paspor' => 0,
					'visa' => 0,
					'biometrik' => 0,
					'suntik_vaksin' => 0,
					'manasik' => 0,
					'rekam_medis' => 0
				]);
			}
			$this->session->set_flashdata('flash_jamaah', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Congregation Added!
				</div>');
			// redirect('Kelengkapan/uploadBerkas/'.$jamaah['id']);
			redirect('Transaksi/pembayaranPaket/' . $kode_bayar);
		}
	}

	private function _kirimEmail($email = '', $subjek = '', $pesan = '')
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'mhaitsam18@gmail.com',
			'smtp_pass' => 'mirainikki193880098',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'chatset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('mhaitsam18@gmail.com', 'Muhammad Haitsam');
		$this->email->to($email);

		$this->email->subject($subjek);
		$this->email->message($pesan);

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
	public function AllJamaah($kode_bayar)
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $this->db->select("DATE_FORMAT(waktu_pemesanan,'%Y-%m-%d') AS waktu_pemesanan,kode_bayar,sum(total_tagihan) AS total_tagihan,SUM(total_bayar) AS total_bayar,status");
		// $this->db->group_by(['kode_bayar', "DATE_FORMAT(waktu_pemesanan,'%Y-%m-%d')"]);
		$this->db->order_by('id', 'DESC');
		$jamaah = $this->db->get_where('jamaah', ['id_pemesan' => $user['id'], 'kode_bayar' => $kode_bayar])->result_array();
		// echo "<pre>";
		// print_r($jamaah);
		echo json_encode($jamaah);
	}
}
