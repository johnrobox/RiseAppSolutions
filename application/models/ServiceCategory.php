<?php
/*
* Blog
* Database Table : service_categories
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceCategory extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'service_categories';
	}

}