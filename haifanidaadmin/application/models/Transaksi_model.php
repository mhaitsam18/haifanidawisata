<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
	public function getBebanById($id)
	{
		return $this->db->get_where('beban', ['id' => $id])->row_array();
	}

}