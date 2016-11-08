<?php
/*
* Blog
* Database Table : faqs
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'faqs';
	}

}