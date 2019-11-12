<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model
{


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

    public function GetAlRepresentatives()
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_representative");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function GetAllProducts()
    {
        # code...
        $query=$this->db->query("SELECT pro_id FROM table_product");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function GetAllPharmacies()
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_pharmacy");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function GetAllMultipleData($BranchID){

        $query=$this->db->query("SELECT table_representative.*, table_branch.* FROM table_representative 
        JOIN table_branch ON table_representative.re_branch = table_branch.br_code
         WHERE  table_branch.br_code='$BranchID'  GROUP BY table_branch.br_code");
         //echo $this->db->last_query(); exit;   
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function GetAllRepresentativeData($BranchID)
    {
        # code...
        $query=$this->db->query("SELECT table_representative.* FROM table_representative 
        JOIN table_branch ON table_representative.re_branch = table_branch.br_code
         WHERE  table_branch.br_code='$BranchID'");
         //echo $this->db->last_query(); exit;   
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 

    }

    // public function GetAllMultipleData($BranchID,$RepresentativeID){

    //     $query=$this->db->query("SELECT table_representative.*, table_branch.* FROM table_representative 
    //     JOIN table_branch ON table_representative.re_branch = table_branch.br_code
    //      WHERE table_representative.re_code= '$RepresentativeID' AND table_branch.br_code='$BranchID' ");
    //      //echo $this->db->last_query(); exit;   
    //     if($query->result()){
    //         return $query->result();
    //     }
    //     else{

    //         return false;
    //     } 
    // }
    
    public function GetBonusData($id){

        $query=$this->db->query("SELECT * FROM table_product WHERE pro_id = '$id'");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }
    public function GetAllData($pd_id,$re_id,$br_id){

        # code...
        $query=$this->db->query("SELECT table_pharmacy.*, table_representative.*, table_branch.* from table_pharmacy JOIN table_representative ON table_representative.id=table_pharmacy.ph_under_representative JOIN table_branch ON table_pharmacy.ph_under_branch=table_branch.br_id WHERE table_pharmacy.ph_id='$pd_id' AND table_representative.id='$re_id' AND table_branch.br_id='$br_id'");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 

    }
    static function GrandTotal($AllProductsPricesGrandTotal)
	{
		# code..
		return $AllProductsPricesGrandTotal;
	}
    public function InsertInvoiceData()
    {
        # code...
        
		
        
        $pro_name = $this->input->post('pro_name'); 
		$pro_net_price = $this->input->post('pro_net_price');
		$pro_market_price = $this->input->post('pro_market_price');
		$pro_performances = $this->input->post('pro_performances');
		$pro_sku = $this->input->post('pro_sku');
		$pro_sale = $this->input->post('pro_sale');
		$pro_bonus = $this->input->post('pro_bonus');
		$pro_id = $this->input->post('pro_id');

		$ProductData = array(

			 'pro_id' => $pro_id,
			 'pro_name' => $pro_name,
			 'pro_net_price' => $pro_net_price,
			 'pro_market_price' => $pro_market_price,
			 'pro_performances' => $pro_performances,
			 //'pro_stock' => $pro_stock,
			 'pro_sku' => $pro_sku,
			 'pro_sale' => $pro_sale,
			 'pro_bonus' => $pro_bonus,
			
			
		);
				
           $ProductsdataNew = Invoice::arrayCustomize($ProductData, null);
           //echo "<pre>"; print_r();
          
          // echo $this->db->last_query();
          $GrandTOtal = 0;
          foreach($ProductsdataNew as $pd){

           // echo $pd['product_market_price'] * $pd['product_quantity'].' ,';
            $GrandTOtal += $pd['product_total_price'];
          }
           
           $ph_id = $this->input->post('PharmacyID');
           $re_id = $this->input->post('RepresentativeID');
           $br_id = $this->input->post('br_id');
           $re_code = $this->input->post('RepresentativeID');
           $grand_total = $GrandTOtal;
           $LastInsertIDByRe = 0;
           $LastInsertIDByReFinal;
           
           $MasterInvoiceData = array(
  
              //'serial_no' => $serial,
              'order_date_time' =>date('Y-m-d H:i:s'),
              'ph_id' => $ph_id,
              're_id' => $re_id,
              'br_id' => $br_id,
              'grand_total' => $grand_total,
              'status' => 1,
              'invoice_master_create_at' =>  date('Y-m-d'),
          );

          $today = date("mdh-i");
          // $rand = strtoupper(substr(uniqid(sha1(time())),1,1));
          //$query3=$this->db->query("SELECT invoice_master_id FROM invoice_master WHERE re_id = '$re_id' ORDER BY invoice_master_id DESC LIMIT 1");
          $query3=$this->db->query("SELECT COUNT(invoice_master_id) AS total  FROM invoice_master WHERE re_id ='$re_id' ORDER BY invoice_master_id DESC");
          foreach ($query3->result() as $user)
            {
                $LastInsertIDByRe =  $user->total; 
                    
            }
        //     $ClientInfo = $query->result();
        //    $address = $ClientInfo[0]->address;
           
          if($LastInsertIDByRe == 0){
            $LastInsertIDByReFinal =  (int)$LastInsertIDByRe + 1;
          }else{
            $LastInsertIDByReFinal = (int)$LastInsertIDByRe + 1;
          }
          //echo $LastInsertIDByReFinal; 
           
          $this->db->insert('invoice_master',$MasterInvoiceData); 
          $invoice_master_id = $this->db->insert_id();
          
        //echo $LastInsertIDByRe; 
        $serial = $re_code."_".$today."_00".$LastInsertIDByReFinal;
          $UpdateData = array(

            'serial_no' => $serial
          );
          $this->db->where('invoice_master_id', $invoice_master_id);
          //$this->db->where('re_id', $re_id);
            $this->db->update('invoice_master', $UpdateData);
            
            if($this->db->affected_rows() > 0){
                $ProductsdataNew = Invoice::arrayCustomize($ProductData, $invoice_master_id);
                $this->db->insert_batch('invoice_details',$ProductsdataNew); 
                return true; 
            }else{
                return false;
            }
         


            



    }

    public function GetInvoiceData($invoice_master_id)
    {
        # code...
        // $query=$this->db->query("SELECT invoice_details.*, invoice_master.* from invoice_details JOIN invoice_master ON invoice_master.invoice_master_id=invoice_details.invoice_master_id WHERE invoice_master.invoice_master_id = '$invoice_master_id'");

        $query=$this->db->query("SELECT invoice_details.*, invoice_master.*, table_representative.*, table_pharmacy.*, table_branch.* from invoice_details JOIN invoice_master ON invoice_master.invoice_master_id=invoice_details.invoice_master_id JOIN table_representative ON invoice_master.re_id = table_representative.re_code JOIN table_pharmacy ON invoice_master.ph_id = table_pharmacy.ph_code JOIN table_branch ON invoice_master.br_id = table_branch.br_code WHERE invoice_master.invoice_master_id ='$invoice_master_id' ");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }

    }

    // public function GetAllInvoiceData($br_id)
    // {
    //     # code...
    //     $query=$this->db->query("SELECT invoice_details.*, invoice_master.*, table_representative.*, table_pharmacy.*, table_branch.* from invoice_details JOIN invoice_master ON invoice_master.invoice_master_id=invoice_details.invoice_master_id JOIN table_representative ON invoice_master.re_id = table_representative.re_code JOIN table_pharmacy ON invoice_master.ph_id = table_pharmacy.ph_code JOIN table_branch ON invoice_master.br_id = table_branch.br_code WHERE invoice_master.br_id ='$br_id'");
    //     //echo $this->db->last_query();
        
    //     if($query->result()){
    //         return $query->result();
    //     }
    //     else{

    //         return false;
    //     }
    // }
    public function GetAllInvoiceData($br_id,$re_code)
    {
        # code...
        $query=$this->db->query("SELECT invoice_details.*, invoice_master.*, table_representative.*, table_pharmacy.*, table_branch.* from invoice_details JOIN invoice_master ON invoice_master.invoice_master_id=invoice_details.invoice_master_id JOIN table_representative ON invoice_master.re_id = table_representative.re_code JOIN table_pharmacy ON invoice_master.ph_id = table_pharmacy.ph_code JOIN table_branch ON invoice_master.br_id = table_branch.br_code WHERE invoice_master.br_id ='$br_id' AND invoice_master.re_id='$re_code'");
        //echo $this->db->last_query();
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }

    // public function GetInvoiceListData($br_id,)
    // {
    //     # code...
        
    //     $query=$this->db->query("SELECT invoice_master.*, table_representative.*, table_pharmacy.*, table_branch.* from invoice_master JOIN table_representative ON invoice_master.re_id = table_representative.re_code JOIN table_pharmacy ON invoice_master.ph_id = table_pharmacy.ph_code JOIN table_branch ON invoice_master.br_id = table_branch.br_code WHERE invoice_master.br_id = '$br_id'  ORDER BY invoice_master_create_at DESC");
        
    //     if($query->result()){
    //         return $query->result();
    //     }
    //     else{

    //         return false;
    //     }
        
    // }
    public function GetInvoiceListData($br_id,$re_code)
    {
        # code...
        
        $query=$this->db->query("SELECT invoice_master.*, table_representative.*, table_pharmacy.*, table_branch.* from invoice_master JOIN table_representative ON invoice_master.re_id = table_representative.re_code JOIN table_pharmacy ON invoice_master.ph_id = table_pharmacy.ph_code JOIN table_branch ON invoice_master.br_id = table_branch.br_code WHERE invoice_master.br_id = '$br_id' AND invoice_master.re_id='$re_code' ");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
        
    }

    public function GetBranchName($BranchID)
    {
        # code...
        $query=$this->db->query("SELECT branch_name from table_branch WHERE br_code = '$BranchID'");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }
    public function GetBranchAndReName($BranchID,$ReID)
    {
        # code...
        $query=$this->db->query("SELECT table_branch.branch_name,table_representative.re_name from table_branch,table_representative WHERE table_branch.br_code = table_representative.re_branch AND table_representative.re_code = '$ReID' AND table_branch.br_code = '$BranchID'");
        //echo $this->db->last_query();
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }

    public function GetSummary($BranchID,$Start,$End)
    {
        
        $query=$this->db->query("SELECT SUM(grand_total) AS TotalSale FROM invoice_master WHERE invoice_master_create_at BETWEEN '$Start' AND '$End' AND br_id = '$BranchID' ");
       // echo $this->db->last_query();exit;
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }
    public function GetInvoiceListDatas($BranchID,$Start,$End,$ReID)
    {
        # code...
        

        // $query=$this->db->query("SELECT * FROM invoice_master, table_representative, table_pharmacy, table_branch, invoice_details  WHERE invoice_master.invoice_master_id = invoice_details.invoice_master_id AND invoice_master.re_id = table_representative.id AND invoice_master.ph_id = table_pharmacy.ph_id AND invoice_master.br_id = table_branch.br_id AND  invoice_master_create_at BETWEEN '$Start' AND '$End' AND invoice_master.br_id = '$BranchID' and invoice_master.re_id = '$ReID'");
        $query=$this->db->query("SELECT * FROM invoice_master, invoice_details WHERE invoice_master.invoice_master_id = invoice_details.invoice_master_id AND invoice_master_create_at BETWEEN '$Start' AND '$End' AND invoice_master.br_id = '$BranchID' and invoice_master.re_id = '$ReID'");

        //echo $this->db->last_query(); exit;
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
        
    }
    

    public function GetAllProduct()
    {
        # code...
        $q=$this->input->get["term"]; 
        $query=$this->db->query("SELECT `pro_name` FROM `table_product` WHERE pro_name LIKE '%$q%'");
        // echo $this->db->last_query();exit;
         
         if($query->result()){
             return $query->result();
         }
         else{
 
             return false;
         }
    }
    public function GetAllPharmaciesByRe($RepresentativeID)
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_pharmacy WHERE ph_under_representative = '$RepresentativeID'");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function get_product($name)
    {
        # code...
        $query=$this->db->query("SELECT pro_name FROM table_product WHERE pro_name LIKE  '$name%' ORDER BY pro_name ASC");
        echo $this->db->last_query();    
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    function getRows($params = array()){
        $this->db->select("*");
        $this->db->from('table_product');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            //$this->db->like('pro_name', $params['searchTerm']);
            //$this->db->like(array('pro_name' => $params['searchTerm'], 'pro_sku' => $params['searchTerm']));
            $this->db->like('pro_name', $params['searchTerm']);
            $this->db->or_where('pro_sku', $params['searchTerm']);
        }
        
        $this->db->order_by('pro_name', 'asc');
        
        if(array_key_exists("pro_id",$params)){
            $this->db->where('pro_id',$params['pro_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }
}