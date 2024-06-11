<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_Model extends CI_Model
{
    protected $full_name;
    protected $email;
    protected $password;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_user($data)
    {
        $this->full_name = $data['full_name'];
        $this->email = $data['email'];
        $this->password = $data['password'];

        $data = array(
            'full_name' => $this->full_name,
            'email' => $this->email,
            'password' => $this->password
        );

        $this->db->set($data);
        $query = $this->db->insert('users');

        return ($query) ?  $this->db->insert_id() : false;
    }

    public function get_user_by_email($data)
    {
        $this->email = $data['email'];
        $this->password = $data['password'];

        $data = array(
            'email' => $this->email,
            'password' => $this->password
        );

        $query = $this->db->get_where('users', $data);
        return $query->result();
    }

    public function get_user_by_only_email($data)
    {
        $this->email = $data['email'];

        $data = array(
            'email' => $this->email
        );

        $query = $this->db->get_where('users', $data);
        return $query->result();
    }

    // Read all users
    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    // Update a user by id
    public function upd_users($id, $data)
    {
        $this->db->where('ID', $id);
        return $this->db->update('users', $data);
    }
    public function del_users($id)
    {
        $this->db->where('ID', $id);
        return $this->db->delete('users');
    }
}
