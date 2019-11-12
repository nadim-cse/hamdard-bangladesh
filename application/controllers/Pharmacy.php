<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Pharmacy extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	        $this->load->model('Representative_model');
	        $this->load->model('Branch_model');
	        $this->load->model('Pharmacy_model');
	
		    
	}
	public function PharmacyEntryView()
	{
		$data['TemplateTitle'] = "Hamdard Waqf || Admin Panel";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ফার্মেসি";
		$data['PageTitle'] = "নতুন ফার্মেসি যোগ করুন";
		$data['BranchList'] = $this->Branch_model->GetAllBranches();
		$data['RepresentativeList'] = $this->Representative_model->GetAllRepresentatives();
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/pharmacy-entry',$data);
		$this->load->view('includes/footer');
		
    }
    public function StorePharmacyData(){

    
         $ph_name = preg_replace('/\s+/', '', $this->input->post('ph_name'));
         $ph_phone = preg_replace('/\s+/', '', $this->input->post('ph_phone'));
         $ph_address = preg_replace('/\s+/', '', $this->input->post('ph_address'));
         $ph_under_brach = $this->input->post('ph_under_branch');
         $ph_under_representative = $this->input->post('ph_under_representative');
         $ph_proprietor = preg_replace('/\s+/', '', $this->input->post('ph_proprietor'));

         
            $PharmacyData = array(

                'ph_name' => $ph_name,
                'ph_phone' =>  "+880".$ph_phone,
                'ph_address' => $ph_address,
                'ph_under_branch' => $ph_under_brach,
                'ph_under_representative' => $ph_under_representative,
                'ph_proprietor' => $ph_proprietor,
                'ph_create_at' => date('Y-m-d H:i:s'),
                'ph_update_at' => '',
                
            );
           // echo "<pre>"; print_r($PharmacyData); exit;
           $insertResult = $this->Pharmacy_model->InsertPharmacyData($PharmacyData);
           if($insertResult){
               echo "1";
           }

         
       
        
    }

    
    public function PharmacyListView()
	{
		$data['TemplateTitle'] = "Hamdard Waqf || All Pharmacy List";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ফার্মেসি";
        $data['PageTitle'] = "সকল ফার্মেসির তালিকা";
		$data['Pharmacies'] = $this->Pharmacy_model->GetAllPharmacy();
		//$query=$this->db->query("SELECT SUM(grand_total) AS TotalSale FROM invoice_master,table_pharmacy WHERE invoice_master.ph_id=table_pharmacy.ph_code GROUP BY invoice_master.ph_id"); 
		//$data['TotalSales'] = $query->result();
 		//$data['Branches'] = $this->Branch_model->GetAllBranches();
		//$data['Representatives'] = $this->Representative_model->GetAllRepresentatives();
       // echo "<pre>"; print_r( $data['Pharmacies']); exit;
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/pharmacy-list',$data);
		$this->load->view('includes/footer',$data);
		
	}
	public function GetPharmacyDatabyId()
	{
		# code...
		$ph_id = $this->input->get('ph_id');
        $data = $this->Pharmacy_model->GetPharmacyDatabyId($ph_id);
        echo json_encode($data);
        
	}
	
	public function UpdatePharmacyData()
	{
		# code...
		$ph_name = $this->input->post('ph_name');
         $ph_phone = $this->input->post('ph_phone');
         $ph_address = $this->input->post('ph_address');
         $ph_under_brach = $this->input->post('ph_under_branch');
         $ph_under_representative = $this->input->post('ph_under_representative');
         $ph_proprietor = $this->input->post('ph_proprietor');
           $ph_id = $this->input->post('ph_id');

         
            $PharmacyData = array(

                'ph_name' => $ph_name,
                'ph_phone' =>  $ph_phone,
                'ph_address' => $ph_address,
                'ph_under_branch' => $ph_under_brach,
                'ph_under_representative' => $ph_under_representative,
                'ph_proprietor' => $ph_proprietor,
                'ph_update_at' => date('Y-m-d H:i:s'),
                
			);
			
	
			 $this->db->where('ph_id', $ph_id);
			 $this->db->update('table_pharmacy', $PharmacyData);
			 if($this->db->affected_rows() > 0){
					return true;
			 }else{
					return false;
			 }
           
	}
   
	
	public function PharmacyListViewByRepresentative(){

		    $data['TemplateTitle'] = "Hamdard Waqf || All Pharmacy List";
			$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
			$data['Breadcumbs'] = "ফার্মেসি";
			$data['PageTitle'] = "প্রতিনিধি অনুসারে ফার্মেসির তালিকা";
			$data['BranchList'] = $this->Branch_model->GetAllBranches();
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/pharmacy-list-by-representative-view',$data);
			$this->load->view('includes/footer',$data);
	}

	public function PharmacyListRepresentative(){

		  $RepresentativeID = $this->input->get('id');
	      $BranchID = $this->input->get('branch_id');
		
         $data['Pharmacies'] = $this->Pharmacy_model->GetAllPharmacyByRe($RepresentativeID,$BranchID);
	   // echo "<pre>"; print_r( $data['Pharmacies']); exit;
	  	 $data['TemplateTitle'] = "Hamdard Waqf || All Pharmacy List";
			$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
			$data['Breadcumbs'] = "ফার্মেসি";
			$data['PageTitle'] = "প্রতিনিধি অনুসারে ফার্মেসির তালিকা";
			$data['BranchList'] = $this->Branch_model->GetAllBranches();
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/pharmacy-list-by-representative-view',$data);
			$this->load->view('includes/footer',$data);

	}
	public function GetPharmacyRepresentativeID(){

		$RepresentativeID = $this->input->get('ReID');
        $data = $this->Pharmacy_model->GetPharmacyRepresentativeID($RepresentativeID);
         //echo json_encode($data);
        echo $data;

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
			
			$ph_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			$ph_code = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			$ph_address = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			$ph_phone = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			$ph_under_brach = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			$ph_under_representative = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
			//if(!empty($ph_name) && !empty($ph_code) && !empty($ph_address) && !empty($ph_phone) && !empty($ph_under_brach) && !empty($ph_under_representative))
			//{
			$data[] = array(
				'ph_name' => $ph_name,
				'ph_code' =>  $ph_code,
				'ph_address' => $ph_address,
                'ph_phone' =>  "+880".$ph_phone,
                'ph_under_branch' => $ph_under_brach,
                'ph_under_representative' => $ph_under_representative,
			);
			//}
		}
	}
	$this->Pharmacy_model->insert($data);
	//echo 'Data Imported successfully';
	redirect($_SERVER['HTTP_REFERER']);
	
	} 
 }

 public function get_student_entry_list(){

	$all_student = $this->Pharmacy_model->GetAllPharmacy();;
	echo json_encode($all_student);
}
}
