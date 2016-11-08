<?php
/*
* Blog
* Database Table : inquiries
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'inquiries';
	}

}