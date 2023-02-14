<?php

defined('BASEPATH') or exit('No direct script access allowed');

class App_Autoloader {
	/**
	 * Register Autoloader
	 */
	public static function register()
	{
		spl_autoload_register(function ($classname) {

			// todo
		});
	}
}
