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
        $query = $this->db->query("SELECT inquiry_firstname, "
                . "inquiry_lastname, "
                . "inquiry_email, "
                . "inquiry_content, "
                . "inquiry_date_submitted FROM "
                .$this->table." WHERE id=".$id);
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['inquiry'] = $query->result();
        return $result;
    }
        
}