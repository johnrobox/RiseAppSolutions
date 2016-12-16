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
    
    /**
     * get all faq item
     * @return object
     */
    public function getAllItem() {
        $faqs = $this->db->get($this->table);
        $result  = $faqs->result();
        return $result;
    }
    
    /**
     * add faq item
     * @param String $question
     * @param String $answer
     * @param String $created_date
     * @param String $created_by
     * @return boolean
     */
    public function addItem($question, $answer, $created_date, $created_by) {
        $data = array(
            'faq_question' => $question,
            'faq_answer' => $answer,
            'date_created' => $created_date,
            'created_by' => $created_by
        );
        $this->db->insert($this->table, $data);
        $result = ($this->db->affected_rows() > 0 ) ? true : false;
        return $result;
    }
    
    /**
     * select faq by id
     * @param int $id
     * @return array
     */
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
    
   /**
    * find previous/next by id
    * @param int $id
    * @param String $states
    * @param String $operator
    * @return array 
    */
    public function findPreviousNextById($id, $states, $operator) {
       // $states = "max";
        $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['faq'] = $query->result();
        return $result;
    }
    
    /**
     * select first/last id
     * @param String $states
     * @return int
     */
    public function selectFirstLastId($states){
        $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
        $row = $query->row();
        return $row->id;
    }
    
    /**
     * delete faq by id
     * @param int $id
     * @return boolean
     */
    public function deleteFaqById($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }
    
    /**
     * change faq status by id
     * @param int $id
     * @param int $status
     * @return boolean
     */
    public function changeStatusById($id, $status) {
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => $status));
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }
    
    /**
     * update by id
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function updateById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }

}