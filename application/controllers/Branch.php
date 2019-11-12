<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Branch extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	        $this->load->model('Branch_model');
	
		    
	}
	public function BranchEntryView()
	{
		$data['TemplateTitle'] = "Hamdard Waqf || Admin Panel";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ব্রাঞ্চ";
		$data['PageTitle'] = "নতুন ব্রাঞ্চ যোগ করুন";
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/branch-entry',$data);
		$this->load->view('includes/footer');
		
    }
    public function StoreBranchData(){

        // Check if the table_representative is empty
         $branch_name = preg_replace('/\s+/', '', $this->input->post('branch_name'));
         $branch_code =  $this->input->post('branch_code');
         
         $NameCheckingQuery = $this->db->query("SELECT branch_name FROM table_branch WHERE branch_name ='$branch_name'");
         $NameCheckingResult = $NameCheckingQuery->result();
        

         if($NameCheckingResult != true){
            $BranchData = array(

                'branch_name' => $branch_name,
                'br_code' => $branch_code,
                'branch_create_at' => date('Y-m-d H:i:s'),
                
            );
            //echo "<pre>"; print_r($BranchData); exit;
           $insertResult = $this->Branch_model->InsertBranchData($BranchData);
           if($insertResult){
               echo "1";
           }

         }else{

            $this->form_validation->set_rules('branch_name','Branch Name','is_unique[table_branch.branch_name]');
             if($this->form_validation->run() == FALSE){
            	echo "0";
             }else{
                $BranchData = array(
                    
                    'branch_name' => $branch_name,
                    'branch_create_at' => date('Y-m-d H:i:s'),
                                    
                );
                //echo "<pre>"; print_r($BranchData); exit;
                $insertResult = $this->Branch_model->InsertBranchData($BranchData);
                if($insertResult){
                    echo "1";
                }
             }

         }
       
        
    }

    
    public function BranchListView()
	{
		$data['TemplateTitle'] = "Hamdard Waqf || Branch List";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ব্রাঞ্চ";
		$data['PageTitle'] = "সকল ব্রাঞ্চের তালিকা";
		$data['Branches'] = $this->Branch_model->GetAllBranches();
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/branch-list',$data);
		$this->load->view('includes/footer');
		
    }

    public function DeleteBranch($br_id)
	{
			

			$delete = $this->db->delete('table_branch', array('br_id' => $br_id));
			if($delete){

				$this->session->set_flashdata('deleteSuccess','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>ব্রাঞ্চটি সফলভাবে ডিলিট হয়েছে </h4> </div>');
				redirect($_SERVER['HTTP_REFERER']);
			
	
		
    }
  }

  public function GetBranchDatabyId()
  {
      # code...
      $br_id = $this->input->get('br_id');
      $data = $this->Branch_model->GetBranchDatabyId($br_id);
      echo json_encode($data);

  }

  public function UpdateBranchData()
  {
      # code...
      $branch_names = $this->input->post('branch_name');
      $branch_name =  preg_replace('/\s+/', '', $branch_names);
      $br_id = $this->input->post('br_id');

      $PharmacyData = array(

        'branch_name' => $branch_name,
    
     );
    // var_dump($PharmacyData); exit;
    

     $this->db->where('br_id', $br_id);
     $this->db->update('table_branch', $PharmacyData);
     if($this->db->affected_rows() > 0){
            return true;
     }else{
            return false;
     }
  }
}
