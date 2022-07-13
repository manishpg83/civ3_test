<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchangerate extends CI_Controller {

	public function index()
	{
		/* Load form helper */ 
         $this->load->helper(array('form'));
			
         /* Load form validation library */ 
         $this->load->library('form_validation');
         /* Set validation rule for name field in the form */ 
         $this->form_validation->set_rules('price', 'Price', 'required|numeric');
         $this->form_validation->set_rules('to_currency', 'To Currenncy', 'required');  
			
         if ($this->form_validation->run() == FALSE) { 
        	 $this->load->view('myform'); 
         } 
         else { 
         	$price =  $this->input->post('price', true);
         	$to_currency =  $this->input->post('to_currency', true);

         	if(!empty($price) && !empty($to_currency)){
	            $curl = curl_init();
	            curl_setopt_array($curl, array(
	                CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=$to_currency&from=EUR&amount=$price",
	                CURLOPT_HTTPHEADER => array(
	                    "Content-Type: text/plain",
	                    "apikey: XIYifA2ffe5vaBGM2sPVN1NUrhwN1BvL"
	                ),
	                CURLOPT_RETURNTRANSFER => true,
	                CURLOPT_ENCODING => "",
	                CURLOPT_MAXREDIRS => 10,
	                CURLOPT_TIMEOUT => 0,
	                CURLOPT_FOLLOWLOCATION => true,
	                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	                CURLOPT_CUSTOMREQUEST => "GET"
	                ));

	                $response = curl_exec($curl);
	                curl_close($curl);
	            $data['currency_data'] = json_decode($response);
	            $this->load->view('formsuccess',$data);
	        }else{
	            $this->load->view('myform');
	        }
         } 
	}
}
