<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Representative extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	        $this->load->model('Representative_model');
            $this->load->model('Branch_model');
            $this->load->library('excel');
           
	
		    
	}
	public function RepresentativeEntryView()
	{
		$data['TemplateTitle'] = "প্রতিনিধির এন্ট্রি । Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "প্রতিনিধি";
        $data['PageTitle'] = "নতুন প্রতিনিধি যোগ করুন";
        $data['Branches'] = $this->Branch_model->GetAllBranches();
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/representative-entry',$data);
		$this->load->view('includes/footer');
		
    }
    public function StoreRepresentativeData(){

        // Check if the table_representative is empty
         $representative_name = $this->input->post('re_name');
         $representative_address = $this->input->post('re_address');
         $representative_phone = $this->input->post('re_phone');
         $representative_branch = $this->input->post('re_branch');
         $representative_code = $this->input->post('re_code');

         $NameCheckingQuery = $this->db->query("SELECT re_phone FROM table_representative WHERE re_phone ='$representative_phone'");
         $NameCheckingResult = $NameCheckingQuery->result();
   

         if($NameCheckingResult != true){
            $RepresentativeData = array(

                're_name' => $representative_name,
                're_address' => $representative_address,
                're_phone' => "+880".$representative_phone,
                're_branch' => $representative_branch,
                're_create_at' => date('Y-m-d H:i:s'),
                're_code' =>  $representative_code
                
            );
            //echo "<pre>"; print_r($RepresentativeData); exit;
           $insertResult = $this->Representative_model->InsertRepresentativeData($RepresentativeData);
           if($insertResult){
               echo "1";
           }

         }else{

            $this->form_validation->set_rules('re_phone','Representative Phone','is_unique[table_representative.re_phone]');
            $this->form_validation->set_rules('re_code','Representative Code','is_unique[table_representative.re_code]');
             if($this->form_validation->run() == FALSE){
            	echo "0";
             }else{
                $RepresentativeData = array(
            
                    're_name' => $representative_name,
                    're_address' => $representative_address,
                    're_phone' => "+880".$representative_phone,
                    're_branch' => $representative_branch,
                    're_create_at' => date('Y-m-d H:i:s'),
                    're_code' =>  $representative_code
                );
              // "<pre>"; print_r($RepresentativeData); exit;
               $insertResult = $this->Representative_model->InsertRepresentativeData($RepresentativeData);
               if($insertResult){
                echo "1";
            }
             }

         }
       
        
    }

    public function RepresentativeListView()
	{
		$data['TemplateTitle'] = "প্রতিনিধির তালিকা । Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "প্রতিনিধি";
        $data['PageTitle'] = "সকল প্রতিনিধির তালিকা";
        $data['Representatives'] = $this->Representative_model->GetAllRepresentatives();
        $data['PharmacyUnderRepresentatives'] = $this->Representative_model->CountPharmacyNumber();
        $data['BranchList'] = $this->Branch_model->GetAllBranches();
       // echo"<pre>"; var_dump($data['PharmacyUnderRepresentatives']); exit;
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/representative-list',$data);
		$this->load->view('includes/footer');
		
    }

    public function PrintRe(Type $var = null)
    {
        # code...
       
        $data['Representatives'] = $this->Representative_model->GetAllRepresentatives();
        $data['PharmacyUnderRepresentatives'] = $this->Representative_model->CountPharmacyNumber();
        $data['BranchList'] = $this->Branch_model->GetAllBranches();
       // echo"<pre>"; var_dump($data['PharmacyUnderRepresentatives']); exit;
	
		$this->load->view('print/print-representative',$data);
	
    }


    public function GetRepresentativeIDbyBranchID(){

        $BranchID =  $this->input->get('BranchID');
        $data = $this->Representative_model->GetRepresentativeIDbyBranchID($BranchID);
       // echo json_encode($data);
        echo $data;
    }

    public function GetPharmacyByRepresentativeID(){

        $ReID =  $this->input->get('ReID');
        $data = $this->Representative_model->GetPharmacyByRepresentativeID($ReID);
       // echo json_encode($data);
        echo $data;
    }

    
    public function GetRepresentativeDatabyId(){

        $id = $this->input->get('id');
        $data = $this->Representative_model->GetRepresentativeDatabyId($id);
        echo json_encode($data);
        //echo $data;
    }

    public function GetSingleRepresentativeData(){
        $id= $this->input->post('id');
        $RepresentativeData = array(
            
            're_name' => $this->input->post('re_name'),
            're_address' => $this->input->post('re_address'),
            're_phone' => $this->input->post('re_phone'),
            're_branch' => $this->input->post('re_branch'),
            're_update_at' => date('Y-m-d H:i:s'),
            're_code' =>  $this->input->post('re_code')
        );
       //echo "<pre>"; print_r($RepresentativeData); exit;
       $this->db->where('id', $id);
       $this->db->update('table_representative', $RepresentativeData);
       if($this->db->affected_rows() > 0){
              return true;
       }else{
              return false;
       }

    }

    public function DeleteRepresentateive($id)
    {
        # code...
        $delete = $this->db->delete('table_representative', array('id' => $id));
			if($delete){

				$this->session->set_flashdata('deleteSuccess','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> প্রতিনিধি সফলভাবে ডিলিট হয়েছে </h4> </div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
    }

    public function import()
	{
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                        for($row=1; $row<=$highestRow; $row++)
                        {
                            
                            $re_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                            $re_phone = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                            $re_address = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                            $re_branch = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                            $re_code = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                            if(!empty($re_name) && !empty($re_phone) && !empty($re_address) && !empty($re_branch) && !empty($re_code))
                            {
                                $data[] = array(
                                're_name'  => $re_name,
                                're_address' => $re_address,
                                're_phone' => "+880".$re_phone,
                                're_branch'  => $re_branch,
                                're_code'   => $re_code,
                                're_create_at' => date('Y-m-d H:i:s'),
                                );
                            }
                        }
                }
            $this->Representative_model->insert($data);
            //echo 'Data Imported successfully';
            redirect($_SERVER['HTTP_REFERER']);
            
            } 
    }
}
