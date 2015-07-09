<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hook extends CI_Controller {

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

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('hooks/Hooks_db');
    }

	public function index()
	{	

	}

	public function create()
	{
		$this->load->helper('string');
		$this->load->helper('color');

		$address = random_string('alnum', 30);

		$hook = [
            'code' => $address,
            'color'  => rendom_color_hex(),
            'date_create' => date('Y-m-d H:i:s', time()),
            'date_update' => date('Y-m-d H:i:s', time())
            ];

		$this->Hooks_db->new_hooks_adress($hook);

		return $address;
	}

	public function link($hook_uri)
	{
		$hook_id = $this->Hooks_db->in_hook($hook_uri);

		if (empty($hook_id)) {
			show_404();
		}



		if (!empty($this->input->user_agent())) {
			$user_agent = json_encode($this->input->user_agent());
		}else {
			$user_agent = NULL;
		}
		if (!empty($this->input->request_headers())) {
			$headers = json_encode($this->input->request_headers());
		}else {
			$headers = NULL;
		}
		if (!empty($this->input->get())) {
			$get = json_encode($this->input->get());
		}else {
			$get = NULL;
		}
		if (!empty($this->input->post())) {
			$post = json_encode($this->input->post());
		}else {
			$post = NULL;
		}
		if (!empty($this->input->raw_input_stream)) {
			$stream = json_encode($this->input->raw_input_stream);
		}else {
			$stream = NULL;
		}



		$info = [
			'hook_id' => $hook_id,
			'user_agent' => $user_agent,
			'ip_address' => $this->input->ip_address(),
			'method' => $this->input->method(TRUE),
			'headers' => $headers,
			'get' => $get,
			'post' => $post,
			'stream' => $stream,
			'date_creat' => date('Y-m-d H:i:s', time())
			];

		$data = $this->Hooks_db->c_hook_data($info);

		echo 'OK';
	}
}
