<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Lainnya_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Fitur Lainnya";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 0])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/index', $data);
		$this->load->view('templates/footer');
	}

	public function tentang()
	{
		$data['title'] = "Tentang Aplikasi";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 1])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/tentang', $data);
		$this->load->view('templates/footer');
	}

	public function pengaturan()
	{
		$data['title'] = "Pengaturan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 5])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/pengaturan', $data);
		$this->load->view('templates/footer');
	}

	public function hubungi()
	{
		$data['title'] = "Hubungi Kami";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 2])->row_array();
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('lainnya/hubungi-kami', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['bukti']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/pesan';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('bukti')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('pesan', [
						'nama' => htmlspecialchars($this->input->post('nama', true)),
						'email' => htmlspecialchars($this->input->post('email', true)),
						'no_wa' => htmlspecialchars($this->input->post('no_wa', true)),
						'subjek' => htmlspecialchars($this->input->post('subjek', true)),
						'pesan' => htmlspecialchars($this->input->post('pesan', true)),
						'status' => 'Belum dikonfirmasi',
						'waktu_kirim' => date("Y-m-d H:i:s"),
						'bukti' => $new_image
					]);
					$this->session->set_flashdata('flash', 'Anda Berhasil terkirim');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Masukkan Anda berhasil terkirim!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			} else{
				$this->db->insert('pesan', [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'no_wa' => htmlspecialchars($this->input->post('no_wa', true)),
					'pesan' => htmlspecialchars($this->input->post('pesan', true)),
					'status' => 'Belum dikonfirmasi',
					'waktu_kirim' => date("Y-m-d H:i:s")
				]);
				$this->session->set_flashdata('flash', 'Anda berhasil terkirim');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Masukkan Anda berhasil terkirim! </div>');
			}
			if ($this->input->post('email') != '') {
				$this->_kirimEmail();
			}
			redirect('Lainnya/hubungi');
		}
	}

	public function bantuan()
	{
		$data['title'] = "Bantuan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 3])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/bantuan', $data);
		$this->load->view('templates/footer');
	}

	public function faq()
	{
		$data['title'] = "FAQ";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->db->get_where('content', ['id' => 4])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/faq', $data);
		$this->load->view('templates/footer');
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

		$this->email->subject('Keluhan dan Aspirasi Terkirim');
		$this->email->message('Pesan Anda telah Terkirim, Berikut Rekaman Pesan Anda "'.$this->input->post('pesan').'"');

		if ($this->email->send()) {
			return true;
		} else{
			echo $this->email->print_debugger();
			die;
		}
	}
	
}