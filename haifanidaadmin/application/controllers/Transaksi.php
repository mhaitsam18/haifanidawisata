<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Transaksi_model');
		$this->load->model('Produk_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Pemesanan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$config['base_url'] = base_url('Transaksi/index/');
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		if ($this->input->post('kategori')) {
			if ($this->input->post('kategori') != 'All Category') {
				$data['pilih_kategori'] = $this->input->post('kategori');
				$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
			} else {
				$data['pilih_kategori'] = null;
				$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
			}
		} else {
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

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</nav></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows'] - $this->uri->segment(3) > 7) {
			$config['next_link'] = '&raquo';
		} else {
			$config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '
								<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(3) > 7) {
			$config['prev_link'] = '&laquo';
		} else {
			$config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="page-item disabled"><span class="page-link">Prev</span></li>';
			$next = '';
		} elseif ($config['total_rows'] - $this->uri->segment(3) < 3) {
			$prev = '';
			$next = '<li class="page-item disabled"><span class="page-link">Next</span></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev . '<li class="page-item active" aria-current="page"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>' . $next;

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['produk'] = $this->Produk_model->getProdukByLimit($config['per_page'], $data['start'], $data['keyword'], $data['pilih_kategori']);
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer');
	}
	public function tambahKeranjang($id, $rowid = '')
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
				redirect('Transaksi/');
			}
		} elseif ($produk['stok'] <= 0) {
			$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Mohon Maaf, Stok produk tidak mencukupi!
				</div>');
			redirect('Transaksi/');
		} elseif ($keranjang2) {
			if ($produk['stok'] <= $keranjang2['qty']) {
				$this->session->set_flashdata('flash_gagal', 'Mohon Maaf, Stok produk tidak mencukupi!');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Mohon Maaf, Stok produk tidak mencukupi!
					</div>');
				redirect('Transaksi/');
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
		var_dump($produk);
		redirect('Transaksi/');
	}

	public function kurangKeranjang($rowid, $qty)
	{
		$data = array(
			'rowid' => $rowid,
			'qty'   => ($qty - 1)
		);
		var_dump($data);
		$this->cart->update($data);
		redirect('Transaksi/');
	}
	public function bersihkanKeranjang()
	{
		$this->cart->destroy();
		redirect('Transaksi/');
	}

	public function hapusItem($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Transaksi/');
	}

	public function checkout()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$kode_bayar = strtoupper(bin2hex(random_bytes(10)));
		$id_kasir = $data['user']['id'];
		$catatan = $this->input->post('catatan');
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'kode_bayar' => $kode_bayar,
				'id_kasir' => $id_kasir,
				'id_produk' => $item['id'],
				'jumlah' => $item['qty'],
				'sub_total_harga' => $item['subtotal'],
				'waktu_transaksi' => date("Y-m-d H:i:s"),
				'catatan' => $catatan
			);
			$this->db->insert('transaksi', $data);
			$produk = $this->db->get_where('produk', ['id' => $item['id']])->row_array();
			$new_stok = $produk['stok'] - $item['qty'];
			$this->db->where('id', $item['id']);
			$this->db->update('produk', ['stok' => $new_stok]);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('flash', 'Berhasil');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Transaksi berhasil!
			</div>');
		redirect("Transaksi/offline");
	}

	public function online()
	{
		$data['title'] = "Pemesanan Online";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, checkout.id AS idc');
		$this->db->join('metode_bayar', 'checkout.id_metode_bayar = metode_bayar.id');
		$data['checkout'] = $this->db->get('checkout')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pemesanan-online', $data);
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
		$data['bukti_transfer'] = $this->db->get_where('bukti_transfer', ['id_checkout' => $id])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/detail-pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function offline()
	{
		$data['title'] = "Pemesanan Offline";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, transaksi.id AS idt');
		$this->db->join('produk', 'transaksi.id_produk = produk.id');
		$this->db->join('user', 'transaksi.id_kasir = user.id');
		$this->db->order_by('idt', 'DESC');
		$data['transaksi'] = $this->db->get('transaksi')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pemesanan-offline', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaranOnline()
	{
		$data['title'] = "Pembayaran Online";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, bukti_transfer.id AS idbt, bukti_transfer.status AS sbt');
		$this->db->join('checkout', 'bukti_transfer.id_checkout = checkout.id');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('rekening', 'bukti_transfer.id_rekening_tujuan = rekening.id');
		$data['bukti_transfer'] = $this->db->get('bukti_transfer')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pembayaran-online', $data);
		$this->load->view('templates/footer');
	}

	public function pembayaranPaket()
	{
		$data['title'] = "Pembayaran Paket";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('bukti_pembayaran_paket.*,user.*,rekening.*, bukti_pembayaran_paket.id AS idbt, bukti_pembayaran_paket.status AS sbt');
		$this->db->join('jamaah', 'bukti_pembayaran_paket.kode_bayar = jamaah.kode_bayar');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('rekening', 'bukti_pembayaran_paket.id_rekening_tujuan = rekening.id');
		$this->db->group_by('bukti_pembayaran_paket.kode_bayar');
		$data['bukti_pembayaran_paket'] = $this->db->get('bukti_pembayaran_paket')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/pembayaran-paket', $data);
		$this->load->view('templates/footer');
	}

	public function updateStatusPesanan($id, $status = '')
	{
		$this->db->where('id', $id);
		$this->db->update('checkout', ['status' => 'Pesanan ' . $status]);
		if ($status == 'lunas') {
			$this->db->where('id', $id);
			$this->db->update('checkout', ['status' => 'Sudah dibayar']);
		}
		if ($status == 'dibatalkan') {
			$pesanan = $this->db->get_where('pesanan', ['id_checkout' => $id])->result_array();
			foreach ($pesanan as $row) {
				$produk = $this->db->get_where('produk', ['id' => $row['id_produk']])->row_array();
				$new_stok = $produk['stok'] + $row['jumlah'];
				$this->db->where('id', $row['id_produk']);
				$this->db->update('produk', ['stok' => $new_stok]);
			}
		}
		$this->session->set_flashdata('flash', 'Telah ' . $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pesanan telah ' . $status . '
			</div>');
		redirect('Transaksi/online');
	}

	public function updateStatusPembayaran($id, $status = '')
	{
		$this->db->where('id', $id);
		$this->db->update('bukti_transfer', ['status' => 'Pembayaran ' . $status]);
		if ($status == 'valid') {
			$bukti_transfer = $this->db->get_where('bukti_transfer', ['id' => $id])->row_array();
			$this->db->where('id', $bukti_transfer['id_checkout']);
			$this->db->update('checkout', ['status' => 'Sudah dibayar']);
		}
		$this->session->set_flashdata('flash', 'Telah ' . $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pembayaran telah ' . $status . '
			</div>');
		redirect('Transaksi/pembayaranOnline');
	}

	public function updateStatusPembayaranPaket($id, $status = '')
	{
		$this->db->where('id', $id);
		$this->db->update('bukti_pembayaran_paket', ['status' => 'Pembayaran ' . str_replace('%20',' ',$status)]);
		if ($status == 'valid') {
			$bukti_pembayaran_paket = $this->db->get_where('bukti_pembayaran_paket', ['id' => $id])->row_array();
			$jamaah = $this->db->get_where('jamaah', ['kode_bayar' => $bukti_pembayaran_paket['kode_bayar']])->result_array();
			// echo "<pre>";
			// print_r($bukti_pembayaran_paket);
			// echo "<pre>";
			// print_r($jamaah);
			// dasdas da
			for ($i = 0; $i < count($jamaah); $i++) {
				$new_total_bayar = $jamaah[$i]['total_bayar'] + $bukti_pembayaran_paket['nominal_transfer'];

				$this->db->where('id', $jamaah[$i]['id']);
				$this->db->update('jamaah', ['total_bayar' => $new_total_bayar]);

				$new_jamaah = $this->db->get_where('jamaah', ['id' => $jamaah[$i]['id']])->row_array();

				if ($new_jamaah['total_bayar'] >= $new_jamaah['total_tagihan']) {
					$this->db->where('id', $jamaah[$i]['id']);
					$this->db->update('jamaah', ['status' => 'Sudah Lunas']);
				}
			}
		}
		$this->session->set_flashdata('flash', 'Telah ' . $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pembayaran telah ' . $status . '
			</div>');
		redirect('Transaksi/pembayaranPaket');
	}

	public function beban()
	{
		$data['title'] = "Data Beban / Pengeluaran";
		$data['beban'] = $this->db->get('beban')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_beban', 'Load Name', 'trim|required');
		$this->form_validation->set_rules('biaya_beban', 'Expense Fee', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Transaction Date', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('transaksi/beban', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('beban', [
				'nama_beban' => $this->input->post('nama_beban'),
				'biaya_beban' => $this->input->post('biaya_beban'),
				'tanggal' => $this->input->post('tanggal')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Load Added!
				</div>');
			redirect('Transaksi/beban');
		}
	}

	public function updateBeban()
	{
		$this->form_validation->set_rules('nama_beban', 'Load Name', 'trim|required');
		$this->form_validation->set_rules('biaya_beban', 'Expense Fee', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Transaction Date', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Transaksi/beban');
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('beban', [
				'nama_beban' => $this->input->post('nama_beban'),
				'biaya_beban' => $this->input->post('biaya_beban'),
				'tanggal' => $this->input->post('tanggal')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Load Updated!
				</div>');
			redirect('Transaksi/beban');
		}
	}

	public function deleteBeban($id)
	{
		$this->db->delete('beban', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Load Deleted!
			</div>');
		redirect('Transaksi/beban');
	}

	public function getUpdateBeban()
	{
		echo json_encode($this->Transaksi_model->getBebanById($this->input->post('id')));
	}
}
