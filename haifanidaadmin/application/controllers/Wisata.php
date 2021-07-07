<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Wisata extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Wisata_model');
		$this->load->model('Jamaah_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('wisata/index', $data);
		$this->load->view('templates/footer');
	}

	public function paketWisata()
	{
		$data['title'] = "Data Paket Wisata";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, paket_wisata.id AS pid');
		$this->db->join('maskapai', 'paket_wisata.id_maskapai=maskapai.id');
		$this->db->join('kategori_wisata', 'paket_wisata.id_kategori_wisata=kategori_wisata.id');
		$this->db->join('destinasi', 'paket_wisata.id_destinasi=destinasi.id');
		$data['paket_wisata'] = $this->db->get_where('paket_wisata', ['aktif' => 1])->result_array();
		$data['maskapai'] = $this->db->get('maskapai')->result_array();
		$data['destinasi'] = $this->db->get('destinasi')->result_array();
		$data['kategori_wisata'] = $this->db->get('kategori_wisata')->result_array();
		$this->form_validation->set_rules('kode_paket', 'package Code', 'trim|required');
		$this->form_validation->set_rules('nama_paket', 'package Name', 'trim|required');
		$this->form_validation->set_rules('harga_paket', 'Package Price', 'trim|required');
		$this->form_validation->set_rules('kualitas', 'Quality', 'trim|required');
		$this->form_validation->set_rules('bintang', 'Star', 'trim|required');
		$this->form_validation->set_rules('kuota', 'Quota', 'trim|required');
		$this->form_validation->set_rules('lama_wisata', 'length of journey', 'trim|required');
		$this->form_validation->set_rules('id_kategori_wisata', 'Category', 'trim|required');
		$this->form_validation->set_rules('id_maskapai', 'Airlines', 'trim|required');
		$this->form_validation->set_rules('tanggal_keberangkatan', 'Date of departure', 'trim|required');
		$this->form_validation->set_rules('hotel_pertama', 'The First Hotel', 'trim|required');
		$this->form_validation->set_rules('hotel_kedua', 'The Second Hotel', 'trim|required');
		$this->form_validation->set_rules('hotel_ketiga', 'The Third Hotel', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'trim|required');
		$this->form_validation->set_rules('tour_leader', 'Tour Leader', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('wisata/paket-wisata', $data);
			$this->load->view('templates/footer');
		} else{
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/paket-wisata';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('paket_wisata', [
						'kode_paket' => htmlspecialchars($this->input->post('kode_paket', true)),
						'nama_paket' => htmlspecialchars($this->input->post('nama_paket', true)),
						'harga_paket' => htmlspecialchars($this->input->post('harga_paket', true)),
						'kualitas' => htmlspecialchars($this->input->post('kualitas', true)),
						'bintang' => htmlspecialchars($this->input->post('bintang', true)),
						'kuota' => htmlspecialchars($this->input->post('kuota', true)),
						'jumlah_terpesan' => 0,
						'lama_wisata' => htmlspecialchars($this->input->post('lama_wisata', true)),
						'id_kategori_wisata' => htmlspecialchars($this->input->post('id_kategori_wisata', true)),
						'id_destinasi' => htmlspecialchars($this->input->post('id_destinasi', true)),
						'id_maskapai' => htmlspecialchars($this->input->post('id_maskapai', true)),
						'tanggal_keberangkatan' => htmlspecialchars($this->input->post('tanggal_keberangkatan', true)),
						'hotel_pertama' => htmlspecialchars($this->input->post('hotel_pertama', true)),
						'hotel_kedua' => htmlspecialchars($this->input->post('hotel_kedua', true)),
						'hotel_ketiga' => htmlspecialchars($this->input->post('hotel_ketiga', true)),
						'deskripsi' => $this->input->post('deskripsi'),
						'tour_leader' => htmlspecialchars($this->input->post('tour_leader', true)),
						'gambar' => $new_image,
						'aktif' => 1,
					]);
					$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Package Added!
						</div>');
				} else{
					$this->session->set_flashdata('flash_error', 'Gagal diunggah');
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
			}  else{
				$this->session->set_flashdata('flash_gagal', 'Thumbnail Wajib diupload');
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Thumbnail Wajib diupload!
					</div>');
			}
			redirect('Wisata/paketWisata');
		}
	}

	public function updatePaketWisata()
	{
		$this->form_validation->set_rules('kode_paket', 'package Code', 'trim|required');
		$this->form_validation->set_rules('nama_paket', 'package Name', 'trim|required');
		$this->form_validation->set_rules('harga_paket', 'Package Price', 'trim|required');
		$this->form_validation->set_rules('kualitas', 'Quality', 'trim|required');
		$this->form_validation->set_rules('bintang', 'Star', 'trim|required');
		$this->form_validation->set_rules('kuota', 'Quota', 'trim|required');
		$this->form_validation->set_rules('lama_wisata', 'length of journey', 'trim|required');
		$this->form_validation->set_rules('id_kategori_wisata', 'Category', 'trim|required');
		$this->form_validation->set_rules('id_maskapai', 'Airlines', 'trim|required');
		$this->form_validation->set_rules('tanggal_keberangkatan', 'Date of departure', 'trim|required');
		$this->form_validation->set_rules('hotel_pertama', 'The First Hotel', 'trim|required');
		$this->form_validation->set_rules('hotel_kedua', 'The Second Hotel', 'trim|required');
		$this->form_validation->set_rules('hotel_ketiga', 'The Third Hotel', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'trim|required');
		$this->form_validation->set_rules('tour_leader', 'Tour Leader', 'trim|required');
		$paket_wisata = $this->db->get_where('paket_wisata', ['id' => $this->input->post('id')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Wisata/paketWisata');
		} else{
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg';
				$config['upload_path'] = './assets/img/paket-wisata';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_image = $produk['gambar'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/paket-wisata/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else{
					$this->session->set_flashdata('flash', $this->upload->display_errors());
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Wisata/paketWisata');
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('paket_wisata', [
				'kode_paket' => htmlspecialchars($this->input->post('kode_paket', true)),
				'nama_paket' => htmlspecialchars($this->input->post('nama_paket', true)),
				'harga_paket' => htmlspecialchars($this->input->post('harga_paket', true)),
				'kualitas' => htmlspecialchars($this->input->post('kualitas', true)),
				'bintang' => htmlspecialchars($this->input->post('bintang', true)),
				'kuota' => htmlspecialchars($this->input->post('kuota', true)),
				'lama_wisata' => htmlspecialchars($this->input->post('lama_wisata', true)),
				'id_kategori_wisata' => htmlspecialchars($this->input->post('id_kategori_wisata', true)),
				'id_destinasi' => htmlspecialchars($this->input->post('id_destinasi', true)),
				'id_maskapai' => htmlspecialchars($this->input->post('id_maskapai', true)),
				'tanggal_keberangkatan' => htmlspecialchars($this->input->post('tanggal_keberangkatan', true)),
				'hotel_pertama' => htmlspecialchars($this->input->post('hotel_pertama', true)),
				'hotel_kedua' => htmlspecialchars($this->input->post('hotel_kedua', true)),
				'hotel_ketiga' => htmlspecialchars($this->input->post('hotel_ketiga', true)),
				'deskripsi' => $this->input->post('deskripsi'),
				'tour_leader' => htmlspecialchars($this->input->post('tour_leader', true))
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Package Updated!
				</div>');
			redirect('Wisata/paketWisata');
		}
	}

	public function deletePaketWisata($id)
	{
		$this->db->where('id', $id);
		$this->db->update('paket_wisata',['aktif' => 0]);
		// $this->db->delete('paket_wisata', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Package Deleted!
			</div>');
		redirect('Wisata/paketWisata');
	}

	public function jamaah()
	{
		$data['title'] = "Data Jama'ah";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->group_by('id_paket_wisata');
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['jamaah_by_paket'] = $this->db->get('jamaah')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jamaah/data-jamaah', $data);
		$this->load->view('templates/footer');
	}

	public function fasilitas($id_paket_wisata = null)
	{
		$data['title'] = "Fasilitas";
		$this->db->select('*, fasilitas.id AS fid');
		$this->db->join('paket_wisata', 'paket_wisata.id = fasilitas.id_paket_wisata');
		if ($id_paket_wisata) {
			$this->db->where('id_paket_wisata', $id_paket_wisata);
		}
		$data['fasilitas'] = $this->db->get('fasilitas')->result_array();
		$data['paket_wisata'] = $this->db->get('paket_wisata')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($id_paket_wisata) {
			$data['paket'] = $this->db->get_where('paket_wisata', ['id' => $id_paket_wisata])->row_array();
		}
		$this->form_validation->set_rules('fasilitas', 'Payment Method', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('wisata/fasilitas', $data);
			$this->load->view('templates/footer');
		} else{
			$this->db->insert('fasilitas', [
				'id_paket_wisata' => $this->input->post('id_paket_wisata'),
				'fasilitas' => $this->input->post('fasilitas'),
				'icon' => $this->input->post('icon')
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Amenities Added!
				</div>');
			redirect('Wisata/fasilitas/');
		}
	}

	public function updateFasilitas($segment = '')
	{
		$this->form_validation->set_rules('fasilitas', 'Amenities', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Wisata/fasilitas');
		} else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('fasilitas', [
				'id_paket_wisata' => $this->input->post('id_paket_wisata'),
				'fasilitas' => $this->input->post('fasilitas'),
				'icon' => $this->input->post('icon')
			]);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Amenities Updated!
				</div>');
			redirect('Wisata/fasilitas/'.$segment);
		}
	}
	
	public function deleteFasilitas($id)
	{
		$this->db->delete('fasilitas', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Amenities Deleted!
			</div>');
		redirect('Wisata/fasilitas');
	}
	
	public function getUpdatePaketWisata(){
		echo json_encode($this->Wisata_model->getPaketWisataById($this->input->post('id')));
	}
	public function getUpdateJamaah(){
		echo json_encode($this->Jamaah_model->getJamaahById($this->input->post('id')));
	}
	public function getUpdateFasilitas(){
		echo json_encode($this->Wisata_model->getFasilitasById($this->input->post('id')));
	}
	
}