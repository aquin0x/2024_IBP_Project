<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('users_model');
		$this->data = array();
	}

	public function index()
	{
		if($_SESSION['is_admin'] == 1) {
			$array['users'] = $this->users_model->get_all_users();
		} else if ($_SESSION['is_admin'] == 0) {
			$this->data['email'] = $_SESSION['email'];
			$array['users'] = $this->users_model->get_user_by_only_email($this->data);
		}
		
		/* echo '<pre>';
		var_dump($array['users']);
		echo '</pre>'; 
		exit(); */
		$this->load->view('users', $array);
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function add_user()
	{
		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if ($name && $surname && $email && $password) {
			$this->data['full_name'] = $name . ' ' . $surname;
			$this->data['email'] = $email;
			$this->data['password'] = hash("sha256", $password);

			$id = $this->users_model->add_user($this->data);

			if ($id) {
				// $this->index();
				redirect(base_url('/users'), 'refresh');
			} else {
				echo 'Bir Hata Olustu!';
			}
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function login_user()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		/* echo '<pre>';
		var_dump($this->input->post('email'));
		echo '</pre>';
		exit(); */

		if ($email && $password) {
			$this->data['email'] = $email;
			$this->data['password'] = hash("sha256", $password);

			$result = $this->users_model->get_user_by_email($this->data);

			/* echo '<pre>';
			var_dump($result);
			echo '</pre>';
			return; */

			if ($result) {
				// $this->index();
				$session_data = array(
					'username'  => $result[0]->full_name,
					'email'     => $result[0]->email,
					'logged_in' => TRUE,
					'is_admin' => $result[0]->is_admin
				);

				$this->session->set_userdata($session_data);
				// $this->load->view('mainpage');
				redirect(base_url('/welcome/mainpage'), 'refresh');
			} else {
				// $this->login();
				redirect(base_url('/users/login'), 'refresh');
			}
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function logout_user() {
		$this->session->sess_destroy();
		redirect(base_url('/users/login'), 'refresh');
		// $this->load->view('login');
	}

	public function change_user($id, $idx)
	{
		$this->data['full_name'] = $this->input->post("fullname" . $idx);
		$this->data['email'] = $this->input->post("email" . $idx);
		$password = $this->input->post("password" . $idx) ?? '';
		$this->data['password'] = hash("sha256", $password);

		$id = $this->users_model->upd_users($id, $this->data);

		if ($id) {
			redirect(base_url('/users'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function del_users($id)
	{
		$id = $this->users_model->del_users($id);

		if ($id) {
			redirect(base_url('/users'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}
}
