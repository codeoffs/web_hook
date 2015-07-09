<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $acc_id;

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('account/Account_db');
        $this->load->helper('cookie');

        $this->acc_id = get_cookie('ACC_ID');
    }

	public function index()
	{	
		
		
	}

	public function create()
	{	
		$this->load->helper('url');

		if (!empty($this->acc_id) && is_int($this->acc_id)) {
			if (!$this->Account_db->exist_acc($this->acc_id)) {
				$acc_reg = [
            		'date_create' => date('Y-m-d H:i:s', time()),
            		'date_update' => date('Y-m-d H:i:s', time())
            		];
				$id = $this->Account_db->new_account($acc_reg);
				set_cookie('ACC_ID', $id);
				redirect('');
			}
			return true;			
		}
		return false;
	}
}
