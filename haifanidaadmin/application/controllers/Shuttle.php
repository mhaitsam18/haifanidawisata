<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Shuttle extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Shuttle_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Data Tiket Shuttle";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->distinct();
		$this->db->select('keberangkatan');
		$data['keberangkatan'] = $this->db->get('tiket_shuttle')->result_array();
		$data['tiket_shuttle'] = $this->db->get('tiket_shuttle')->result_array();
		if (!$this->input->post('submit')) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('shuttle/index', $data);
			$this->load->view('templates/footer');
		} else{
			$data = [
				'kode_tiket' => $this->input->post('kode_tiket'),
				'keberangkatan' => $this->input->post('keberangkatan'),
				'tujuan' => $this->input->post('tujuan'),
				'jadwal' => $this->input->post('jadwal'),
				'harga' => $this->input->post('harga'),
				'no_kursi' => $this->input->post('no_kursi'),
				'ketersediaan' => 'Tersedia'
			];
			$this->db->insert('tiket_shuttle', $data);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			redirect('Shuttle/');
		}
	}

	public function dataBooking($value='')
	{
		$data['title'] = "Data Booking";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->join('detail_pemesanan_tiket', 'pemesanan_tiket.book_id = detail_pemesanan_tiket.book_id');
        $this->db->join('tiket_shuttle', 'tiket_shuttle.kode_tiket = detail_pemesanan_tiket.kode_tiket');
        $this->db->join('user', 'pemesanan_tiket.id_user = user.id');
		$this->db->order_by('waktu_pemesanan', 'DESC');
        $data['pemesanan_tiket'] = $this->db->get('pemesanan_tiket')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shuttle/data-booking', $data);
		$this->load->view('templates/footer');
	}

	public function list_keberangkatan($keberangkatan)
	{
		$data['title'] = "Data Tiket Shuttle";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tiket_shuttle'] = $this->db->get_where('tiket_shuttle', ['keberangkatan' => $keberangkatan])->result_array();
		$this->load->view('shuttle/list-keberangkatan', $data);
	}

	public function updateStatusAllTiket($ketersediaan)
	{
		$ketersediaan = str_replace('%20', ' ', $ketersediaan);
		$this->db->update('tiket_shuttle', ['ketersediaan' => $ketersediaan]);
		$this->session->set_flashdata('flash', 'dinyatakan '.$ketersediaan);	
		redirect('Shuttle/');
	}

	public function updateStatusTiket($kode_tiket = '' ,$ketersediaan)
	{
		$ketersediaan = str_replace('%20', ' ', $ketersediaan);
		$this->db->where('kode_tiket', $kode_tiket);
		$this->db->update('tiket_shuttle', ['ketersediaan' => $ketersediaan]);	
		$this->session->set_flashdata('flash', 'dinyatakan '.$ketersediaan);
		redirect('Shuttle/');
	}

	public function updateStatusPemesananTiket($book_id = '', $kode_tiket = '' ,$status)
	{
        $this->db->where('book_id', $book_id);
		$this->db->where('kode_tiket', $kode_tiket);
		$this->db->update('detail_pemesanan_tiket', ['status' => $status]);
		$this->session->set_flashdata('flash', 'dinyatakan '.$status);
		redirect('Shuttle/dataBooking');
	}

	public function deleteAllPemesananTiket()
	{
		$data['title'] = "Delete";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->truncate('detail_pemesanan_tiket');
		$this->db->truncate('pemesanan_tiket');
		redirect('Shuttle/dataBooking');
	}

	public function getUpdateTiketShuttle(){
		echo json_encode($this->Shuttle_model->getTiketShuttleById($this->input->post('id')));
	}
	
}