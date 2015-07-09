<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Account_db extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function new_account(array $data)
    {
        
        $this->db->insert('wd_account', $data);
        return $this->db->insert_id();
    }

    public function exist_acc($id)
    {   

        $db_acc= $this->db->get_where('wd_account', ['id' => $id]);
        $acc_info = $db_acc->row_array();
        if ($acc_info) {
           return true;
        }

        return false;
    }

}