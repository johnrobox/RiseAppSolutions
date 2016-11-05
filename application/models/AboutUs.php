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

	    public function update_about_us($about_us_content, $about_us_id){
	    	$newData = array(
	    		'about_us_content' => $about_us_content,
	    		'date_modified' => time() 
	    	);
	    	$this->db->where('about_us_id', $about_us_id);
	    	$this->db->update('about_us', $newData);
	    	redirect(base_url().'admin/about-us');
	    }

	}