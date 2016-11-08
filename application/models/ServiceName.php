<?php
/*
* Blog
* Database Table : service_names
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceName extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'service_names';
	}

}