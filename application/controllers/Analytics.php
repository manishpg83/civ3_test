<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
        $this->load->database();
		$this->load->model('user_model');
		$this->load->model('product_model');
	}

	public function index()
	{
		$data = array();
		//Count of all active and verified users.
        $data['active_verified_users'] = $this->user_model->getActiveVefifiedUsers();

        //Count of active and verified users who have attached active products.
        $data['active_users_products'] = $this->user_model->getActiveUsersProducts();

        //Count of all active products
        $data['active_products'] = $this->product_model->getActiveProducts();

        //Count of active products which don't belong to any user.
		$data['active_products_without_user'] = $this->product_model->getActiveProductsWithoutUser();

		//Amount of all active attached products
		$data['all_attached_products'] = $this->product_model->getAttachedProducts();

		// Summarized price of all active attached products
		$data['summaried_price_attached_products'] = $this->product_model->getSummarizedPriceActiveAttachedProducts();	

		// Summarized prices of all active products per user.
		$data['summaried_price_attached_products_per_user'] = $this->product_model->getSummarizedPriceActiveAttachedProductsPerUser();

		$this->load->view('analytics',$data);
	}
}
