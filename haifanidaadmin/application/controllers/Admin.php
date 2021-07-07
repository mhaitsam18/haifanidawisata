<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->model('User_model');
		$this->load->model('DataMaster_model');
		$this->load->model('Menu_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = "Role Management";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Role Added!
				</div>');
			redirect('admin/role');
		}
	}

	public function dataUser()
	{
		$data['title'] = "Data User";
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$data['user_data'] = $this->db->get()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/data-user', $data);
		$this->load->view('templates/footer');
	}

	public function setRole()
	{
		$this->db->set('role_id', $this->input->post('role_id'));
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user');
		// $input = array('role_id' => $this->input->post('role_id'));
		// $id = $this->input->post('id');
		// $this->User_model->update()
		$this->session->set_flashdata('flash', 'Berhasil diubah');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Set User Role Successfull!
			</div>');
		redirect('admin/dataUser');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = "Role Access";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else{
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('flash', 'Berhasil diubah');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Access Changed!
			</div>');
	}

	public function getUpdateRole(){
		echo json_encode($this->Admin_model->getRoleById($this->input->post('id')));
	}
	public function getUserData(){
		echo json_encode($this->Admin_model->getUserById($this->input->post('id')));
	}
	public function updateRole(){
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('admin/role');
		} else{
			$data = array('role' => $this->input->post('role'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user_role', $data);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Role Updated!
				</div>');
			redirect('admin/role');
		}
	}

	public function deleteRole($id)
	{
		$this->db->where('role_id', $id);
		$this->db->delete('user');

		$this->db->where('role_id', $id);
		$this->db->delete('user_access_menu');
		
		$this->db->where('id', $id);
		$this->db->delete('user_role');
			$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Role Deleted!
			</div>');
		redirect('admin/role');
	}

	public function pesan()
	{
		$data['title'] = "Keluhan dan Aspirasi";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('id', 'DESC');
		$data['pesan'] = $this->db->get('pesan')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/pesan', $data);
		$this->load->view('templates/footer');
	}

	public function updateStatusPesan($id_pesan, $status)
	{
		$status = str_replace('%20', ' ', $status);
		$this->db->where('id', $id_pesan);
		$this->db->update('pesan', ['status' => $status]);
		$this->session->set_flashdata('flash', 'Telah dikonfirmasi');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Keluhan/Aspirasi telah dikonfirmasi
			</div>');
		redirect('admin/pesan');
	}

	public function kirimPesan()
	{
		$this->_kirimEmail();
		$this->session->set_flashdata('flash', 'Telah terkirim');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pesan telah terkirim!
			</div>');
		redirect('Admin/pesan');
	}

	public function kirimWhatsApp($no_wa = '', $pesan ='')
	{
		$no_wa = $this->input->post('no_wa');
		$pesan = $this->input->post('pesan');
		
		$no_wa_dibalik = strrev($no_wa);
		$awal_no_wa = substr($no_wa_dibalik, -1);
		if ($awal_no_wa == '0') {
			$no_wa = '+62'.substr($no_wa, 1);
		}
		header("location: http://api.whatsapp.com/send?phone=$no_wa&text=$pesan");
	}

	private function _kirimEmail()
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
		$this->email->to($this->input->post('email'));

		$this->email->subject($this->input->post('subjek'));
		$this->email->message($this->input->post('pesan'));

		if ($this->email->send()) {
			return true;
		} else{
			echo $this->email->print_debugger();
			die;
		}
	}
}