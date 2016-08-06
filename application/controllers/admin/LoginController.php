<?php
/*
* login controller
* author : jhayr
* date : 08/07/2016
*/


class LoginController extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
    }

    public function login() {
    	$data = array(
    		'pageTitle' => 'Admin Login'
    		);

    	$this->load->view('admin/content/login', $data);
    }

    public function login_exec() {

    	if (!$this->input->post()) {
            redirect(base_url().'admin');
            exit();
        } else {
            $validate_login = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|trim'
                )
            );
            $this->form_validation->set_rules($validate_login);
            if ($this->form_validation->run() == false) {
            	$this->login();
            } else {
            	$username = $this->input->post('username');
            	$password = $this->input->post('password');
            	
            }
    }
}

}
