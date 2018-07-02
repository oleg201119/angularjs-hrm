<?php

class Ppaf_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all Employees  */
	public function show_allEmployees()
	{
		$this->db->select('a.*, b.*, d.position_name as emp_position, c.empw_start_date as emp_start_date');
		$this->db->from('hrm_employees a');
		$this->db->join('state b','a.emp_state_id = b.state_id','inner');
		$this->db->join('hrm_employees_work_detail c','a.emp_id = c.empw_employees_id','inner');
		$this->db->join('hrm_position d','c.empw_position = d.position_id','inner');
		//$this->db->where('a.employer_id !=', $this->user_id);
		$query = $this->db->get();
		return $query->result() ;
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

	/*	Show all ppaf admin  */
	public function getAllPpafAdmin()
	{
		$this->db->select('*');
		$this->db->from('hrm_ppaf_admin'); 
		$this->db->order_by("ppaf_a_order", "asc");
		$query = $this->db->get();
		return $query->result() ;
	}

	/* Add New PPAF admin */	
	public function addPpaf($post)
	{
		$this->db->insert('hrm_ppaf', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}	

	/* Add New PPAF admin */	
	public function addCriteria($post)
	{
		$this->db->insert('hrm_criteria', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}	


	
}
?>
