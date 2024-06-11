<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{

	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('message_model');
		$this->load->model('users_model');
		$this->load->helper('url');
		$this->data = array();
	}

	public function index()
	{
		$this->read_messages();
		$this->data["users"] = $this->users_model->get_all_users();
		$this->load->view('message', $this->data);
	}

	public function add_message($sent_to)
	{

		$message = $this->input->post('message');
		$is_read = $this->input->post('is_read');

		if (!$sent_to) {
			$sent_to = $this->input->post('sent_id');
		}


		if ($message && $sent_to) {
			$this->data['message'] = $message;
			$this->data['sent_to'] = $sent_to;
			$this->data['is_read'] = $is_read;

			if ($_SESSION['is_admin'] == 0) {
				$id = $this->message_model->add_message($this->data);
			} else if ($_SESSION['is_admin'] == 1) {
				$id = $this->message_model->upd_message($this->data);
			}


			if ($id) {
				// $this->index();
				redirect(base_url('/message'), 'refresh');
			} else {
				echo 'Bir Hata Olustu!';
			}
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function upd_message()
	{

		$msg_id = $this->input->post('msg_id');
		$message = $this->input->post('message');
		$is_read = $this->input->post('is_read') ? 1 : 0;
		$sent_to = $this->input->post('sent_id');

		if ($message && $sent_to) {
			$this->data["ID"] = $msg_id;
			$this->data['message'] = $message;
			$this->data['sent_to'] = $sent_to;
			$this->data['is_read'] = $is_read;

			$id = $this->message_model->upd_message($this->data);

			if ($id) {
				// $this->index();
				redirect(base_url('/message'), 'refresh');
			} else {
				echo 'Bir Hata Olustu!';
			}
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function read_messages()
	{
		$session_data = $this->session->userdata();
		//kontrol amaclı eger bunlar tanımlıysa message modele gıt get all mesages calıstır user emaıl admın gonder 
		if (array_key_exists('username', $session_data) && array_key_exists('email', $session_data)) {
			$this->data['messages'] = $this->message_model->get_all_messages($_SESSION['username'], $_SESSION['email'], $_SESSION['is_admin']);
		} else {
			$this->data['messages'] = [];
		}
	}

	
}
