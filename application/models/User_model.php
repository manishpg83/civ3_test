<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getActiveVefifiedUsers()
	{
		$this->db->select('id');
		$this->db->where(['status'=>'Active','is_verified'=>1]);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
}


?>