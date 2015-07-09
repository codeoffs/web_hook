<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hooks_db extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function new_hooks_adress(array $data)
    {
        
        $this->db->insert('wd_hook', $data);
    }

    public function in_hook($code)
    {
        $db_hook= $this->db->get_where('wd_hook', ['code' => $code]);

        $hook = $db_hook->row_array();

        if (empty($hook)) {
            return FALSE;
        }

        if (empty($hook['count'])) {
            $hook['count'] = 1;
        }else{
            $hook['count']++;
        }

        $faild = [
            'count' => $hook['count'],
            'date_update' => date('Y-m-d H:i:s', time())
            ];

        $this->db->update('wd_hook', $faild, ['id' => $hook['id']]);

        return $hook['id'];
    }

    public function c_hook_data(array $data)
    {
        
        $this->db->insert('wd_hook_data', $data);
    }

}