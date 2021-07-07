<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shuttle_model extends CI_Model {

	public function getTiketShuttleById($id)
	{
		return $this->db->get_where('tiket_shuttle', ['id' => $id])->row_array();
	}
	
}