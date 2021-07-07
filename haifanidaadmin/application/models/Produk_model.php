<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
	
	public function getProdukById($id)
	{
		return $this->db->get_where('produk', ['id' => $id])->row_array();
	}
	public function countAllProduk()
	{
		return $this->db->get('produk')->num_rows();
	}
	public function getAllProduk()
	{
		return $this->db->get_where('produk', ['aktif' => 1])->result_array();
	}
	public function getProdukByLimit($limit, $start, $keyword = null, $kategori = null)
	{
		if ($keyword) {
			$this->db->like('nama_produk', $keyword);
		}
		if ($kategori) {
			$this->db->like('id_kategori', $kategori);
		}
		$this->db->order_by('id', 'ASC');
		return $this->db->get('produk', $limit, $start)->result_array();
	}
	
}