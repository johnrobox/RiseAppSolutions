<?php
/*
 * Admin Faq controller
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFaqController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Faq");
        $this->load->library('bootstrapalert');
        $this->load->library('pluginlink');
        $this->js = array(
            'admin.faq'
        );
    }
    
    /***
     * index view 
     * @param 
     * @return void
     */
    public function index() {
        $data = array(
            'content_title' => 'FAQs',
            'script' => $this->js,
            'faqs' => $this->Faq->getAllItem(),
            'plugin' => $this->pluginlink->dataTable()
        );
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/content/faq/content');
        $this->load->view('admin/modals/faq/add-item');
        $this->load->view('admin/modals/faq/show-item');
        $this->load->view('admin/modals/faq/delete-item');
        $this->load->view('admin/modals/faq/update-item');
        $this->load->view('admin/template/footer');
    }
    
    /****
     * add faq item
     * @param 
     * @return json
     */
    public function addFaqItem() {
        $validate = array(
            array(
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'answer',
                'label' => 'Answer',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'messages' => $this->form_validation->error_array()
            );
        } else {
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            date_default_timezone_set("Asia/Manila");
            $created_date = date('Y-m-d h:i:s');
            $created_by = 2;
            $result = $this->Faq->addItem($question, $answer, $created_date, $created_by);
            $this->session->set_flashdata("success", $this->bootstrapalert->success("FAQ successfully added!"));
            $response['error'] = ($result) ? false : true;
        }
        echo json_encode($response);
        
    }
    
    /***
     * select faq by id
     * @param 
     * @return json
     */
    public function selectFaqById() {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Faq->selectFirstLastId("min");
        $next = $this->Faq->selectFirstLastId("max");
        if ($state == 0) {
            $result = $this->Faq->selectFaqById($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Faq->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Faq->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        } 
        echo json_encode($result);
    }
    
    /****
     * Delete faq
     * @param
     * @return json
     */
    public function deleteFaq() {
        $id = $this->input->post('id');
        $result = $this->Faq->deleteFaqById($id);
        echo json_encode($result);
    }
    
    /****
     * Chage Status
     * @param
     * @return json
     */
    public function changeStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $status = ($status) ? 0 : 1;
        $result = $this->Faq->changeStatusById($id, $status);
        echo json_encode($result);
    }
    
    /***
     * Update faq item
     * @param
     * @return json
     */
    public function updateFaqItem() {
        $validate = array(
            array(
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'answer',
                'label' => 'Answer',
                'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'messages' => $this->form_validation->error_array()
            );
        } else {
            $id = $this->input->post('id');
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            date_default_timezone_set("Asia/Manila");
            $data = array(
                'faq_question' => $question,
                'faq_answer' => $answer,
                'date_modified' => date('Y-m-d h:i:s'),
                'modified_by' => 2
            );
            $result = $this->Faq->updateById($id, $data);
            $this->session->set_flashdata("success", $this->bootstrapalert->success("FAQ successfully updated!"));
            $response['error'] = ($result) ? false : true;
        }
        echo json_encode($response);
    }
    
}

