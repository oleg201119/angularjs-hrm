<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employer extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/employer_model');
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'employerAdd' => array(
            array(
                'field' => 'employer_name',
                'label' => 'Employer Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'employer_email',
                'label' => 'Employer Email',
                'rules' => 'trim|required|is_unique[hrm_emplyers.employer_email]'
            ),
			array( 
				'field' => 'employer_password', 
				'label' => 'Password',   
				'rules' => 'trim|required'  
			),
			array(  
				'field' => 'c_employer_password',
				'label' => 'Confirm Password', 
				'rules' => 'trim|required|matches[employer_password]'
            ),	
			array(
                'field' => 'employer_address',
                'label' => 'Address',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'employer_phone_no',
                'label' => 'Phone Number',
                'rules' => 'trim|required|numeric'
            ),
			array(
                'field' => 'employer_role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_suburb',
                'label' => 'Suburb',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_state_id',
                'label' => 'State',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_postcode',
                'label' => 'Postcode',
                'rules' => 'trim|required|max_length[4]|min_length[4]|numeric'
            ),
        ),
		'employerUpdate' => array(
            array(
                'field' => 'employer_name',
                'label' => 'Employer Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'employer_email',
                'label' => 'Employer Email',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'employer_address',
                'label' => 'Address',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'employer_phone_no',
                'label' => 'Phone Number',
                'rules' => 'trim|required|numeric'
            ),
			array(
                'field' => 'employer_role',
                'label' => 'Role',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_suburb',
                'label' => 'Suburb',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_state_id',
                'label' => 'State',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'employer_postcode',
                'label' => 'Postcode',
                'rules' => 'trim|required|max_length[4]|min_length[4]|numeric'
            ),
        )
    );
	
	
	/* Employer Details */
	public function index()
	{
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{
			$this->data['employer_result'] = $this->employer_model->show_allEmployer();
			$this->show_view_employer('employer/employer', $this->data);
		}
		else
		{	
			redirect( base_url());
		}
    }
	
	/* Add and Update Employer */
	public function employerAdd()
	{
		if($this->checkSessionEmployer())
		{
			$employer_id  = $this->uri->segment(3);
			if($employer_id)
			{
				if($this->checkEmployerEditPermission())
				{
					if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
					{
						$this->form_validation->set_rules($this->validation_rules['employerUpdate']);
						if($this->form_validation->run())
						{
							$post['employer_id'] = $employer_id;
							$post['employer_name'] = $this->input->post('employer_name');
							$post['employer_email'] = $this->input->post('employer_email');
							$post['employer_password'] = md5($this->input->post('employer_password'));
							$post['employer_address'] = $this->input->post('employer_address');
							$post['employer_phone_no'] = $this->input->post('employer_phone_no');
							$post['employer_role'] = $this->input->post('employer_role');
							$post['employer_address_two'] = $this->input->post('employer_address_two');
							$post['employer_suburb'] = $this->input->post('employer_suburb');
							$post['employer_state_id'] = $this->input->post('employer_state_id');
							$post['employer_postcode'] = $this->input->post('employer_postcode');
							$post['employer_updated_date'] = date('y-m-d');
							$this->employer_model->employerUpdate($post);						
						
							$msg = 'Employer detail update successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect('employer');
						} 
						else 
						{
							$this->data['role_list'] = $this->employer_model->getAllRoles();
							$this->data['state_list'] = $this->employer_model->getAllState();
							$this->data['editEmployer'] = $this->employer_model->editEmployer($employer_id);
							$this->show_view_employer('employer/employer_update', $this->data);
						}
					} 
					else 
					{
						$this->data['role_list'] = $this->employer_model->getAllRoles();
						$this->data['state_list'] = $this->employer_model->getAllState();
						$this->data['editEmployer'] = $this->employer_model->editEmployer($employer_id);
						$this->show_view_employer('employer/employer_update', $this->data);
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
						$this->form_validation->set_rules($this->validation_rules['employerAdd']);
						if($this->form_validation->run())
						{
							$post['super_employer_id'] = $this->user_id;
							$post['employer_name'] = $this->input->post('employer_name');
							$post['employer_email'] = $this->input->post('employer_email');
							$post['employer_password'] = md5($this->input->post('employer_password'));
							$post['employer_address'] = $this->input->post('employer_address');
							$post['employer_phone_no'] = $this->input->post('employer_phone_no');
							$post['employer_role'] = $this->input->post('employer_role');
							$post['employer_address_two'] = $this->input->post('employer_address_two');
							$post['employer_suburb'] = $this->input->post('employer_suburb');
							$post['employer_state_id'] = $this->input->post('employer_state_id');
							$post['employer_postcode'] = $this->input->post('employer_postcode');
							$post['employer_created_date'] = date('y-m-d');
							$post['employer_updated_date'] = date('y-m-d');
							$this->employer_model->employerAdd($post);
							
							$msg = 'Employer inserted successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect(base_url().'employer');
						}
						else 
						{	
							$this->data['role_list'] = $this->employer_model->getAllRoles();
							$this->data['state_list'] = $this->employer_model->getAllState();
							$this->show_view_employer('employer/employer_add', $this->data);
						}
					}
					else 
					{	
						$this->data['role_list'] = $this->employer_model->getAllRoles();
						$this->data['state_list'] = $this->employer_model->getAllState();
						$this->show_view_employer('employer/employer_add', $this->data);
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
	
	/* Delete Employer Details */
	public function delete_employerDetails()
	{
		if($this->checkSessionEmployer() && $this->checkEmployerDeletePermission())
		{
			$employer_id = $this->uri->segment(3);
			
			$this->employer_model->delete_employerDetails($employer_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'employer'); 
			}
			else
			{
				$msg = 'Employer detail remove successfully...!';					
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'employer');
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
			$post['employer_id'] = $this->input->post('id');
			$post['employer_active_status'] = $this->input->post('status');
			$post['employer_updated_date'] = date('Y-m-d');
			$this->employer_model->setStatus($post);
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
			$employer_role = $session[0]->employer_role;
			$getAllTabAsPerRole = $this->home_model->getAllTabAsPerRole($employer_role);


			$post['field_name'] = $this->input->post('field_name');
			$post['field_value'] = $this->input->post('field_value');
			$employer_result = $this->employer_model->searchFun($post);		
			$html = '';
			if($employer_result) 
			{
				foreach ($employer_result as $row)
				{ 
					
				$html .= '	<tr> 		
						<td>'.$row->employer_name.'</a></td>
						<td>'.$row->employer_email.'</a></td>
						<td>'.$row->employer_address.'</a></td>
						<td>'.$row->employer_phone_no.'</a></td>
						<td>'.$row->role_name.'</a></td>
						<td width="20%" class="text-center">';
							if($row->employer_active_status == 1){ 
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
								if($this->uri->segment(2) == $role->controller_name && $role->userEdit == '1')
								{
									
									$html .='<a href="'.base_url().'employer/employerAdd/'.$row->employer_id.'" title="Edit"><i class="fa fa-edit fa-2x "></i></a>&nbsp;&nbsp;';
									
								}
								if($this->uri->segment(2) == $role->controller_name && $role->userDelete == '1')
								{
									$html .= '<a class="confirm" onclick="return delete_employerDetails('.$row->employer_id.');" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>';
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