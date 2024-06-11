<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
		$this->load->helper('url');
		$this->data = array();
	}

	public function index()
	{
		$array['products'] = $this->products_model->get_all_products();
		$this->load->view('products', $array);
	}

	public function add_product($product_name)
	{
		$this->data['product_name'] = $product_name;
		$id = $this->products_model->add_product($this->data);

		if ($id) {
			redirect(base_url('/products'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function upd_product($id, $product_name)
	{
		$this->data['product_name'] = $product_name;
		$id = $this->products_model->upd_product($id, $this->data);

		if ($id) {
			redirect(base_url('/products'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}

	public function del_product($id)
	{
		$id = $this->products_model->del_product($id);

		if ($id) {
			redirect(base_url('/products'), 'refresh');
		} else {
			echo 'Bir Hata Olustu!';
		}
	}
}
