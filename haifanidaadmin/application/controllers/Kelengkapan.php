<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelengkapan extends CI_Controller {

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
		$data['title'] = "Kelengkapan";
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->group_by('id_paket_wisata');
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['jamaah_by_paket'] = $this->db->get_where('jamaah', ['id_pemesan' => $data['user']['id']])->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan/index', $data);
		$this->load->view('templates/footer');
	}

	public function persyaratan($id_jamaah = 0)
	{
		$data['title'] = "Persyaratan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($id_jamaah != 0) {
			$where = array('id_jamaah' => $id_jamaah);
		} else{
			$where = array('id_pemesan' => $data['user']['id']);
		}
		$this->db->join('jamaah','persyaratan.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata','jamaah.id_paket_wisata = paket_wisata.id');
		$data['persyaratan'] = $this->db->get_where('persyaratan', $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kelengkapan/persyaratan', $data);
		$this->load->view('templates/footer');
	}

	public function berkasLunak($id_jamaah = 0)
	{
		$data['title'] = "Upload Berkas";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$berkas_lunak = $this->db->get_where('berkas_lunak', ['id_jamaah' => $id_jamaah])->row_array();
		if ($this->input->post('submit_foto')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$old_image = $berkas_lunak['foto'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('foto', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($this->input->post('submit_scan_ktp')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('scan_ktp')) {
				$old_image = $berkas_lunak['scan_ktp'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan_ktp', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($this->input->post('submit_scan_kk')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('scan_kk')) {
				$old_image = $berkas_lunak['scan_kk'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan_kk', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($this->input->post('submit_scan_rekam_medis')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('scan_rekam_medis')) {
				$old_image = $berkas_lunak['scan_rekam_medis'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan_rekam_medis', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($this->input->post('submit_scan_paspor')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('scan_paspor')) {
				$old_image = $berkas_lunak['scan_paspor'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan_paspor', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($this->input->post('submit_scan_buku_nikah')) {
			$config['allowed_types'] = 'gif|jpg|png|svg|pdf';
			$config['upload_path'] = './assets/img/persyaratan';
			$config['max_size']     = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('scan_buku_nikah')) {
				$old_image = $berkas_lunak['scan_buku_nikah'];
				if ($old_image !='') {
					unlink(FCPATH.'assets/img/persyaratan/'.$old_image);
				} 
				$new_image = $this->upload->data('file_name');
				$this->db->set('scan_buku_nikah', $new_image);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('berkas_lunak');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			} else{
				$this->session->set_flashdata('flash_error', 'Gagal diunggah');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				redirect('Kelengkapan/berkasLunak/'.$this->uri->segment(3));
			}
		} elseif ($id_jamaah == 0) {
			redirect('Kelengkapan');
		} else{
			$data['berkas_lunak'] = $this->db->get_where('berkas_lunak', ['id_jamaah' => $id_jamaah])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kelengkapan/berkas-lunak', $data);
			$this->load->view('templates/footer');
		}
	}

	public function kelengkapan($id_jamaah = 0)
	{
		$data['title'] = "Kelengkapan Fasilitas";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($id_jamaah == 0) {
			redirect('Kelengkapan');
		}
		$data['jamaah'] = $this->db->get_where('jamaah', ['id' => $id_jamaah])->row_array();
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Kelengkapan/kelengkapan-fasilitas', $data);
		$this->load->view('templates/footer');
	}

	public function ubahKelengkapan()
	{
		$id_kelengkapan = $this->input->post('kelengkapanId');
		$id_jamaah = $this->input->post('jamaahId');

		$data = [
			'id_jamaah' => $id_jamaah,
			'id_kelengkapan' => $id_kelengkapan
		];

		$result = $this->db->get_where('kelengkapan_jamaah', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('kelengkapan_jamaah', $data);
		} else{
			$this->db->delete('kelengkapan_jamaah', $data);
		}
		$this->session->set_flashdata('flash', 'Berhasil diubah');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Kelengkapan berhasil diupdate!
			</div>');
	}
	
}