<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('DataMaster_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Data Master";
		$data['dataMaster'] = $this->db->get_where('user_sub_menu',['menu_id' => 14])->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('data-master/index', $data);
		$this->load->view('templates/footer');
	}

	public function agama()
	{
		$data['title'] = "Data Agama";
		$data['agama'] = $this->db->get('agama')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('agama', 'Religion Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-agama', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('agama', [
				'agama' => $this->input->post('agama')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Religion Added!
				</div>');
			redirect('DataMaster/agama');
		}
	}

	public function kurir()
	{
		$data['title'] = "Data Kurir";
		$data['kurir'] = $this->db->get('kurir')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kurir', 'Shipper', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kurir', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kurir', [
				'kurir' => $this->input->post('kurir')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Shipper Added!
				</div>');
			redirect('DataMaster/kurir');
		}
	}

	public function kategori()
	{
		$data['title'] = "Data Kategori";
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kategori', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kategori', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kategori', [
				'kategori' => $this->input->post('kategori')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Category Added!
				</div>');
			redirect('DataMaster/kategori');
		}
	}

	public function destinasi()
	{
		$data['title'] = "Data Destinasi";
		$data['destinasi'] = $this->db->get('destinasi')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('destinasi', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-destinasi', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('destinasi', [
				'destinasi' => $this->input->post('destinasi')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Destination Added!
				</div>');
			redirect('DataMaster/destinasi');
		}
	}

	public function kelengkapan()
	{
		$data['title'] = "Data Kelengkapan";
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kelengkapan', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kelengkapan', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kelengkapan', [
				'kelengkapan' => $this->input->post('kelengkapan')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Completeness Added!
				</div>');
			redirect('DataMaster/kelengkapan');
		}
	}

	public function kategoriWisata()
	{
		$data['title'] = "Data Kategori Wisata";
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kategori_wisata', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kategori-wisata', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kategori_wisata', [
				'kategori_wisata' => $this->input->post('kategori_wisata')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Category Added!
				</div>');
			redirect('DataMaster/kategoriWisata');
		}
	}

	public function maskapai()
	{
		$data['title'] = "Data Maskapai";
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('maskapai', 'Airlines', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-maskapai', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('maskapai', [
				'maskapai' => $this->input->post('maskapai')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Airlines Added!
				</div>');
			redirect('DataMaster/maskapai');
		}
	}

	public function rekening()
	{
		$data['title'] = "Data Rekening";
		$data['rekening'] = $this->db->get('rekening')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('no_rekening', 'Account', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('atas_nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-rekening', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('rekening', [
				'no_rekening' => $this->input->post('no_rekening'),
				'bank' => $this->input->post('bank'),
				'atas_nama' => $this->input->post('atas_nama'),
				'email' => $this->input->post('email')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Bank Account Added!
				</div>');
			redirect('DataMaster/rekening');
		}
	}

	public function metodeBayar()
	{
		$data['title'] = "Data Metode Bayar";
		$data['metodeBayar'] = $this->db->get('metode_bayar')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('metode_bayar', 'Payment Method', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-metode-bayar', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('metode_bayar', [
				'metode_bayar' => $this->input->post('metode_bayar')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Payment Method Added!
				</div>');
			redirect('DataMaster/metodeBayar/');
		}
	}

	public function konten()
	{
		$data['title'] = "Data Konten";
		$data['content'] = $this->db->get('content')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('header', 'Header', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-konten', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('content', [
				'title' => $this->input->post('title'),
				'header' => $this->input->post('header'),
				'content' => $this->input->post('content'),
				'footer' => $this->input->post('footer'),
				'last_updated' => date("Y-m-d h:i:sa")
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Content Added!
				</div>');
			redirect('DataMaster/konten');
		}
	}

	public function kantor()
	{
		$data['title'] = "Data Kantor";
		$data['kantor'] = $this->db->get('kantor')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_kantor', 'Office', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-kantor', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('kantor', [
				'nama_kantor' => $this->input->post('nama_kantor'),
				'nama_pimpinan' => $this->input->post('nama_pimpinan'),
				'alamat' => $this->input->post('alamat'),
				'region' => $this->input->post('region'),
				'email' => $this->input->post('email'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Office Added!
				</div>');
			redirect('DataMaster/kantor');
		}
	}

	public function deleteAgama($id)
	{
		$this->db->delete('agama', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Religion Deleted!
			</div>');
		redirect('DataMaster/agama');
	}

	public function deleteKurir($id)
	{
		$this->db->delete('kurir', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Shipper Deleted!
			</div>');
		redirect('DataMaster/kurir');
	}

	public function deleteKategori($id)
	{
		$this->db->delete('kategori', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Category Deleted!
			</div>');
		redirect('DataMaster/kategori');
	}

	public function deleteDestinasi($id)
	{
		$this->db->delete('destinasi', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Destination Deleted!
			</div>');
		redirect('DataMaster/destinasi');
	}

	public function deleteKelengkapan($id)
	{
		$this->db->delete('kelengkapan', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Category Deleted!
			</div>');
		redirect('DataMaster/kelengkapan');
	}

	public function deleteKategoriWisata($id)
	{
		$this->db->delete('kategori_wisata', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Completeness Deleted!
			</div>');
		redirect('DataMaster/kategoriWisata');
	}

	public function deleteMaskapai($id)
	{
		$this->db->delete('maskapai', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Airlines Deleted!
			</div>');
		redirect('DataMaster/maskapai');
	}

	public function deleteRekening($id)
	{
		$this->db->delete('rekening', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Bank Account Deleted!
			</div>');
		redirect('DataMaster/rekening');
	}

	public function deleteMetodeBayar($id)
	{
		$this->db->delete('metode_bayar', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Payment Method Deleted!
			</div>');
		redirect('DataMaster/metodeBayar');
	}

	public function deleteKonten($id)
	{
		$this->db->delete('content', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Content Deleted!
			</div>');
		redirect('DataMaster/konten');
	}

	public function deleteKantor($id)
	{
		$this->db->delete('kantor', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Office Deleted!
			</div>');
		redirect('DataMaster/kantor');
	}

	public function updateAgama()
	{
		$this->form_validation->set_rules('agama', 'Religion Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/agama');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('agama', [
				'agama' => $this->input->post('agama')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Religion Updated!
				</div>');
			redirect('DataMaster/agama');
		}
	}
	
	public function updateKurir()
	{
		$this->form_validation->set_rules('kurir', 'Shipper', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kurir');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kurir', [
				'kurir' => $this->input->post('kurir')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Shipper Updated!
				</div>');
			redirect('DataMaster/kurir');
		}
	}
	
	public function updateKategori()
	{
		$this->form_validation->set_rules('kategori', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kategori');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kategori', [
				'kategori' => $this->input->post('kategori')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Category Updated!
				</div>');
			redirect('DataMaster/kategori');
		}
	}
	
	public function updateDestinasi()
	{
		$this->form_validation->set_rules('destinasi', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/destinasi');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('destinasi', [
				'destinasi' => $this->input->post('destinasi')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Destination Updated!
				</div>');
			redirect('DataMaster/destinasi');
		}
	}
	
	public function updateKelengkapan()
	{
		$this->form_validation->set_rules('kelengkapan', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kelengkapan');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kelengkapan', [
				'kelengkapan' => $this->input->post('kelengkapan')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Completeness Updated!
				</div>');
			redirect('DataMaster/kelengkapan');
		}
	}
	
	public function updateKategoriWisata()
	{
		$this->form_validation->set_rules('kategori_wisata', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kategoriWisata');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kategori_wisata', [
				'kategori_wisata' => $this->input->post('kategori_wisata')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Category Updated!
				</div>');
			redirect('DataMaster/kategoriWisata');
		}
	}
	
	public function updateMaskapai()
	{
		$this->form_validation->set_rules('maskapai', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/maskapai');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('maskapai', [
				'maskapai' => $this->input->post('maskapai')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Airlines Updated!
				</div>');
			redirect('DataMaster/maskapai');
		}
	}
	
	public function updateRekening()
	{
		$this->form_validation->set_rules('no_rekening', 'Account', 'trim|required');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required');
		$this->form_validation->set_rules('atas_nama', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/rekening');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('rekening', [
				'no_rekening' => $this->input->post('no_rekening'),
				'bank' => $this->input->post('bank'),
				'atas_nama' => $this->input->post('atas_nama'),
				'email' => $this->input->post('email')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Bank Account Updated!
				</div>');
			redirect('DataMaster/rekening');
		}
	}
	
	public function updateMetodeBayar()
	{
		$this->form_validation->set_rules('metode_bayar', 'Category', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/metodeBayar');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('metode_bayar', [
				'metode_bayar' => $this->input->post('metode_bayar')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Payment Method Updated!
				</div>');
			redirect('DataMaster/metodeBayar');
		}
	}
	
	public function updateKantor()
	{
		$this->form_validation->set_rules('nama_kantor', 'Office', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/kantor');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('kantor', [
				'nama_kantor' => $this->input->post('nama_kantor'),
				'nama_pimpinan' => $this->input->post('nama_pimpinan'),
				'alamat' => $this->input->post('alamat'),
				'region' => $this->input->post('region'),
				'email' => $this->input->post('email'),
				'nomor_telepon' => $this->input->post('nomor_telepon'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Office Updated!
				</div>');
			redirect('DataMaster/Kantor');
		}
	}
	
	public function dashboard()
	{
		$data['title'] = "Data Dashboard";
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('header', 'Header', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		$this->form_validation->set_rules('footer', 'Footer', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-dashboard', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard', [
				'header' => $this->input->post('header'),
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'footer' => $this->input->post('footer'),
				'icon' => $this->input->post('icon')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Content Updated!
				</div>');
			redirect('DataMaster/dashboard');
		}
	}

	public function pertanyaan($pertanyaan = null)
	{
		$data['title'] = "Data Pertanyaan";
		$data['pertanyaan_1'] = $this->db->get('pertanyaan_1')->result_array();
		$data['pertanyaan_2'] = $this->db->get('pertanyaan_2')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data-master/data-pertanyaan', $data);
			$this->load->view('templates/footer');
		} else{
			if ($pertanyaan == 1) {
				$this->db->insert('pertanyaan_1', [
					'pertanyaan' => $this->input->post('pertanyaan')
				]);
			} elseif ($pertanyaan == 2) {
				$this->db->insert('pertanyaan_2', [
					'pertanyaan' => $this->input->post('pertanyaan')
				]);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Question Added!
				</div>');
			redirect('DataMaster/pertanyaan');
		}
	}

	public function updatePertanyaan($pertanyaan=null)
	{
		$this->form_validation->set_rules('pertanyaan', 'Education Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/pertanyaan');
		} else{
			$this->db->where('id', $this->input->post('id'));
			if ($pertanyaan == 1) {
				$this->db->update('pertanyaan_1', [
					'pertanyaan' => $this->input->post('pertanyaan')
				]);
			} elseif ($pertanyaan == 2) {
				$this->db->update('pertanyaan_2', [
					'pertanyaan' => $this->input->post('pertanyaan')
				]);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Question Updated!
				</div>');
			redirect('DataMaster/pertanyaan');
		}
	}
	
	public function deletePertanyaan($pertanyaan = null ,$id)
	{
		if ($pertanyaan == 1) {
			$this->db->delete('pertanyaan_1', ['id' => $id]);
		} elseif ($pertanyaan == 2) {
			$this->db->delete('pertanyaan_2', ['id' => $id]);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Question Deleted!
			</div>');
		redirect('DataMaster/pertanyaan');
	}
	
	public function getUpdateAgama(){
		echo json_encode($this->DataMaster_model->getAgamaById($this->input->post('id')));
	}
	public function getUpdateKonten(){
		echo json_encode($this->DataMaster_model->getKontenById($this->input->post('id')));
	}
	public function getUpdateKurir(){
		echo json_encode($this->DataMaster_model->getKurirById($this->input->post('id')));
	}
	public function getUpdateKategori(){
		echo json_encode($this->DataMaster_model->getKategoriById($this->input->post('id')));
	}
	public function getUpdateDestinasi(){
		echo json_encode($this->DataMaster_model->getDestinasiById($this->input->post('id')));
	}
	public function getUpdateKategoriWisata(){
		echo json_encode($this->DataMaster_model->getKategoriWisataById($this->input->post('id')));
	}
	public function getUpdateMetodeBayar(){
		echo json_encode($this->DataMaster_model->getMetodeBayarById($this->input->post('id')));
	}
	public function getUpdateRekening(){
		echo json_encode($this->DataMaster_model->getRekeningById($this->input->post('id')));
	}
	public function getUpdateMaskapai(){
		echo json_encode($this->DataMaster_model->getMaskapaiById($this->input->post('id')));
	}
	public function getUpdateKelengkapan(){
		echo json_encode($this->DataMaster_model->getKelengkapanById($this->input->post('id')));
	}
	public function getUpdatePertanyaan1(){
		echo json_encode($this->DataMaster_model->getPertanyaan1ById($this->input->post('id')));
	}
	public function getUpdatePertanyaan2(){
		echo json_encode($this->DataMaster_model->getPertanyaan2ById($this->input->post('id')));
	}
	public function getUpdateKantor(){
		echo json_encode($this->DataMaster_model->getKantorById($this->input->post('id')));
	}
	
}