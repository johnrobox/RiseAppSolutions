<?php
/*
* Blog
* Database Table : portfolios
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'portfolios';
	}

}