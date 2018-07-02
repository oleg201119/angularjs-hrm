<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('employer/login_model');	
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'login' => array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
			 array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        ),
		'profile_password' => array(
            array(
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => 'trim|required'
            ),
			 array(
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|matches[new_password]'
            )
        ),
		'forgotPassword_email' => array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            )
        ),
		'resetpassword' => array(
            array(
                'field' => 'employer_password',
                'label' => 'New Password',
                'rules' => 'trim|required|matches[c_employer_password]'
            ),
			array(
                'field' => 'c_employer_password',
                'label' => 'Re-Type Password',
                'rules' => 'trim|required'
            )
        )
    );
		
	/* Login */
	public function index()
	{
		if($this->checkSessionEmployer())
		{
			redirect(base_url().'dashboard');
		}
		else
		{	
			if(isset($_POST['Login']) && $_POST['Login'] =='Login')
			{
				$this->form_validation->set_rules($this->validation_rules['login']);
				if ($this->form_validation->run()) 
				{
					$this->data['employer_email'] = $_POST['email'];
					$this->data['employer_password'] = md5($_POST['password']);
					$res = $this->login_model->CheckUserID($this->data['employer_email']);	

					if(!empty($res[0]->emp_email))
					{
						$attempt_res = $this->login_model->getAttemptsByEmail($this->data['employer_email']);
						if(empty($attempt_res))
						{
							$result = $this->login_model->CheckLoginDetails($this->data);
							
							if(!empty($result))
							{
								// echo "<pre>";
								// print_r($session);
								// die();
								$this->session->set_userdata($result);
								$msg = 'Sucess login!!';					
								$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-10"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
								redirect(base_url().'dashboard');
							}	
							else
							{
								$att_val = 1;
								$post['la_ip'] = $_SERVER['SERVER_ADDR'];
								$post['la_attempt'] = $att_val;
								$post['la_useremail'] = $this->data['employer_email'];									
								//date_default_timezone_set("Asia/Kolkata");
								$post['la_date'] = date('Y-m-d h:i', time());
								$this->login_model->addLoginAttemp($post);	

								$msg = 'Your username and password "combination could not be found"';
								//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000; margin-bottom:10px;">'.$msg.'</div>');
								$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
								redirect(base_url().'login');
							}
						}
						else
						{
							if($attempt_res[0]->la_attempt < 3)
							{
								$result = $this->login_model->CheckLoginDetails($this->data);
								if(!empty($result))
								{
									$this->session->set_userdata($result);
									$msg = 'Sucess login!!';					
									$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-10"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
									redirect(base_url().'dashboard');
								}	
								else
								{
									$att_val = $attempt_res[0]->la_attempt + 1;
									//$post['la_ip'] = $_SERVER['SERVER_ADDR'];
									$post['la_attempt'] = $att_val;
									$post['la_useremail'] = $this->data['employer_email'];
									//date_default_timezone_set("Asia/Kolkata");
									$l_attempt_time = date('Y-m-d h:i', time());
									$post['la_date'] = date('Y-m-d h:i', strtotime($l_attempt_time .'+ 15 minute'));
									$this->login_model->updateLoginAttemp($post);

									$msg = 'Your username and password "combination could not be found"';
									//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000; margin-bottom:10px;">'.$msg.'</div>');
									$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
									redirect(base_url().'login');
								}
							}
							else
							{
								//date_default_timezone_set("Asia/Kolkata");
								$l_attempt_time = date('Y-m-d h:i', time());
								$d1 = strtotime($attempt_res[0]->la_date);
								$d2 = strtotime($l_attempt_time);

								if($d2 >= $d1)
								{
									$admin_post['employer_active_status'] = 1;
									$admin_post['employer_email'] = $this->data['employer_email'];
									$admin_post['employer_updated_date'] = date('Y-m-d');								
									$this->login_model->blockUser($admin_post);
									//$this->login_model->deleteAttempt($admin_post['admin_email']);

									$result = $this->login_model->CheckLoginDetails($this->data);
									if(!empty($result))
									{
										$this->session->set_userdata($result);
										$msg = 'Sucess login!!';					
										$this->session->set_flashdata('message', '<section class="content"><div class="col-xs-10"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div></section>');
										redirect(base_url().'dashboard');
									}	
									else
									{
										if($attempt_res[0]->la_attempt == 3)
										{
											$att_val = 1;
										}
										else
										{
											$att_val = $attempt_res[0]->la_attempt + 1;
										}
										//$post['la_ip'] = $_SERVER['SERVER_ADDR'];
										$post['la_attempt'] = $att_val;
										$post['la_useremail'] = $this->data['employer_email'];
										//date_default_timezone_set("Asia/Kolkata");
										$l_attempt_time = date('Y-m-d h:i', time());
										$post['la_date'] = date('Y-m-d h:i', strtotime($l_attempt_time .'+ 15 minute'));
										$this->login_model->updateLoginAttemp($post);

										$admin_post['employer_active_status'] = 1;
										$admin_post['employer_email'] = $this->data['employer_email'];
										$admin_post['employer_updated_date'] = date('Y-m-d');								
										$this->login_model->blockUser($admin_post);

										$msg = 'Your username and password "combination could not be found"';
										//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000; margin-bottom:10px;">'.$msg.'</div>');
										$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
										redirect(base_url().'login');
									}
								}
								else
								{
									$admin_post['employer_active_status'] = 0;
									$admin_post['employer_email'] = $this->data['employer_email'];
									$admin_post['employer_updated_date'] = date('Y-m-d');								
									$this->login_model->blockUser($admin_post);
									$last_logi_ti = date('H:i a', strtotime($attempt_res[0]->la_date));
									$msg = 'To many attempts. Your account has been locked for 15 minutes. Please try again at '.$attempt_res[0]->la_date;
									//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000; margin-bottom:10px;">'.$msg.'</div>');
									$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
									redirect(base_url().'login');										
								}
							}
						}
					}
					else
					{
						$msg = 'Your username and password "combination could not be found"';
						//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000; margin-bottom:10px;">'.$msg.'</div>');
						$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'login');
					}
				}
				else
				{
					$msg = 'You must enter a username and password.';
					//$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"  style="color: #ff0000;">'.$msg.'</div>');
					$this->data = $this->session->set_flashdata('message1', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					$this->load->view('employer/login', $this->data);
				}
			}
			else
			{
				$this->load->view('employer/login');
			}
		}
    }
	

   /* Forgot Password */
	public function forgotPassword()
	{
		if(isset($_POST['Submit']) && $_POST['Submit'] == 'forgot_password')
		{
			$post_email = $this->input->post('email');
			$this->form_validation->set_rules($this->validation_rules['forgotPassword_email']);
			if ($this->form_validation->run()) 
			{
				$result = $this->login_model->CheckUserID($post_email);			
				if(!empty($result))
				{
					//echo $result[0]->admin_email;die;
					$subject = 'Password Recovery';
					$email = $result[0]->emp_email;
					$message = '';
					$message .= 'Change your password <a href="'.base_url().'login/resetpassword?a='.base64_encode($email).'">Click Here </a>or open below link<br>';
					$message .= base_url().'login/resetpassword?a='.base64_encode($email);
					$mail = $this->send_mail($email, $subject, $message);
					if(!$mail)
					{
						$msg = 'Somthing wrong in your Email ID ';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'login/forgotPassword');
					}
					else
					{
						$msg = 'Send a link in your Email ID. Please check your Email and reset your password';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url());
					}
				}
				else
				{
					$msg = 'Do not matches your Email Please insert right Email ID';
					$this->data = $this->session->set_flashdata('email', $msg);
					redirect(base_url().'login/forgotPassword');
				}
			}
			else
			{
				$this->load->view('employer/employer_forgot_password', $this->data);
			}
		}
		else
		{
			$this->load->view('employer/employer_forgot_password', $this->data);
		}
	}

	/* Reset Password */
	public function resetpassword()
	{
		$email = base64_decode($_GET['a']);
		$result = $this->login_model->CheckUserID($email);
		if(count($result) != 0)
		{
			if(isset($_POST['resetpassword']) && $_POST['resetpassword'] == 'resetpassword')
			{
				$post['email'] = $email;
				$post['employer_password'] = md5($this->input->post('employer_password'));
				$this->form_validation->set_rules($this->validation_rules['resetpassword']);
				if ($this->form_validation->run()) 
				{

					$result = $this->login_model->reset_password($post);
					
					if($result)
					{
						$subject = 'Password Reset';
						$message = '';
						$message .= 'Ypur Password reset successfully <br>';
						$message .= base_url().'/';
						$mail = $this->send_mail($email, $subject, $message);
						if(!$mail)
						{
							$msg = 'Somthing wrong in your Email ID ';
							$this->data = $this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url().'login/resetpassword?a='.base64_encode($email));
						}
						else
						{
							$msg = 'Your password update sucessfully';
							$this->data = $this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url());
						}
					}
					else
					{
						$msg = 'Do not update your password please try again';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'login/resetpassword?a='.base64_encode($email));
					}
				}
				else
				{
					$this->load->view('employer/employer_reset_password', $this->data);
				}
			}
			else
			{
				$this->load->view('employer/employer_reset_password', $this->data);
			}
		}
		else
		{
			$msg = 'Do not matches your Email Please insert right Email ID';
			$this->data = $this->session->set_flashdata('email', $msg);
			redirect(base_url().'login/forgotPassword');
		}
	}



	/*	Profile */
	public function profile() 
	{  
		if($this->checkSessionEmployer())
		{
			$admin_id = $this->uri->segment(4);
			if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
			{
				$post['admin_id'] = $admin_id;
				$post['old_password'] = md5($this->input->post('old_password'));
				$post['new_password'] = md5($this->input->post('new_password'));
				$post['confirm_password'] = md5($this->input->post('confirm_password'));
				$this->form_validation->set_rules($this->validation_rules['profile_password']);
				if ($this->form_validation->run()) 
				{
					$result = $this->login_model->checkpassword($post);
					if(count($result) != 0)
					{
						$this->login_model->updateUserPassword($post);
						$msg = 'Your Password will be change successfully';
						$this->data = $this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-sucess alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/logout');
					}
					else
					{
						$msg = 'Do not matches Old Password Please try again';
						$this->data = $this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/profile/'.$admin_id);
					}
				}
				else
				{
					$this->data['userDetails'] = $this->login_model->getUserProfileDetails($admin_id);
					$this->show_view_admin('admin/admin_profile', $this->data);
				}
			}
			else
			{
				$this->data['userDetails'] = $this->login_model->getUserProfileDetails($admin_id);
				$this->show_view_admin('admin/admin_profile', $this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}		
    }

	/*	Logout */
	public function logout() 
	{        
        $this->session->sess_destroy();		
        redirect( base_url());
    }
}
/* End of file */