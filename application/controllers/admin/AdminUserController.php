<?php
/*
*register controller
*author : jhayr
*date : 08/07/2016
*/

class AdminUserController extends CI_Controller {
	
    public function __construct() {
            parent::__construct();
            $this->load->model('AdminUser');
            //$this->load->library('alert');
            $this->js =  array(
                'admin.users'
            );
    }

    /*
    * Register
    * @param
    * @return void
    */
    public function index() {
        $data = array(
            'content_title' => 'Admin Users Panel',
            'script' => $this->js,
            'pageTitle' => 'Admin Registration'
            );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/content/AdminUser/content');
        $this->load->view('admin/modals/register-admin-user');
        $this->load->view('admin/template/footer');
    }

        public function register_exec() {
            $validate = array(
                array(
                    'field' => 'admin_firstname',
                    'label' => 'Firstname',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'admin_lastname',
                    'label' => 'Lastname',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'admin_username',
                    'label' => 'Username',
                    'rules' => 'trim|required|is_unique[admin_users.admin_username]|min_length[5]'
                ),
                array(
                    'field' => 'admin_password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[8]'
                ),
                array(
                    'field' => 'admin_password_conf',
                    'label' => 'Confirm Password',
                    'rules' => 'trim|required|matches[admin_password]'
                ),
                array(
                    'field' => 'admin_email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email'
                )
            );
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() == false) {
                echo json_encode(array(
                    'error' => true,
                    'messages' => $this->form_validation->error_array()
                ));
            } else {
                echo json_encode(array('error' => false));
            }
        }
        
	public function register_execs() {
    
        
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $firstname = trim($this->input->post('admin_firstname'));
            $lastname = trim($this->input->post('admin_lastname'));
            $username = trim($this->input->post('admin_username'));
            $password = trim($this->input->post('admin_password'));
            $gender = $this->input->post('admin_gender');
            $new_user = array(
                'admin_firstname' => $firstname,
                'admin_lastname' => $lastname,
                'admin_username' => $username,
                'admin_password' => password_hash($password, PASSWORD_BCRYPT),
                'admin_gender' => $gender
            );
            $admin_user = $this->AdminUser->add($new_user);
            if (!$admin_user['registered']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot register account!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Admin register success!', 1));
            }
            redirect(base_url().'admin/admin-register');
            exit();
        }
    }
}

?>