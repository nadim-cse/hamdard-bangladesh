<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacy_model extends CI_Model
{

    public function InsertPharmacyData($PharmacyData)
    {
        # code...
        $this->db->insert('table_pharmacy',$PharmacyData); 
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
    public function GetAllPharmacy(){

        # code...
        $this->db->cache_on();
        $query=$this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.re_code=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_code");
        //$this->db->cache_off();
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 

    }
 

    public function CountPharmacyNumber(){

        $query=$this->db->query("SELECT * FROM table_pharmacy");
        
        if($query->result()){
            return $query->num_rows();
        }
        else{

            return false;
        } 
    }

    public function PharmacyListViewByRepresentative($RepresentativeID){

        $query=$this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.id=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_code WHERE table_representative.id='$RepresentativeID'");
      

        $output = '';
        
        foreach($query->result() as $row){
            $output .= '<tr>';
            $output .= '<td>'.$row->ph_id.'</td>';
            $output .= '<td>'.$row->ph_name.'</td>';
            $output .= '<td>'.$row->ph_address.'</td>';
            $output .= '<td>'.$row->ph_phone.'</td>';
            $output .= '<td>'.$row->ph_create_at.'</td>';
            $output .= '<td>'.$row->ph_update_at.'</td>';
            $output .= '</tr>';
        }
       
        return $output;

       
       
    }
    public function GetPharmacyRepresentativeID($RepresentativeID){

        $query=$this->db->query("SELECT * FROM table_pharmacy WHERE ph_under_representative='$RepresentativeID'");
         
        $output = '';
        $output .= '<option> ---- ফার্মেসি বাছাই করুন ----</option>';
        foreach($query->result() as $row){
          
            $output .= '<option value="'.$row->ph_id.'" >ফার্মেসির নামঃ- '.$row->ph_name.', &nbsp; প্রোপাইটারঃ- '.$row->ph_proprietor.', &nbsp; ঠিকানাঃ- '.$row->ph_address.'</option>\n';
           
           
        }
        return $output;
       
      

       
       
    }

    public function GetPharmacyDatabyId($ph_id)
    {
        # code...
        $query=$this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.id=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_id WHERE table_pharmacy.ph_id='$ph_id'");
            
            if($query->result()){
                return $query->result();
            }
            else{
    
                return false;
            } 

    }

    public function GetAllPharmacyByRe($RepresentativeID,$BranchID)
    {
        # code...
        $query=$this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.re_code=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_code WHERE table_pharmacy.ph_under_representative = '$RepresentativeID' AND table_pharmacy.ph_under_branch = '$BranchID' ");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }
    function insert($data)
        {
        $this->db->insert_batch('table_pharmacy', $data);
        }
    
}