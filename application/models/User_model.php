<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	//Count of all active and verified users.
	public function getActiveVefifiedUsers()
	{
		$this->db->select('id');
		$this->db->where(['status'=> 1,'is_verified'=>1]);
		$query = $this->db->get('users');
		return $query->num_rows();
	}

	//Count of active and verified users who have attached active products.
	public function getActiveUsersProducts(){
		
		$this->db->select('u.id');
		$this->db->from('users as u');
		$this->db->where(['u.status'=> 1,'u.is_verified'=>1]);
		$this->db->join('user_products as up', 'up.user_id = u.id', 'inner');
		$this->db->join('products as p', 'p.id = up.product_id', 'inner');
		$this->db->where('p.status', 1);
		$query = $this->db->get(); 
		return $query->num_rows();
	}
}


?>