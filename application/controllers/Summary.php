<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Summary extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Branch_model');
        $this->load->model('Invoice_model');
        
        
    }
    public function SummaryList()
    {
        $data['TemplateTitle'] = "সামারী ব্যবস্থাপনা || Hamdard Waqf";
        $data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
        $data['Breadcumbs']    = "সামারী ব্যবস্থাপনা";
        $data['PageTitle']     = "সকল ব্রাঞ্ছের বিগত " . "দিনের সামারী";
        $data['BranchList']    = $this->Branch_model->GetAllBranches();
        //echo "<pre>"; print_r($data['BranchList']); exit;
        // $Summary
        $this->load->view('includes/header', $data);
        $this->load->view('includes/sidebar');
        $this->load->view('pages/summary-list', $data);
        $this->load->view('includes/footer');
        
    }
    
    public function GenerateSummary()
    {
        $BranchID = $this->input->get('branch_id');
        $ReID     = $this->input->get('reid');
        
        $StartingDate = $this->input->get('starting_date');
        $date         = strtotime($StartingDate);
        $Start        = date('Y-m-d', $date); // Converted date format
        
        $EndingDate = $this->input->get('ending_date');
        $date2      = strtotime($EndingDate);
        $End        = date('Y-m-d', $date2); // Converted date format 
        
        // $data['Summaries'] = $this->Invoice_model->GetSummary($BranchID,$Start,$End);
        //echo "<pre>"; print_r($data['Summaries']);
        
        $data['TemplateTitle'] = "সামারী ব্যবস্থাপনা || Hamdard Waqf";
        $data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
        $data['Breadcumbs']    = "সামারী ব্যবস্থাপনা";
        $data['PageTitle']     = "সকল ব্রাঞ্ছের বিগত " . "দিনের সামারী";
        $data['BranchList']    = $this->Branch_model->GetAllBranches();
        $BranchName;
        $ReName;
        $BName = $this->Invoice_model->GetBranchAndReName($BranchID, $ReID);
        //echo "<pre>"; print_r($BName); exit;
        if (!empty($BName)) {
            foreach ($BName as $b) {
                
                $BranchName = $b->branch_name;
                $ReName     = $b->re_name;
                
            }
            $data['BranchName'] = $BranchName;
            $data['ReName']     = $ReName;
            $data['Start']      = $StartingDate;
            $data['End']        = $EndingDate;
            
            
            $date1 = date_create($Start);
            $date2 = date_create($End);
            
            $diff = date_diff($date1, $date2);
          
            
            $data['DateCount'] = $diff->format("%a");
            // $Summary
            
            $data['PharmacyList'] = $this->Invoice_model->GetInvoiceListDatas($BranchID, $Start, $End, $ReID);
            // echo "<pre>"; print_r($data['PharmacyList']); exit;
            $myCustomArray        = array();
            $myCustomArray2       = array();
            
            if (!empty($data['PharmacyList'])) {
                
                foreach ($data['PharmacyList'] as $result) {
                    
                    $product_name = $result->product_name;
                    if (array_key_exists($product_name, $myCustomArray)) {
                        array_push($myCustomArray[$product_name], (array) $result);
                        
                    }
                    
                    else {
                        $myCustomArray[$product_name] = array();
                        array_push($myCustomArray[$product_name], (array) $result);
                    }
                    
                    
                    
                    
                }
                $data['ProQResOBJ'] = json_decode(json_encode($myCustomArray));
                $data['re_id']      = $ReID;
                // echo "<pre>"; print_r($data['ProQResOBJ']); exit;
                
                $this->load->view('includes/header', $data);
                $this->load->view('includes/sidebar');
                $this->load->view('pages/summary-list', $data);
                $this->load->view('includes/footer');
            } else {

                $data['ProQResOBJ'] = "";
                $data['re_id']      = $ReID;
                // echo "<pre>"; print_r($data['ProQResOBJ']); exit;
                
                $this->load->view('includes/header', $data);
                $this->load->view('includes/sidebar');
                $this->load->view('pages/summary-list', $data);
                $this->load->view('includes/footer');

            }
            
            
            
            
            
            
        } else {
            $data['ProQResOBJ'] = "";
            $data['re_id']      = $ReID;
            $this->load->view('includes/header', $data);
            $this->load->view('includes/sidebar');
            $this->load->view('pages/summary-list', $data);
            $this->load->view('includes/footer');
            
        }
        
        
        
        
        
        
    }
}