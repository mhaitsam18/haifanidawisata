<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function selectJoinUserRole()
	{
		$this->db->select('*, user_role.id AS rid, user.id AS uid');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		return  $this->db->get()->result_array();
	}

	public function update($id, $input)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $input);
	}
	
}