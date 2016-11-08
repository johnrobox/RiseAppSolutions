<?php
/*
* Blog
* Database Table : blogs
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'blogs';
	}

}