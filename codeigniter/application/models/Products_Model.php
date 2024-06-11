<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_Model extends CI_Model
{

    protected $product_name;

    public function __construct()
    {
        parent::__construct();
    }

    public function add_product($data)
    {
        $this->product_name = $data['product_name'];

        $data = array(
            'product_name' => $this->product_name
        );

        return ($this->db->insert('products', $data)) ?  $this->db->insert_id() : false;
    }

    // Read a user by id
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    // Read all users
    public function get_all_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }


    // Update a user by id
    public function upd_product($id, $data)
    {
        $this->db->where('ID', $id);
        return $this->db->update('products', $data);
    }

    public function del_product($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('products');
    }
}
