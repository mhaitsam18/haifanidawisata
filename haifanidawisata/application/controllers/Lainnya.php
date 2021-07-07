<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lainnya extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['link'] = 'Lainnya';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/index', $data);
		$this->load->view('templates/footer', $data);
	}
	public function tentang()
	{
		$data['title'] = 'Tentang';
		$data['link'] = 'Lainnya';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/tentang', $data);
		$this->load->view('templates/footer', $data);
	}
	public function hubungiKami()
	{
		$data['title'] = 'Hubungi Kami';
		$data['link'] = 'Lainnya';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$data['kantor'] = $this->db->get('kantor')->result_array();
		$this->form_validation->set_rules('nama', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('lainnya/hubungi-kami', $data);
			$this->load->view('templates/footer', $data);
		} else{
			$upload_image = $_FILES['bukti']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/pesan';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('bukti')) {
					$bukti = $this->upload->data('file_name');
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Lainnya/hubungiKami');
				}
			} else{
				$bukti = '';
			}
			$query = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'no_wa' => $this->input->post('no_wa'),
				'pesan' => $this->input->post('pesan'),
				'status' => 'Belum dikonfirmasi',
				'waktu_kirim' => date("Y-m-d H:i:s"),
				'bukti' => $bukti
			];
			$this->db->insert('pesan', $query);

			if ($this->input->post('email') != '') {
				$subjek  = "Rekaman Aspirasi dan Keluhan Anda";
				$pesan = "Berikut rekaman Aspirasi dan Keluhan Anda: ".$this->input->post('pesan');
				$this->_kirimEmail($this->input->post('email'), $subjek, $pesan);
			}
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your Message has been sent! </div>');
			$this->session->set_flashdata('flash', 'Telah terkirim');
			redirect('Lainnya/hubungiKami');
		}
	}

	public function bantuan()
	{
		$data['title'] = 'Bantuan';
		$data['link'] = 'Lainnya';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lainnya/bantuan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function faq()
	{
		$data['title'] = 'FAQ';
		$data['link'] = 'Lainnya';
		$data['soon'] = '2021/12/19';
		if ($this->session->userdata('email')) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('problem/coming-soon', $data);
		// $this->load->view('lainnya/faq', $data);
		$this->load->view('templates/footer', $data);
	}

	private function _kirimEmail($email='', $subjek = '', $pesan = '')
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
		$this->email->to($email);

		$this->email->subject($subjek);
		$this->email->message($pesan);

		if ($this->email->send()) {
			return true;
		} else{
			echo $this->email->print_debugger();
			die;
		}
	}
	
	
}
