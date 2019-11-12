<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Stock extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	        //$this->load->model('');
	
		    
	}
	public function StockEntryView()
	{
		$data['TemplateTitle'] = "Stock Management || Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "Stock";
		$data['PageTitle'] = "New Stock Entry";
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/stock-entry',$data);
		$this->load->view('includes/footer');
		
    }
    
    public function StockListView()
	{
		$data['TemplateTitle'] = "Stock Management || Hamdard Waqf";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "Stock";
		$data['PageTitle'] = "List of Stocks";
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('pages/stock-list',$data);
		$this->load->view('includes/footer');
		
	}
}
