<?php

use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

defined('BASEPATH') or exit('No direct script access allowed.');

/**
 * A simple class autoloader.
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2017.
 * @license The MIT License
 *
 * Important note: Within the file application/config/config.php find the setting
 * $config['enable_hooks'] and set it to TRUE.
 */

function classAutoloader()
{
	spl_autoload_register('pre_system_1_autoload');
}

function pre_system_1_autoload($class)
{
	// echo $class . " | ";
	switch ($class)
	{
		// case 'MX_Controller':
		case 'Whoops\Run':
		{
			//require_once APPPATH . 'libraries/WhoopsLib.php';
			return;
		}
	}
}