<?php

/**
 * Admin Inquiry Controller
 */

class AdminInquiryController extends CI_Controller {
    
    // construct
    public function __construct() {
        parent::__construct();
        $this->load->model('Inquiry');
        $this->load->library('bootstrapalert');
        $this->load->library('pluginlink');
        $this->js = array(
            'admin.inquiry'
        );
    }
    
    /**
     * index view of inquiry
     * @param 
     * @return void
     */
    public function index() {
        
        // consturct data in array to view
        $data = array(
            'content_title' => 'Inquiries',
            'inquiries' => $this->Inquiry->getAllInquiries(),
            'script' => $this->js,
            'plugin' => $this->pluginlink->dataTable()
        );
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/content/inquiry/content');
        $this->load->view('admin/modals/inquiry/delete-inquiry');
        $this->load->view('admin/modals/inquiry/show-inquiry');
        $this->load->view('admin/modals/inquiry/reply-inquiry');
        $this->load->view('admin/template/footer');
    }
    
    /**
     * Delete inquiry
     * @param 
     * @return void 
     */
    public function deleteInquiry() {
        // sanitize inquiry id
        $id = $this->input->post('id');
        $this->Inquiry->deleteById($id);
    }
    
    /**
     * Show single inquiry
     * @param 
     * @return json 
     */
    public function showInquiry() {
        
        // sanitize inquiry id
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        
        // get minimum id
        $previous = $this->Inquiry->getFirstLastId("min");
        // get maximum id
        $next = $this->Inquiry->getFirstLastId("max");
        
        switch ($state) {
            case 0:
                $result = $this->Inquiry->getInquiryById($id);
                $result['previous'] = $previous;
                $result['next'] = $next;
                break;
            case 1:
                $result = $this->Inquiry->findPreviousNextById($id, "max", "<");
                $result['previous'] = $previous;
                break;
            case 2:
                $result = $this->Inquiry->findPreviousNextById($id, "min", ">");
                $result['next'] = $next;
                break;
            default :
                break;
        } 
        echo json_encode($result);
    }
    
    /**
     * Change inquiry status
     * @param
     * @return json
     */
    public function changeStatus() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $status = ($status) ? 0 : 1;
        $result = $this->Inquiry->changeStatusById($id, $status);
        echo json_encode($result);
    }   
    
    /**
     * reply inquiry 
     * @param
     * @return json 
     */
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