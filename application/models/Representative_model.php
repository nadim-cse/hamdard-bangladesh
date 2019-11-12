<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Representative_model extends CI_Model
{

    
    public function InsertRepresentativeData($RepresentativeData)
    {
        # code...
        $this->db->insert('table_representative',$RepresentativeData); 
        return true;

    }

    public function GetAllRepresentatives()
    {
        # code...
        $query = $this->db->query("SELECT table_representative.*, table_branch.* from table_representative JOIN table_branch ON table_branch.br_code=table_representative.re_branch");
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }

    }
    public function GetRepresentativeIDbyBranchID($BranchID){

        $query = $this->db->query("SELECT table_representative.* from table_representative JOIN table_branch ON table_representative.re_branch=table_branch.br_code WHERE table_representative.re_branch = '$BranchID'");
      
        $output = '<option value=""> ---- প্রতিনিধি বাছাই করুন ----</option>';
        foreach($query->result() as $row){
          
            $output .= '<option value="'.$row->re_code.'">'.$row->re_name.',কোডঃ- '.$row->re_code.'</option>';
        }
        return $output;

    }

    public function GetPharmacyByRepresentativeID($ReID){

        $query = $this->db->query("SELECT table_pharmacy.* from table_pharmacy JOIN table_representative ON table_representative.re_code=table_pharmacy.ph_under_representative WHERE table_representative.re_code = '$ReID'");
      
        $output = '<option> ---- প্রতিনিধি বাছাই করুন ----</option>';
        foreach($query->result() as $row){
          
            $output .= '<option value="'.$row->ph_code.'">'."ফার্মেসির নামঃ ".$row->ph_name.", কোডঃ- ".$row->ph_code." |  প্রোপ্রাইটরঃ  ".$row->ph_proprietor." |  ঠিকানাঃ  ".$row->ph_address.'</option>';
            
        }
        return $output;

    }
    public function CountPharmacyNumber(){

        $query = $this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.id=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_id");
        if($query->result()){
            return $query->num_rows();
        }
        else{

            return false;
        }
    }
    public function GetRepresentativeDatabyId($id){
        
        $query = $this->db->query("SELECT table_representative.*, table_branch.* from table_representative JOIN table_branch ON table_branch.br_id=table_representative.re_branch WHERE table_representative.id ='$id'");
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }
    
    public function MarkCompeletedTask($task_id)
    {
        # code...
        $field = array(
            'task_status' => '1',
            'completed_at'=>date('Y-m-d H:i:s')
            );
         $this->db->where('task_id', $task_id);
         $this->db->update('task', $field);
        if($this->db->affected_rows() > 0){
                return true;
         }else{
                return false;
         }

    }

    public function InsertLinkData($data){

        $this->db->insert('link',$data); 
        return true;
    }

    public function GetLinks($proposal_id,$student_id){

         # code...
         $query = $this->db->query("SELECT * FROM link WHERE proposal_id = '$proposal_id' and student_id = '$student_id' ORDER BY link_create_at ASC");
         if($query->result()){
             return $query->result();
         }
         else{
            return false;
         }  
    }

    public function GetLinksForTeacher($proposal_id){

         # code...
         $query = $this->db->query("SELECT * FROM link WHERE proposal_id = '$proposal_id' ORDER BY link_create_at ASC");
         if($query->result()){
             return $query->result();
         }
         else{
            return false;
         }  

    }

    public function InsertFileData($FileData){

        $this->db->insert('file',$FileData); 
        return true;
    }

    public function GetFiles($proposal_id,$student_id){

        # code...
        $query = $this->db->query("SELECT * FROM file WHERE proposal_id = '$proposal_id' and uploaded_by = '$student_id' ORDER BY create_at ASC");
        if($query->result()){
            return $query->result();
        }
        else{
           return false;
        }  
    }

    public function GetFilesForTeacher($proposal_id){

       # code...
       $query = $this->db->query("SELECT * FROM file WHERE proposal_id = '$proposal_id' ORDER BY create_at ASC");
       if($query->result()){
           return $query->result();
       }
       else{
          return false;
       }  
    }
    function insert($data)
     {
        $this->db->insert_batch('table_representative', $data);
     }

  
   
     
}
