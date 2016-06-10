<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactType extends CI_Model {
 
    private $id;
    private $name;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function getCategory($id){
        $query = $this->db->get_where('categories', array('category_id' => $id), 1, 0);
        return $query->result()[0];
    }
    
    function getContactTypes(){
        $query = $this->db->get('categories');
        echo json_encode($query->result());
    }
    
}