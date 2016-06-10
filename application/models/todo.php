<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Model {
 
    private $todo_id;
    private $title;
    private $description;
    private $start;
    private $end;
    private $category;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function getTodos(){
        $query = $this->db->get('todos');
        
        echo json_encode($query->result());
    }
    
//    function searchCompanies(){
//        $query = $this->db->get('pms_company');
//        
//        $query = $this->db->like('name', $this->input->post('search'))->get('pms_company');
//        
//        echo json_encode($query->result());
//    }
//    
//    function getCompany(){
//        $id = $this->input->post('id');
//        
//        $query = $this->db->get_where('pms_company', array('id' => $id), 1, 0);
//        
//        $result = $query->result()[0];
//        
//        $result->category = $this->Category->getCategory($result->category);
//        
//        $result->contactDetails = $this->ContactDetail->getContactDetails($id);
//        
//        echo json_encode($result);
//    }
//    
//    function addCompany(){
//        $name = $this->input->post('name');
//        $prodCatid = $this->input->post('prodCatId');
//        $street = $this->input->post('street');
//        $city = $this->input->post('city');
//        $province = $this->input->post('province');
//        $companyInfos = json_decode($this->input->post('companyInfos'));
//        
//        $array = array(
//           'category' =>  $prodCatid,
//           'name' =>  $name,
//           'city' =>  $city,
//           'street' => $street,
//           'province' => $province
//        );
//        $this->db->trans_start();
//        $this->db->insert('pms_company', $array);
//        $companyId = $this->db->insert_id();
//        foreach($companyInfos as $companyInfo){
//            $companyInfo->company = $companyId;
//        }
//        $this->db->insert_batch('pms_contact_detail', $companyInfos);
//        if($this->db->affected_rows() > 1){
//            echo true;
//        }else{
//            echo false;
//        }
//        $this->db->trans_complete();
//    }
    
}