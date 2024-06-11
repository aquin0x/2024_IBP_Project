<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create a new user
    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    // Read a user by id
    public function get_user_by_id($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    // Read all users
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    // Update a user by id
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
}