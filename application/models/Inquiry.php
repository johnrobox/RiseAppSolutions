<?php
/*
* Inquiry
* Database Table : inquiries
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Model {

    // construct properties
    public function __construct() {
        parent::__construct();
        $this->table = 'inquiries';
    }

    /**
     * Get all inquiries list
     * @return object $result
     */
    public function getAllInquiries() {
        $inqieries = $this->db->get($this->table);
        $result = $inqieries->result();
        return $result;
    }
    
    /**
     * Delete inquiry by id
     * @param int $id
     * @return boolean $result 
     */
    public function deleteById($id) {
        $this->db->delete($this->table, array('id' => $id));
        $result = ($this->db->affected_rows() > 0 ) ? true : false;
        return $result;
    }
    
    /**
     * Get inquiry by id
     * @param int $id
     * @return array $result
     */
    public function getInquiryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['inquiry'] = $query->result();
        return $result;
    }
    
    /**
     * Find Previous and Next by Id
     * @param int $id
     * @param string $states
     * @param string $operator
     * @return array $result
     */
    public function findPreviousNextById($id, $states, $operator) {
        $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['inquiry'] = $query->result();
        return $result;
    }
    
    /**
     * Get First / Last id
     * @param string $states
     * @return int $id
     */
    public function getFirstLastId($states){
        $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
        $row = $query->row();
        $id = $row->id;
        return $id;
    }
    
    /**
     * Change Status by id
     * @param int $id
     * @param int $status
     * @return boolean $result
     */
    public function changeStatusById($id, $status) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => $status));
        $result = ($this->db->affected_rows()) ? true : false;
        return $result;
    }
        
}