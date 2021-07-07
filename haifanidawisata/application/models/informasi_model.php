<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {

	public function getBlogById($id)
	{
		return $this->db->get_where('blog', ['id' => $id])->row_array();
	}
	public function countAllBlog()
	{
		return $this->db->get('blog')->num_rows();
	}
	public function getAllBlog()
	{
		return $this->db->get('blog')->result_array();
	}
	public function getBlogByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('blog', $limit, $start)->result_array();
	}

	public function getNumBlogByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('blog', $limit, $start)->num_rows();
	}

	public function getBeritaById($id)
	{
		return $this->db->get_where('berita', ['id' => $id])->row_array();
	}
	public function countAllBerita()
	{
		return $this->db->get('berita')->num_rows();
	}
	public function getAllBerita()
	{
		return $this->db->get('berita')->result_array();
	}
	public function getBeritaByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('berita', $limit, $start)->result_array();
	}

	public function getNumBeritaByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('berita', $limit, $start)->num_rows();
	}

	public function getPengumumanById($id)
	{
		return $this->db->get_where('pengumuman', ['id' => $id])->row_array();
	}
	public function countAllPengumuman()
	{
		return $this->db->get('pengumuman')->num_rows();
	}
	public function getAllPengumuman()
	{
		return $this->db->get('pengumuman')->result_array();
	}
	public function getPengumumanByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('pengumuman', $limit, $start)->result_array();
	}
	
	public function getNumPengumumanByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('pengumuman', $limit, $start)->num_rows();
	}
	
	public function getPeraturanById($id)
	{
		return $this->db->get_where('peraturan', ['id' => $id])->row_array();
	}
	public function countAllPeraturan()
	{
		return $this->db->get('peraturan')->num_rows();
	}
	public function getAllPeraturan()
	{
		return $this->db->get('peraturan')->result_array();
	}
	public function getPeraturanByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('peraturan', $limit, $start)->result_array();
	}
	
	public function getNumPeraturanByLimit($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('penulis', $keyword);
		}
		$this->db->order_by('terakhir_diubah', 'DESC');
		return $this->db->get('peraturan', $limit, $start)->num_rows();
	}
	
	
}