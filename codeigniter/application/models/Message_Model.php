<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message_Model extends CI_Model
{

    protected $msg_id;
    protected $message;
    protected $sent_to;
    protected $is_read;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function add_message($data)
    {
        $this->message = $data['message'];
        $this->sent_to = $data['sent_to'];
        $this->is_read = $data['is_read'];

        $data = array();
        $data["email"] = $_SESSION['email'];

        $result = $this->users_model->get_user_by_only_email($data);

        if ($result) {
            $data = array(
                'message' => $this->message,
                'sent_by' => $result[0]->ID,
                'received_by' => $this->sent_to,
                'record_date' => date('Y-m-d H:i:s')
            );

            $this->db->set($data);
            $query = $this->db->insert('message');

            return ($query) ?  $this->db->insert_id() : false;
        }

        return false;
    }

    public function upd_message($data)
    {
        $this->msg_id = $data['ID'];
        $this->message = $data['message'];
        $this->sent_to = $data['sent_to'];
        $this->is_read = $data['is_read'];

        $data = array();
        $data["email"] = $_SESSION['email'];

        $result = $this->users_model->get_user_by_only_email($data);

        if ($result) {
            $data = array(
                'ID' => $this->msg_id
            );

            $this->db->where($data);

            $data = array(
                'admin_message' => $this->message,
                'is_read' => $this->is_read
            );

            $query = $this->db->update('message', $data);

            return ($query) ?  true : false;
        }

        return false;
    }

    public function get_all_messages($username, $email, $is_admin)
    {
        $query = $this->db->get_where('users', array('full_name' => $username, 'email' => $email)); //db gıt get_where calıstır where kullanarak select cek users tablosundan full name ve emaıl bu olanları cek 
        $result = $query->row(); //query calıstıran kısım bu yazılmadan query calısmıyor

        // eper result bos degılse ıf e gır 
        if (isset($result)) {
            $this->db->select('users.full_name as Sent_By_Name, message.*'); //db select cek
            $this->db->from('message'); // hangı tablo
            $this->db->join('users', 'users.id = message.sent_by', 'left'); //left joın at
            $this->db->order_by('message.record_date', 'desc'); // order by sıralama attık 
            if($is_admin == 1) {
                $this->db->where(array('received_by' => $result->ID)); // eğer admınse bu sutuna at
            } else {
                $this->db->where(array('sent_by' => $result->ID)); // eğer değilse buraya kaydet 
            }

            $query = $this->db->get(); //query olustur
            return $query->result(); // query calıstır resultları don
        }

        return false; // kayıt yok 
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
