<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	

	

	//Amount of all active attached products 
	public function getActiveProducts()
	{
		$this->db->select('id');
		$this->db->where(['status'=>1]);
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//Count of active products which don't belong to any user.
	public function getActiveProductsWithoutUser()
	{			
		$this->db->select('id');
		$this->db->where(['status'=>1]);
		$this->db->where('`id` NOT IN (SELECT `product_id` FROM `user_products`)', NULL, FALSE);
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//Amount of all active attached products
	//(if user1 has 3 prod1 and 2 prod2 which are active, user2 has 7 prod2 and 4 prod3, prod3 is inactive, then the amount of active attached products will be 3 + 2 + 7 = 12).
	public function getAttachedProducts()
	{
		$this->db->select('SUM(qty) as sum');
		$this->db->where('`product_id` IN (select id from products WHERE status =1)', NULL, FALSE);
		$query = $this->db->get('user_products');
		$res = $query->row();
		return  $res->sum;
	}
	//Summarized price of all active attached products
	public function getSummarizedPriceActiveAttachedProducts()
	{
		$this->db->select('SUM(qty*price) as total');
		$this->db->where('`product_id` IN (select id from products WHERE status =1)', NULL, FALSE);
		$query = $this->db->get('user_products');
		$res = $query->row();
		return  $res->total;
	}
	//Summarized prices of all active products per user.
	public function getSummarizedPriceActiveAttachedProductsPerUser()
	{
		$this->db->select('SUM(qty*price) as total, u.name');
		$this->db->where('`product_id` IN (select id from products WHERE status =1)', NULL, FALSE);

		$this->db->join('users as u', 'u.id = user_products.user_id', 'inner');
		$this->db->group_by('user_products.user_id');
		$query = $this->db->get('user_products');
		return $query->result_array();
	}
    
}


?>