<?php

class Login_model extends CI_Model {

	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}

	/*	Check Login Username Function */
	function CheckUserID($employer_email)
	{
        	$this->db->select('*');
		$this->db->from('hrm_employees');	
		$this->db->where('emp_email',$employer_email);
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}	

	/*	Check Login attempt */
	function getAttemptsByEmail($email)
	{
		
        	$this->db->select('*');
		$this->db->from('login_attempt');	
		$this->db->where('la_useremail',$email);
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}	

	/*	Check User Login Function */
	function CheckLoginDetails($data)
	{
		$email = $data['employer_email'];
		$password = $data['employer_password'];
		
       		 $this->db->select('*');
		$this->db->from('hrm_employees');
		$this->db->where('emp_email',$email);	
		$this->db->where('emp_password',$password);		
		$this->db->where('emp_active_status','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}	
	
	/* Add New login attempt */	
	public function addLoginAttemp($post)
	{
		$this->db->insert('login_attempt', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}	
		
	/* Update department */
	public function updateLoginAttemp($post)
	{		
		$data['la_attempt'] = $post['la_attempt'];
		$data['la_date'] = $post['la_date'];
		$this->db->where('la_useremail', $post['la_useremail']);
		$this->db->update('login_attempt', $data);
		return true;
	}

	/*	Block User */
	function blockUser($post)
	{
        $data = array(
			'emp_active_status'=>$post['employer_active_status'],
			'emp_updated_date'=>$post['employer_updated_date'],	
		);		
		$this->db->where('emp_email', $post['employer_email']);
		$this->db->update('hrm_employees', $data); 		
		return true; 
	}


	/*	Reset User Password	*/
	function reset_password($post)
	{
		$data['emp_password'] = $post['employer_password'];
		$this->db->where('emp_email', $post['email']);
		$this->db->update('hrm_employees', $data); 		
		return true; 		
	}









	
	










	/* Get User Details */
	function getUserProfileDetails($admin_id)
	{
		$this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('employer_id',$admin_id);
		$this->db->where('employer_active_status','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
	
	/* Check Old Password */
	function checkpassword($data)
	{
		$employer_id = $data['employer_id'];
		$password = $data['old_password'];
		
        $this->db->select('*');
		$this->db->from('hrm_emplyers');	
		$this->db->where('employer_password',$password);
		$this->db->where('employer_id',$employer_id);
		$this->db->where('employer_active_inactive','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
	
	/*	update User Password	*/
	function updateUserPassword($post)
	{
		$data['employer_password'] = $post['new_password'];
		$this->db->where('employer_id', $post['employer_id']);
		$this->db->update('hrm_emplyers', $data); 		
		return true; 		
	}
	
	
	
	
}
?>