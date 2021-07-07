<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Member_model');
		$this->load->model('Wisata_model');
		$this->load->model('Produk_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/index', $data);
		$this->load->view('templates/footer');
	}

	public function produkHaifa()
	{
		$data['title'] = "Souvenir";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$config['base_url'] = base_url('Member/produkHaifa/');
		// $config['total_rows'] = $this->Produk_model->countAllproduk();
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else{
			// $data['keyword'] = null;
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		if ($this->input->post('kategori')) {
			if ($this->input->post('kategori') != 'All Category') {
				$data['pilih_kategori'] = $this->input->post('kategori');
				$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
			} else{
				$data['pilih_kategori'] = null;
				$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
			}
		} else{
			// $data['pilih_kategori'] = null;
			$data['pilih_kategori'] = $this->session->userdata('pilih_kategori');
		}
		$this->db->like('nama_produk', $data['keyword']);
		$this->db->like('id_kategori', $data['pilih_kategori']);
		$this->db->from('produk');
		$this->db->where('aktif', 1);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		//styling
		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</nav></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows']-$this->uri->segment(3)>7) {
		  $config['next_link'] = '&raquo';
		} else{
		  $config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '
								<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(3)>7) {
		  $config['prev_link'] = '&laquo';
		} else{
		  $config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="page-item disabled"><span class="page-link">Prev</span></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="page-item disabled"><span class="page-link">Next</span></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev.'<li class="page-item active" aria-current="page"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>'.$next;

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// $config['display_pages'] = TRUE;
		// $config['attributes']['rel'] = FALSE;
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['produk'] = $this->Produk_model->getProdukByLimit($config['per_page'],$data['start'], $data['keyword'], $data['pilih_kategori']);
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/produk-haifa', $data);
		$this->load->view('templates/footer');
	}
	public function tambahKeranjang($id, $rowid = '',$area = '')
	{
		if (!$this->session->userdata('cart_checkout', 'cart_checkout')) {
			$this->session->unset_userdata('cart_supply');
			$this->session->set_userdata('cart_checkout', 'cart_checkout');
			$this->cart->destroy();
		}
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
					redirect('Member/keranjang');
				}
				redirect('Member/produkHaifa');
			}
		} elseif ($produk['stok'] <= 0) {
			$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Mohon Maaf, Stok produk tidak mencukupi!
				</div>');
			if ($area == 'keranjang') {
				redirect('Member/keranjang');
			}
			redirect('Member/produkHaifa');
		} elseif ($keranjang2) {
			if ($produk['stok'] <= $keranjang2['qty']) {
				$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Mohon Maaf, Stok produk tidak mencukupi!
					</div>');
				if ($area == 'keranjang') {
					redirect('Member/keranjang');
				}
				redirect('Member/produkHaifa');
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
			redirect('Member/keranjang');
		}
    	redirect('Member/produkHaifa');
	}

	public function kurangKeranjang($rowid, $qty, $area = '')
	{
		$data = array(
	        'rowid' => $rowid,
	        'qty'   => ($qty-1)
	    );
		$this->cart->update($data);
		if ($area == 'keranjang') {
			redirect('Member/keranjang');
		}
    	redirect('Member/produkHaifa');
	}
	public function bersihkanKeranjang($area = '')
	{
		$this->cart->destroy();
		if ($area == 'keranjang') {
			redirect('Member/keranjang');
		}
    	redirect('Member/produkHaifa');
	}

	public function hapusItem($rowid, $area = '')
	{
		$this->cart->remove($rowid);
		if ($area == 'keranjang') {
			redirect('Member/keranjang');
		}
    	redirect('Member/produkHaifa');
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
			$produk = $this->db->get_where('produk',['id' => $item['id']])->row_array();
			$new_stok = $produk['stok'] - $item['qty'];
			$this->db->where('id', $item['id']);
			$this->db->update('produk',['stok' => $new_stok]);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('flash', 'berhasil! Silahkan mengisi Form Bukti Pembayaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pemesanan Anda berhasil! Silahkan mengisi Form Bukti Pembayaran
			</div>');
		redirect("Member/pembayaran/$kode_bayar");
	}

	public function keranjang()
	{
		$data['title'] = "Keranjang";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/keranjang', $data);
		$this->load->view('templates/footer');
	}

	public function pesanan()
	{
		$data['title'] = "Pesanan Saya";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, checkout.id AS idc');
		$this->db->join('metode_bayar', 'checkout.id_metode_bayar = metode_bayar.id');
		$data['checkout'] = $this->db->get_where('checkout', ['id_user' => $data['user']['id']])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/pesanan-saya', $data);
		$this->load->view('templates/footer');
	}

	public function detailPesanan($id)
	{
		$data['title'] = "Detail Pesanan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
		$data['bukti_transfer'] = $this->db->get_where('bukti_transfer',['id_checkout' => $id])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/detail-pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function updateStatusPesanan($id, $status = '')
	{
		$this->db->where('id', $id);
		$this->db->update('checkout', ['status' => 'Pesanan '.$status]);
		if ($status == 'dibatalkan') {
			$pesanan = $this->db->get_where('pesanan', ['id_checkout' => $id])->result_array();
			foreach ($pesanan as $row) {
				$produk = $this->db->get_where('produk',['id' => $row['id_produk']])->row_array();
				$new_stok = $produk['stok'] + $row['jumlah'];
				$this->db->where('id', $row['id_produk']);
				$this->db->update('produk',['stok' => $new_stok]);
			}
		}
		$this->session->set_flashdata('flash', 'Pesanan telah '.$status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pesanan telah '.$status.'
			</div>');
		redirect('Member/pesanan');
	}

	public function pembayaran($kode_bayar = '')
	{
		$data['title'] = "Pembayaran Produk";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekening_tujuan'] = $this->db->get('rekening')->result_array();
		$data['kode_bayar'] = $kode_bayar;
		$data['form'] = 'uploadBuktiTransfer';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaranPaket($kode_bayar = '')
	{
		$data['title'] = "Pembayaran Paket Wisata";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekening_tujuan'] = $this->db->get('rekening')->result_array();
		$data['kode_bayar'] = $kode_bayar;
		$data['form'] = 'uploadBuktiPembayaran';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/pembayaran', $data);
		$this->load->view('templates/footer');
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
			redirect('Member/pembayaran');
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
					'waktu_transfer' => $this->input->post('tanggal_transfer').' '.$this->input->post('waktu_transfer'),
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
				redirect('Member/pesanan');
			} else{
				$this->session->set_flashdata('flash_error', $this->upload->display_errors());
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Member/pembayaran');
			}
		} else{
			$this->session->set_flashdata('flash_gagal', 'Bukti Pembayaran Wajib diupload');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Bukti Pembayaran Wajib diupload
				</div>');
			redirect('Member/pembayaran');
		}
	}

	public function uploadBuktiPembayaran()
	{
		$jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $this->input->post('kode_bayar')])->row_array();
		$num_jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $this->input->post('kode_bayar')])->num_rows();
		if ($num_jamaah < 1) {
			$this->session->set_flashdata('flash_gagal', 'Kode Bayar tidak terdaftar');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Kode Bayar tidak terdaftar
				</div>');
			redirect('Member/pembayaranPaket');
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
					'id_jamaah' => $jamaah['id'],
					'id_rekening_tujuan' => $this->input->post('id_rekening_tujuan'),
					'rekening_pengirim' => $this->input->post('rekening_pengirim'),
					'bank_pengirim' => $this->input->post('bank_pengirim'),
					'nama_pengirim' => $this->input->post('nama_pengirim'),
					'waktu_transfer' => $this->input->post('tanggal_transfer').' '.$this->input->post('waktu_transfer'),
					'nominal_transfer' => $this->input->post('nominal_transfer'),
					'bukti_pembayaran' => $new_image,
					'catatan' => $this->input->post('catatan'),
					'status' => 'Belum dikonfirmasi',
				);
				$this->db->insert('bukti_pembayaran_paket', $data);

				$this->db->where('id', $jamaah['id']);
				$this->db->update('jamaah', ['status' => 'Menunggu konfirmasi pembayaran']);
				$this->session->set_flashdata('flash', 'Terkirim');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Bukti Pembayaran Terkirim
					</div>');
				redirect('Kelengkapan/');
			} else{
				$this->session->set_flashdata('flash_error', $this->upload->display_errors());
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Member/pembayaranPaket');
			}
		} else{
			$this->session->set_flashdata('flash_gagal', 'Bukti Pembayaran Wajib diupload');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Bukti Pembayaran Wajib diupload
				</div>');
			redirect('Member/pembayaranPaket');
		}
	}

	public function riwayatPembayaran($id_checkout = '', $id_jamaah = '')
	{
		$data['title'] = "Riwayat Pembayaran";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($id_checkout) {
			$where = ['id_user' => $data['user']['id'], 'id_checkout' => $id_checkout];
		} else{
			$where = ['id_user' => $data['user']['id']];
		}
		if ($id_jamaah) {
			$where2 = ['id_pemesan' => $data['user']['id'], 'id_jamaah' => $id_jamaah];
		} else{
			$where2 = ['id_pemesan' => $data['user']['id']];
		}
		$this->db->select('*, bukti_transfer.id AS idbt, bukti_transfer.status AS sbt');
		$this->db->join('checkout', 'bukti_transfer.id_checkout = checkout.id');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('rekening', 'bukti_transfer.id_rekening_tujuan = rekening.id');
		$data['bukti_transfer'] = $this->db->get_where('bukti_transfer',$where)->result_array();

		$this->db->select('*, bukti_pembayaran_paket.id AS idbt, bukti_pembayaran_paket.status AS sbt');
		$this->db->join('jamaah', 'bukti_pembayaran_paket.id_jamaah = jamaah.id');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('rekening', 'bukti_pembayaran_paket.id_rekening_tujuan = rekening.id');
		$data['bukti_pembayaran_paket'] = $this->db->get_where('bukti_pembayaran_paket',$where2)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/riwayat-pembayaran', $data);
		$this->load->view('templates/footer');
	}

	public function online()
	{
		redirect('Member/pesanan');
	}

	public function umrohHaji()
	{
		$data['title'] = "Umroh dan Haji";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$config['base_url'] = base_url('Member/umrohHaji/');
		$this->db->from('paket_wisata');
		$this->db->where('aktif', 1);
		$this->db->where('tanggal_keberangkatan <', date('Y-m-d'));
		$this->db->where_in('id_kategori_wisata', [1,2]);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 8;
		$config['num_links'] = 2;

		//styling
		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</nav></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows']-$this->uri->segment(3)>7) {
		  $config['next_link'] = '&raquo';
		} else{
		  $config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '
								<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(3)>7) {
		  $config['prev_link'] = '&laquo';
		} else{
		  $config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="page-item disabled"><span class="page-link">Prev</span></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="page-item disabled"><span class="page-link">Next</span></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev.'<li class="page-item active" aria-current="page"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>'.$next;

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// $config['display_pages'] = TRUE;
		// $config['attributes']['rel'] = FALSE;
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['paket_wisata'] = $this->Wisata_model->getPaketWisataByLimit($config['per_page'],$data['start']);
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['pendidikan'] = $this->db->get('pendidikan')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/umroh-haji', $data);
		$this->load->view('templates/footer');
	}

	public function insertJamaah()
	{
		$data['title'] = "Insert Jama'ah";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$paket_wisata = $this->db->get_where('paket_wisata', ['id' => $this->input->post('id_paket_wisata')])->row_array();
		$this->form_validation->set_rules('nama_lengkap', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('no_ktp', 'KTP ID', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Member/umrohHaji');
		} else{
			$kode_bayar = strtoupper(bin2hex(random_bytes(16)));
			$this->db->insert('jamaah', [
				'id_pemesan' => $data['user']['id'],
				'kode_bayar' => $kode_bayar,
				'kode_agen' => $this->input->post('kode_agen'),
				'id_paket_wisata' => $this->input->post('id_paket_wisata'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'no_ktp' => $this->input->post('no_ktp'),
				'kewarganegaraan' => $this->input->post('kewarganegaraan'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'id_pendidikan' => $this->input->post('id_pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'riwayat_umroh' => $this->input->post('riwayat_umroh'),
				'golongan_darah' => $this->input->post('golongan_darah'),
				'no_paspor' => $this->input->post('no_paspor'),
				'nama_di_paspor' => $this->input->post('nama_di_paspor'),
				'tanggal_cetak_paspor' => $this->input->post('tanggal_cetak_paspor'),
				'tempat_pembuatan_paspor' => $this->input->post('tempat_pembuatan_paspor'),
				'tanggal_habis_berlaku_paspor' => $this->input->post('tanggal_habis_berlaku_paspor'),
				'waktu_pemesanan' => date("Y-m-d H:i:s"),
				'total_tagihan' => $paket_wisata['harga_paket'],
				'id_metode_bayar' => 1,
				'total_bayar' => 0,
				'status' => 'Belum Lunas',
			]);
			$this->db->order_by('id', 'DESC');
			$jamaah = $this->db->get_where('jamaah',['kode_bayar' => $kode_bayar])->row_array();
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
			$this->session->set_flashdata('flash_jamaah', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Congregation Added!
				</div>');
			redirect('Kelengkapan/berkasLunak/'.$jamaah['id']);
		}
	}

	public function shuttle()
	{
		$data['title'] = "Shuttle";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->distinct();
		$this->db->select('keberangkatan');
		$data['keberangkatan'] = $this->db->get('tiket_shuttle')->result_array();
		$data['tiket_shuttle'] = $this->db->get('tiket_shuttle')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/shuttle', $data);
		$this->load->view('templates/footer');
	}

	public function cariKeberangkatan($value='')
	{
		$data['title'] = "Cari Keberangkatan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->session->unset_userdata('start_session');
		$this->db->select('*, COUNT(no_kursi) AS jumlah');
		$this->db->where('keberangkatan', $this->input->post('keberangkatan'));
		$this->db->where('tujuan', $this->input->post('tujuan'));
		$this->db->where('ketersediaan', 'Tersedia');
		$this->db->group_by('jadwal');
		$data['cari_keberangkatan'] = $this->db->get('tiket_shuttle')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/cari-keberangkatan', $data);
		$this->load->view('templates/footer');
	}

	public function bookingShuttle(){
		$data['title'] = "Cari Keberangkatan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$timeout = 2; // setting timeout dalam menit
		$timeout = $timeout * 60; // menit ke detik
		if(isset($this->session->start_session)){
			$elapsed_time = time()-$this->session->start_session;
			if($elapsed_time >= $timeout){
				$this->session->unset_userdata('start_session');
				echo "<script type='text/javascript'>alert('Sesi telah berakhir, Silahkan Pesan Ulang');window.location='".base_url('Member/shuttle')."'</script>";
			}
		}
		$this->session->start_session=time();
		$data['keberangkatan']= $this->input->get('keberangkatan');
		$data['tujuan']= $this->input->get('tujuan');
		$data['jadwal']= $this->input->get('jadwal');
		$data['penumpang']= $this->input->get('penumpang');
		$where = [
        	'keberangkatan' => $data['keberangkatan'],
        	'tujuan' => $data['tujuan'],
        	'jadwal' => $data['jadwal']
        ];
        $data['cari_kursi'] = $this->db->get_where('tiket_shuttle', $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/booking-shuttle', $data);
		$this->load->view('templates/footer');
	}

	public function prosesBooking($value='')
	{
		$data['title'] = "Cari Keberangkatan";
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$timeout = 2; // setting timeout dalam menit
		$timeout = $timeout * 60; // menit ke detik
		if(isset($this->session->start_session)){
			$elapsed_time = time()-$this->session->start_session;
			if($elapsed_time >= $timeout){
				$this->session->unset_userdata('start_session');
				echo "<script type='text/javascript'>alert('Sesi telah berakhir, Silahkan Pesan Ulang');window.location='".base_url('Member/shuttle')."'</script>";
			} else{
				$arr;
				$a=0;
				$no_hp = $this->input->post('no_hp');
				$email = $this->input->post('email');
				$keberangkatan = $this->input->post('keberangkatan');
				$tujuan = $this->input->post('tujuan');
				$jadwal = $this->input->post('jadwal');
				$jumlah = COUNT($this->input->post('kursi'));
				$book_id = acak(15);
				$this->db->select('book_id');
				$isi = $this->db->get_where('pemesanan_tiket', ['book_id' => $book_id]);
				if ($isi->num_rows() == 0) {
					$waktu_pemesanan = date("Y-m-d h:i:s");
					// getDiskon($jumlah)
					$data = [
						'book_id' => $book_id,
						'id_user' => $user['id'],
						'waktu_pemesanan' => $waktu_pemesanan,
						'no_hp' => $no_hp,
						'email' => $email,
						'jumlah' => $jumlah,
						'diskon' => 0.0
					];
					$this->db->insert('pemesanan_tiket', $data);
					$this->session->book_id = $book_id;
				}else{
					$this->Member_model->insert_pemesanan_tiket();
				}
				$book_id = $this->session->book_id;
				foreach ($this->input->post('kursi') as $kursi) {
					$arr[$a]=$kursi;
					$a++;
					$nama = $this->input->post("nama".$a);
					$kode_tiket = null;
					$where = [
						'keberangkatan' => $keberangkatan,
						'tujuan' => $tujuan,
						'jadwal' => $jadwal,
						'no_kursi' => $kursi
					];
					$tiket_shuttle = $this->db->get_where('tiket_shuttle', $where)->row_array();
					$kode_tiket = $tiket_shuttle['kode_tiket'];

					$data = [
						'book_id' => $book_id,
						'kode_tiket' => $kode_tiket,
						'nama' => $nama,
						'status' => 'has booked'
					];
					$this->db->insert('detail_pemesanan_tiket', $data);

					$this->db->where('kode_tiket', $kode_tiket);
					$this->db->update('tiket_shuttle', ['ketersediaan' => 'Tidak Tersedia']);
				}
				if ($this->input->post('email') != '') {
					$subjek  = "Tiket Haifa Nida Shuttle";
					$pesan = "Terima Kasih sudah memesan di Shuttle kami, berikut kode booking Anda adalah $book_id";
					$this->_kirimEmail($this->input->post('email'), $subjek, $pesan);
				}
				$this->session->unset_userdata('start_session');
				$this->session->unset_userdata('book_id');
				// echo "<script type='text/javascript'>alert('Pemesanan Anda Berhasil, kode booking Anda adalah".$book_id.". Kami akan memberikan Tiket Shuttle Anda melalui Email. Terima Kasih');window.location='".base_url('Member/shuttle')."'</script>";
				$this->session->set_flashdata('shuttle', "kode booking Anda adalah ".$book_id.". Cek Email Anda untuk melihat kode booking Anda. Terima Kasih");
				redirect('Member/shuttle');

			}
		}
	}

	public function getTujuan($keberangkatan)
	{
		$this->db->distinct();
		$this->db->select('tujuan');
		$this->db->where('keberangkatan', $keberangkatan);
		$data['tujuan'] = $this->db->get('tiket_shuttle')->result_array();
		$this->load->view('member/tujuan', $data);
	}


	public function searchTujuan()
	{
		$keberangkatan = $this->input->post('keberangkatan');
		$this->db->distinct();
		$this->db->select('tujuan');
		$this->db->where('keberangkatan', $keberangkatan);
		$result = $this->db->get('tiket_shuttle')->result_array();
		$users_arr = array();
		foreach ($result as $row) {
		    $tujuan = $row['tujuan'];
		    $users_arr[] = array("tujuan" => $tujuan);
		}
		return json_encode($users_arr);
	}

	private function _kirimEmail($email='', $subjek = '', $pesan = '')
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
		} else{
			echo $this->email->print_debugger();
			die;
		}
	}
	
}