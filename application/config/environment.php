<?php

if (!defined('ENVIRONMENT')) {
	$host = strtolower($_SERVER['HTTP_HOST']);
	switch ($host) {
		case 'my.site.io':
			define('ENVIRONMENT', 'production');
			break;

		default:
			define('ENVIRONMENT', 'development');
			break;
	}
}