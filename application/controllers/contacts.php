<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

	public function index()
	{		
		$this->show_view_front('contacts'); 	
	}
}
