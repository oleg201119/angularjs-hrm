<?php

class Home_model extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Show all tabs as per role_id  */
	public function getAllTabAsPerRole($role_id)
	{
		$this->db->select('a.*, b.*');
		$this->db->from('user_permission a'); 
		$this->db->join('sidebar_tabs b','a.tab_id = b.tab_id','inner');
		$this->db->where('a.role_id', $role_id);
		$this->db->order_by("b.tab_no", "ASC");
		$query = $this->db->get();
		return $query->result() ;
	}
	
}
?>
