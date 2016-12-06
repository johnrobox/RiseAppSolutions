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

    public function getAllInquiries() {
        $inqieries = $this->db->get($this->table);
        return $inqieries->result();
    }
    
    public function deleteById($id) {
        $this->db->delete($this->table, array('id' => $id));
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }
    
    public function getInquiryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['inquiry'] = $query->result();
        return $result;
    }
    
    public function findPreviousNextById($id, $states, $operator) {
       // $states = "max";
        $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['inquiry'] = $query->result();
        return $result;
    }
    
    public function getFirstLastId($states){
        $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
        $row = $query->row();
        return $row->id;
    }
    
    public function changeStatusById($id, $status) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => $status));
        return ($this->db->affected_rows()) ? true : false;
    }
        
}