<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getRoleById($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}
	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

}