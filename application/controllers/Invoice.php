<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Representative_model');
		$this->load->model('Branch_model');
		$this->load->model('Pharmacy_model');
		$this->load->model('Invoice_model');
	    
	}

	public function setDataToSession(){

        $cartData = $this->input->post('cartData');
        $this->session->set_userdata('cart',$cartData);
    }
	public function GenerateNewInvoice()
	{
		$data['TemplateTitle'] = "Hamdard Waqf || ইনভয়েস ব্যবস্থাপনা";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ইনভয়েস ব্যবস্থাপনা";
		$data['PageTitle'] = "নতুন ইনভয়েস তৈরী করুণ";
		$data['BranchList'] = $this->Branch_model->GetAllBranches();
		//$data['ProductData'] = $this->Invoice_model->GetAllProducts();
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/invoice-entry',$data);
		$this->load->view('includes/footer');


		
	}

	public function GetProductName()
	{
		
		$returnData = array();
        
        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $skillData = $this->Invoice_model->getRows($conditions);
        
        // Generate array
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['pro_id'];
                $data['value'] = $row['pro_name']." ,"."কোডঃ ".$row['pro_sku'].", পরিবেশনঃ-".$row['pro_performances']." ".$row['pro_unit'];
                $data['pro_name'] = $row['pro_name'];
                $data['market_price'] = $row['pro_market_price'];
                $data['net_price'] = $row['pro_net_price'];
                $data['stock'] = $row['pro_stock'];
                $data['pro_code'] = $row['pro_sku'];
                $data['performances'] = $row['pro_performances'];
                array_push($returnData, $data);
            }
        }
        
        // Return results as json encoded array
        echo json_encode($returnData);die;

	}

	public function GetDataForInvoiceGeneration(){

		$BranchID = $this->input->get('BranchID');
		//$PharmacyID = $this->input->get('PharmacyID');
		//$RepresentativeID = $this->input->get('RepresentativeID');


		  // Multiple Data
		 //$data['MultipleData'] = $this->Invoice_model->GetAllMultipleData($BranchID,$RepresentativeID);
		 $data['MultipleData'] = $this->Invoice_model->GetAllMultipleData($BranchID);
		 $data['RepresentativeData'] = $this->Invoice_model->GetAllRepresentativeData($BranchID);
		 // // Pharmacy Data
		//$data['PharmacyData'] = $this->Invoice_model->GetAllPharmaciesByRe($RepresentativeID); 
		//echo "Pharmacy Table: <pre>"; print_r($data['RepresentativeData']); exit;


		  $data['TemplateTitle'] = "Hamdard Waqf || ইনভয়েস ব্যবস্থাপনা";
		  $data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		  $data['Breadcumbs'] = "ইনভয়েস ব্যবস্থাপনা";
		  $data['PageTitle'] = "নতুন ইনভয়েস তৈরী করুণ";
		  $data['BranchList'] = $this->Branch_model->GetAllBranches();
		  $data['ProductData'] = $this->Invoice_model->GetAllProducts();
		  $data['br_id'] = $BranchID;
		  //$data['re_id'] = $RepresentativeID;

	
		  $this->load->view('includes/header',$data);
		  $this->load->view('includes/sidebar');
		  $this->load->view('pages/invoice-entry',$data);
		  $this->load->view('includes/footer',$data);

	//}
	}
	public function GetAllProduct(Type $var = null)
	{
		# code...
		$data['AllData'] = $this->Invoice_model->GetAllProduct();
		echo json_encode($data['AllData']);
	}
	public function GetBonus()
	{
		# code...

		$saleFromDb =0; 

		$BonusFromDb= 0; 

		$TotalBonus = 0;

		$TotalBonusFinal = 0; 

		$TotalSale =0; 

		$TotalStock =0; 

		  $TargetSaleFromFormData = $this->input->get('sale');
		
		  $id = $this->input->get('id');

		$data = $this->Invoice_model->GetBonusData($id);

		foreach($data as $d){

			 $SaleRangeForBonusFormDB =  $d->bonus_target;

			 $BonusRangeForSaleFromDB = $d->gained_bonus;
			 
		     $TotalStockFromDB =  $d->pro_stock;
		}
		// if($TargetSaleFromFormData >= $TotalStockFromDB){

	
		// 	 $TotalBonus = 1; // Stock Error
		// 	 echo json_encode($TotalBonus);
		// 	//echo json_encode("Your Target is:- ".$TargetSaleFromFormData." and Stock is:- ".$TotalStockFromDB);
		// }
		if($BonusRangeForSaleFromDB <= 0){
			 
			$TotalBonus = 0;
			echo json_encode($TotalBonus);

			

		}
		elseif($SaleRangeForBonusFormDB <=0 ){
				
			$TotalBonus = 0;
			echo json_encode($TotalBonus);
		}
		elseif($BonusRangeForSaleFromDB >= 0 && $SaleRangeForBonusFormDB >=0){
			
		    $TotalBonus = ($TargetSaleFromFormData / $SaleRangeForBonusFormDB) * $BonusRangeForSaleFromDB ; 
			echo json_encode(round($TotalBonus));

		}
		elseif($BonusRangeForSaleFromDB <= 0 && $SaleRangeForBonusFormDB <=0){
			
		    $TotalBonus = 0; 
			echo json_encode(round($TotalBonus));

		}
	
	
	
		
		

		
	}
	var $GrandGrandTotal;
	
	static function arrayCustomize($myArray,$invoice_master_id)
	{
		
		$countRow = count($myArray['pro_id']);
		 
		 $customArrayNewOne = array();

		// $GrandTotalArray = array();

		 (float)$AllProductsPricesTotal = 0;

		 (float)$AllProductsPricesGrandTotal = 0;

		 (float)$SingleProductPrice = 0 ;
		 
		 for($counter=0; $counter<$countRow; $counter++){

			(float)$MarketPriceArray = (float)$myArray["pro_market_price"][$counter]; 
			$TotalSaleArray = (int)$myArray["pro_sale"][$counter];
				
				$SingleProductPrice = $MarketPriceArray * $TotalSaleArray;
		

				 $AllProductsPricesTotal = $AllProductsPricesTotal + $SingleProductPrice;

				 $AllProductsPricesGrandTotal = (float)$AllProductsPricesTotal;


				 $customSingleArray = array(

					'invoice_master_id' => $invoice_master_id,
					'product_id' => $myArray["pro_id"][$counter],
					'product_name' => $myArray["pro_name"][$counter],
					'product_net_price' => $myArray["pro_net_price"][$counter],
					'product_market_price' => $myArray["pro_market_price"][$counter],
					'product_performances' => $myArray["pro_performances"][$counter],
					'pro_sku' => $myArray["pro_sku"][$counter],
					'product_quantity' => $myArray["pro_sale"][$counter],
					'product_bonus' => $myArray["pro_bonus"][$counter],
					'product_total_price' =>  $SingleProductPrice,
					'invoice_create_at' =>  date('Y-m-d H:i:s'),
				
					
					
				
				);

			
				

			
				array_push($customArrayNewOne, $customSingleArray);
		 }
		

			return $customArrayNewOne;
		 
	}
   
	public function InvoiceSubmit(Type $var = null)
	{
		# code...
	
	

		$pro_name = $this->input->post('pro_name'); 
		$pro_net_price = $this->input->post('pro_net_price');
		$pro_market_price = $this->input->post('pro_market_price');
		$pro_performances = $this->input->post('pro_performances');
		$pro_stock = $this->input->post('pro_stock');
		$pro_sale = $this->input->post('pro_sale');
		$pro_bonus = $this->input->post('pro_bonus');
		$pro_id = $this->input->post('pro_id');
		$pro_sku = $this->input->post('pro_sku');

		$ProductData = array(

			 'pro_id' => $pro_id,
			 'pro_name' => $pro_name,
			 'pro_net_price' => $pro_net_price,
			 'pro_market_price' => $pro_market_price,
			 'pro_sku' => $pro_sku,
			 'pro_performances' => $pro_performances,
			 'pro_stock' => $pro_stock,
			 'pro_sale' => $pro_sale,
			 'pro_bonus' => $pro_bonus,
			
			
		);
		
		//$ProductsdataNew = Invoice::arrayCustomize($ProductData, 0);
		//echo "<pre>"; print_r($ProductsdataNew); exit;

		
		
		$result = $this->Invoice_model->InsertInvoiceData();
		if($result){
			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>আপনার এন্ট্রি সফলভাবে ডাটাবেজে নিবন্ধিত হয়েছে </h4></div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		//echo $result;

		
		

		
	}




	public function ListOfInvoice()
	{
		# code...
		$data['TemplateTitle'] = "Hamdard Waqf || ইনভয়েস ব্যবস্থাপনা";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ইনভয়েস ব্যবস্থাপনা";
		$data['PageTitle'] = "ইনভয়েসের লিস্ট";
		
		$data['BranchList'] = $this->Branch_model->GetAllBranches();
		//echo "<pre>"; print_r($data['InvoiceData']); exit;
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/invoice-list',$data);
		$this->load->view('includes/footer');
	}

	public function GetInvoiceListByBranch(Type $var = null)
	{
		# code...
		   $BranchID = $this->input->get('ph_under_branch');
		   $ReCode = $this->input->get('ph_under_representative');
		   $data['InvoiceData'] = $this->Invoice_model->GetInvoiceListData($BranchID,$ReCode);
		   //$data['InvoiceData'] = $this->Invoice_model->GetInvoiceListData($BranchID);
		   $BranchName;
		   $BName = $this->Invoice_model->GetBranchName($BranchID);
		   foreach($BName as $b){

			$BranchName = $b->branch_name; 
			

		   }
		   $ReName= '';
		   $data['BranchName'] = $BranchName;
		   $data['BranchID'] = $BranchID;
		   $data['ReID'] = $ReCode;
			$query=$this->db->query("SELECT re_name FROM table_representative WHERE re_code='$ReCode'");
		   foreach($query->result() as $ReDetails){
			   $ReName = $ReDetails->re_name;
		   }
		   $data['Rename'] = $ReName;
		   $data['TemplateTitle'] = "Hamdard Waqf || ইনভয়েস ব্যবস্থাপনা";
			$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
			$data['Breadcumbs'] = "ইনভয়েস ব্যবস্থাপনা";
			$data['PageTitle'] = "ইনভয়েসের লিস্ট";
			
			$data['BranchList'] = $this->Branch_model->GetAllBranches();
			//echo "<pre>"; print_r($data['InvoiceData']); exit;
		    if(!empty($data['InvoiceData'])) {

				//$data['InvoiceData'] = $this->Invoice_model->GetInvoiceListData($BranchID);
				$data['InvoiceData'] = $this->Invoice_model->GetInvoiceListData($BranchID,$ReCode);
				$this->load->view('includes/header',$data);
				$this->load->view('includes/sidebar');
				$this->load->view('pages/invoice-list',$data);
				$this->load->view('includes/footer');
			}else{

				$data['InvoiceData'] = "";
				$this->load->view('includes/header',$data);
				$this->load->view('includes/sidebar');
				$this->load->view('pages/invoice-list',$data);
				$this->load->view('includes/footer');

			}
			
		// echo "<pre>"; print_r($data['InvoiceData']); exit;
		
	}
  

	public function SingleInvoiceView($invoice_master_id)
	{
		# code...
		$data['TemplateTitle'] = "Hamdard Waqf || ইনভয়েস ব্যবস্থাপনা";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "ইনভয়েস ব্যবস্থাপনা";
		$data['PageTitle'] = "নতুন ইনভয়েস তথ্য";
		$data['InvoiceData'] = $this->Invoice_model->GetInvoiceData($invoice_master_id);
		//echo "<pre>"; print_r($data['InvoiceData']); exit;
		if(!empty($data['InvoiceData'])){

			$myCustomArray = array();
			foreach($data['InvoiceData'] as $result){
					
				$pharmacy_name = $result->ph_name;
				if(array_key_exists($pharmacy_name, $myCustomArray)){
					array_push($myCustomArray[$pharmacy_name], (array) $result);
				
				
				}
				else{
					$myCustomArray[$pharmacy_name] = array();
					array_push($myCustomArray[$pharmacy_name], (array) $result);
				}
			
			}	
		}
		$data['InvoiceResOBJ'] = json_decode(json_encode($myCustomArray));
		//echo "<pre>"; print_r($data['InvoiceResOBJ']); exit;
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/invoice-single-view',$data);
		$this->load->view('includes/footer');
		
		
	}

	public function PrintInvoice($invoiceNo,$invoice_master_id)
	{
		# code...
		$data['InvoiceData'] = $this->Invoice_model->GetInvoiceData($invoice_master_id);
		$data['serial_no'] = $invoiceNo;
		//echo "<pre>"; print_r($data['InvoiceData']); exit;
		if(!empty($data['InvoiceData'])){

			$myCustomArray = array();
			foreach($data['InvoiceData'] as $result){
					
				$pharmacy_name = $result->ph_name;
				if(array_key_exists($pharmacy_name, $myCustomArray)){
					array_push($myCustomArray[$pharmacy_name], (array) $result);
				
				
				}
				else{
					$myCustomArray[$pharmacy_name] = array();
					array_push($myCustomArray[$pharmacy_name], (array) $result);
				}
			
			}	
		}
		$data['InvoiceResOBJ'] = json_decode(json_encode($myCustomArray));
		//echo "<pre>"; print_r($data['InvoiceResOBJ']); exit;
	
		$this->load->view('print/invoice-print',$data);
		//redirect($_SERVER['HTTP_REFERER']);
	
		
	}

	public function PrintAllInvoice($br_id,$re_code)
	{
		# code...
		//$data['InvoiceData'] = $this->Invoice_model->GetAllInvoiceData($br_id);
		$data['InvoiceData'] = $this->Invoice_model->GetAllInvoiceData($br_id,$re_code);
		//echo "<pre>"; print_r($data['InvoiceData']); exit;
		if(!empty($data['InvoiceData'])){

			$myCustomArray = array();
			foreach($data['InvoiceData'] as $result){
					
				$serial_no = $result->serial_no;
				if(array_key_exists($serial_no, $myCustomArray)){
					array_push($myCustomArray[$serial_no], (array) $result);
				
				
				}
				else{
					$myCustomArray[$serial_no] = array();
					array_push($myCustomArray[$serial_no], (array) $result);
				}
			
			}	
		}
		$data['InvoiceResOBJ'] = json_decode(json_encode($myCustomArray));
		$this->load->view('print/invoice-print-all',$data);
		//echo "<pre>"; print_r($data['InvoiceResOBJ']); exit;

	}

}