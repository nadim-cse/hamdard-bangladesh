<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Branch_model extends CI_Model
{


    public function InsertBranchData($BranchData)
    {
        # code...
        $this->db->insert('table_branch',$BranchData); 
        return true;

    }
    public function GetAllBranches()
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_branch");
            
            if($query->result()){
                return $query->result();
            }
            else{
    
                return false;
            } 

    }
  

    public function GetBranchDatabyId($br_id)
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_branch WHERE br_id = '$br_id'");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }
    
}