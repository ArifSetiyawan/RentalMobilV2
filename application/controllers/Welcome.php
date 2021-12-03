<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('utils'));
		$this->load->model('Master', 'model_master');
		// $this->load->model('Auth', 'authorization');
	}

	function validate_user()
	{
		$user_access = $this->session->userdata();

		if ($user_access != null) {
			if ($user_access['email'] == null) {
				$this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('warning', 'Maaf Anda Harus Login kembali');
			redirect('auth');
		}

		return $user_access;
	}
	public function index()
	{
		$this->validate_user();
		$data = array(
			'title' => "Dashboard",
			'active_menu' => 'Home'
		);

		$this->load->library('template');
		$this->template->loadx('master', 'home', $data);
	}
}
