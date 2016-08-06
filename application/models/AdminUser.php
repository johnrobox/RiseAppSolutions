<?php

/*
* Admin User Model
* Author : JhayR
* Date : August 7, 2016
*/

class AdminUser extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = 'admin_users';
	}

	/*
	* add
	* @param $data (array)
	* @return $response (array)
	*/
	public function add($data) {
        if ($this->db->insert($this->table, $data)) {
            $response = array (
                'registered' => true,
                'registered_id' => $this->db->insert_id()
            );
        } else {
            $response['registered'] = false;
        }
        return $response;
    }

}