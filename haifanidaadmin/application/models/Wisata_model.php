<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {

	public function getPaketWisataById($id)
	{
		return $this->db->get_where('paket_wisata', ['id' => $id])->row_array();
	}
	public function countAllPaketWisata()
	{
		return $this->db->get('paket_wisata')->num_rows();
	}
	public function getAllPaketWisata()
	{
		return $this->db->get_where('paket_wisata', ['aktif' => 1])->result_array();
	}
	public function getPaketWisataByLimit($limit, $start, $keyword = null, $kategori = null)
	{

		$this->db->select('*, paket_wisata.id AS pid');
		$this->db->join('maskapai', 'paket_wisata.id_maskapai=maskapai.id');
		$this->db->join('kategori_wisata', 'paket_wisata.id_kategori_wisata=kategori_wisata.id');
		$this->db->where('aktif', 1);
		$this->db->where('tanggal_keberangkatan >', date('Y-m-d'));
		$this->db->where_in('id_kategori_wisata', [1,2]);
		if ($keyword) {
			$this->db->like('nama_paket', $keyword);
		}
		if ($kategori) {
			$this->db->like('id_kategori_wisata', $kategori);
		}
		$this->db->order_by('paket_wisata.id', 'ASC');
		return $this->db->get('paket_wisata', $limit, $start)->result_array();
	}

	public function getFasilitasById($id)
	{
		return $this->db->get_where('fasilitas', ['id' => $id])->row_array();
	}
	


}