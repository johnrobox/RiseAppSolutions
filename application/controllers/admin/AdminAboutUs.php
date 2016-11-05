<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminAboutUs extends CI_Controller {

		public function __construct() {
	        parent::__construct();
			$this->load->model('AboutUs');
	    }


	    public function about_us(){
	    	$this->load->view('admin/template/header');
	    	$this->load->view('admin/template/sidebar');
	    		$data['get_all_about_us'] = $this->AboutUs->get_all_about_us();
	    	$this->load->view('admin/content/AboutUs/content',$data);
	    	$this->load->view('admin/template/footer');
	    }

	    public function update_about_us(){ 
	    	$newData = array(
                'field' =>  'about_us_content',
                'label' =>  'Content',
                'rules' =>  'trequired'
	    	);
            $this->form_validation->set_rules($newData);
            if($this->form_validation->run()==FALSE){
                $this->update_about_us();
            }else{
                $about_us_id = $this->input->post('about_us_id'); 
                $about_us_content = $this->input->post('about_us_content'); 
                $this->AboutUs->update_about_us($about_us_content, $about_us_id);
            }
	    }

	}