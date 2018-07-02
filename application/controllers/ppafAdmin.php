<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PpafAdmin extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/ppafadmin_model');
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'ppafAdminAdd' => array(
            array(
                'field' => 'ppaf_a_page',
                'label' => 'Page',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'ppaf_a_question',
                'label' => 'Question',
                'rules' => 'trim|required'
            ),			
        ),
		'ppafAdminUpdate' => array(
            array(
                'field' => 'ppaf_a_page',
                'label' => 'Page',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'ppaf_a_question',
                'label' => 'Question',
                'rules' => 'trim|required'
            ),			
        )
    );
	
	
	/* ppafAdmin Details */
	public function index()
	{
		
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{			
			$this->data['ppafAdmin_result'] = $this->ppafadmin_model->show_allPpafAdmin();
			$this->show_view_employer('employer/ppafAdmin', $this->data);
		}
		else
		{	
			redirect( base_url());
		}
    }
	
	/* Add and Update ppafAdmin's */
	public function ppafAdminAdd()
	{
		if($this->checkSessionEmployer())
		{
			$ppaf_a_id = $this->uri->segment(3);
			if($ppaf_a_id)
			{
				if($this->checkEmployerEditPermission())
				{
					if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
					{
						$this->form_validation->set_rules($this->validation_rules['ppafAdminUpdate']);
						if($this->form_validation->run())
						{
							$post['ppaf_a_id'] = $ppaf_a_id;
							$post['ppaf_a_page'] = $this->input->post('ppaf_a_page');
							$post['ppaf_a_question'] = $this->input->post('ppaf_a_question');
							
							$post['ppaf_a_order'] = $this->input->post('ppaf_a_order');
							$post['ppaf_a_active_status'] = $this->input->post('ppaf_a_active_status');
							$post['ppaf_a_updated_date'] = date('y-m-d');


							$this->ppafadmin_model->ppafAdminUpdate($post);
						
							$msg = 'PPAF Admin detail update successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect('ppafAdmin');
						} 
						else 
						{
							$this->data['editppafAdmin'] = $this->ppafadmin_model->editppafAdmin($ppaf_a_id);
							$this->show_view_employer('employer/ppafAdmin_update', $this->data);
						}
					} 
					else 
					{
						$this->data['editppafAdmin'] = $this->ppafadmin_model->editppafAdmin($ppaf_a_id);
						$this->show_view_employer('employer/ppafAdmin_update', $this->data);
					}					
				}
				else
				{
					redirect( base_url());
				}
			}
			else
			{
				if($this->checkEmployerAddPermission())
				{
					if(isset($_POST['Submit']) && $_POST['Submit'] == "Submit") 
					{
						$this->form_validation->set_rules($this->validation_rules['ppafAdminAdd']);
						if($this->form_validation->run())
						{
							$post['ppaf_a_page'] = $this->input->post('ppaf_a_page');
							$post['ppaf_a_question'] = $this->input->post('ppaf_a_question');
							
							$ppaf_a_order = $this->input->post('ppaf_a_order');
							
							$result = $this->ppafadmin_model->show_allPpafAdmin();
							if(!empty($result))
							{
								foreach($result as $val)
								{
									if($val->ppaf_a_order >= $ppaf_a_order)
									{
										$post['ppaf_a_order'] = $this->input->post('ppaf_a_order');
										$order_post['ppaf_a_order'] = $val->ppaf_a_order + 1;
										$order_post['ppaf_a_id'] = $val->ppaf_a_id;
										$this->ppafadmin_model->updateQuestionOrder($order_post);
									}
									else
									{
										$post['ppaf_a_order'] = $this->input->post('ppaf_a_order');
									}
								}
							}
							else
							{
								$post['ppaf_a_order'] = $this->input->post('ppaf_a_order');
							}
							
							$post['ppaf_a_active_status'] = $this->input->post('ppaf_a_active_status');
							$post['ppaf_a_created_date'] = date('y-m-d');
							$post['ppaf_a_updated_date'] = date('y-m-d');

							$this->ppafadmin_model->ppafAdminAdd($post);					
							$msg = 'PPAF Admin inserted successfully!!';					
							$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
							redirect(base_url().'ppafAdmin');
						}
						else 
						{	
							$this->show_view_employer('employer/ppafAdmin_add', $this->data);
						}
					}
					else 
					{	
						$this->show_view_employer('employer/ppafAdmin_add', $this->data);
					}
				}
				else
				{
					redirect( base_url());
				}
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	
	/* Delete ppafAdmin Details */
	public function delete_ppafAdminDetails()
	{
		if($this->checkSessionEmployer() && $this->checkEmployerDeletePermission())
		{
			$ppaf_a_id = $this->uri->segment(3);
			
			$this->ppafadmin_model->delete_ppafAdminDetails($ppaf_a_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'ppafAdmin'); 
			}
			else
			{
				$msg = 'ppaf admin detail remove successfully...!';					
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect(base_url().'ppafAdmin');
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
			$post['ppaf_a_id'] = $this->input->post('id');
			$post['ppaf_a_active_status'] = $this->input->post('status');
			$post['ppaf_a_updated_date'] = date('Y-m-d');
			$this->ppafadmin_model->setStatus($post);
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
			$ppafAdmin_result = $this->ppafadmin_model->searchFun($post);		
			$html = '';
			if($ppafAdmin_result) 
			{
				foreach ($ppafAdmin_result as $row)
				{
					$html .= '<tr>
						<td>'. $row->ppaf_a_page.'</a></td>
						<td>'. $row->ppaf_a_question.'</a></td>
						<td>'. $row->ppaf_a_order.'</a></td>
						<td width="20%" class="text-center">';
						if($row->ppaf_a_active_status == 1){ 
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
									$html .= '<a href="'. base_url().'ppafAdmin/ppafAdminAdd/'.  $row->ppaf_a_id .'" title="Edit"><i class="fa fa-edit fa-2x "></i></a>&nbsp;&nbsp;';
								}
								if($this->uri->segment(2) == $role->controller_name && $role->userDelete == '1')
								{
									
									$html .= '<a class="confirm" onclick="return delete_ppafAdminDetails('.  $row->ppaf_a_id .');" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>';
								}
							}
																			
					$html .= '</td></tr>'; 
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