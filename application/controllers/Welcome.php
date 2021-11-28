<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		// $this->validate_user();
		$data = array(
			'title' => "Dashboard",
			'active_menu' => 'Home'
		);

		$this->load->library('template');
		$this->template->loadx('master', 'home', $data);
	}
}
