<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Toko Online Shop Haifa';
		$data['link'] = 'Produk & Jasa';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->db->select('*, produk.id AS pid');
		$this->db->join('kategori', 'produk.id_kategori=kategori.id');
		$data['produk'] = $this->db->get_where('produk', ['aktif' => 1])->result_array();
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->db->join('paket_wisata', 'paket_unggulan.id_paket_wisata=paket_wisata.id');
		$data['paket_unggulan'] = $this->db->get('paket_unggulan')->result_array();

		$config['base_url'] = base_url('Produk/index/');
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
		
		$config['per_page'] = 6;
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows']/$data['per_page'];
		//styling
		$config['full_tag_open'] = '<div class="full_width pagination_bottom"><ul class="pagination">';
		$config['full_tag_close'] = '</div></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		if ($config['total_rows']-$this->uri->segment(3)>7) {
			$config['next_link'] = '&raquo';
		} else{
			$config['next_link'] = 'Next';
		}
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		if ($this->uri->segment(3)>7) {
			$config['prev_link'] = '&laquo';
		} else{
			$config['prev_link'] = 'Prev';
		}
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="disabled"><a>Prev</a></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="disabled"><a>Next</a></li>';
		} else {
			$next = '';
			$prev = '';
		}
		$config['cur_tag_open'] = $prev.'<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>'.$next;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['produk'] = $this->Produk_model->getProdukByLimit($config['per_page'],$data['start'], $data['keyword'], $data['pilih_kategori']);
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
