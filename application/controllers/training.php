<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('trainingdb');
		//$this->load->model('employer/employees_model');
	}

	public function index()
	{	 
	
		$emp_id  = $this->uri->segment(3); 
		$data['class_object']			=	$this;
		$data['course_result']			=	$this->trainingdb->Select(array('tablename'=>'course'));			
		$data['course_categories_list']	=	$this->trainingdb->Select(array('tablename'=>'course_category'));
		$this->show_view_employer('course',$data); 
		//$this->show_view_front('course',$data); 
	}
	
	/* Set Active / Inactive Status */
	public function coursePost()
	{
	   
		//echo "<pre>"; print_r($_POST);
		unset($_POST['Submit']);
		$insertArray =  $_POST;
		$this->trainingdb->saveCourse($insertArray);
		redirect('training');
	}
	
	
	
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkSessionEmployer())
		{
			$post['course_id'] 	= $this->input->post('id');
			$post['status'] 	= $this->input->post('status');
			$post['updated_on'] = date('Y-m-d H:i:s');
			$this->trainingdb->saveCourse($post);
			echo 1;
			exit();
		}
		else
		{
			redirect(base_url());
		}
	}
	
	
	
	/* Search  */
	public function searchFun()
	{
		if($this->checkSessionEmployer())
		{
			
			$session 				= $this->session->all_userdata();	
			$employer_role 			= $session[0]->emp_user_role;
			$getAllTabAsPerRole 	= $this->home_model->getAllTabAsPerRole($employer_role);


			
			$post[$this->input->post('field_name')] 	= $this->input->post('field_value');
			$course_result 	 		= $this->trainingdb->Select(array('tablename'=>'course','LikeCondition'=>$post)); 		
			$html = '';
			
			if($course_result) 
			{
				foreach ($course_result as $row)
				{ 
					
				$html .= '<tr> 		
							<td>'. substr($row->course_name,0,20) .'</a></td>
							<td>'. substr($row->course_description,0,20) .'</a></td>
							<td>'. $row->course_type .'</a></td>
							<td>';
								$course_category	= 	$this->trainingdb->Select(array('tablename'=>'course_category','AndCondition'=>array('course_category_id'=>$row->course_category_id)));
				$html .= 		$course_category[0]->course_category_name .'
								</a>
                            </td> 
							<td width="20%" class="text-center">
								<a href="#" id="active_'. $row->course_id .'"';
								
								if($row->status != 1){ 
				$html .=			'style="display:none;"';
								} 
				$html .=		   ' class="btn-group" onclick="return setStatus('. $row->course_id .' ,'. base_url().'training/setStatus,0)">
									<button class="btn btn-sm btn-success">Active</button>
									<button class="btn btn-sm btn-default">Inactive</button>
								</a>
								<a href="#" id="active_'. $row->course_id .'"';
								
								if($row->status != 0){ 
				$html .=			'style="display:none"'; 
								} 
				$html .=		   ' class="btn-group" onclick="return setStatus('. $row->course_id .' ,'. base_url().'training/setStatus,1)">
									<button class="btn btn-sm btn-default">Active</button>
									<button class="btn btn-sm btn-success">Inactive</button>
								</a>
							</td>
							<td width="10%" class="text-center">';
								
								foreach($getAllTabAsPerRole as $role)
								{
									if($this->uri->segment(1) == $role->controller_name && $role->userEdit == '1')
									{
										
				$html .=					'<span  style="cursor:pointer" onclick="updateEmployess(' .$row->course_id .')" title="Edit"><i class="fa fa-edit fa-2x "></i></span>&nbsp;&nbsp;';
											
												 /*?><a href="<?php echo base_url();?>training/index/<?php echo $row->course_id; ?>" title="Edit"><i class="fa fa-edit fa-2x "></i></a><?php */
											
										
									}
									
									if($this->uri->segment(1) == $role->controller_name && $role->userDelete == '1')
									{
										
				$html .=					'<a class="confirm" onclick="return delete_employeesDetails('. $row->course_id .');" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>';										
										
									}
								}
									
				$html .= '</td>																
					</tr> ';
				} 
			}
			echo $html;
		}
		else
		{
			redirect(base_url());
		}
	}
}
