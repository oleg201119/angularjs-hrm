<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ppaf extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/ppaf_model');
		$this->load->model('employer/employees_model');
	}
	
	/* ppafAdmin Details */
	public function index()
	{
		
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{
			if(isset($_POST['submit']) && $_POST['submit'] == 'submit')
			{
				$post['ppaf_employee_id'] = $this->input->post('ppaf_employee_id');
				$post['ppaf_site_location'] = $this->input->post('ppaf_site_location');
				$post['ppaf_site_manager_name'] = $this->input->post('ppaf_site_manager_name');
				$post['ppaf_site_manager_position'] = $this->input->post('ppaf_site_manager_position');
				$post['ppaf_further_note'] = $this->input->post('ppaf_further_note');
				$post['ppaf_over_all_score'] = $this->input->post('ppaf_over_all_score');
				$post['ppaf_total_score'] = $this->input->post('ppaf_total_score');
				$post['ppaf_rate_statndard'] = $this->input->post('ppaf_rate_statndard');
				$post['ppaf_emp_recommendation'] = $this->input->post('ppaf_emp_recommendation');
				$post['ppaf_created_date'] = date('Y-m-d');
				$post['ppaf_updated_date'] = date('Y-m-d');

				$ppaf_id = $this->ppaf_model->addPpaf($post);

				$ppafAdmin_result = $this->ppaf_model->getAllPpafAdmin();
				foreach ($ppafAdmin_result as $value)
				 {
					$ppaf_a_val = $this->input->post('criteria_'.$value->ppaf_a_id);
					if(!empty($ppaf_a_val))
					{
						$post_p['criteria_ppaf_admin_id'] = $value->ppaf_a_id;
						$post_p['criteria_value'] = $ppaf_a_val;
						$post_p['criteria_ppaf_id'] = $ppaf_id;
						$post_p['criteria_created_date'] = date('Y-m-d');
						$post_p['criteria_updated_date'] = date('Y-m-d');
						$this->ppaf_model->addCriteria($post_p);
					}	
				}

				$msg = 'PPAF save successfully!!';					
				$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
				redirect('ppaf');
			}
			else
			{
				$this->data['employees_result'] = $this->ppaf_model->show_allEmployees();
				$this->data['state_list'] = $this->employees_model->getAllState();		
				$this->data['ppafAdmin_result'] = $this->ppaf_model->getAllPpafAdmin();
				$this->show_view_employer('employer/ppaf', $this->data);
			}
		}
		else
		{	
			redirect( base_url());
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
			$employees_result = $this->ppaf_model->searchFun($post);		
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
						<td width="20%" class="text-center"></td>
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