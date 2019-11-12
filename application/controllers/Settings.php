<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Settings extends CI_Controller {

    public function AddNewAdmin()
    {
        # code...
        $data['TemplateTitle'] = "Hamdard Waqf || Admin Panel";
		$data['BreadcumbsURI'] = $_SERVER['REQUEST_URI'];
		$data['Breadcumbs'] = "সেটিংস";
		$data['PageTitle'] = "নতুন এডমিন এড করুন";
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
        $this->load->view('settings/add-new-admin');
        $this->load->view('includes/footer');
    }
}
