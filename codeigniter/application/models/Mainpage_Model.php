<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mainpage_Model extends CI_Model
{

    // Read all users
    public function get_all_announcements()
    {
        $query = $this->db->get('announcements');
        return $query->result();
    }


}