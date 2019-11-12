<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{


    public function InsertProductData($MultipleProductData)
    {
        # code...
       
        $this->db->insert_batch('table_product',$MultipleProductData); // up to here it was working
  
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
    public function GetProductListByType($ProductType){

        $query=$this->db->query("SELECT * FROM table_product WHERE pro_type='$ProductType'");

        $output = '';
        
        foreach($query->result() as $row){
            $output .= '<tr>';
            $output .= '<td>'.$row->pro_id.'</td>';
            $output .= '<td>'.$row->pro_name.'</td>';
            $output .= '<td>'.$row->pro_sku.'</td>';
            $output .= '<td>'.$row->pro_type.'</td>';
            $output .= '<td>'.$row->pro_net_price.'</td>';
            $output .= '<td>'.$row->pro_market_price.'</td>';
            $output .= '<td>'.$row->pro_performances.' '.$row->pro_unit.'</td>';
            $output .= '<td>'.$row->pro_stock.'</td>';
            $output .= '<td>'.'<a href="javascript:EditProduct('.$row->pro_id.');" style="color:green">Edit</a> / <a href="javascript:DeleteProduct('.$row->pro_id.');" style="color:red">Delete</a>'.'</td>';
           
            $output .= '</tr>';
        }
       
        return $output;
    }
    
    public function GetProductListByTypeForTesting($ProductType)
    {
        # code...
        if($ProductType == 'all'){

            $query=$this->db->query("SELECT * FROM table_product");
            return $query->result();
        }else{

            $query=$this->db->query("SELECT * FROM table_product WHERE pro_type= '$ProductType'");
            return $query->result();

        }
       
    }
    public function GetProductCat(){

        $query=$this->db->query("SELECT pro_type FROM table_product");
            
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 

    }

    public function GetSingleProductDetails($ProductID)
    {
        # code...
        $query=$this->db->query("SELECT * FROM table_product WHERE pro_id='$ProductID'");
        //echo $this->db->last_query(); exit;
            
        if($query->result()){
            return $query->result();
            //echo $this->db->last_query();
        }
        else{

            return false;
        } 
    }

    public function UpdateProductData($ProductData,$pro_id)
    {
        # code...
       
		$this->db->where('pro_id', $pro_id);
		$this->db->update('table_product', $ProductData);
		
         if($this->db->affected_rows() > 0){
            return true;
         }else{
            return false;
         }
	
    }
        function insert($data)
        {
        $this->db->insert_batch('table_product', $data);
        }
            
}