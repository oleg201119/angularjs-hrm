<?php

class Trainingdb extends CI_Model 
{
	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*
	 ****SELECT DATA FROM SPECIFIED TABLE WITH AND CONDION AND OR CONDITION 
	 *** 
	 */
 	public function Select($ConditionArray){
		 
		$ReturnData = "";
		
		if(isset($ConditionArray['tablename']) and !empty($ConditionArray['tablename'])){
			$TableName = $ConditionArray['tablename'];
		}else{return"";}
		
		if(isset($ConditionArray['fields']) and !empty($ConditionArray['fields'])){ 
			
			$FieldsArray  = explode(",",$ConditionArray['fields'][0]);
			$Fields       = "";
			foreach($FieldsArray as $FAKey=>$FAKRow){
				$Fields.="`".$FAKRow."`, "; 	
			}
			$Fields = rtrim($Fields,", ");
			
		}else{$Fields = "*";}
		
		if(isset($ConditionArray['join']) and !empty($ConditionArray['join'])){
			$Join	= $ConditionArray['join'];
		}else{$Join = "";}
		
		if(isset($ConditionArray['AndCondition']) and !empty($ConditionArray['AndCondition'])){
			$AndCondition	= $ConditionArray['AndCondition'];
		}else{$AndCondition = "";}
		
		if(isset($ConditionArray['OrCondition']) and !empty($ConditionArray['OrCondition'])){
			$OrCondition	= $ConditionArray['OrCondition'];
		}else{$OrCondition  = "";}
		
		if(isset($ConditionArray['LikeCondition']) and !empty($ConditionArray['LikeCondition'])){
			$LikeCondition	  = $ConditionArray['LikeCondition'];
		}else{$LikeCondition  = "";}
		
		
		
		$this->db->select($Fields); 
		$this->db->from($TableName);
		
		if(!empty($Join)){
			$TablePrimaryField = ltrim($TableName,"ll_")."_id"; 
			
			foreach($Join as $JKey=>$JRow){
				$JoinTablePrimaryField = "";
				$JoinTablePrimaryField = ltrim($JRow,"ll_")."_id";
				$this->db->join($JRow,$TableName.".".$JoinTablePrimaryField." = ".$JRow.".".$JoinTablePrimaryField,'left');  
				
			}
		}
		
		if(!empty($OrCondition)){
			$this->db->where($OrCondition); 
		}		
		if(!empty($AndCondition)){
			$this->db->where($AndCondition); 
		}
		if(!empty($LikeCondition)){
			$this->db->like($LikeCondition); 
		}
		
		$query = $this->db->get(); 
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
			  $ReturnData[] = $row;
			}
			return $ReturnData;
		}else{
			return false;			
		}
		
		
	 }	 
	
	public function saveCourse($insertArray){
	   // echo "<script>alert('oops')</script>";
		$primaryFeild		=	'course_id';
		
		
		if(isset($insertArray['course_id']) and !empty($insertArray['course_id'])){
		
			$primaryFeildvalue	=	$insertArray['course_id']; unset($insertArray['course_id']);
			$this->db->where('course_id', $primaryFeildvalue);
			$this->db->update('course', $insertArray); 	
		
		}else{
			 //echo "<script>alert('oops');</script>";
			$this->db->insert('course',$insertArray); 
		}
	}
}
?>
