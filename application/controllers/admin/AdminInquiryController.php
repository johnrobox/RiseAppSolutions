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
        $this->load->view('admin/modals/reply-inquiry');
        $this->load->view('admin/template/footer');
    }
    
    public function deleteInquiry() {
        // sanitize inquiry id
        $id = $this->input->post('id');
        $this->Inquiry->deleteById($id);
    }
    
    public function showInquiry() {
        // sanitize inquiry id
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Inquiry->getFirstLastId("min");
        $next = $this->Inquiry->getFirstLastId("max");
        if ($state == 0) {
            $result = $this->Inquiry->getInquiryById($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Inquiry->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Inquiry->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        } 
        echo json_encode($result);
    }
    
    public function changeStatus() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status) ? 0 : 1;
        $result = $this->Inquiry->changeStatusById($id, $status);
        echo json_encode($result);
    }   
    
    public function replyInquiry() {
        
        $validate = array(
            array(
                'field' => 'email_from',
                'label' => 'Email (from)',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email_to',
                'label' => 'Email (to)',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email_subject',
                'label' => 'Subject',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email_message',
                'label' => 'Message',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
                'error' => true,
                'messages' => $this->form_validation->error_array()
            ));
            
        } else {
            
            // code to send email goese here
            echo json_encode(array('error' => false));
            
        }
        
    }
    
}