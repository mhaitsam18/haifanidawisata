<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelengkapanJamaah extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Kelengkapan_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Kelengkapan Jama'ah";
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, jamaah.id AS idj');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->group_by('id_paket_wisata');
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['jamaah_by_paket'] = $this->db->get('jamaah')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan-jamaah/index', $data);
		$this->load->view('templates/footer');
	}

	public function persyaratan($id_jamaah = 0)
	{
		$data['title'] = "Persyaratan Jama'ah";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, persyaratan.id AS pid');
		$this->db->join('jamaah','persyaratan.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata','jamaah.id_paket_wisata = paket_wisata.id');
		if ($id_jamaah != 0) {
			$data['persyaratan'] = $this->db->get_where('persyaratan', ['id_jamaah' => $id_jamaah])->result_array();
		} else{
			$data['persyaratan'] = $this->db->get('persyaratan')->result_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan-jamaah/persyaratan', $data);
		$this->load->view('templates/footer');
	}

	public function berkas($id_jamaah = 0)
	{
		$data['title'] = "Berkas Jama'ah";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->join('jamaah','berkas_lunak.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata','jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->join('user','jamaah.id_pemesan = user.id');
		if ($id_jamaah != 0) {
			$data['berkas_lunak'] = $this->db->get_where('berkas_lunak', ['id_jamaah' => $id_jamaah])->result_array();
		} else{
			$data['berkas_lunak'] = $this->db->get('berkas_lunak')->result_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan-jamaah/berkas-lunak', $data);
		$this->load->view('templates/footer');
	}

	public function kelengkapan($id_jamaah = 0)
	{
		$data['title'] = "Kelengkapan Fasilitas";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		if ($id_jamaah == 0) {
			$data['jamaah'] = $this->db->get('jamaah')->result_array();
		} else{
			$data['jamaah'] = $this->db->get_where('jamaah',['jamaah.id' => $id_jamaah])->result_array();
		}
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$this->db->join('jamaah', 'kelengkapan_jamaah.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->join('kelengkapan', 'kelengkapan_jamaah.id_kelengkapan = kelengkapan.id');
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['kelengkapan_jamaah'] = $this->db->get('kelengkapan_jamaah')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan-jamaah/kelengkapan-fasilitas', $data);
		$this->load->view('templates/footer');
	}

	public function updatePersyaratan()
	{
		$this->form_validation->set_rules('id_jamaah', 'Id Jamaah', 'required');
		$this->form_validation->set_rules('ktp', 'KTP', 'required');
		$this->form_validation->set_rules('kk', 'KK', 'required');
		$this->form_validation->set_rules('foto34', 'Foto 3 x 4', 'required');
		$this->form_validation->set_rules('foto46', 'Foto 4 x 6', 'required');
		$this->form_validation->set_rules('paspor', 'Paspor', 'required');
		$this->form_validation->set_rules('visa', 'Visa', 'required');
		$this->form_validation->set_rules('biometrik', 'Biometrik', 'required');
		$this->form_validation->set_rules('suntik_vaksin', 'Suntik_vaksin', 'required');
		$this->form_validation->set_rules('manasik', 'Manasik', 'required');
		$this->form_validation->set_rules('rekam_medis', 'Rekam Medis', 'required');
		if ($this->form_validation->run() == false) {
			redirect('KelengkapanJamaah/persyaratan/');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('persyaratan', [
				'ktp' => $this->input->post('ktp'),
				'kk' => $this->input->post('kk'),
				'foto34' => $this->input->post('foto34'),
				'foto46' => $this->input->post('foto46'),
				'paspor' => $this->input->post('paspor'),
				'visa' => $this->input->post('visa'),
				'biometrik' => $this->input->post('biometrik'),
				'suntik_vaksin' => $this->input->post('suntik_vaksin'),
				'manasik' => $this->input->post('manasik'),
				'rekam_medis' => $this->input->post('rekam_medis')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Requirements Updated!
				</div>');
			redirect('KelengkapanJamaah/persyaratan/');
		}
	}
	
	public function getUpdatePersyaratan()
	{
		echo json_encode($this->db->get_where('persyaratan', ['id' => $this->input->post('id')])->row_array());
	}
	
}