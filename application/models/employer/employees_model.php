<?php

class Employees_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all Employees  */
	public function show_allEmployees()
	{
		$this->db->select('a.*, b.*');
		$this->db->from('hrm_employees a');
		$this->db->join('state b','a.emp_state_id = b.state_id','inner');
		//$this->db->where('a.employer_id !=', $this->user_id);
		$query = $this->db->get();
		return $query->result() ;
	}
	/*	Show all Role  */
	public function getAllRole()
	{		
		$this->db->select('*');
		$this->db->from('hrm_role'); 
		$this->db->where('role_id !=', $this->employer_role);
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Get All Position */
	public function getAllPosition()
	{
		$this->db->select('*');
		$this->db->from('hrm_position');
		$this->db->where('position_active_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Get All Level */
	public function getAllLevel()
	{
		$this->db->select('*');
		$this->db->from('hrm_level');
		$this->db->where('level_active_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Get All Departments */
	public function getAllDepartments()
	{
		$this->db->select('*');
		$this->db->from('hrm_department');
		$this->db->where('department_active_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Get All State */
	public function getAllState()
	{
		$this->db->select('*');
		$this->db->from('state');
		$this->db->where('country_id', '13');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Get All EnTitle */
	public function getAllEnTitle()
	{
		$this->db->select('*');
		$this->db->from('hrm_entitle');
		$this->db->where('entitle_active_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}
	
	/* Get All Country */
	public function getAllCountry()
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->where('country_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Get All EmployeeType */
	public function getAllEmployeeType()
	{
		$this->db->select('*');
		$this->db->from('hrm_employee_type');
		$this->db->where('emp_type_active_status', '1');
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Add New Employee */	
	public function employeesAdd($post)
	{
		$this->db->insert('hrm_employees', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}

	/* Add New Employee Work Details*/	
	public function employeesWorkAdd($post)
	{
		$this->db->insert('hrm_employees_work_detail', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}

	/* Delete Employees */
	function delete_employeesDetails($emp_id)
	{
		$this->db->delete('hrm_employees_work_detail', array('empw_employees_id' => $emp_id));		
		$this->db->delete('hrm_employees', array('emp_id' => $emp_id));		
		return 1;		
	}

	/* Edit Employees details */	
	public function editEmployees($emp_id)
	{
		$this->db->select('a.*, b.*');
		$this->db->from('hrm_employees a');
		$this->db->join('hrm_employees_work_detail b','a.emp_id = b.empw_employees_id','inner');
		$this->db->where('a.emp_id', $emp_id);
		$query = $this->db->get();
		return $query->result();
	}

	/* Update Employees */
	public function employeesUpdate($post)
	{		
		$data['emp_fname'] = $post['emp_fname'];
		$data['emp_lname'] = $post['emp_lname'];
		$data['emp_email'] = $post['emp_email'];
		$data['emp_phone'] = $post['emp_phone'];
		$data['emp_address'] = $post['emp_address'];
		$data['emp_suburb'] = $post['emp_suburb'];
		$data['emp_state_id'] = $post['emp_state_id'];
		$data['emp_postcode'] = $post['emp_postcode'];
		$data['emp_title'] = $post['emp_title'];
		$data['emp_gender'] = $post['emp_gender'];
		$data['emp_dob'] = $post['emp_dob'];
		//$data['emp_age'] = $post['emp_age'];
		$data['emp_nationality'] = $post['emp_nationality'];
		$data['emp_visa_type'] = $post['emp_visa_type'];
		$data['emp_visa_expiry'] = $post['emp_visa_expiry'];
		$data['emp_updated_date'] = $post['emp_updated_date'];
		
		$this->db->where('emp_id', $post['emp_id']);
		$this->db->update('hrm_employees', $data);
		return true;
	}

	/* Update Employees work */
	public function employeesWorkUpdate($post)
	{		
		$data['empw_start_date'] = $post['empw_start_date'];
		$data['empw_end_date'] = $post['empw_end_date'];
		$data['empw_hourly_rate'] = $post['empw_hourly_rate'];
		$data['empw_weekly_rate'] = $post['empw_weekly_rate'];
		$data['empw_anual_rate'] = $post['empw_anual_rate'];
		$data['empw_bonus'] = $post['empw_bonus'];
		$data['empw_user_role'] = $post['empw_user_role'];
		//$data['empw_commission'] = $post['empw_commission'];
		$data['empw_hours_per_week'] = $post['empw_hours_per_week'];
		$data['empw_position'] = $post['empw_position'];
		$data['empw_level'] = $post['empw_level'];
		$data['empw_department'] = $post['empw_department'];
		$data['empw_state'] = $post['empw_state'];
		$data['empw_entitle'] = $post['empw_entitle'];
		$data['empw_emp_type'] = $post['empw_emp_type'];
		$data['empw_anual_leave_owing'] = '1';
		$data['empw_personal_leave_owing'] = '1';
		$data['empw_updated_date'] = $post['empw_updated_date'];
		
		$this->db->where('empw_employees_id', $post['empw_employees_id']);
		$this->db->update('hrm_employees_work_detail', $data);
		return true;
	}

	/* Set Active / Inactive Status */
	function setStatus($post)
	{
		$data = array(
			'emp_active_status' => $post['emp_active_status'],
			'emp_updated_date' => $post['emp_updated_date']
		);
		$this->db->where('emp_id', $post['emp_id']);
		$this->db->update('hrm_employees', $data); 
		return true; 
	} 

	/* search */
	function searchFun($post)
	{
		$field_name = $post['field_name'];
		$this->db->select('a.*, b.*');
		$this->db->from('hrm_employees a');
		$this->db->join('state b','a.emp_state_id = b.state_id','inner');
		$this->db->like($field_name, $post['field_value']);
		$query = $this->db->get();
		return $query->result();
	} 
	
}
?>
