<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	/* Dashboard Show */
	public function index()
	{	
		
		if($this->checkSessionEmployer() && $this->checkEmployerViewPermission())
		{
			$this->show_view_employer('employer/dashboard', $this->data);
		}
		else
		{
			redirect(base_url());
		}
    }
}

/* End of file */?>