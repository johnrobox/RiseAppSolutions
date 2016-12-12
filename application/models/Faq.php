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
    
    public function getAllItem() {
        $faqs = $this->db->get($this->table);
        return $faqs->result();
    }
    
    public function addItem($question, $answer, $created_date, $created_by) {
        $data = array(
            'faq_question' => $question,
            'faq_answer' => $answer,
            'date_created' => $created_date,
            'created_by' => $created_by
        );
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }
    
    public function selectFaqById($id) {
        $data = array(
            'faqs.id', 
            'faqs.faq_question',
            'faqs.faq_answer',
            'faqs.date_created',
            'faqs.date_modified',
            'faqs.modified_by',
            'faqs.status',
            'admin_users.admin_firstname as created_by_firstname',
            'admin_users.admin_lastname as created_by_lastname'
        );
        $this->db->select($data);
        $this->db->where('faqs.id', $id);
        $this->db->from($this->table);
        $this->db->join('admin_users', 'admin_users.id = faqs.created_by', 'left');
        $query = $this->db->get();
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['faq'] = $query->result();
        return $result;
    }
    
    public function findPreviousNextById($id, $states, $operator) {
       // $states = "max";
        $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['faq'] = $query->result();
        return $result;
    }
    
    public function selectFirstLastId($states){
        $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
        $row = $query->row();
        return $row->id;
    }

}