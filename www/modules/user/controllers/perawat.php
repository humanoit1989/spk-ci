<?php
/***************************************************************************************
 *                       			perawat.php
 ***************************************************************************************
 *      Author:     	Topidesta as Shabiki <m.desta.fadilah@hotmail.com>
 *      Website:    	http://www.twitter.com/emang_dasar
 *
 *      File:          	perawat.php
 *      Created:   		2012 - 12.35.07 WIB
 *      Copyright:  	(c) 2012 - desta
 *                  	DON'T BE A DICK PUBLIC LICENSE
 * 						Version 1, December 2009
 *						Copyright (C) 2009 Philip Sturgeon
 *
 ****************************************************************************************/
class Perawat extends MX_Controller
{
	private $groups = 'perawat';
	
	function __construct()
	{
		parent::__construct();
		$data = array();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
	}

	function index()
	{
		
	if ($this->ion_auth->logged_in() && $this->ion_auth->in_group($this->groups))
		{
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$data['users'] = $this->ion_auth->users()->result();
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			
			// Buat Template
			$data['welcome'] = "Welcome " . ucfirst($this->session->userdata('email'));
			$data['title'] = "Module Perawat";
			$data['perawat'] = "perawat"; // Controller
			$data['view'] = "gen_perawat"; // View
			$data['module'] = "user"; // Controller
				
			// Load Template->view(login)
			echo Modules::run('template/perawat',$data);
		
		}
		else //apabila belum login
		{
			show_404();
		}
	}
	
	function  penilaian()
	{
		
	}
	
	function inbox()
	{
		
	}
	
	function outbox()
	{
		
	}
}
 
 
 /* End of File: perawat.php */
/* Location: ../www/modules/user/perawat.php */ 