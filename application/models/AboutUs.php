<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AboutUs extends CI_Model {

		public function __construct() {
	        parent::__construct(); 	    
	    }
	    
	    public function get_all_about_us(){
            $this->db->select('*');
            $this->db->from('about_us');
            $get_all_about_us = $this->db->get();
            return $get_all_about_us->result(); 
	    }

	    public function update_about_us($id, $content ){
	    	$newData = array(
	    		'about_us_content' => $content,
	    		'date_modified' => time() //to be change to Datetime 
	    	);
	    	$this->db->where('id', $id);
	    	$this->db->update('about_us', $newData);

                if($this->db->affected_rows()>0){
                    $this->session->set_flashdata('updated_about_us_alert-message',
                        '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>Updated successfully.
                        </div>
                        ');    
	    				redirect(base_url().'admin/about-us');
               	}else{
                    $this->session->set_flashdata('error_updating_about_us_alert-message',
                        '<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>Error Updating about us.
                        </div>
                        ');    
	    				redirect(base_url().'admin/about-us');
               	}
	    }

	}