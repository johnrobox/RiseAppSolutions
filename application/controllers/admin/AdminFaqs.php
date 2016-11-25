<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminFaqs extends CI_Controller {

		public function __construct() {
	        parent::__construct();
			$this->load->model('Faq');
	    }


	    public function faqs_content(){
	    	$this->load->view('admin/template/header');
	    	$this->load->view('admin/template/sidebar');
	    		// $data['get_all_about_us'] = $this->AboutUs->get_all_about_us();
	    	$this->load->view('admin/content/Faqs/faqs_content');
	    	$this->load->view('admin/template/footer');
	    }
 
	    

	}