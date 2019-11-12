<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{


  
    public function CheckLoginCreds($email,$password)
    {
        # code...
        $AdminCreds = array(

            'admin_email' => $email,
            'admin_password' => $password,
            'role' => 'admin'
        );
        $QueryResult = $this->db->get_where('admin_table', $AdminCreds); // select query for code igniter
		
		if($QueryResult -> num_rows() == 1){

			

			$attribute_session = array(

				'current_user_id'  => $QueryResult->row(0)->admin_id,
				'current_user_name'  => $QueryResult->row(1)->admin_username,
				'session_role' => $QueryResult->row(4)->role,
			);
			
			
		

			$this->session->set_userdata($attribute_session); // session set afte login succeess
			return TRUE;

		}
		else
		{
			return FALSE;
			
		}

    }

	public function is_admin_logged_in(){
        
		return $this->session->userdata('session_role')!= FALSE;
	}

    
    
}