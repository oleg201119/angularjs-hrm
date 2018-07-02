<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employees extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/employees_model');
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'employeesAdd' => array(
            array(
                'field' => 'emp_fname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ),
             array(
                'field' => 'emp_lname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'emp_email',
                'label' => 'Email',
                'rules' => 'trim|required|is_unique[hrm_employees.emp_email]'
            )
        ),
		'employeesUpdate' => array(
             array(
                'field' => 'emp_fname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ),
             array(
                'field' => 'emp_lname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            )
        )
    );
	
	
	/* Employer Details */
	public function index()
	{ 
		
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{
			$emp_id  = $this->uri->segment(3);
			if (isset($_POST['Submit']) && $_POST['Submit'] == "Edit") 
			{
				if($this->checkEmployerEditPermission())
				{
					// echo "<pre>";
					// print_r($_POST);
					// die();
					//$post['emp_id'] = $emp_id;
					//$post['emp_super_employer_id'] = $this->user_id;
					$post['emp_id'] 			= $this->input->post('emp_id');
					$post['emp_fname']			= $this->input->post('emp_fname');
					$post['emp_lname']			= $this->input->post('emp_lname');
					$post['emp_email'] 			= $this->input->post('emp_email');
					$post['emp_phone'] 			= $this->input->post('emp_phone');
					$post['emp_address']		= $this->input->post('emp_address');
					$post['emp_suburb'] 		= $this->input->post('emp_suburb');
					$post['emp_state_id'] 		= $this->input->post('emp_state_id');
					$post['emp_postcode'] 		= $this->input->post('emp_postcode');
					$post['emp_title'] 			= $this->input->post('emp_title');
					$post['emp_gender'] 		= $this->input->post('emp_gender');
					$post['emp_user_role'] 		= $this->input->post('empw_user_role');
					$post['emp_dob'] 			= date('Y-m-d', strtotime($this->input->post('emp_dob')));
					$post['emp_age'] 			= 0;
					$post['emp_nationality'] 	= $this->input->post('emp_nationality');
					$post['emp_visa_type'] 		= $this->input->post('emp_visa_type');
					$post['emp_visa_expiry'] 	= date('Y-m-d', strtotime($this->input->post('emp_visa_expiry')));
					$post['emp_updated_date'] 	= date('y-m-d');
					$this->employees_model->employeesUpdate($post);

					$post_w['empw_employees_id'] = $post['emp_id'];
					$post_w['empw_start_date'] 	= date('Y-m-d', strtotime($this->input->post('empw_start_date')));
					$post_w['empw_end_date'] 	= date('Y-m-d', strtotime($this->input->post('empw_end_date')));
					$post_w['empw_hourly_rate'] = $this->input->post('empw_hourly_rate');
					$post_w['empw_weekly_rate'] = $this->input->post('empw_weekly_rate');
					$post_w['empw_anual_rate'] 	= $this->input->post('empw_anual_rate');
					$post_w['empw_bonus'] 		= $this->input->post('empw_bonus');
					//$post_w['empw_commission'] = $this->input->post('empw_commission');
					$post_w['empw_user_role'] 	= $this->input->post('empw_user_role');
					$post_w['empw_hours_per_week'] = $this->input->post('empw_hours_per_week');
					$post_w['empw_position'] 	= $this->input->post('empw_position');
					$post_w['empw_level']		= $this->input->post('empw_level');
					$post_w['empw_department'] 	= $this->input->post('empw_department');
					$post_w['empw_state'] 		= $this->input->post('empw_state');
					$post_w['empw_entitle'] 	= $this->input->post('empw_entitle');
					$post_w['empw_emp_type'] 	= $this->input->post('empw_emp_type');
					// $post_w['empw_anual_leave_owing'] = $this->input->post('empw_anual_leave_owing');
					// $post_w['empw_personal_leave_owing'] = $this->input->post('empw_personal_leave_owing');
					$post_w['empw_updated_date'] = date('y-m-d');
					$this->employees_model->employeesWorkUpdate($post_w);

					$msg = 'Employees detail update successfully!!';					
					$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
					redirect('employees');
				}
				else
				{
					redirect(base_url());
				}
			}
			elseif(isset($_POST['Submit']) && $_POST['Submit'] == "Submit")
			{
				if($this->checkEmployerAddPermission())
				{	
					$post['emp_super_employer_id'] = $this->user_id;
					$post['emp_fname'] = $this->input->post('emp_fname');
					$post['emp_lname'] = $this->input->post('emp_lname');
					$post['emp_email'] = $this->input->post('emp_email');
					$post['emp_phone'] = $this->input->post('emp_phone');
					$post['emp_address'] = $this->input->post('emp_address');
					$post['emp_suburb'] = $this->input->post('emp_suburb');
					$post['emp_state_id'] = $this->input->post('emp_state_id');
					$post['emp_postcode'] = $this->input->post('emp_postcode');
					$post['emp_title'] = $this->input->post('emp_title');
					$post['emp_gender'] = $this->input->post('emp_gender');
					$post['emp_password'] = md5($this->input->post('emp_password'));
					$post['emp_user_role'] = $this->input->post('empw_user_role');
					$post['emp_dob'] = date('Y-m-d', strtotime($this->input->post('emp_dob')));
					$post['emp_age'] = 0;
					$post['emp_nationality'] = $this->input->post('emp_nationality');
					$post['emp_visa_type'] = $this->input->post('emp_visa_type');
					$post['emp_visa_expiry'] = date('Y-m-d', strtotime($this->input->post('emp_visa_expiry')));
					$post['emp_created_date'] = date('y-m-d');
					$post['emp_updated_date'] = date('y-m-d');
					$emp_id = $this->employees_model->employeesAdd($post);

					$post_w['empw_employees_id'] = $emp_id;
					$post_w['empw_start_date'] = date('Y-m-d', strtotime($this->input->post('empw_start_date')));
					$post_w['empw_end_date'] = date('Y-m-d', strtotime($this->input->post('empw_end_date')));
					$post_w['empw_hourly_rate'] = $this->input->post('empw_hourly_rate');
					$post_w['empw_weekly_rate'] = $this->input->post('empw_weekly_rate');
					$post_w['empw_anual_rate'] = $this->input->post('empw_anual_rate');
					$post_w['empw_bonus'] = $this->input->post('empw_bonus');
					$post_w['empw_user_role'] = $this->input->post('empw_user_role');
					//$post_w['empw_commission'] = $this->input->post('empw_commission');
					$post_w['empw_hours_per_week'] = $this->input->post('empw_hours_per_week');
					$post_w['empw_position'] = $this->input->post('empw_position');
					$post_w['empw_level'] = $this->input->post('empw_level');
					$post_w['empw_department'] = $this->input->post('empw_department');
					$post_w['empw_state'] = $this->input->post('empw_state');
					$post_w['empw_entitle'] = $this->input->post('empw_entitle');
					$post_w['empw_emp_type'] = $this->input->post('empw_emp_type');
					// $post_w['empw_anual_leave_owing'] = $this->input->post('empw_anual_leave_owing');
					// $post_w['empw_personal_leave_owing'] = $this->input->post('empw_personal_leave_owing');
					$post_w['empw_created_date'] = date('y-m-d');
					$post_w['empw_updated_date'] = date('y-m-d');
					$this->employees_model->employeesWorkAdd($post_w);

					$msg = 'Employees details inserted successfully!!';					
					$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
					redirect(base_url().'employees');
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
					$this->data['position_list'] = $this->employees_model->getAllPosition();
					$this->data['level_list'] = $this->employees_model->getAllLevel();
					$this->data['department_list'] = $this->employees_model->getAllDepartments();
					$this->data['state_list'] = $this->employees_model->getAllState();
					$this->data['entitle_list'] = $this->employees_model->getAllEnTitle();
					$this->data['employee_type_list'] = $this->employees_model->getAllEmployeeType();
					$this->data['country_list'] = $this->employees_model->getAllCountry();
					$this->data['user_role'] = $this->employees_model->getAllRole();
					// echo "<pre>";
					// print_r($this->data['role']);
					// die();
					//$this->data['editEmployees'] = $this->employees_model->editEmployees($emp_id);
	

					$this->data['employees_result'] = $this->employees_model->show_allEmployees();
					$this->data['state_list'] = $this->employees_model->getAllState();
					$this->show_view_employer('employer/employees', $this->data);
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


    public function updateEmployess()
    {
    	if($this->checkEmployerEditPermission())
    	{
	    	//echo $this->employer_role;die();
	    	$session = $this->session->all_userdata();	
	    	// echo "<pre>";
	    	// print_r();
	    	// die();
	    	$this->employer_role = $session[0]->emp_user_role;
	    	$employer_role = $session[0]->emp_user_role;
	    	$emp_id = $this->input->post('emp_id');
	    	$editEmployees = $this->employees_model->editEmployees($emp_id);
	    	$position_list = $this->employees_model->getAllPosition();
			$level_list = $this->employees_model->getAllLevel();
			$department_list = $this->employees_model->getAllDepartments();
			$state_list = $this->employees_model->getAllState();
			$entitle_list = $this->employees_model->getAllEnTitle();
			$employee_type_list = $this->employees_model->getAllEmployeeType();
			$country_list = $this->employees_model->getAllCountry();		
			$user_role = $this->employees_model->getAllRole();		
	    	$html = '';
	    	foreach ($editEmployees as $value)
	    	{
	    		$html .= '
			<form class="form-horizontal" id="employee_add_form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						<input type="hidden" name="emp_id" value="'.$value->emp_id.'" placeholder="" >
							<ul class="nav nav-tabs">
					            <li id="t11"><a data-toggle="tab" href="#tab11">Personal Detail</a></li>
						            <li id="t22" ><a data-toggle="tab" href="#tab22">Work Detail</a></li>
					        </ul>
					        <div class="tab-content">
				          		<div id="tab11" class="tab-pane fade in active">
				          			<div class="col-md-12 tabborder">
				          				<div class="row">
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_fname">First Name</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_fname" id="emp_fname" value="'.$value->emp_fname.'" placeholder="" >
														<span id="errormsg_emp_fname" style="display:none;" class="text-danger" >Enter First Name</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_lname">Last Name</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_lname" id="emp_lname" placeholder="" value="'.$value->emp_lname.'" >
														<span id="errormsg_emp_lname" style="display:none;" class="text-danger" >Enter Last Name</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_email">Email</label>
													<div class="col-sm-8">
														<input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="" value="'.$value->emp_email.'">
														<span id="errormsg_emp_email" style="display:none;" class="text-danger" >Enter Email</span>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_address">Address</label>
													<div class="col-sm-8">
														<input type="text" maxlength="256" class="form-control" name="emp_address" id="emp_address" placeholder="" value="'.$value->emp_address.'" >
														<span id="errormsg_emp_address" style="display:none;" class="text-danger" >Enter Address</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_suburb">Suburb</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_suburb" id="emp_suburb" placeholder="" value="'.$value->emp_suburb.'" >
														<span id="errormsg_emp_suburb" style="display:none;" class="text-danger" >Enter Suburb</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_state_id">State</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_state_id" id="emp_state_id">
															<option value=""></option>';

																if(!empty($state_list))
																{
																	foreach ($state_list as $s_list) 
																	{
																			$html .= '<option value="'.$s_list->state_id.'"';
																			if($value->emp_state_id == $s_list->state_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$s_list->state_name.'</option>';
																	}
																}
														$html .= '</select>
														<span id="errormsg_emp_state_id" style="display:none;" class="text-danger" >Select State</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_postcode">Postcode</label>
													<div class="col-sm-8">
														<input type="text" pattern="\d*" min="0" maxlength="4" class="form-control" name="emp_postcode" id="emp_postcode" placeholder="" value="'.$value->emp_postcode.'" >
														<span id="errormsg_emp_postcode" style="display:none;" class="text-danger" >Enter Postcode</span>
													</div>
												</div>
					          				</div>	
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_title">Title</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_title" id="emp_title" >
															<option value=""></option>';
															$html .= '<option value="Miss"';
																			if($value->emp_title == "Miss")
																			{
																				$html .='selected';
																			}

															$html .= '>Miss</option>';
															$html .= '<option value="Mr"';
																			if($value->emp_title == "Mr")
																			{
																				$html .='selected';
																			}

															$html .= '>Mr</option>';
															$html .= '<option value="Mrs"';
																			if($value->emp_title == "Mrs")
																			{
																				$html .='selected';
																			}

															$html .= '>Mrs</option>';
															$html .= '<option value="Ms"';
																			if($value->emp_title == "Ms")
																			{
																				$html .='selected';
																			}

															$html .= '>Ms</option>';
														$html .='</select>
														<span id="errormsg_emp_title" style="display:none;" class="text-danger" >Select Title</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_gender">Gender</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_gender" id="emp_gender">
															<option value=""></option>';

															$html .= '<option value="Male"';
																			if($value->emp_gender == "Male")
																			{
																				$html .='selected';
																			}

															$html .= '>Male</option>';
															$html .= '<option value="Female"';
																			if($value->emp_gender == "Female")
																			{
																				$html .='selected';
																			}

																			$html .= '>Female</option>';
														$html .= '</select>
														<span id="errormsg_emp_gender" style="display:none;" class="text-danger" >Select Gender</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_phone">Phone</label>
													<div class="col-sm-8">
														<input type="text" pattern="\d*" min="0" maxlength="12" class="form-control" name="emp_phone" id="emp_phone" placeholder="" value="'.$value->emp_phone.'">
														<span id="errormsg_emp_phone" style="display:none;" class="text-danger" >Enter Phone</span>
													</div>
												</div>
												<div class="form-group row">
					                                <label class="control-label col-sm-4" for="emp_dob">Date of Birth</label>	                                
					                                <div class="col-sm-8">
					                                    <div class="input-group date" onclick="show_calander('.$value->emp_id.')" id="emp_dob'.$value->emp_id.'">
															<input type="text" class="form-control" name="emp_dob" id="emp_dob" placeholder="" value="'.date("m-d-Y", strtotime($value->emp_dob)).'" >
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<span id="errormsg_emp_dob" style="display:none;" class="text-danger" >Enter Date of Birth</span>
					                                </div>
					                            </div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_nationality">Nationality</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_nationality" id="emp_nationality" >
															<option value=""></option>';
																if(!empty($country_list))
																{
																	foreach ($country_list as $p_list)
																	{
																		$html .= '<option value="'.$p_list->country_id.'"';
																			if($value->emp_nationality == $p_list->country_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$p_list->country_name.'</option>';
																	}
																}
														$html .= '</select>
														<span id="errormsg_emp_nationality" style="display:none;" class="text-danger" >Select Nationality</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_visa_type">VISA Type</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_visa_type" id="emp_visa_type" placeholder="" value="'.$value->emp_visa_type.'" >
														<span id="errormsg_emp_visa_type" style="display:none;" class="text-danger" >Enter VISA Type</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_visa_expiry">Visa Expiry</label>
													 <div class="col-sm-8">
													 	 <div class="input-group date" id="emp_visa_expiry'.$value->emp_id.'" onclick="show_calander('.$value->emp_id.')">
															<input type="text" class="form-control" name="emp_visa_expiry" id="emp_visa_expiry" placeholder="" value="'.date("m-d-Y", strtotime($value->emp_visa_expiry)).'">
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<span id="errormsg_emp_visa_expiry" style="display:none;" class="text-danger" >Enter Visa Expiry</span>
					                                </div>
												</div>
					          				</div>	
				          				</div>
				          			</div>
				          		</div>
				          		<div id="tab22" class="tab-pane fade">
				          			<div class="col-md-12 tabborder">
				          				<div class="row">
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_start_date">Start Date</label>
													<div class="col-sm-8">
														<div class="input-group date" id="empw_start_date'.$value->emp_id.'" onclick="show_calander('.$value->emp_id.')">
															<input type="text" class="form-control" name="empw_start_date" id="empw_start_date" placeholder="" value="'.date("m-d-Y", strtotime($value->empw_start_date)).'" >
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<span id="errormsg_empw_start_date" style="display:none;" class="text-danger" >Enter Start Date</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_end_date">End Date</label>
													<div class="col-sm-8">
														<div class="input-group date" id="empw_end_date'.$value->emp_id.'">
															<input type="text" class="form-control" name="empw_end_date" onclick="show_calander('.$value->emp_id.')" id="empw_end_date" placeholder="" value="'.date("m-d-Y", strtotime($value->empw_end_date)).'" >
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<span id="errormsg_empw_end_date" style="display:none;" class="text-danger" >Enter End Date</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_hourly_rate">Hourly rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_hourly_rate" id="empw_hourly_rate" placeholder="" value="'.$value->empw_hourly_rate.'" >
														<span id="errormsg_empw_hourly_rate" style="display:none;" class="text-danger" >Enter Hourly rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_weekly_rate">Weekly rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_weekly_rate" id="empw_weekly_rate" placeholder="" value="'.$value->empw_weekly_rate.'" >
														<span id="errormsg_empw_weekly_rate" style="display:none;" class="text-danger" >Enter Weekly rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_anual_rate">Annual rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_anual_rate" id="empw_anual_rate" placeholder="" value="'.$value->empw_anual_rate.'" >
														<span id="errormsg_empw_anual_rate" style="display:none;" class="text-danger" >Enter Annual rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_bonus">Bonus | Commission</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_bonus" id="empw_bonus" placeholder="" value="'.$value->empw_bonus.'">
														<span id="errormsg_empw_bonus" style="display:none;" class="text-danger" >Enter Bonus</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_user_role">User Role</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_user_role" id="empw_user_role" >';
															
																if(!empty($user_role))
																{
																	foreach ($user_role as $r_list) 
																	{
																		$role_t = explode(',', $r_list->role_type);
																		if(in_array('Employer', $role_t))
																		{
																			$html .= '<option value="'.$r_list->role_id.'"';
																			if($value->empw_user_role == $r_list->role_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$r_list->role_name.'</option>';
																		}
																	}
																}
														$html .='</select>
														<span id="errormsg_empw_position" style="display:none;" class="text-danger" >Select Position</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_hours_per_week">Hours/week</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_hours_per_week" id="empw_hours_per_week" placeholder="" value="'.$value->empw_hours_per_week.'">
														<span id="errormsg_empw_hours_per_week" style="display:none;" class="text-danger" >Enter Hours/week</span>
													</div>
												</div>
					          				</div>	
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_position">Position</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_position" id="empw_position" >';
															
																if(!empty($position_list))
																{
																	foreach ($position_list as $p_list) 
																	{
																		$html .= '<option value="'.$p_list->position_id.'"';
																			if($value->empw_position == $p_list->position_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$p_list->position_name.'</option>';
																	}
																}
														$html .='</select>
														<span id="errormsg_empw_position" style="display:none;" class="text-danger" >Select Position</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_level">Level</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_level" id="empw_level" >
															<option value=""></option>';
															
																if(!empty($level_list))
																{
																	foreach ($level_list as $l_list) 
																	{
																		$html .= '<option value="'.$l_list->level_id.'"';
																			if($value->empw_level == $l_list->level_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$l_list->level_name.'</option>';
																	}
																}
														$html .='
														</select>
														<span id="errormsg_empw_level" style="display:none;" class="text-danger" >Select Level</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_department">Department</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_department" id="empw_department" >
															<option value=""></option>
															';
															
																if(!empty($department_list))
																{
																	foreach ($department_list as $d_list) 
																	{
																		$html .= '<option value="'.$d_list->department_id.'"';
																			if($value->empw_department == $d_list->department_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$d_list->department_name.'</option>';
																	}
																}
														$html .='
														</select>
														<span id="errormsg_empw_department" style="display:none;" class="text-danger" >Select Department</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_state">State</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_state" id="empw_state" >
															<option value=""></option>
															';
															
																if(!empty($state_list))
																{
																	foreach ($state_list as $s_list) 
																	{
																		$html .= '<option value="'.$s_list->state_id.'"';
																			if($value->empw_state == $s_list->state_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$s_list->state_name.'</option>';
																	}
																}
														$html .='
															
														</select>
														<span id="errormsg_empw_state" style="display:none;" class="text-danger" >Select State</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_entitle">Entitle</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_entitle" id="empw_entitle" >
															<option value=""></option>
															';
															
																if(!empty($entitle_list))
																{
																	foreach ($entitle_list as $e_list) 
																	{
																		$html .= '<option value="'.$e_list->entitle_id.'"';
																			if($value->empw_entitle == $e_list->entitle_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$e_list->entitle_name.'</option>';
																	}
																}
														$html .='
														</select>
														<span id="errormsg_empw_entitle" style="display:none;" class="text-danger" >Select Entitle</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_emp_type">Employee Type</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_emp_type" id="empw_emp_type" >
															';
															
																if(!empty($employee_type_list))
																{
																	foreach ($employee_type_list as $et_list) 
																	{
																		$html .= '<option value="'.$et_list->emp_type_id.'"';
																			if($value->empw_emp_type == $et_list->emp_type_id)
																			{
																				$html .='selected';
																			}

																			$html .= '>'.$et_list->emp_type_name.'</option>';
																	}
																}
														$html .='

														</select>
														<span id="errormsg_empw_emp_type" style="display:none;" class="text-danger" >Select Employee Type</span>
													</div>
												</div>
												<div class="form-group row" disabled>
													<label class="control-label col-sm-4" for="empw_anual_leave_owing">Annual leave</label>
													<div class="col-sm-8">
														<input type="text" disabled class="form-control" name="empw_anual_leave_owing" id="empw_anual_leave_owing" placeholder="" value="" >
														<span id="errormsg_empw_anual_leave_owing" style="display:none;" class="text-danger" >Enter Annual leave</span>
													</div>
												</div>
												<div class="form-group row" disabled>
													<label class="control-label col-sm-4" for="empw_personal_leave_owing">Personal leave</label>
													<div class="col-sm-8">
														<input type="text" disabled class="form-control" name="empw_personal_leave_owing" id="empw_personal_leave_owing" placeholder="" value="" >
														<span id="errormsg_empw_personal_leave_owing" style="display:none;" class="text-danger" >Enter Personal leave</span>
													</div>
												</div>
					          				</div>	
				          				</div>
				          			</div>
				          		</div>
				          	</div>	
							<div class="col-md-4 col-md-offset-5 butsave">
						        <button type="submit" name="Submit" id="Submit_btn" value="Edit" class="btn btn-primary">Submit</button>
						        <button type="reset" id="Clear_btn" class="btn btn-info">Clear</button>
						    </div>
						</form>
	    		';
	    	}
	    	echo $html;
	    }
    }
	
	/* Add and Update Employees */
	/**********************************************************************************
	public function employeesAdd()
	{
		if($this->checkSessionEmployer())
		{
			$emp_id  = $this->uri->segment(3);
			if($emp_id)
			{
				if($this->checkEmployerEditPermission())
				{
					if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
					{
						$this->form_validation->set_rules($this->validation_rules['employeesUpdate']);
						if($this->form_validation->run())
						{
							$post['emp_id'] = $emp_id;
							//$post['emp_super_employer_id'] = $this->user_id;
							$post['emp_fname'] = $this->input->post('emp_fname');
							$post['emp_lname'] = $this->input->post('emp_lname');
							$post['emp_email'] = $this->input->post('emp_email');
							$post['emp_phone'] = $this->input->post('emp_phone');
							$post['emp_address'] = $this->input->post('emp_address');
							$post['emp_suburb'] = $this->input->post('emp_suburb');
							$post['emp_state_id'] = $this->input->post('emp_state_id');
							$post['emp_postcode'] = $this->input->post('emp_postcode');
							$post['emp_title'] = $this->input->post('emp_title');
							$post['emp_gender'] = $this->input->post('emp_gender');
							$post['emp_dob'] = date('Y-m-d', strtotime($this->input->post('emp_dob')));
							//$post['emp_age'] = $this->input->post('emp_age');
							$post['emp_nationality'] = $this->input->post('emp_nationality');
							$post['emp_visa_type'] = $this->input->post('emp_visa_type');
							$post['emp_visa_expiry'] = date('Y-m-d', strtotime($this->input->post('emp_visa_expiry')));
							$post['emp_updated_date'] = date('y-m-d');
							$this->employees_model->employeesUpdate($post);

							$post_w['empw_employees_id'] = $emp_id;
							$post_w['empw_start_date'] = date('Y-m-d', strtotime($this->input->post('empw_start_date')));
							$post_w['empw_end_date'] = date('Y-m-d', strtotime($this->input->post('empw_end_date')));
							$post_w['empw_hourly_rate'] = $this->input->post('empw_hourly_rate');
							$post_w['empw_weekly_rate'] = $this->input->post('empw_weekly_rate');
							$post_w['empw_anual_rate'] = $this->input->post('empw_anual_rate');
							$post_w['empw_bonus'] = $this->input->post('empw_bonus');
							$post_w['empw_commission'] = $this->input->post('empw_commission');
							$post_w['empw_hours_per_week'] = $this->input->post('empw_hours_per_week');
							$post_w['empw_position'] = $this->input->post('empw_position');
							$post_w['empw_level'] = $this->input->post('empw_level');
							$post_w['empw_department'] = $this->input->post('empw_department');
							$post_w['empw_state'] = $this->input->post('empw_state');
							$post_w['empw_entitle'] = $this->input->post('empw_entitle');
							$post_w['empw_emp_type'] = $this->input->post('empw_emp_type');
							$post_w['empw_anual_leave_owing'] = $this->input->post('empw_anual_leave_owing');
							$post_w['empw_personal_leave_owing'] = $this->input->post('empw_personal_leave_owing');
							$post_w['empw_updated_date'] = date('y-m-d');
							$this->employees_model->employeesWorkUpdate($post_w);

							$msg = 'Employees detail update successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect('employees');
						} 
						else 
						{
							$this->data['editEmployees'] = $this->employees_model->editEmployees($emp_id);

							$this->data['position_list'] = $this->employees_model->getAllPosition();
							$this->data['level_list'] = $this->employees_model->getAllLevel();
							$this->data['department_list'] = $this->employees_model->getAllDepartments();
							$this->data['state_list'] = $this->employees_model->getAllState();
							$this->data['entitle_list'] = $this->employees_model->getAllEnTitle();
							$this->data['employee_type_list'] = $this->employees_model->getAllEmployeeType();
							$this->data['country_list'] = $this->employees_model->getAllCountry();
							$this->show_view_employer('employer/employees_update', $this->data);
						}
					} 
					else 
					{
						$this->data['editEmployees'] = $this->employees_model->editEmployees($emp_id);
						
						$this->data['position_list'] = $this->employees_model->getAllPosition();
						$this->data['level_list'] = $this->employees_model->getAllLevel();
						$this->data['department_list'] = $this->employees_model->getAllDepartments();
						$this->data['state_list'] = $this->employees_model->getAllState();
						$this->data['entitle_list'] = $this->employees_model->getAllEnTitle();
						$this->data['employee_type_list'] = $this->employees_model->getAllEmployeeType();
						$this->data['country_list'] = $this->employees_model->getAllCountry();
						
						$this->show_view_employer('employer/employees_update', $this->data);
					}
				}
				else
				{
					redirect(base_url());
				}
			}
			else
			{
				if($this->checkEmployerAddPermission())
				{
					if(isset($_POST['Submit']) && $_POST['Submit'] == "Submit") 
					{
						$this->form_validation->set_rules($this->validation_rules['employeesAdd']);
						if($this->form_validation->run())
						{
							$post['emp_super_employer_id'] = $this->user_id;
							$post['emp_fname'] = $this->input->post('emp_fname');
							$post['emp_lname'] = $this->input->post('emp_lname');
							$post['emp_email'] = $this->input->post('emp_email');
							$post['emp_phone'] = $this->input->post('emp_phone');
							$post['emp_address'] = $this->input->post('emp_address');
							$post['emp_suburb'] = $this->input->post('emp_suburb');
							$post['emp_state_id'] = $this->input->post('emp_state_id');
							$post['emp_postcode'] = $this->input->post('emp_postcode');
							$post['emp_title'] = $this->input->post('emp_title');
							$post['emp_gender'] = $this->input->post('emp_gender');
							$post['emp_dob'] = date('Y-m-d', strtotime($this->input->post('emp_dob')));
							//$post['emp_age'] = $this->input->post('emp_age');
							$post['emp_nationality'] = $this->input->post('emp_nationality');
							$post['emp_visa_type'] = $this->input->post('emp_visa_type');
							$post['emp_visa_expiry'] = date('Y-m-d', strtotime($this->input->post('emp_visa_expiry')));
							$post['emp_created_date'] = date('y-m-d');
							$post['emp_updated_date'] = date('y-m-d');
							$post['emp_password'] = '';
							$emp_id = $this->employees_model->employeesAdd($post);

							$post_w['empw_employees_id'] = $emp_id;
							$post_w['empw_start_date'] = date('Y-m-d', strtotime($this->input->post('empw_start_date')));
							$post_w['empw_end_date'] = date('Y-m-d', strtotime($this->input->post('empw_end_date')));
							$post_w['empw_hourly_rate'] = $this->input->post('empw_hourly_rate');
							$post_w['empw_weekly_rate'] = $this->input->post('empw_weekly_rate');
							$post_w['empw_anual_rate'] = $this->input->post('empw_anual_rate');
							$post_w['empw_bonus'] = $this->input->post('empw_bonus');
							$post_w['empw_commission'] = $this->input->post('empw_commission');
							$post_w['empw_hours_per_week'] = $this->input->post('empw_hours_per_week');
							$post_w['empw_position'] = $this->input->post('empw_position');
							$post_w['empw_level'] = $this->input->post('empw_level');
							$post_w['empw_department'] = $this->input->post('empw_department');
							$post_w['empw_state'] = $this->input->post('empw_state');
							$post_w['empw_entitle'] = $this->input->post('empw_entitle');
							$post_w['empw_emp_type'] = $this->input->post('empw_emp_type');
							$post_w['empw_anual_leave_owing'] = $this->input->post('empw_anual_leave_owing');
							$post_w['empw_personal_leave_owing'] = $this->input->post('empw_personal_leave_owing');
							$post_w['empw_created_date'] = date('y-m-d');
							$post_w['empw_updated_date'] = date('y-m-d');
							$this->employees_model->employeesWorkAdd($post_w);

							$msg = 'Employees details inserted successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect(base_url().'employees');
						}
						else 
						{	
							$this->data['position_list'] = $this->employees_model->getAllPosition();
							$this->data['level_list'] = $this->employees_model->getAllLevel();
							$this->data['department_list'] = $this->employees_model->getAllDepartments();
							$this->data['state_list'] = $this->employees_model->getAllState();
							$this->data['entitle_list'] = $this->employees_model->getAllEnTitle();
							$this->data['employee_type_list'] = $this->employees_model->getAllEmployeeType();
							$this->data['country_list'] = $this->employees_model->getAllCountry();
							$this->show_view_employer('employer/employees_add', $this->data);
						}
					}
					else 
					{
						$this->data['position_list'] = $this->employees_model->getAllPosition();
						$this->data['level_list'] = $this->employees_model->getAllLevel();
						$this->data['department_list'] = $this->employees_model->getAllDepartments();
						$this->data['state_list'] = $this->employees_model->getAllState();
						$this->data['entitle_list'] = $this->employees_model->getAllEnTitle();
						$this->data['employee_type_list'] = $this->employees_model->getAllEmployeeType();
						$this->data['country_list'] = $this->employees_model->getAllCountry();
						$this->show_view_employer('employer/employees_add', $this->data);
					}
				}
				else
				{
					redirect(base_url());
				}
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	**********************************************************************************/
	/* Delete Employees Details */
	public function delete_employeesDetails()
	{
		if($this->checkSessionEmployer() && $this->checkEmployerDeletePermission())
		{
			$emp_id = $this->uri->segment(3);
			
			$this->employees_model->delete_employeesDetails($emp_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'employees'); 
			}
			else
			{
				$msg = 'Employees detail remove successfully...!';					
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'employees');
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
			$post['emp_id'] = $this->input->post('id');
			$post['emp_active_status'] = $this->input->post('status');
			$post['emp_updated_date'] = date('Y-m-d');
			$this->employees_model->setStatus($post);
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
			$employees_result = $this->employees_model->searchFun($post);		
			$html = '';
			if($employees_result) 
			{
				foreach ($employees_result as $row)
				{ 
					
				$html .= '	<tr> 		
						<td>'.$row->emp_fname.' '.$row->emp_lname.'</a></td>
						<td>'.$row->emp_phone.'</a></td>
						<td>'.$row->emp_email.'</a></td>
						<td>'.$row->state_name.'</a></td>
						<td>'.$row->emp_gender.'</a></td>
						<td width="20%" class="text-center">';
							if($row->emp_active_status == 1){ 
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
								if('employees' == $role->controller_name && $role->userEdit == '1')
								{
									
									$html .='<span  style="cursor:pointer" onclick="updateEmployess('.$row->emp_id.')" title="Edit"><i class="fa fa-edit fa-2x "></i></span>&nbsp;&nbsp;';
									
								}
								if('employees' == $role->controller_name && $role->userDelete == '1')
								{
									$html .= '<a class="confirm" onclick="return delete_employeesDetails('.$row->emp_id.');" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>';
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

/* End of file */?>
