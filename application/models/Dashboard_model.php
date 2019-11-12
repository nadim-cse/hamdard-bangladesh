<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{


  
    public function TotalPharmacyNumber()
    {
        # code...
        //$this->db->cache_on();
        $query=$this->db->query("SELECT COUNT(ph_id) AS Totalpharmacy FROM table_pharmacy");
            
            if($query->result()){
                return $query->result();
            }
            else{
    
                return false;
            } 

    }
    
    public function TotalProductNumber()
    {
        # code...
       // $this->db->cache_on();
        $query=$this->db->query("SELECT * FROM table_product");
            
            if($query->result()){
                return $query->num_rows();
            }
            else{
    
                return false;
            } 

    }

    public function TotalBranchNumber()
    {
        # code...
        //$this->db->cache_on();
        $query=$this->db->query("SELECT * FROM table_branch");
            
            if($query->result()){
                return $query->num_rows();
            }
            else{
    
                return false;
            } 

    }

    public function TotalReNumber()
    {
        # code...
       // $this->db->cache_on();
        $query=$this->db->query("SELECT * FROM table_representative");
            
            if($query->result()){
                return $query->num_rows();
            }
            else{
    
                return false;
            } 

    }
    
}