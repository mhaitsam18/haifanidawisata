<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Informasi_model');
		$this->load->model('Member_model');
		$this->load->model('Wisata_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Informasi';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function blog()
	{
		$data['title'] = 'Blog';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$config['base_url'] = base_url('Informasi/blog/');
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else{
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		$this->db->like('judul', $data['keyword']);
		$this->db->from('blog');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows']/$data['per_page'];

		//styling
		$config['full_tag_open'] = '<ul class="travel_pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="disabled"><a><i class="fa fa-angle-double-left"></i></a></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="disabled"><a><i class="fa fa-angle-double-right"></i></a></li>';
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
		$data['blog'] = $this->Informasi_model->getBlogByLimit($config['per_page'],$data['start'], $data['keyword']);
		$data['num_blog'] = $this->Informasi_model->getNumBlogByLimit($config['per_page'],$data['start'], $data['keyword']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/blog', $data);
		$this->load->view('templates/footer', $data);
	}

	public function berita()
	{
		$data['title'] = 'Berita';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$config['base_url'] = base_url('Informasi/berita/');
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else{
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		$this->db->like('judul', $data['keyword']);
		$this->db->from('berita');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows']/$data['per_page'];

		//styling
		$config['full_tag_open'] = '<ul class="travel_pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="disabled"><a><i class="fa fa-angle-double-left"></i></a></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="disabled"><a><i class="fa fa-angle-double-right"></i></a></li>';
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
		$data['berita'] = $this->Informasi_model->getBeritaByLimit($config['per_page'],$data['start'], $data['keyword']);
		$data['num_berita'] = $this->Informasi_model->getNumBeritaByLimit($config['per_page'],$data['start'], $data['keyword']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/berita', $data);
		$this->load->view('templates/footer', $data);
	}

	public function pengumuman()
	{
		$data['title'] = 'Pengumuman';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$config['base_url'] = base_url('Informasi/pengumuman/');
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else{
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		$this->db->like('judul', $data['keyword']);
		$this->db->from('pengumuman');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows']/$data['per_page'];

		//styling
		$config['full_tag_open'] = '<ul class="travel_pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="disabled"><a><i class="fa fa-angle-double-left"></i></a></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="disabled"><a><i class="fa fa-angle-double-right"></i></a></li>';
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
		$data['pengumuman'] = $this->Informasi_model->getPengumumanByLimit($config['per_page'],$data['start'], $data['keyword']);
		$data['num_pengumuman'] = $this->Informasi_model->getNumPengumumanByLimit($config['per_page'],$data['start'], $data['keyword']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/pengumuman', $data);
		$this->load->view('templates/footer', $data);
	}

	public function peraturan()
	{
		$data['title'] = 'Peraturan';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$config['base_url'] = base_url('Informasi/peraturan/');
		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else{
			$data['keyword'] = $this->session->set_userdata('keyword');
		}
		$this->db->like('judul', $data['keyword']);
		$this->db->from('peraturan');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;
		$config['num_links'] = 2;

		$data['per_page'] = $config['per_page'];
		$data['count_page'] = $data['total_rows']/$data['per_page'];

		//styling
		$config['full_tag_open'] = '<ul class="travel_pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		if (empty($this->uri->segment(3))) {
			$prev = '<li class="disabled"><a><i class="fa fa-angle-double-left"></i></a></li>';
			$next = '';
		} elseif ($config['total_rows']-$this->uri->segment(3)<3) {
			$prev = '';
			$next = '<li class="disabled"><a><i class="fa fa-angle-double-right"></i></a></li>';
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
		$data['peraturan'] = $this->Informasi_model->getPeraturanByLimit($config['per_page'],$data['start'], $data['keyword']);
		$data['num_peraturan'] = $this->Informasi_model->getNumPeraturanByLimit($config['per_page'],$data['start'], $data['keyword']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/peraturan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function strukturOrganisasi()
	{
		$data['title'] = 'Struktur Organisasi';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}

		$data['struktur'] = $this->db->get('struktur')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/struktur-organisasi', $data);
		$this->load->view('templates/footer', $data);
	}

	public function jadwalKeberangkatan()
	{
		$data['title'] = 'Jadwal Keberangkatan';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['jadwal_keberangkatan'] = $this->Wisata_model->getJadwalBerangkat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/jadwal-keberangkatan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function jadwalShuttle()
	{
		$data['title'] = 'Jadwal Shuttle';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->db->distinct();
		$this->db->select('keberangkatan');
		$data['keberangkatan'] = $this->db->get('tiket_shuttle')->result_array();
		$this->db->distinct();
		$this->db->select('keberangkatan, tujuan, jadwal');
		$data['tiket_shuttle'] = $this->db->get('tiket_shuttle')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/jadwal-shuttle', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function alamat()
	{
		$data['title'] = 'Alamat Kantor, Cabang & Agent';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/alamat', $data);
		$this->load->view('templates/footer', $data);
	}

	public function list_keberangkatan($keberangkatan)
	{
		$data['title'] = "Data Tiket Shuttle";
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		
		$this->db->distinct();
		$this->db->select('keberangkatan, tujuan, jadwal');
		$this->db->order_by('tujuan', 'ASC');
		$data['tiket_shuttle'] = $this->db->get_where('tiket_shuttle', ['keberangkatan' => $keberangkatan])->result_array();
		$this->load->view('informasi/list-keberangkatan', $data);
	}

	public function detail($konten = '', $id = null)
	{
		$data['title'] = 'Alamat Kantor, Cabang & Agent';
		$data['link'] = 'Informasi';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['konten'] = $konten;
		$data['row_konten'] = $this->db->get_where($konten, ['id' => $id])->row_array();
		$data['num_konten'] = $this->db->get_where($konten, ['id' => $id])->num_rows();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('informasi/detail-konten', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
}
