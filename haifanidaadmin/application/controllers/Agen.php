<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Agen extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Agen_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Modul Peragenan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 1])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('agen/index', $data);
		$this->load->view('templates/footer');
	}

	public function agen()
	{
		$data['title'] = "Data Agen";
		$data['agen'] = $this->db->get('agen')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kode_agen', 'Agent Code', 'trim|required');
		$this->form_validation->set_rules('perwakilan', 'Agency', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Branch office', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Phone Number', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Agen/agen', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('agen', [
				'kode_agen' => $this->input->post('kode_agen'),
				'perwakilan' => $this->input->post('perwakilan'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Agent Added!
				</div>');
		
			redirect('Agen/agen');
		}
	}

	public function updateAgen()
	{
		$this->form_validation->set_rules('kode_agen', 'Agent Code', 'trim|required');
		$this->form_validation->set_rules('perwakilan', 'Agency', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Branch office', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'Phone Number', 'trim|required');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Agen/agen');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('agen', [
				'kode_agen' => $this->input->post('kode_agen'),
				'perwakilan' => $this->input->post('perwakilan'),
				'alamat_kantor' => $this->input->post('alamat_kantor'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Agent Updated!
				</div>');
			redirect('Agen/agen');
		}
	}

	public function deleteAgen($id)
	{
		$this->db->delete('agen', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Agent Deleted!
			</div>');
		redirect('Agen/agen');
	}
	
	public function getUpdateAgen(){
		echo json_encode($this->Agen_model->getAgenById($this->input->post('id')));
	}
	
}