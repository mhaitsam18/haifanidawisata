<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {
	public function getPengumumanById($id)
	{
		return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
	}
	public function getBeritaById($id)
	{
		return $this->db->get_where('berita', ['id' => $id])->row_array();
	}
	public function getStrukturById($id)
	{
		return $this->db->get_where('struktur', ['id' => $id])->row_array();
	}
	public function getPeraturanById($id)
	{
		return $this->db->get_where('peraturan', ['id' => $id])->row_array();
	}
	

}