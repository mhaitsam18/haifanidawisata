<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		is_logged_in();
	}

	public function index()
	{
		$data['link'] = 'Profil';
		$data['title'] = 'Beranda';
		$this->db->join('agama', 'agama.id = user.religion_id');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
		$data['agama'] = $this->db->get('agama')->result_array();
		$data['pertanyaan_keamanan'] = $this->db->get_where('pertanyaan_keamanan', ['id_user' => $data['user']['id']]);
		$data['pertanyaan_1'] = $this->db->get('pertanyaan_1')->result_array();
		$data['pertanyaan_2'] = $this->db->get('pertanyaan_2')->result_array();
		if ($this->form_validation->run() ==  false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('profil/index', $data);
			$this->load->view('templates/footer', $data);
		} else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//jika ada gambar
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg';
				$config['upload_path'] = './assets/img/profile';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image !='default.jpg') {
						// unlink(FCPATH.'assets/img/profile/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Profil');
				}
			}

			$data = [
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'place_of_birth' => $this->input->post('place_of_birth'),
				'birthday' => $this->input->post('birthday'),
				'phone_number' => $this->input->post('phone_number'),
				'religion_id' => $this->input->post('religion_id'),
				'address' => $this->input->post('address')
			];
			$this->db->where('email', $email);
			$this->db->update('user', $data);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Congratulation! Your profile has been updated!
				</div>');
			redirect('Profil');
		}
	}

	public function changePassword()
	{

		$data['title'] = "Change Password";
		$data['link'] = 'Profil';
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('new_password2', 'Repeat New Password', 'trim|required|matches[new_password1]');
		if ($this->form_validation->run() ==  false) {
			redirect('Profil/');
		} else{
			$current_password = $this->input->post('current_password');
			$new_password1 = $this->input->post('new_password1');
			$new_password2 = $this->input->post('new_password2');
			if (!password_verify($current_password, $data['user']['password'])) {
		$this->session->set_flashdata('flash_gagal', 'Password saat ini salah');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
			redirect('user/changePassword');
			} else{
				if ($current_password == $new_password1) {
					$this->session->set_flashdata('flash_gagal', 'Kata Sandi baru tidak boleh sama dengan kata sandi yang lama');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/changePassword');
				} else{
					$password_hash = password_hash($new_password1, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('flash', 'Berhasil diubah');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password changed!</div>');
					redirect('user/changePassword');
				}
			}
		}
	}

	public function keamanan()
	{
		$data['title'] = "Security";
		$data['link'] = 'Profil';
		$data['pertanyaan_keamanan'] = $this->db->get_where('pertanyaan_keamanan', ['id_user' => $data['user']['id']]);
		$data['pertanyaan_1'] = $this->db->get('pertanyaan_1')->result_array();
		$data['pertanyaan_2'] = $this->db->get('pertanyaan_2')->result_array();
		$this->form_validation->set_rules('id_pertanyaan_1', 'Question 1', 'trim|required');
		$this->form_validation->set_rules('id_pertanyaan_2', 'Question 2', 'trim|required');
		$this->form_validation->set_rules('jawaban_1', 'Answer 1', 'trim|required');
		$this->form_validation->set_rules('jawaban_2', 'Answer 2', 'trim|required');
		if ($this->form_validation->run() ==  false) {
			redirect('profil/');
		} else{
			$num_pertanyaan = $this->db->get_where('pertanyaan_keamanan', ['id_user' => $data['user']['id']])->num_rows();
			if ($num_pertanyaan > 0) {
				$value = [
					'id_pertanyaan_1' => $this->input->post('id_pertanyaan_1'),
					'jawaban_1' => $this->input->post('jawaban_1'),
					'id_pertanyaan_2' => $this->input->post('id_pertanyaan_2'),
					'jawaban_2' => $this->input->post('jawaban_2')
				];
				$this->db->where('id_user', $data['user']['id']);
				$this->db->update('pertanyaan_keamanan', $value);
			} else{
				$value = [
					'id_user' => $data['user']['id'],
					'id_pertanyaan_1' => $this->input->post('id_pertanyaan_1'),
					'jawaban_1' => $this->input->post('jawaban_1'),
					'id_pertanyaan_2' => $this->input->post('id_pertanyaan_2'),
					'jawaban_2' => $this->input->post('jawaban_2')
				];
				$this->db->insert('pertanyaan_keamanan', $value);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Security Updated!</div>');
			redirect('user/keamanan');
		}
	}
	
}
