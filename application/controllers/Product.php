<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');


class Product extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
			$this->load->model('Product_model');
			$this->load->library('excel');
	
		    
	}
	public function ProductEntryView()
	{
		$data['TemplateTitle'] = "পণ্য ব্যবস্থাপনা || Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "পণ্য ";
		$data['PageTitle'] = "নতুন পণ্য যোগ করুন ";
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/product-entry',$data);
		$this->load->view('includes/footer');
		
    }
    
    public function ProductListView()
	{
		$data['TemplateTitle'] = "পণ্য ব্যবস্থাপনা || Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "পণ্য ";
		$data['PageTitle'] = "সকল পণ্যের তালিকা";
		$data['ProType'] =  $this->Product_model->GetProductCat();
		 if(!empty($data['ProType'])){

			$myCustomArray = array();
			foreach($data['ProType'] as $result){
					
				$product_type = $result->pro_type;
				if(array_key_exists($product_type, $myCustomArray)){
					array_push($myCustomArray[$product_type], (array) $result);
				
				
				}
				else{
					$myCustomArray[$product_type] = array();
					array_push($myCustomArray[$product_type], (array) $result);
				}
			
			}	
			$data['ProResOBJ'] = json_decode(json_encode($myCustomArray));
			//echo "<pre>"; print_r($data['ProResOBJ']); exit;
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/product-list',$data);
			$this->load->view('includes/footer');
		 }else{

			$data['ProResOBJ'] = "";
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/product-list',$data);
			$this->load->view('includes/footer');
		 }
		
		
		
	}

	static function arrayCustomize($myArray,$pro_name,$pro_unit,$pro_type){
		
	 $countRow = count($myArray['pro_net_price']);
	  
	  $customArray = array();
	  
	  for($counter=0; $counter <$countRow; $counter++){
	  

		  $customSingleArray = array(

			 'pro_name' => $pro_name,
			 'pro_net_price' => $myArray["pro_net_price"][$counter],
			 'pro_market_price' => $myArray["pro_market_price"][$counter],
			 'pro_performances' => $myArray["pro_performances"][$counter],
			 'pro_unit' => $pro_unit,
			 'pro_sku' => $myArray["pro_sku"][$counter],
			 'pro_stock' => $myArray["pro_stock"][$counter],
			 'gained_bonus' => $myArray["gained_bonus"][$counter],
			  'bonus_target' => $myArray["bonus_target"][$counter],
			  'pro_type' => $pro_type,
			 'pro_created_at' => date('Y-m-d H:i:s'),
			 'pro_update_at' => ''
			 
			
		  );
		  

	  
		 array_push($customArray, $customSingleArray);
	  }
	  
		 return $customArray;
	  
	}

	public function StoreProductData(){

		$pro_name = preg_replace('/\s+/', '', $this->input->post('pro_name'));
		$pro_net_price = $this->input->post('pro_net_price');
		$pro_market_price = $this->input->post('pro_market_price');
		$pro_performances = $this->input->post('pro_performances');
		$pro_unit = $this->input->post('pro_unit');
		$pro_stock = $this->input->post('pro_stock');
		$pro_sku = $this->input->post('pro_sku');
		$pro_type = $this->input->post('pro_type');
		$pro_bonus = $this->input->post('pro_bonus');
		$pro_gained_bonus = $this->input->post('pro_gained_bonus');
		
		
		   $ProductData = array(

			   
			   'pro_net_price' =>  $pro_net_price,
			   'pro_market_price' => $pro_market_price,
			   'pro_performances' => $pro_performances,
			   'pro_stock' => $pro_stock,
			   'pro_sku' => $pro_sku,
			   'gained_bonus' => $pro_gained_bonus,
			   'bonus_target' => $pro_bonus,
			   'pro_created_at' => date('Y-m-d H:i:s'),
			   'pro_update_at' => '',
			   
		   );
		   $SkuData = array(

			 
		   );
		   $MultipleProductData = Product::arrayCustomize($ProductData,$pro_name,$pro_unit,$pro_type);
		//echo "<pre>"; print_r($MultipleProductData); exit;
		  $insertResult = $this->Product_model->InsertProductData($MultipleProductData);
		  if($insertResult){
			  echo "1";
		  }else{

			echo "1";
		  }
		
	
	}

	public function GetProductListByType(){

		$ProductType = $this->input->get('product_type');
		//$data = $this->Product_model->GetProductListByType($ProductType);
		$data['Products'] = $this->Product_model->GetProductListByTypeForTesting($ProductType);
		$data['TemplateTitle'] = "পণ্য ব্যবস্থাপনা || Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "পণ্য ";
		$data['PageTitle'] = "সকল পণ্যের তালিকা";
		$data['ProType'] =  $this->Product_model->GetProductCat();
		 if(!empty($data['ProType'])){

			$myCustomArray = array();
			foreach($data['ProType'] as $result){
					
				$product_type = $result->pro_type;
				if(array_key_exists($product_type, $myCustomArray)){
					array_push($myCustomArray[$product_type], (array) $result);
				
				
				}
				else{
					$myCustomArray[$product_type] = array();
					array_push($myCustomArray[$product_type], (array) $result);
				}
			
			}	
			$data['ProResOBJ'] = json_decode(json_encode($myCustomArray));
			//echo "<pre>"; print_r($data['ProResOBJ']); exit;
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/product-list',$data);
			$this->load->view('includes/footer');
		 }else{

			$data['ProResOBJ'] = "";
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/product-list',$data);
			$this->load->view('includes/footer');
		 }
        

	}

	public function ProductSkuEntryView(){

	}
	
	public function GetSingleProductDetails(){

		$ProductID =  $this->input->get('ProductID');
        $data = $this->Product_model->GetSingleProductDetails($ProductID);
        echo json_encode($data);
        //echo $data;
	}

	public function UpdateProductData()
	{

		# code...
		$pro_name = preg_replace('/\s+/', '', $this->input->post('pro_name'));
		$pro_id = $this->input->post('pro_id');
		$pro_net_price = $this->input->post('pro_net_price');
		$pro_market_price = $this->input->post('pro_market_price');
		$pro_performances = $this->input->post('pro_performances');
		$pro_unit = $this->input->post('pro_unit');
		$pro_stock = $this->input->post('pro_stock');
		$pro_sku = $this->input->post('pro_sku');
		$pro_type = $this->input->post('pro_type');
		$pro_bonus = $this->input->post('pro_bonus');
		$pro_gained_bonus = $this->input->post('pro_gained_bonus');
		
		
		   $ProductData = array(

			   'pro_name' => $pro_name,
			   'pro_net_price' =>  $pro_net_price,
			   'pro_market_price' => $pro_market_price,
			   'pro_performances' => $pro_performances,
			   'pro_unit' => $pro_unit,
			   'pro_stock' => $pro_stock,
			   'pro_sku' => $pro_sku,
			   'pro_type' => $pro_type,
			   'bonus_target' => $pro_bonus,
			   'gained_bonus' => $pro_gained_bonus,
			   'pro_update_at' =>  date('Y-m-d H:i:s'),
			   
		   );
		   
		   //echo "<pre>"; print_r($ProductData); exit;
		  $UpdateResult = $this->Product_model->UpdateProductData($ProductData,$pro_id);
		  if($UpdateResult){
			  echo "1";
		  }
	}
	
	public function DeleteProducts($id,$pro_name)
	{
			$proName = urldecode($pro_name);

			$delete = $this->db->delete('table_product', array('pro_id' => $id));
			if($delete){

				$this->session->set_flashdata('deleteSuccess','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>'.$proName.' পণ্যটি সফলভাবে ডিলিট হয়েছে </h4> </div>');
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
			
			$product_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
			$pro_sku = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			$pro_net_price = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			$pro_market_price = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			$pro_performances = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			if(!empty($product_name) && !empty($pro_sku) && !empty($pro_net_price) && !empty($pro_market_price) && !empty($pro_performances))
			{
			$data[] = array(
			'pro_name'  => $product_name,
			'pro_sku'   => $pro_sku,
			'pro_net_price'    => $pro_net_price,
			'pro_market_price'  => $pro_market_price,
			'pro_performances'   => $pro_performances
			);
			}
		}
	}
	$this->Product_model->insert($data);
	//echo 'Data Imported successfully';
	redirect($_SERVER['HTTP_REFERER']);
	
	} 
 }

	
}
