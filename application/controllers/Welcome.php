<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->library('BootstrapAlert');
	}
	public function index()
	{
		$this->session->set_flashdata('success',$this->bootstrapalert->success('Success'));
		$this->session->set_flashdata('info',$this->bootstrapalert->info('Info'));
		$this->session->set_flashdata('warning',$this->bootstrapalert->warning('Warning'));
		$this->session->set_flashdata('danger',$this->bootstrapalert->danger('Danger'));
		
		$this->load->view('welcome_message');
	}
}
