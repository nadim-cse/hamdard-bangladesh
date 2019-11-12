<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Dashboard extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	        $this->load->model('Dashboard_model');
			$this->load->model('Login_model');
			$this->load->helper('download');
			$this->load->library('zip');
	
		    
	}
	public function index()
	{
		if($this->session->userdata('session_role') ==  true){

			$data['TemplateTitle'] = "Hamdard Waqf || Admin Panel";
			$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
			$data['Breadcumbs'] = "হোম পেইজ";
			$data['PageTitle'] = "ড্যাশবোর্ড";

			$data['Totalpharmacys'] = $this->Dashboard_model->TotalPharmacyNumber();
			$data['Totalpharmacy'] = $data['Totalpharmacys'];
			//echo "<pre>"; print_r($data['Totalpharmacy']); exit;
			$data['Totalproduct'] = $this->Dashboard_model->TotalProductNumber();
			$data['Totalbranch'] = $this->Dashboard_model->TotalBranchNumber();
			$data['Totalre'] = $this->Dashboard_model->TotalReNumber();
			//var_dump($data['Totalre']); exit;
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/dashboard-home',$data);
			$this->load->view('includes/footer');

		}else{

			redirect('error');


		}
		
		
	}

	public function DatabaseBackup(Type $var = null)
	{
		# code...
		if($this->session->userdata('session_role') ==  true){

			$data['TemplateTitle'] = "Hamdard Waqf || Admin Panel";
			$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
			$data['Breadcumbs'] = "সেটংস";
			$data['PageTitle'] = "ডাটাবেজ ব্যাকআপ নিন";
			
			$this->load->view('includes/header',$data);
			$this->load->view('includes/sidebar');
			$this->load->view('pages/database-backup',$data);
			$this->load->view('includes/footer');

		}else{

			redirect('error');


		}
	}

	public function CreateDatabaseBackup(Type $var = null)
	{
		# code...
		$this->load->dbutil();
		$db_format=array('format'=>'zip','filename'=>'inventory_db_backup.sql');
		$backup= $this->dbutil->backup($db_format);
		$dbname='backup-on-'.date('Y-m-d').'.zip';
		$save='assets/db_backup/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);

	}
}
