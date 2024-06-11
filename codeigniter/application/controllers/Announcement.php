<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('announcements_model');
		$this->load->helper('url');
		$this->data = array();
	}

	public function index()
	{
		$array['announcements'] = $this->announcements_model->get_all_announcements();
		$this->load->view('announcement', $array);
	}

	public function add_announcement($announcement)
	{
		$this->data['announcement'] = urldecode($announcement);
		$id = $this->announcements_model->add_announcement($this->data);

		if ($id) {
			redirect(base_url('/announcement'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function upd_announcement($id, $announcement)
	{
		$this->data['announcement'] = urldecode($announcement);
		$id = $this->announcements_model->upd_announcement($id, $this->data);

		if ($id) {
			redirect(base_url('/announcement'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function del_announcement($id)
	{
		$id = $this->announcements_model->del_announcement($id);

		if ($id) {
			redirect(base_url('/announcement'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	
} 



