<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['link'] = 'Home';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['struktur'] = $this->db->get('struktur')->result_array();
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['paket_wisata'] = $this->db->get('paket_wisata', 3)->result_array();
		$this->db->where('stok >', 1);
		$this->db->order_by('diskon', 'DESC');
		$data['produk'] = $this->db->get('produk', 4)->result_array();
		// $this->load->view('home/full_home', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function readAllNotification()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->where('id_user', $user['id']);
		$this->db->update('notifikasi', ['is_read' => 1]);
	}
	public function notifikasi()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/notification', $data);
	}
	
}
