<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Role extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/role_model');		
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'roleAdd' => array(
            array(
                'field' => 'role_name',
                'label' => 'Role name',
                'rules' => 'trim|required|is_unique[hrm_role.role_name]'
            )
        ),
		'roleUpdate' => array(
            array(
                'field' => 'role_name',
                'label' => 'Role name',
                'rules' => 'trim|required'
            )
        )
    );
	
	
	/* Role Details */
	public function index()
	{
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{
			if (@$_POST['Submit'] == "Edit") 
			{
				// echo "<pre>";
				// print_r($_POST);
				// die();
				if($this->checkEmployerEditPermission())
				{
					$post['role_id'] = $this->input->post('role_id');
					$post['role_name'] = $this->input->post('role_name');
					$post['role_type'] = 'Employer';
					$post['role_updated_date'] = date('y-m-d');
					$this->role_model->roleUpdate($post);
					
					$this->role_model->delete_rolePermissions($post['role_id']);

					
					$tab_list = $this->role_model->getAllTabs();
					foreach($tab_list as $res)
					{
						$post_permission['role_id'] = $post['role_id'];
						$post_permission['tab_id'] = $res->tab_id;
						$post_permission['userView'] = $this->input->post('view_'.$res->tab_id);
						$post_permission['userAdd'] = $this->input->post('add_'.$res->tab_id);
						$post_permission['userEdit'] = $this->input->post('edit_'.$res->tab_id);
						$post_permission['userDelete'] = $this->input->post('delete_'.$res->tab_id);
						$this->role_model->rolePermission($post_permission);
					}
					
					// 	echo "<pre>";
					// 	print_r($post_permission);
					// die();
					$msg = 'Role detail update successfully!!';					
					$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
					redirect('role');
				}
				else
				{
					redirect(base_url());
				}
			}
			elseif(@$_POST['Submit'] == "Submit")
			{
				// echo "<pre>";
				// print_r($_POST);
				// die();
				if($this->checkEmployerAddPermission())
				{	
					$post['role_name'] = $this->input->post('a_role_name');
					$post['role_type'] = 'Employer';
					$post['role_created_date'] = date('y-m-d');
					$post['role_updated_date'] = date('y-m-d');
		
					$role_id = $this->role_model->roleAdd($post);
		
					$tab_list = $this->role_model->getAllTabs();
					foreach($tab_list as $res)
					{
						$post_permission['role_id'] = $role_id;
						$post_permission['tab_id'] = $res->tab_id;
						$post_permission['userView'] = $this->input->post('a_view_'.$res->tab_id);
						$post_permission['userAdd'] = $this->input->post('a_add_'.$res->tab_id);
						$post_permission['userEdit'] = $this->input->post('a_edit_'.$res->tab_id);
						$post_permission['userDelete'] = $this->input->post('a_delete_'.$res->tab_id);
						$this->role_model->rolePermission($post_permission);
					}
					$msg = 'Role inserted successfully!!';					
					$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
					redirect(base_url().'role');
				}
				else
				{
					redirect(base_url());
				}
			}
			else
			{
				if($this->checkEmployerViewPermission())
				{
					$this->data['tab_list'] = $this->role_model->getAllTabList($employer_role);
					$this->data['role_result'] = $this->role_model->show_allRole();					
					$this->show_view_employer('employer/role', $this->data);
				}
				else
				{	
					redirect( base_url());
				}
			}			
		}
		else
		{	
			redirect( base_url());
		}
    }
	
	/* Add and Update Role's */
	// public function roleAdd()
	// {
	// 	if($this->checkSessionEmployer())
	// 	{
	// 		$role_id = $this->uri->segment(3);
	// 		$session = $this->session->all_userdata();	
	// 		$employer_role = $session[0]->employer_role;
	// 		if($role_id)
	// 		{
	// 			if($this->checkEmployerEditPermission())
	// 			{
	// 				if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
	// 				{
	// 					$this->form_validation->set_rules($this->validation_rules['roleUpdate']);
	// 					if($this->form_validation->run())
	// 					{
	// 						$post['role_id'] = $role_id;
	// 						$post['role_name'] = $this->input->post('role_name');
	// 						$post['role_type'] = 'Employer';
	// 						$post['role_updated_date'] = date('y-m-d');
	// 						$this->role_model->roleUpdate($post);
							
	// 						$tab_list = $this->role_model->getAllTabs();
	// 						foreach($tab_list as $res)
	// 						{
	// 							$post_permission['role_id'] = $role_id;
	// 							$post_permission['tab_id'] = $res->tab_id;
	// 							$post_permission['user_permission_id'] = $this->input->post('user_permission_id_'.$res->tab_id);
	// 							$post_permission['userView'] = $this->input->post('view_'.$res->tab_id);
	// 							$post_permission['userAdd'] = $this->input->post('add_'.$res->tab_id);
	// 							$post_permission['userEdit'] = $this->input->post('edit_'.$res->tab_id);
	// 							$post_permission['userDelete'] = $this->input->post('delete_'.$res->tab_id);
	// 							$this->role_model->rolePermissionUpdate($post_permission);
	// 						}
	// 						$msg = 'Role detail update successfully!!';					
	// 						$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
	// 						redirect('role');
	// 					} 
	// 					else 
	// 					{
	// 						$this->data['editRole'] = $this->role_model->editRole($role_id);
	// 						$this->data['role_permissions'] = $this->role_model->getRolePermissionByRole($role_id, $employer_id);
	// 						$this->show_view_employer('employer/role_update', $this->data);
	// 					}
	// 				} 
	// 				else 
	// 				{
	// 					$this->data['tab_list'] = $this->role_model->getAllTabList($employer_role);
	// 					$this->data['editRole'] = $this->role_model->editRole($role_id);
	// 					$this->data['role_permissions'] = $this->role_model->getRolePermissionByRole($role_id);
	// 					$this->show_view_employer('employer/role_update', $this->data);
	// 				}					
	// 			}
	// 			else
	// 			{
	// 				redirect( base_url());
	// 			}
	// 		}
	// 		else
	// 		{
	// 			if($this->checkEmployerAddPermission())
	// 			{
	// 				if(isset($_POST['Submit']) && $_POST['Submit'] == "Submit") 
	// 				{
	// 					$this->form_validation->set_rules($this->validation_rules['roleAdd']);
	// 					if($this->form_validation->run())
	// 					{
	// 						$post['role_name'] = $this->input->post('role_name');
	// 						$post['role_type'] = 'Employer';
	// 						$post['role_created_date'] = date('y-m-d');
	// 						$post['role_updated_date'] = date('y-m-d');
							
	// 						$role_id = $this->role_model->roleAdd($post);
							
	// 						$tab_list = $this->role_model->getAllTabs();
	// 						foreach($tab_list as $res)
	// 						{
	// 							$post_permission['role_id'] = $role_id;
	// 							$post_permission['tab_id'] = $res->tab_id;
	// 							$post_permission['userView'] = $this->input->post('view_'.$res->tab_id);
	// 							$post_permission['userAdd'] = $this->input->post('add_'.$res->tab_id);
	// 							$post_permission['userEdit'] = $this->input->post('edit_'.$res->tab_id);
	// 							$post_permission['userDelete'] = $this->input->post('delete_'.$res->tab_id);
	// 							$this->role_model->rolePermission($post_permission);
	// 						}
	// 						$msg = 'Role inserted successfully!!';					
	// 						$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
	// 						redirect(base_url().'role');
	// 					}
	// 					else 
	// 					{	
	// 						$this->data['tab_list'] = $this->role_model->getAllTabList($employer_role);
	// 						$this->show_view_employer('employer/role_add', $this->data);
	// 					}
	// 				}
	// 				else 
	// 				{	
	// 					$this->data['tab_list'] = $this->role_model->getAllTabList($employer_role);
	// 					$this->show_view_employer('employer/role_add', $this->data);
	// 				}
	// 			}
	// 			else
	// 			{
	// 				redirect( base_url());
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		redirect(base_url());
	// 	}
	// }
	
	/* Delete Role Details */
	public function delete_roleDetails()
	{
		if($this->checkSessionEmployer() && $this->checkEmployerDeletePermission())
		{
			$role_id = $this->uri->segment(3);
			
			$this->role_model->delete_rolePermissions($role_id);
			$this->role_model->delete_roleDetails($role_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'role'); 
			}
			else
			{
				$msg = 'Role detail remove successfully...!';					
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'role');
			}
		}
		else
		{
			redirect(base_url());
		}		
	}
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkSessionEmployer())
		{
			$post['role_id'] = $this->input->post('id');
			$post['role_active_status'] = $this->input->post('status');
			$post['role_updated_date'] = date('Y-m-d');
			$this->role_model->setStatus($post);
			echo 1 ;
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
			
			$session = $this->session->all_userdata();	
			$employer_role = $session[0]->emp_user_role;
			$getAllTabAsPerRole = $this->home_model->getAllTabAsPerRole($employer_role);
			$post['field_name'] = $this->input->post('field_name');
			$post['field_value'] = $this->input->post('field_value');
			$role_result = $this->role_model->searchFun($post);		
			$html = '';
			if($role_result) 
			{
				foreach ($role_result as $row)
				{
					if($row->role_id != $employer_role)
					{
						$role_t = explode(',', $row->role_type);
						if(in_array('Employer', $role_t))
						{

							$html .= '<tr><td>'. $row->role_name.'</a></td>
								<td width="20%" class="text-center">';
								if($row->role_active_status == 1){ 
								 	$html .= '<div class="btn-group">';
								 	$html .= '<button class="btn btn-sm btn-success">Active</button>
											  <button class="btn btn-sm btn-default">Inactive</button>';
								 	$html .= '</div">';
								 } 
								 else
								 {
								 	$html .= '<div class="btn-group">';
								 	$html .= '<button class="btn btn-sm btn-default">Active</button>
												<button class="btn btn-sm btn-success">Inactive</button>';
								 	$html .= '</div">';
								 }
							
								$html .= '</td>
								<td width="10%" class="text-center">';
									foreach($getAllTabAsPerRole as $role)
									{
										if('role' == $role->controller_name && $role->userEdit == '1')
										{
											$html .= '<span style="cursor:pointer" onclick="updateRole('.$row->role_id.')" title="Edit"><i class="fa fa-edit fa-2x "></i></span>&nbsp;&nbsp';
										}
										if('role' == $role->controller_name && $role->userDelete == '1')
										{
											
											$html .= '<a class="confirm" onclick="return delete_roleDetails('.$row->role_id.');" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	';
										}
									}
																					
							$html .= '</td></tr>'; 
					} 
				}
			}
		}
			echo $html;
		}
		else
		{
			redirect(base_url());
		}
	}


	public function updateRole()
    {
    	$html='';
    	$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;

		$role_id = $this->input->post('role_id');
    	$tab_list = $this->role_model->getAllTabList($employer_role);
		$editRole = $this->role_model->editRole($role_id);
		$role_permissions = $this->role_model->getRolePermissionByRole($role_id);
		$html .= '<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data"><div class="box-body">
			<input name="role_id" class="form-control" type="hidden" id="role_id" value="'.$editRole[0]->role_id.'" />
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Name<span class="text-danger">*</span></label>
												<input name="role_name" class="form-control" type="text" id="role_name" value="'.$editRole[0]->role_name.'" />
													</div>
										</div>
									</div>	
									<div class="row col-md-12">
										<div class="table-responsive">
											<div class="box-header">
												<label>Permission</label> 
											</div><!-- form start -->
											<table class="table table-bordered table-striped">
												<thead>
													<tr>  		
														<th>Tab Name</th>
														<th>View</th>
														<th>Add</th>  			
														<th>Edit</th>  			
														<th>Delete</th>  			
													</tr>  			
												</thead>
												<tbody>';
		foreach($role_permissions as $res)
		{
          foreach($tab_list as $t_list)
		{
			if($t_list->tab_id == $res->tab_id)
			{
			
					$html .= '<tr><td>';
					$html .= $res->tabname;
					$html .= '<input type="hidden" name="user_permission_id_'.$res->tab_id.'" id="user_permission_id_'.$res->tab_id.'" value="$res->user_permission_id" ></td><td><input type="checkbox" name="view_'.$res->tab_id.'" id="view_'.$res->tab_id.'" value="1" '; 
						if($res->userView == '1'){ $html .= 'checked';}
							$html .= '></td>';
							$html .= '<td><input type="checkbox" name="add_'.$res->tab_id.'" id="add_'.$res->tab_id.'" value="1" '; 
							if($res->userAdd == '1'){ $html .= 'checked'; } 
							$html .= '></td>';
							$html .= '<td><input type="checkbox" name="edit_'.$res->tab_id.'" id="edit_'.$res->tab_id.'" value="1" '; 
							if($res->userEdit == '1'){ $html .= 'checked'; } 
							$html .= '></td>';
							$html .= '<td><input type="checkbox" name="delete_'.$res->tab_id.'" id="delete_'.$res->tab_id.'" value="1" ';
							if($res->userDelete == '1'){ $html .= 'checked'; } 

							$html .= '></td></tr>'; 
						
					}
				}																			
			}
			$html .='</tbody>
</table>
<div class="row"></div>
<!-- Pagination end -->
</div><!-- /.box-body -->	
</div><!-- /.box-body -->	
</div><!-- /.box-body -->								
<div class="box-footer">
<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Edit" >Update</button>
<!--
<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>role">Cancel</a>
-->
</div>								
</form>
</div>
</div>
</div>';
			echo $html;
		}
    
}

/* End of file */?>