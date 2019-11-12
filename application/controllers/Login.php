<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Login extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
			$this->load->model('Login_model');
			//$this->load->library('user_agent');
	
		    
	}
	public function index()
	{
		$data['TemplateTitle'] = "Admin Login";
		
		$this->load->view('pages/admin-login',$data);
		
		
	}
	public function CheckLoginCreds()
	{
		# code...
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			echo "0";
		}else{

			 $email = $this->input->post('email');
			 $password = md5($this->input->post('password'));
			//echo $browser = $this->agent->browser();
			//echo $this->input->ip_address();
			 $res = $this->Login_model->CheckLoginCreds($email,$password);
			// echo "<pre>"; print_r($res);
			if($res){

				redirect('home-page');
			}else{

				$this->session->set_flashdata('LoginError','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>Credentials is not matched </h4> </div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			
		}
	}

	public function CheckEmailForPasswordRecovery(Type $var = null)
	{
		# code...
		$email = $this->input->post('email');
		$query = $this->db->query("SELECT admin_email FROM admin_table WHERE admin_email = '$email'");
		if($query->result() == false){

			echo "0";
		}else{

			echo "1";

		}
		
	}
}
