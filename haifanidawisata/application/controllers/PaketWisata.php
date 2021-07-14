<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaketWisata extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
		$this->load->model('Wisata_model');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index($list = 'list')
	{
		$data['list'] = $list;
		$data['title'] = 'Beranda';
		$data['link'] = 'Produk & Jasa';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->db->select('*, paket_wisata.id AS pid');
		$this->db->join('maskapai', 'paket_wisata.id_maskapai=maskapai.id');
		$this->db->join('kategori_wisata', 'paket_wisata.id_kategori_wisata=kategori_wisata.id');
		$this->db->join('destinasi', 'paket_wisata.id_destinasi=destinasi.id');
		$data['paket_wisata'] = $this->db->get_where('paket_wisata', ['aktif' => 1])->result_array();
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['destinasi'] = $this->db->get('destinasi')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->db->join('paket_wisata', 'paket_unggulan.id_paket_wisata=paket_wisata.id');
		$data['paket_unggulan'] = $this->db->get('paket_unggulan')->result_array();

		$config['base_url'] = base_url('PaketWisata/index/' . $list . '/');
		// $config['total_rows'] = $this->Produk_model->countAllproduk();
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			// $data['keyword'] = null;
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		// if ($this->input->post('kategori')) {
		// 	if ($this->input->post('kategori') != 'All Category') {
		// 		$data['pilih_kategori'] = $this->input->post('kategori');
		// 		$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
		// 	} else{
		// 		$data['pilih_kategori'] = null;
		// 		$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
		// 	}
		// } else{
		// 	// $data['pilih_kategori'] = null;
		// 	$data['pilih_kategori'] = $this->session->userdata('pilih_kategori');
		// }
		$this->db->like('nama_paket', $data['keyword']);
		$this->db->from('paket_wisata');
		$this->db->where('aktif', 1);
		$this->db->where('TIMESTAMPDIFF(MONTH,CURDATE(),tanggal_keberangkatan) >', 1);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		if ($list = 'list') {
			$config['per_page'] = 4;
		} else {
			$config['per_page'] = 6;
		}
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows'] / $data['per_page'];
		//styling
		$config['full_tag_open'] = '<div class="full_width pagination_bottom"><ul class="pagination">';
		$config['full_tag_close'] = '</div></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows'] - $this->uri->segment(4) > 7) {
			$config['next_link'] = '&raquo';
		} else {
			$config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(4) > 7) {
			$config['prev_link'] = '&laquo';
		} else {
			$config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(4))) {
			$prev = '<li class="disabled"><a>Prev</a></li>';
			$next = '';
		} elseif ($config['total_rows'] - $this->uri->segment(4) < 3) {
			$prev = '';
			$next = '<li class="disabled"><a>Next</a></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev . '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>' . $next;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		// $config['attributes'] = array('class' => '');

		// $config['display_pages'] = TRUE;
		// $config['attributes']['rel'] = FALSE;
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(4);
		$data['paket_wisata'] = $this->Wisata_model->getPaketWisataByLimit($config['per_page'], $data['start'], $data['keyword']);
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['pendidikan'] = $this->db->get('pendidikan')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		// print_r($data['destinasi']);
		// echo "<BR>";
		// print_r($data['paket_wisata']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('paket-wisata/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function umroh($list = 'list')
	{
		$data['list'] = $list;
		$data['title'] = 'Beranda';
		$data['link'] = 'Produk & Jasa';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->db->select('*, paket_wisata.id AS pid');
		$this->db->join('maskapai', 'paket_wisata.id_maskapai=maskapai.id');
		$this->db->join('kategori_wisata', 'paket_wisata.id_kategori_wisata=kategori_wisata.id');
		$this->db->join('destinasi', 'paket_wisata.id_destinasi=destinasi.id');
		$data['paket_wisata'] = $this->db->get_where('paket_wisata', ['aktif' => 1])->result_array();
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['destinasi'] = $this->db->get('destinasi')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->db->join('paket_wisata', 'paket_unggulan.id_paket_wisata=paket_wisata.id');
		$data['paket_unggulan'] = $this->db->get('paket_unggulan')->result_array();

		$config['base_url'] = base_url('PaketWisata/umroh/' . $list . '/');
		// $config['total_rows'] = $this->Produk_model->countAllproduk();
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			// $data['keyword'] = null;
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		// if ($this->input->post('kategori')) {
		// 	if ($this->input->post('kategori') != 'All Category') {
		// 		$data['pilih_kategori'] = $this->input->post('kategori');
		// 		$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
		// 	} else{
		// 		$data['pilih_kategori'] = null;
		// 		$this->session->set_userdata('pilih_kategori', $data['pilih_kategori']);
		// 	}
		// } else{
		// 	// $data['pilih_kategori'] = null;
		// 	$data['pilih_kategori'] = $this->session->userdata('pilih_kategori');
		// }
		$this->db->like('nama_paket', $data['keyword']);
		$this->db->from('paket_wisata');
		$this->db->where_in('id_kategori_wisata', [1, 2]);
		$this->db->where('aktif', 1);
		$this->db->where('TIMESTAMPDIFF(MONTH,CURDATE(),tanggal_keberangkatan) >', 1);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		if ($list = 'list') {
			$config['per_page'] = 4;
		} else {
			$config['per_page'] = 6;
		}
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows'] / $data['per_page'];
		//styling
		$config['full_tag_open'] = '<div class="full_width pagination_bottom"><ul class="pagination">';
		$config['full_tag_close'] = '</div></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows'] - $this->uri->segment(4) > 7) {
			$config['next_link'] = '&raquo';
		} else {
			$config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(4) > 7) {
			$config['prev_link'] = '&laquo';
		} else {
			$config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(4))) {
			$prev = '<li class="disabled"><a>Prev</a></li>';
			$next = '';
		} elseif ($config['total_rows'] - $this->uri->segment(4) < 3) {
			$prev = '';
			$next = '<li class="disabled"><a>Next</a></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev . '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>' . $next;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		// $config['attributes'] = array('class' => '');

		// $config['display_pages'] = TRUE;
		// $config['attributes']['rel'] = FALSE;
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(4);
		$data['paket_wisata'] = $this->Wisata_model->getPaketUmrohByLimit($config['per_page'], $data['start'], $data['keyword']);
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['pendidikan'] = $this->db->get('pendidikan')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('paket-wisata/umroh-haji', $data);
		$this->load->view('templates/footer', $data);
	}
}
