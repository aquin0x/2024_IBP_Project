<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('announcements_model');
		$this->load->helper('url');
		$this->data = array();
	}

	public function index()
	{
		$session_data = $this->session->userdata();

		if (array_key_exists('username', $session_data) && array_key_exists('email', $session_data) && array_key_exists('logged_in', $session_data)) {
			redirect(base_url('/welcome/mainpage'),'refresh');
		}

		$this->load->view('login');
	}

	public function mainpage()
	{
		$array['announcements'] = $this->announcements_model->get_all_announcements();
		$this->load->view('mainpage', $array);
	}
}
