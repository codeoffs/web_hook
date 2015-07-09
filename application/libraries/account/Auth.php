<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth 
{
	private $CI;

	public function __construct($value='')
	{
		$this->CI = &get_instance();
	}
}