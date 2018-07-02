<?php

class Ppafadmin_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all ppaf admin  */
	public function show_allPpafAdmin()
	{
		$this->db->select('*');
		$this->db->from('hrm_ppaf_admin'); 
		$this->db->order_by("ppaf_a_order", "asc");
		$query = $this->db->get();
		return $query->result() ;
	}
	
	
	/* Add New PPAF admin */	
	public function ppafAdminAdd($post)
	{
		$this->db->insert('hrm_ppaf_admin', $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}	

	/* Update PPAF admin */
	public function updateQuestionOrder($post)
	{		
		$data['ppaf_a_order'] = $post['ppaf_a_order'];
		//$data['ppaf_a_updated_date'] = $post['ppaf_a_updated_date'];
		$this->db->where('ppaf_a_id', $post['ppaf_a_id']);
		$this->db->update('hrm_ppaf_admin', $data);
		return true;
	}
		
	/* Edit PPAF admin details */	
	public function getPpafAdminBetweenOrder($ppaf_a_order_o, $ppaf_a_order_n)
	{
		$this->db->select('*');
		$this->db->from('hrm_ppaf_admin');
		$this->db->where('ppaf_a_order >=', $ppaf_a_order_o);
		$this->db->where('ppaf_a_order <=', $ppaf_a_order_n);
		$query = $this->db->get();
		return $query->result();
	}
		
	/* Edit PPAF admin details */	
	public function editppafAdmin($ppaf_a_id)
	{
		$this->db->select('*');
		$this->db->from('hrm_ppaf_admin');
		$this->db->where('ppaf_a_id', $ppaf_a_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Update PPAF admin */
	public function ppafAdminUpdate($post)
	{		
		$data['ppaf_a_page'] = $post['ppaf_a_page'];
		$data['ppaf_a_question'] = $post['ppaf_a_question'];
		$data['ppaf_a_order'] = $post['ppaf_a_order'];
		$data['ppaf_a_active_status'] = $post['ppaf_a_active_status'];
		$data['ppaf_a_updated_date'] = $post['ppaf_a_updated_date'];
		$this->db->where('ppaf_a_id', $post['ppaf_a_id']);
		$this->db->update('hrm_ppaf_admin', $data);
		return true;
	}

	/* Delete PPAF admin detail */
	function delete_ppafAdminDetails($ppaf_a_id)
	{
		$this->db->delete('hrm_ppaf_admin', array('ppaf_a_id' => $ppaf_a_id));		
		return 1;		
	}
	
	/* Set Active / Inactive Status */
	function setStatus($post)
	{
		$data = array(
			'ppaf_a_active_status' => $post['ppaf_a_active_status'],
			'ppaf_a_updated_date' => $post['ppaf_a_updated_date']
		);
		$this->db->where('ppaf_a_id', $post['ppaf_a_id']);
		$this->db->update('hrm_ppaf_admin', $data); 
		return true; 
	} 
	
	/* search */
	function searchFun($post)
	{
		$field_name = $post['field_name'];
		$this->db->select('*');
		$this->db->from('hrm_ppaf_admin');
		$this->db->like($field_name, $post['field_value']);
		$query = $this->db->get();
		return $query->result();
	} 
	
	
}
?>
