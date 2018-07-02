<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $userid='' ; 
	var $usermenu=array() ; 
	var $base_url = ''; // The page we are linking to
    var $prefix = ''; // A custom prefix added to the path.
    var $suffix = ''; // A custom suffix added to the path.
    var $total_rows = 3; // Total number of items (database results)
    var $per_page = 1; // Max number of items you want shown per page
    var $num_links = 1; // Number of "digit" links to show before/after the currently viewed page
    var $cur_page = 1; // The current page being viewed
    var $use_page_numbers = FALSE; // Use page number for segment instead of offset
    var $first_link = '&lsaquo; First';
    var $next_link = 'Next... →';
    var $prev_link = '← pre';
    var $last_link = 'Last &rsaquo;';
    var $uri_segment = 4;
    var $full_tag_open = '';
    var $full_tag_close = '';
    var $first_tag_open = '';
    var $first_tag_close = '&nbsp;';
    var $last_tag_open = '<li>';
    var $last_tag_close = '</li>';
    var $first_url = ''; // Alternative URL for the First Page.
    var $cur_tag_open = '<li class="active"><a href="#">';
    var $cur_tag_close = '</a></li>';
    var $next_tag_open = '<li>';
    var $next_tag_close = '</li>';
    var $prev_tag_open = '<li>';
    var $prev_tag_close = '</li>';
    var $num_tag_open = '<li>';
    var $num_tag_close = '</li>';
    var $page_query_string = FALSE;
    var $query_string_segment = 'per_page';
    var $display_pages = TRUE;
    var $anchor_class = '';
	/*
	constructor of this controller
	*/
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->data['session'] = $this->session->all_userdata();
		$this->load->model('home_model');
	}
	
	/* load the view files admin */
	public function show_view_admin($view, $data = '') 
	{    
		$session = $this->session->all_userdata();	
		$admin_role = $session[0]->admin_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($admin_role);
		$this->load->view('admin/admin_header',$data);
		$this->load->view($view, $data);
		$this->load->view('admin/admin_footer');
    }
	
	/* load the view files admin */
	public function show_view_front($view, $data = '') 
	{    
		$this->load->view('header');
		$this->load->view($view, $data);
		$this->load->view('footer');
    }
	
	/* load the view files front login */
	public function show_view_employer($view, $data = '') 
	{  
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($employer_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		$this->load->view('employer/employer_header', $data);
		$this->load->view($view, $data);
		$this->load->view('employer/employer_footer');
    }
	
	/*********** check permissions of Admin **********/
	/* View */
	public function checkAdminViewPermission()
	{
		$session = $this->session->all_userdata();	
		$admin_role = $session[0]->admin_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($admin_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(2))
			{
				if($tab_list->userView == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}	
	/* Add */
	public function checkAdminAddPermission()
	{
		$session = $this->session->all_userdata();	
		$admin_role = $session[0]->admin_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($admin_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(2))
			{
				if($tab_list->userAdd == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/* Edit */
	public function checkAdminEditPermission()
	{
		$session = $this->session->all_userdata();	
		$admin_role = $session[0]->admin_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($admin_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(2))
			{
				if($tab_list->userEdit == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/* Delete */
	public function checkAdminDeletePermission()
	{
		$session = $this->session->all_userdata();	
		$admin_role = $session[0]->admin_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($admin_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(2))
			{
				if($tab_list->userDelete == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/*********** check permissions of Admin **********/
	/*********** check permissions of Employer **********/
	/* View */
	public function checkEmployerViewPermission()
	{
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($employer_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(1))
			{
				if($tab_list->userView == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}	
	/* Add */
	public function checkEmployerAddPermission()
	{
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($employer_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(1))
			{
				if($tab_list->userAdd == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/* Edit */
	public function checkEmployerEditPermission()
	{
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($employer_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(1))
			{
				if($tab_list->userEdit == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/* Delete */
	public function checkEmployerDeletePermission()
	{
		$session = $this->session->all_userdata();	
		$employer_role = $session[0]->emp_user_role;
		$data['getAllTabAsPerRole'] = $this->home_model->getAllTabAsPerRole($employer_role);
		$TabAsPerRole = $data['getAllTabAsPerRole'];
		foreach($TabAsPerRole as $tab_list)
		{
			if($tab_list->controller_name == $this->uri->segment(1))
			{
				if($tab_list->userDelete == '1')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
	}
	/*********** check permissions of Employer **********/
	
	
	
	/*	Check Session Admin */
	public function checkSessionAdmin() 
	{
		$session = $this->session->all_userdata();	
		if(empty($session['0']->admin_id))
		{
			return false;		
		}
		if (isset($session['0']->admin_id))
		{
            $this->user = $session['0']->admin_name;
            $this->email = $session['0']->admin_email;
			$this->admin_id = $session['0']->admin_id;
        }
		return true;
	}
	
	/*	Check Session For Employer */
	public function checkSessionEmployer() 
	{
		$session = $this->session->all_userdata();	
		
		// echo "<pre>";
		// print_r($session);
		// die();
		if(empty($session['0']->emp_email))
		{
			return false;		
		}
		if (isset($session['0']))
		{
            $this->user = $session['0']->emp_fname;
            $this->email = $session['0']->emp_email;
			$this->user_id = $session['0']->emp_id;
			$this->employer_role = $session['0']->emp_user_role;
        }
		return true;
	}
	
	/*	Mail Send */
	public function send_mail($email, $subject, $message)	
	{		
		$config = array(	
			'protocol' => 'SMTP',			
			'smtp_host' => 'tls://smtp.gmail.com',		
			'smtp_port' => 465,				
			'smtp_user' => 'arvind.sixthsense@gmail.com', 	
			'smtp_pass' => 'arvind@123', 			
			'mailtype' => 'html',			
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1',	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from('arvind.sixthsense@gmail.com', "Sixth Sense");	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		return $this->email->send();
	}
	
	/* Upload Image */
	public function ImageUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
	
	/* file Upload */
	public function documentsUpload($filename, $name, $imagePath, $fieldName)
	{
		$config['file_name'] = $filename;
		$config['upload_path'] = $imagePath;
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filename);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();				
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
}
?>