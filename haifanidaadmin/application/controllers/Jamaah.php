<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Jamaah extends CI_Controller {

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

	public function updateStatusPesanan($id, $status = '')
	{
		$jamaah = $this->db->get_where('jamaah', ['id' => $id])->row_array();
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->where('id', $id);
		$this->db->update('jamaah', ['status' => 'Pesanan '.$status]);
		if ($status == 'lunas') {
			$this->db->where('id', $id);
			$this->db->update('jamaah', ['status' => 'Sudah Lunas','total_bayar' => $jamaah['total_tagihan']]);
			$this->db->insert('notifikasi', [
				'id_user' => $jamaah['id_pemesan'],
				'id_kategori_notifikasi' => 10,
				'sub_id' => $id,
				'waktu_notifikasi' => date('Y-m-d H:i:s'),
				'subjek' => "Pemesanan Lunas",
				'pesan' => "Pembayaran Anda diterima",
				'is_read' => 0,
				'id_creator' => $user['id']
			]);
		}
		if ($status == 'dibatalkan') {
			$paket_wisata = $this->db->get_where('paket_wisata',['id' => $jamaah['id_paket_wisata']])->row_array();
			$new_jumlah_terpesan = $paket_wisata['jumlah_terpesan'] - 1;
			$this->db->where('id', $jamaah['id_paket_wisata']);
			$this->db->update('paket_wisata',['jumlah_terpesan' => $new_jumlah_terpesan]);
			$this->db->insert('notifikasi', [
				'id_user' => $jamaah['id_pemesan'],
				'id_kategori_notifikasi' => 10,
				'sub_id' => $id,
				'waktu_notifikasi' => date('Y-m-d H:i:s'),
				'subjek' => "Pemesanan dibatalkan",
				'pesan' => "Pemesanan Anda dibatalkan",
				'is_read' => 0,
				'id_creator' => $user['id']
			]);
		}
		$this->session->set_flashdata('flash', 'Telah '.$status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Pesanan telah '.$status.'
			</div>');
		redirect('Jamaah/');
	}

	public function detail($id_jamaah)
	{
		$data['title'] = "Detail Pesanan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->select('*, jamaah.id AS idj');
		$this->db->join('metode_bayar', 'jamaah.id_metode_bayar = metode_bayar.id');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('pendidikan', 'jamaah.id_pendidikan = pendidikan.id');
		$this->db->join('berkas_lunak', 'berkas_lunak.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$data['jamaah'] = $this->db->get_where('jamaah', ['jamaah.id' => $id_jamaah])->row_array();

		$this->db->join('jamaah', 'jamaah.id_paket_wisata = paket_wisata.id');
		$data['pesanan'] = $this->db->get_where('paket_wisata', ['jamaah.id' => $id_jamaah])->result_array();
		
		$this->db->select('*, bukti_pembayaran_paket.id AS idbpp, bukti_pembayaran_paket.status AS sbpp');
		$this->db->join('jamaah', 'bukti_pembayaran_paket.id_jamaah = jamaah.id');
		$this->db->join('user', 'jamaah.id_pemesan = user.id');
		$this->db->join('rekening', 'bukti_pembayaran_paket.id_rekening_tujuan = rekening.id');
		$data['bukti_pembayaran_paket'] = $this->db->get_where('bukti_pembayaran_paket',['id_jamaah' => $id_jamaah])->result_array();

		$this->db->join('jamaah','berkas_lunak.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata','jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->join('user','jamaah.id_pemesan = user.id');
		$data['berkas_lunak'] = $this->db->get_where('berkas_lunak', ['id_jamaah' => $id_jamaah])->result_array();
		
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$data['jamaah_result'] = $this->db->get_where('jamaah',['jamaah.id' => $id_jamaah])->result_array();
		$data['kelengkapan'] = $this->db->get('kelengkapan')->result_array();
		$this->db->join('jamaah', 'kelengkapan_jamaah.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata', 'jamaah.id_paket_wisata = paket_wisata.id');
		$this->db->join('kelengkapan', 'kelengkapan_jamaah.id_kelengkapan = kelengkapan.id');
		$this->db->order_by('tanggal_keberangkatan', 'DESC');
		$data['kelengkapan_jamaah'] = $this->db->get('kelengkapan_jamaah')->result_array();

		$this->db->join('jamaah','persyaratan.id_jamaah = jamaah.id');
		$this->db->join('paket_wisata','jamaah.id_paket_wisata = paket_wisata.id');
		$data['persyaratan'] = $this->db->get_where('persyaratan', ['id_jamaah' => $id_jamaah])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jamaah/detail-pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function getUpdateJamaah(){
		echo json_encode($this->Jamaah_model->getJamaahById($this->input->post('id')));
	}
	
}