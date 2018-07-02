<?php

class Employer_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all Employer  */
	public function show_allEmployer()
	{
		$this->db->select('a.*,b.*');
		$this->db->from('hrm_emplyers a');
		$this->db->join('hrm_role b','a.employer_role = b.role_id','inner');
		$this->db->where('a.employer_id !=', $this->user_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Get All Employer Role */
	public function getAllRoles()
	{
		$this->db->select('*');
		$this->db->from('hrm_role');
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Get All Employer State */
	public function getAllState()
	{
		$this->db->select('*');
		$this->db->from('state');
		$this->db->where('country_id', '13');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Add New Employer */	
	public function employerAdd($post)
	{
		$this->db->insert('hrm_emplyers', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}	
	
	/* Delete Employer */
	function delete_employerDetails($employer_id)
	{
		$this->db->delete('hrm_emplyers', array('employer_id' => $employer_id));		
		return 1;		
	}
	
	/* Set Active / Inactive Status */
	function setStatus($post)
	{
		$data = array(
			'employer_active_status' => $post['employer_active_status'],
			'employer_updated_date' => $post['employer_updated_date']
		);
		$this->db->where('employer_id', $post['employer_id']);
		$this->db->update('hrm_emplyers', $data); 
		return true; 
	} 
	
	/* Edit Employer details */	
	public function editEmployer($employer_id)
	{
		$this->db->select('*');
		$this->db->from('hrm_emplyers');
		$this->db->where('employer_id', $employer_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Update Employer */
	public function employerUpdate($post)
	{		
		$data['employer_name'] = $post['employer_name'];
		$data['employer_email'] = $post['employer_email'];
		$data['employer_address'] = $post['employer_address'];
		$data['employer_phone_no'] = $post['employer_phone_no'];
		$data['employer_role'] = $post['employer_role'];
		$data['employer_address_two'] = $post['employer_address_two'];
		$data['employer_suburb'] = $post['employer_suburb'];
		$data['employer_state_id'] = $post['employer_state_id'];
		$data['employer_postcode'] = $post['employer_postcode'];
		$data['employer_updated_date'] = $post['employer_updated_date'];
		$this->db->where('employer_id', $post['employer_id']);
		$this->db->update('hrm_emplyers', $data);
		return true;
	}

	/* search */
	function searchFun($post)
	{
		$field_name = $post['field_name'];
		$this->db->select('a.*,b.*');
		$this->db->from('hrm_emplyers a');
		$this->db->join('hrm_role b','a.employer_role = b.role_id','inner');
		$this->db->where('a.employer_id !=', $this->user_id);
		$this->db->like($field_name, $post['field_value']);
		$query = $this->db->get();
		return $query->result();
	} 
	
}
?>
