<?php
/*
* Blog
* Database Table : teams
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'teams';
	}

}