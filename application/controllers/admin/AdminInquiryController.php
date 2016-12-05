<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminInquiryController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Inquiry');
        $this->load->library('bootstrapalert');
        $this->js = array(
            'admin.inquiry'
        );
    }
    
    public function index() {
        
        $data = array(
            'content_title' => 'Inquiries',
            'inquiries' => $this->Inquiry->getAllInquiries(),
            'script' => $this->js
        );
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/content/Inquiry/content');
        $this->load->view('admin/modals/delete-inquiry');
        $this->load->view('admin/modals/show-inquiry');
        $this->load->view('admin/template/footer');
    }
    
    public function deleteInquiry() {
        // sanitize inquiry id
        $id = $this->input->post('id');
        $result = $this->Inquiry->deleteById($id);
        if ($result) {
            $states = 'success';
            $alert = $this->bootstrapalert->success('Deleted successfully!');
        } else {
            $states = 'error';
            $alert = $this->bootstrapalert->danger('Faild to delete item, please try again!');
        }
        $this->session->set_flashdata($states, $alert);
    }
    
    public function showInquiry(){
        // sanitize inquiry id
        $id = $this->input->post('id');
        $result = $this->Inquiry->getInquiryById($id);
        echo json_encode($result);
    }
    
    
}