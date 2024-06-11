<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Announcements_Model extends CI_Model
{
    protected $announcement;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_announcements()
    {
        $this->db->select('*');
        $this->db->from('announcements');
        $this->db->order_by('record_date', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_announcement($data)
    {
        $this->announcement = $data['announcement'];

        $data = array(
            'announcement' => $this->announcement,
            'record_date' => date('Y-m-d H:i:s')
        );

        return ($this->db->insert('announcements', $data)) ?  $this->db->insert_id() : false;
    }

    public function upd_announcement($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('announcements', $data);
    }

    public function del_announcement($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('announcements');
    }

  
}
