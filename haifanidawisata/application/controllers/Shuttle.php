<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shuttle extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Shuttle';
		$data['link'] = 'Produk & Jasa';
		$this->session->unset_userdata('start_session');
		$data['tiket']= $this->db->get('tiket_shuttle')->result_array();
		$this->db->distinct();
		$this->db->select('keberangkatan');
		$data['keberangkatan']= $this->db->get('tiket_shuttle')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shuttle/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function prosesTujuan()
	{
		$keberangkatan = $_POST['keberangkatan'];
		$sql = "SELECT DISTINCT tujuan FROM tiket_shuttle WHERE keberangkatan='$keberangkatan'";
		$result = $this->db->query($sql);
		$users_arr = array();
		foreach ($result->result_array() as $row) {
			$tujuan = $row['tujuan'];
			$users_arr[] = array("tujuan" => $tujuan);
		}
		echo json_encode($users_arr);
	}
	public function tujuan($keberangkatan)
	{
        $this->db->distinct();
        $this->db->select('tujuan');
		$data['tujuan'] = $this->db->get_where('tiket_shuttle', ['keberangkatan' => $keberangkatan])->result_array();
		$this->load->view('shuttle/tujuan', $data);
	}

	public function cariKeberangkatan()
	{
		$data['title'] = 'Cari Keberangkatan';
		$data['link'] = 'Produk & Jasa';
		
		$this->session->unset_userdata('start_session');
		$this->db->select('*, COUNT(no_kursi) AS jumlah');
		$this->db->where('keberangkatan', $this->input->post('keberangkatan'));
		$this->db->where('tujuan', $this->input->post('tujuan'));
		$this->db->where('ketersediaan', 'Tersedia');
		$this->db->group_by('jadwal');
		$data['cari_keberangkatan'] = $this->db->get('tiket_shuttle')->result_array();
		// $sql = "SELECT *, COUNT(no_kursi) AS jumlah FROM tiket_shuttle WHERE keberangkatan='$keberangkatan' AND tujuan='$tujuan' AND ketersediaan='Tersedia' GROUP BY jadwal";
		// $data['cari_keberangkatan']= $this->db->query($sql);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shuttle/cari-keberangkatan', $data);
		$this->load->view('templates/footer', $data);
	}

	public function bookingShuttle()
	{
		$data['title'] = 'Booking Shuttle';
		$data['link'] = 'Produk & Jasa';
		$timeout = 2; // setting timeout dalam menit
		$timeout = $timeout * 60; // menit ke detik
		if(isset($this->session->start_session)){
			$elapsed_time = time()-$this->session->start_session;
			if($elapsed_time >= $timeout){
				$this->session->unset_userdata('start_session');
				echo "<script type='text/javascript'>alert('Sesi telah berakhir, Silahkan Pesan Ulang');window.location='".base_url('Shuttle')."'</script>";
			}
		}
		$this->session->start_session=time();
		$data['keberangkatan']= $this->input->get('keberangkatan');
		$data['tujuan']= $this->input->get('tujuan');
		$data['jadwal']= $this->input->get('jadwal');
		$data['penumpang']= $this->input->get('penumpang');
		$where = [
        	'keberangkatan' => $data['keberangkatan'],
        	'tujuan' => $data['tujuan'],
        	'jadwal' => $data['jadwal']
        ];
        $data['cari_kursi'] = $this->db->get_where('tiket_shuttle', $where)->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('shuttle/booking-shuttle', $data);
		$this->load->view('templates/footer', $data);
	}

	public function prosesBooking($value='')
	{
		$data['title'] = "Cari Keberangkatan";
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$timeout = 2; // setting timeout dalam menit
		$timeout = $timeout * 60; // menit ke detik
		if(isset($this->session->start_session)){
			$elapsed_time = time()-$this->session->start_session;
			if($elapsed_time >= $timeout){
				$this->session->unset_userdata('start_session');
				echo "<script type='text/javascript'>alert('Sesi telah berakhir, Silahkan Pesan Ulang');window.location='".base_url('Shuttle/')."'</script>";
				$this->session->set_flashdata('shuttle_gagal', "Sesi telah berakhir, Silahkan Pesan Ulang");
				redirect('Shuttle/');
			} else{
				$arr;
				$a=0;
				$no_hp = $this->input->post('no_hp');
				$email = $this->input->post('email');
				$keberangkatan = $this->input->post('keberangkatan');
				$tujuan = $this->input->post('tujuan');
				$jadwal = $this->input->post('jadwal');
				$jumlah = COUNT($this->input->post('kursi'));
				$book_id = acak(15);
				$this->db->select('book_id');
				$isi = $this->db->get_where('pemesanan_tiket', ['book_id' => $book_id]);
				if ($isi->num_rows() == 0) {
					$waktu_pemesanan = date("Y-m-d h:i:s");
					// getDiskon($jumlah)
					$data = [
						'book_id' => $book_id,
						'id_user' => $user['id'],
						'waktu_pemesanan' => $waktu_pemesanan,
						'no_hp' => $no_hp,
						'email' => $email,
						'jumlah' => $jumlah,
						'diskon' => 0.0
					];
					$this->db->insert('pemesanan_tiket', $data);
					$this->session->book_id = $book_id;
				}else{
					$this->Shuttle_model->insert_pemesanan_tiket();
				}
				$book_id = $this->session->book_id;
				foreach ($this->input->post('kursi') as $kursi) {
					$arr[$a]=$kursi;
					$a++;
					$nama = $this->input->post("nama".$a);
					$kode_tiket = null;
					$where = [
						'keberangkatan' => $keberangkatan,
						'tujuan' => $tujuan,
						'jadwal' => $jadwal,
						'no_kursi' => $kursi
					];
					$tiket_shuttle = $this->db->get_where('tiket_shuttle', $where)->row_array();
					$kode_tiket = $tiket_shuttle['kode_tiket'];

					$data = [
						'book_id' => $book_id,
						'kode_tiket' => $kode_tiket,
						'nama' => $nama,
						'status' => 'has booked'
					];
					$this->db->insert('detail_pemesanan_tiket', $data);

					$this->db->where('kode_tiket', $kode_tiket);
					$this->db->update('tiket_shuttle', ['ketersediaan' => 'Tidak Tersedia']);
				}
				if ($this->input->post('email') != '') {
					$subjek  = "Tiket Haifa Nida Shuttle";
					$pesan = "Terima Kasih sudah memesan di Shuttle kami, berikut kode booking Anda adalah $book_id";
					$this->_kirimEmail($this->input->post('email'), $subjek, $pesan);
				}
				$this->session->unset_userdata('start_session');
				$this->session->unset_userdata('book_id');
				// echo "<script type='text/javascript'>alert('Pemesanan Anda Berhasil, kode booking Anda adalah".$book_id.". Kami akan Shuttleikan Tiket Shuttle Anda melalui Email. Terima Kasih');window.location='".base_url('Shuttle/')."'</script>";
				$this->session->set_flashdata('shuttle', "kode booking Anda adalah ".$book_id.". Cek Email Anda untuk melihat kode booking Anda. Terima Kasih");
				redirect('Shuttle/');

			}
		}
	}

	public function getTujuan($keberangkatan)
	{
		$this->db->distinct();
		$this->db->select('tujuan');
		$this->db->where('keberangkatan', $keberangkatan);
		$data['tujuan'] = $this->db->get('tiket_shuttle')->result_array();
		$this->load->view('shuttle/tujuan', $data);
	}


	public function searchTujuan()
	{
		$keberangkatan = $this->input->post('keberangkatan');
		$this->db->distinct();
		$this->db->select('tujuan');
		$this->db->where('keberangkatan', $keberangkatan);
		$result = $this->db->get('tiket_shuttle')->result_array();
		$users_arr = array();
		foreach ($result as $row) {
		    $tujuan = $row['tujuan'];
		    $users_arr[] = array("tujuan" => $tujuan);
		}
		return json_encode($users_arr);
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
