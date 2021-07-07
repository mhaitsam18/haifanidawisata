<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	function acak($panjang){
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}

	public function insert_pemesanan_tiket($no_hp, $email,$jumlah){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
			$this->insert_pemesanan_tiket();
		}
    }

    public function insert_detail_pemesanan_tiket($book_id, $keberangkatan, $tujuan, $jadwal, $kursi, $nama){
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

}