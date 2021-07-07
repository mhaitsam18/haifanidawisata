<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_model extends CI_Model {

	public function getAgamaById($id)
	{
		return $this->db->get_where('agama', ['id' => $id])->row_array();
	}
	public function getKontenById($id)
	{
		return $this->db->get_where('content', ['id' => $id])->row_array();
	}
	public function getkurirById($id)
	{
		return $this->db->get_where('kurir', ['id' => $id])->row_array();
	}
	public function getKategoriById($id)
	{
		return $this->db->get_where('kategori', ['id' => $id])->row_array();
	}
	public function getKategoriWisataById($id)
	{
		return $this->db->get_where('kategori_wisata', ['id' => $id])->row_array();
	}
	public function getMetodeBayarById($id)
	{
		return $this->db->get_where('metode_bayar', ['id' => $id])->row_array();
	}
	public function getRekeningById($id)
	{
		return $this->db->get_where('rekening', ['id' => $id])->row_array();
	}
	public function getMaskapaiById($id)
	{
		return $this->db->get_where('maskapai', ['id' => $id])->row_array();
	}
	public function getKelengkapanById($id)
	{
		return $this->db->get_where('kelengkapan', ['id' => $id])->row_array();
	}
	public function getDestinasiById($id)
	{
		return $this->db->get_where('destinasi', ['id' => $id])->row_array();
	}
	public function getPertanyaan1ById($id)
	{
		return $this->db->get_where('pertanyaan_1', ['id' => $id])->row_array();
	}
	public function getPertanyaan2ById($id)
	{
		return $this->db->get_where('pertanyaan_2', ['id' => $id])->row_array();
	}
	public function getKantorById($id)
	{
		return $this->db->get_where('kantor', ['id' => $id])->row_array();
	}
	
}