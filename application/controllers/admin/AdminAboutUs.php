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
                array(
                	'field' =>  'about_us_content',
	                'label' =>  'Content',
	                'rules' =>  'required|trim'
                	)
	    	);
            $this->form_validation->set_rules($newData);
            if($this->form_validation->run()==FALSE){

                    $this->session->set_flashdata('error_updating_about_us_alert-message',
                        '<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>Controller error on updating about us.
                        </div>
                        ');    
                redirect(base_url().'admin/about-us');

            }else{
                $id = $this->input->post('about_us_id'); 
                $content = $this->input->post('about_us_content'); 
                $this->AboutUs->update_about_us($id, $content);
            }
	    }

	}