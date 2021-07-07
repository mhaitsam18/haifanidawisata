<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jamaah_model extends CI_Model {

	public function getJamaahById($id)
	{
		return $this->db->get_where('jamaah', ['id' => $id])->row_array();
	}
	public function countAllJamaah()
	{
		return $this->db->get('jamaah')->num_rows();
	}
	public function getAllJamaah()
	{
		return $this->db->get('jamaah')->result_array();
	}
}