<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen_model extends CI_Model {
	
	public function getAgenById($id)
	{
		return $this->db->get_where('agen', ['id' => $id])->row_array();
	}
	

}