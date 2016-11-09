<?php
/*
* Blog
* Database Table : admin_user_logs
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserLog extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->table = 'admin_user_logs';
	}

}